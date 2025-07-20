<?php

namespace App\Http\Controllers\Api;

use App\Data\Deals\CreateDealData;
use App\Data\Deals\GetDealsData;
use App\Data\Deals\UpdateDealData;
use App\Data\Deals\DeleteDealData;
use App\Data\Deals\UpdateDealStatusData;
use App\Data\Deals\UpdateDealTypeData;
use App\Data\Deals\PatchDealData;
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

    public function getDeals(GetDealsData $getDealsData): JsonResponse
    {
        return response()->json($this->dealService->getDeals($getDealsData));
    }

    public function getDealById(int $id): JsonResponse
    {
        return response()->json($this->dealService->getDealById($id));
    }

    public function update(UpdateDealData $data): JsonResponse
    {
        return response()->json($this->dealService->updateDeal($data));
    }

    public function delete(DeleteDealData $data): JsonResponse
    {
        return response()->json($this->dealService->deleteDeal($data));
    }

    public function updateStatus(UpdateDealStatusData $data): JsonResponse
    {
        return response()->json($this->dealService->updateDealStatus($data));
    }

    public function updateType(UpdateDealTypeData $data): JsonResponse
    {
        return response()->json($this->dealService->updateDealType($data));
    }

    public function patch(PatchDealData $data): JsonResponse
    {
        return response()->json($this->dealService->patchDeal($data));
    }

}
