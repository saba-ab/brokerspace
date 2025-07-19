<?php

namespace App\Services;

use App\Models\User;
use Spatie\Permission\Models\Role;

class RoleService
{
    public function createRole(string $name)
    {
        Role::createOrFirst(['name' => $name, 'guard_name' => 'api']);
    }

    public function assignRole(User $user, string $roleName)
    {
        $user->assignRole($this->findByName($roleName));
    }

    public function removeRole(User $user, string $roleName)
    {
        $user->removeRole($roleName);
    }

    public function getRoles()
    {
        return Role::all();
    }
    public function findByName(string $name)
    {
        return Role::findByName($name, 'api');
    }
}
