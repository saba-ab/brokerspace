<?php

namespace App\Console\Commands;

use App\Services\UserService;
use App\Services\RoleService;
use Illuminate\Console\Command;

class AssignRole extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:assign-role {user_id} {role_name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Assign a role to a user';

    public function __construct(private UserService $userService, private RoleService $roleService)
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Assigning role to user...');
        $userId = $this->argument('user_id');
        $roleName = $this->argument('role_name');

        $this->info('User ID: ' . $userId);
        $this->info('Role Name: ' . $roleName);

        $user = $this->userService->findById($userId);

        if (!$user) {
            $this->error('User not found');
            return;
        }
        $role = $this->roleService->findByName($roleName);

        if (!$role) {
            $this->error('Role not found');
            return;
        }
        $this->roleService->assignRole($user, $roleName);
        $this->info('Role assigned successfully');
    }
}
