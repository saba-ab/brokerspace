<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\JsonResponse;
use App\Data\RegisterData;
use App\Data\LoginData;
use App\Http\Controllers\Controller;
use App\Services\AuthService;
use App\Data\UserData;
class AuthController extends Controller
{
    public function __construct(private AuthService $authService)
    {
    }

    public function register(RegisterData $data): JsonResponse
    {
        $user = $this->authService->register($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => UserData::from($user),
        ]);
    }

    public function login(LoginData $data): JsonResponse
    {
        $user = $this->authService->login($data);

        if (! $user || ! Hash::check($data->password, $user->password)) {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'token' => $token,
            'user' => UserData::from($user),
        ]);
    }

    public function me(): UserData
    {
        $user = $this->authService->me();

        if (! $user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return UserData::from($user);
    }

    public function logout(): JsonResponse
    {
        $this->authService->logout();

        return response()->json(['message' => 'Logged out']);
    }
}
