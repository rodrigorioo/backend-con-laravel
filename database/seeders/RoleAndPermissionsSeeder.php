<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roleSuperAdmin = Role::firstOrCreate([
            'name' => 'super-admin',
        ]);
        $roleAdmin = Role::firstOrCreate([
            'name' => 'admin',
        ]);

        Permission::firstOrCreate([
            'name' => 'crear producto',
        ]);
        Permission::firstOrCreate([
            'name' => 'ver productos',
        ]);
        Permission::firstOrCreate([
            'name' => 'editar producto',
        ]);

        $roleSuperAdmin->givePermissionTo('crear producto');
        $roleSuperAdmin->givePermissionTo('ver productos');
        $roleSuperAdmin->givePermissionTo('editar producto');
    }
}
