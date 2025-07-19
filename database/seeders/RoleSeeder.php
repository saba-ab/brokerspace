<?php

namespace Database\Seeders;

use App\Services\RoleService;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function __construct(private RoleService $roleService)
    {
    }

    public function run(): void
    {
        $this->createRole('admin');
        $this->createRole('broker');
    }
    public function createRole(string $name): void
    {
        $this->roleService->createRole($name);
    }
}
