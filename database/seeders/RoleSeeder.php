<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rol1=Role::create(['name' => 'Admin']);
        $rol2=Role::create(['name' => 'Ventas']);

        Permission::create(['name' => 'View-dashboard'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'Add-Product'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'Edit-Product'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'Delete-Product'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'Show-Product'])->syncRoles([$rol1, $rol2]);
        Permission::create(['name' => 'Admin-Dashboard'])->assignRole($rol1);
        Permission::create(['name' => 'Add-User'])->assignRole($rol1);
        Permission::create(['name' => 'Edit-User'])->assignRole($rol1);
        Permission::create(['name' => 'Del-User'])->assignRole($rol1);
    }
}
