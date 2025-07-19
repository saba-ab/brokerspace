<?php

namespace App\Services;

use App\Models\Deal;
use App\Data\CreateDealData;
use App\Data\ServiceResponseData;

class DealService extends BaseService
{
    public function __construct(private Deal $model) {}

    public function createDeal(CreateDealData $data): ServiceResponseData
    {

        $deal = $this->model->create($data->toArray());
        return $this->successResponse('Deal created successfully', $deal);
    }
}
