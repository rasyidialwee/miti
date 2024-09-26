<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'super_admin',
            'user',
        ];

        $permissions = [
            'create_todo',
            'view_todo',
            'update_todo',
            'delete_todo',
        ];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        //assign permissions to roles
        $superAdmin = Role::findByName('super_admin');
        // $superAdmin->givePermissionTo($permissions);

        $user = Role::findByName('user');
        $user->givePermissionTo($permissions);
    }
}
