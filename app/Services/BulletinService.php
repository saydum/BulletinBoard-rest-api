<?php

namespace App\Services;

use RuntimeException;
use App\Models\Bulletin;
use Illuminate\Support\Facades\Log;

class BulletinService
{

    public function getBulletinsBySorted(string $sortBy, string $sortDirection, int $perPage)
    {
        try {
            return Bulletin::orderBy($sortBy, $sortDirection)
                ->select(['name', 'images', 'price', 'created_at'])
                ->paginate($perPage)
                ->through(function ($bulletin) {
                    return [
                        'name' => $bulletin->name,
                        'main_image' => json_decode($bulletin->images, true)[0] ?? null,
                        'price' => $bulletin->price
                    ];
                });
        } catch (RuntimeException $e) {
            Log::error($e->getMessage());
            throw new RuntimeException('Error get Bulletins');
        }

    }

    public function create(array $data): Bulletin|null
    {
        try {
            $bulletin = Bulletin::create($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new RuntimeException('Error create Bulletin');
        }
        return  $bulletin;
    }
}
