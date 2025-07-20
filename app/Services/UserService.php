<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryContract;
use App\Data\RegisterData;
use App\Models\User;

class UserService
{
    public function __construct(private UserRepositoryContract $userRepository)
    {
    }

    public function createUser(RegisterData $data): User
    {
        return $this->userRepository->create($data->toArray());
    }

    public function findById(int $id): User|null
    {
        return $this->userRepository->findById($id);
    }

    public function findByEmail(string $email): User|null
    {
        return $this->userRepository->findByEmail($email);
    }
}
