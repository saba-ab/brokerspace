<?php

namespace App\Services;

use App\Data\LoginData;
use App\Data\RegisterData;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(private UserService $userService, private RoleService $roleService)
    {
    }

    public function register(RegisterData $data)
    {
        $user = $this->userService->createUser($data);
        $this->roleService->assignRole($user, 'broker');
        return $user;
    }

    public function login(LoginData $data)
    {
        $user = $this->userService->findByEmail($data->email);

        if (! $user || ! Hash::check($data->password, $user->password)) {
            return null;
        }

        return $user;
    }

    public function me(): User|null
    {
        return auth()->user();
    }

    public function logout()
    {
        auth()->user()?->currentAccessToken()?->delete();
    }
}
