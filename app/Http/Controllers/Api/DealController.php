<?php

namespace App\Http\Controllers\Api;

use App\Data\CreateDealData;
use App\Services\DealService;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

final class DealController extends Controller
{
    public function __construct(private DealService $dealService) {}

    public function createDeal(CreateDealData $data): JsonResponse
    {
        return response()->json($this->dealService->createDeal($data));
    }
}
