<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@test.com',
            'password' => Hash::make('123456'),
        ]);

        $superAdminRole = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);

        $permissions = [
            'permissions-list',
            'permissions-create',
            'permissions-edit',
            'permissions-delete',
            'roles-list',
            'roles-create',
            'roles-edit',
            'roles-delete',
            'users-list',
            'users-create',
            'users-edit',
            'users-delete',
            'pendidikan-list',
            'pendidikan-create',
            'pendidikan-edit',
            'pendidikan-delete',
            'jabatan-list',
            'jabatan-create',
            'jabatan-edit',
            'jabatan-delete',
            'pegawai-list',
            'pegawai-create',
            'pegawai-edit',
            'pegawai-delete',
            'usia-pensiun-list',
            'usia-pensiun-create',
            'usia-pensiun-edit',
            'usia-pensiun-delete',
        ];

        foreach ($permissions as $permission) {
            $perm = Permission::create(['name' => $permission, 'guard_name' => 'web']);
            $superAdminRole->givePermissionTo($perm);
        }

        $superAdmin->assignRole($superAdminRole);
    }
}
