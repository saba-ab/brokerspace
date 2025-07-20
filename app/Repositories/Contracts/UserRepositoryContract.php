<?php

namespace App\Repositories\Contracts;

use App\Models\User;

interface UserRepositoryContract
{
    public function create(array $data): User;
    public function findById(int $id): User|null;
    public function findByEmail(string $email): User|null;
}
