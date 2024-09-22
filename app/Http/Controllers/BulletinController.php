<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBulletinRequest;
use App\Http\Requests\IndexBulletinRequest;
use App\Models\Bulletin;
use App\Services\BulletinService;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BulletinController extends Controller
{
    use RefreshDatabase;

    public function __construct(
        protected BulletinService $bulletinService
    )
    {}

    public function index(IndexBulletinRequest $request): JsonResponse
    {
        $perPage = $request->get('per_page', 10);
        $sortBy = $request->get('sort_by', 'created_at');
        $sortDirection = $request->get('sort_direction', 'desc');

        $bulletins = $this->bulletinService->getBulletinsBySorted($sortBy, $sortDirection, $perPage);

        return response()->json([
            'bulletins' => $bulletins,
            'meta' => [
                'current_page' => $bulletins->currentPage(),
                'total' => $bulletins->total(),
                'per_page' => $bulletins->perPage(),
                'last_page' => $bulletins->lastPage(),
            ],
        ]);
    }

    public function show(Bulletin $bulletin): JsonResponse
    {
        return response()->json([
            'name' => $bulletin->name,
            'main_image' => json_decode($bulletin->images, true)[0] ?? null,
            'price' => $bulletin->price,
        ]);
    }

    public function store(CreateBulletinRequest $request): JsonResponse
    {
        try {
            $bulletin = $this->bulletinService->create($request->validated());
            return response()->json(['ID' => $bulletin->id,], 201);

        } catch (\RuntimeException $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
}
