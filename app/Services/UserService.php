<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryContract;
use App\Data\RegisterData;
class UserService
{
    public function __construct(private UserRepositoryContract $userRepository)
    {
    }

    public function createUser(RegisterData $data)
    {
        return $this->userRepository->create($data->toArray());
    }

    public function findById(int $id)
    {
        return $this->userRepository->findById($id);
    }

    public function findByEmail(string $email)
    {
        return $this->userRepository->findByEmail($email);
    }
}
