<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create permissions
        $permissions = [
            'create',
            'edit',
            'delete',
            'view',
            'super_admin'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Roles and their permissions
        $roles = [
            'admin' => ['create', 'edit', 'delete', 'view', 'super_admin'],
            'editor' => ['create', 'edit'],
        ];

        // Create roles and assign permissions
        foreach ($roles as $role => $perms) {
            $roleObj = Role::create(['name' => $role]);
            $roleObj->givePermissionTo($perms);
        }

        // Assign role to user
        // $user = User::find(2);
        // if ($user) {
        //     $user->assignRole('admin');
        // }
    }
}
