<?php

namespace App\Services;

use App\Models\Deal;
use App\Data\Deals\CreateDealData;
use App\Data\Deals\GetDealsData;
use App\Data\Deals\UpdateDealData;
use App\Data\Deals\DeleteDealData;
use App\Data\Deals\UpdateDealStatusData;
use App\Data\Deals\UpdateDealTypeData;
use App\Data\Deals\PatchDealData;
use App\Data\ServiceResponseData;

class DealService extends BaseService
{
    public function __construct(private Deal $model) {}

    public function createDeal(CreateDealData $data): ServiceResponseData
    {

        $deal = $this->model->create($data->toArray());
        return $this->successResponse('Deal created successfully', $deal);
    }

    public function getDeals(GetDealsData $getDealsData): ServiceResponseData
    {
        $deals = $this->model->paginate($getDealsData->perPage, ['*'], 'page', $getDealsData->page);
        return $this->successResponse('Deals fetched successfully', $deals);
    }

    public function getDealById(int $id): ServiceResponseData
    {
        $deal = $this->model->find($id);
        return $this->successResponse('Deal fetched successfully', $deal);
    }

    public function updateDeal(UpdateDealData $data): ServiceResponseData
    {
        $deal = $this->model->find($data->id);
        $deal->update($data->toArray());
        return $this->successResponse('Deal updated successfully', $deal);
    }

    public function deleteDeal(DeleteDealData $data): ServiceResponseData
    {
        $deal = $this->model->find($data->id);
        $deal->delete();
        return $this->successResponse('Deal deleted successfully', $deal);
    }

    public function updateDealStatus(UpdateDealStatusData $data): ServiceResponseData
    {
        $deal = $this->model->find($data->id);
        $deal->update($data->toArray());
        return $this->successResponse('Deal status updated successfully', $deal);
    }

    public function updateDealType(UpdateDealTypeData $data): ServiceResponseData
    {
        $deal = $this->model->find($data->id);
        $deal->update($data->toArray());
        return $this->successResponse('Deal type updated successfully', $deal);
    }

    public function patchDeal(PatchDealData $data): ServiceResponseData
    {
        $deal = $this->model->find($data->id);
        $deal->update($data->toArray());
        return $this->successResponse('Deal patched successfully', $deal);
    }
}
