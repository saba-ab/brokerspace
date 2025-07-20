<?php

use App\Http\Controllers\Api\DealController;
use Illuminate\Support\Facades\Route;

Route::post('/', [DealController::class, 'createDeal']);
Route::get('/', [DealController::class, 'getDeals']);
Route::get('/{id}', [DealController::class, 'getDealById']);
Route::put('/{id}', [DealController::class, 'updateDeal']);
Route::delete('/{id}', [DealController::class, 'deleteDeal']);
Route::put('/{id}/status', [DealController::class, 'updateDealStatus']);
Route::put('/{id}/type', [DealController::class, 'updateDealType']);
Route::patch('/{id}', [DealController::class, 'patchDeal']);
