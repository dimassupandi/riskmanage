<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Super Admin']);
        $admin = Role::create(['name' => 'Admin']);
        $Operator = Role::create(['name' => 'Operator']);
        $admin->givePermissionTo([
            'create-user',
            'edit-user',
            'delete-user',
            'create-risk',
            'edit-risk',
            'delete-risk',
            'create-mitigation',
            'edit-mitigation',
            'delete-mitigation',
            'create-assets',
            'edit-asset',
            'delete-asset'
        ]);
        $Operator->givePermissionTo([
            'create-risk',
            'edit-risk',
            'delete-risk',
            'create-mitigation',
            'edit-mitigation',
            'delete-mitigation',
            'create-asset',
            'edit-asset',
            'delete-asset'
        ]);
    }
}
