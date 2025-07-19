<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->withoutMiddleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login'])->withoutMiddleware('auth:sanctum');
Route::post('/me', [AuthController::class, 'me']);
Route::post('/logout', [AuthController::class, 'logout']);
