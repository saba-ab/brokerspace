<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryContract;
class UserRepository implements UserRepositoryContract
{
    public function create(array $data): User
    {
        return User::create($data);
    }

    public function findById(int $id): User
    {
        return User::find($id);
    }

    public function findByEmail(string $email): User
    {
        return User::where('email', $email)->first();
    }
}
