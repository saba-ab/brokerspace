<?php

use App\Http\Controllers\Api\DealController;
use Illuminate\Support\Facades\Route;

Route::post('/', [DealController::class, 'createDeal']);
