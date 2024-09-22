<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBulletinRequest;
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
