<?php

namespace App\Services;

use App\Models\Bulletin;
use Illuminate\Support\Facades\Log;

class BulletinService
{
    public function create(array $data): Bulletin|null
    {
        try {
            $bulletin = Bulletin::create($data);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            throw new \RuntimeException('Error create Bulletin');
        }
        return  $bulletin;
    }
}
