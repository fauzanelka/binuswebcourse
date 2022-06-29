<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RBACSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $permissionsByRole = [
            'admin' => [
                'product.create',
                'product.read',
                'product.list',
                'product.update',
                'product.delete',
                'user.create',
                'user.read',
                'user.list',
                'user.update',
                'user.delete',
            ],
            'viewer' => [
                'product.read',
                'product.list',
                'user.read',
                'user.list',
            ]
        ];

        $insertPermissions = fn ($role) => collect($permissionsByRole[$role])
            ->map(function ($name) {
                if (!Permission::whereName($name)->exists()) {
                    return Permission::create(['name' => $name, 'guard_name' => 'web'])->getKey();
                }

                return Permission::whereName($name)->first()->getKey();
            })
            ->toArray();

        $permissionIdsByRole = [
            'admin' => $insertPermissions('admin'),
            'viewer' => $insertPermissions('viewer')
        ];

        foreach ($permissionIdsByRole as $roleName => $permissionIds) {
            $role = null;
            if (!Role::whereName($roleName)->exists()) {
                $role = Role::create(['name' => $roleName]);
            } else {
                $role = Role::whereName($roleName)->first();
            }

            collect($permissionIds)->each(function ($id) use ($role) {
                if (!DB::table('role_has_permissions')
                        ->whereRoleId($role->id)
                        ->wherePermissionId($id)
                        ->exists()
                    ) {
                    DB::table('role_has_permissions')->insert([
                        'role_id' => $role->id,
                        'permission_id' => $id
                    ]);
                }
            });
        }
    }
}
