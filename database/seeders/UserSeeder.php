<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\RoleService;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function __construct(private RoleService $roleService)
    {
    }
    public function run(): void
    {
        $this->createUser();
    }
    public function createUser(): void
    {
        User::factory()->count(10)->create()->each(function (User $user) {
            $this->roleService->assignRole($user, 'broker');
        });
    }
}
