<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // reset cached roles and permissions
        // app()[\Spatie\Permission\PermissionRegistrar::class]
        //         ->forgetCachedPermissions();

        

        // Permission::create(['name' => 'company-list']);
        // Permission::create(['name' => 'company-store']);
        // Permission::create(['name' => 'company-show']);
        // Permission::create(['name' => 'company-update']);
        // Permission::create(['name' => 'company-delete']);

        // Permission::create(['name' => 'staff-list']);
        // Permission::create(['name' => 'staff-store']);
        // Permission::create(['name' => 'staff-show']);
        // Permission::create(['name' => 'staff-update']);
        // Permission::create(['name' => 'staff-delete']);

        // Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        // Role::create(['name' => 'company'])->givePermissionTo(Permission::all());


    }
}
