<?php

namespace Database\Seeders;


use App\Models\Employee;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\PermissionGroup;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $permissions = [
            'App Developer' => [
                ['permission_create', 'Create new Permission'],
                ['permission_edit', 'Edit Permission'],
                ['permission_show', 'Show Permission'],
                ['permission_delete', 'Delete Permission'],
                ['permission_access', 'Access Permissions'],
                ['role_create', 'Create new Role'],
                ['role_edit', 'Edit Role'],
                ['role_show', 'Show Role'],
                ['role_delete', 'Delete Role'],
                ['role_access', 'Access Roles'],
            ],
            'Human Resources' => [
                ['customer_create', 'Create new Customer'],
                ['customer_edit', 'Edit Customer'],
                ['customer_show', 'Show Customer'],
                ['customer_delete', 'Delete Customer'],
                ['customer_access', 'Access Customer'],
                ['employee_create', 'Create new Employee'],
                ['employee_edit', 'Edit Employee'],
                ['employee_show', 'Show Employee'],
                ['employee_delete', 'Delete Employee'],
                ['employee_access', 'Access Employees'],
            ]
        ];

        $index = 1;
        foreach ($permissions as $group => $permission) {
            PermissionGroup::create(['name' => $group,]);
            foreach ($permission as $value) {
                Permission::create([
                    'name' => $value[0],
                    'title' => $value[1],
                    'permission_group_id' => $index,
                    'guard_name' => 'admin'
                ]);
            }
            $index++;
        }


        // gets all permissions via Gate::before rule; see AuthServiceProvider
        Role::create([
            'name' => 'app_developer',
            'title' => 'App Developer',
            'guard_name' => 'admin'
        ]);

        Role::create([
            'name' => 'super_admin',
            'title' => 'Super Admin',
            'guard_name' => 'admin'
        ]);

        Employee::find(1)->assignRole('app_developer');

    }
}
