<?php

namespace App\Services;

use App\Models\Property;

class ProperyService extends BaseService
{
    public function __construct(private Property $model) {}
}
