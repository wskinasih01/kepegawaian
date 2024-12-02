<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('permissions')->insert([
            [
                'name' => 'permissions-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permissions-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permissions-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'permissions-delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'roles-delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'users-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'users-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'users-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'users-delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pendidikan-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pendidikan-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pendidikan-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pendidikan-delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'jabatan-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'jabatan-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'jabatan-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'jabatan-delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pegawai-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pegawai-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pegawai-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'pegawai-delete',
                'guard_name' => 'web'
            ],
            [
                'name' => 'usia-pensiun-list',
                'guard_name' => 'web'
            ],
            [
                'name' => 'usia-pensiun-create',
                'guard_name' => 'web'
            ],
            [
                'name' => 'usia-pensiun-edit',
                'guard_name' => 'web'
            ],
            [
                'name' => 'usia-pensiun-delete',
                'guard_name' => 'web'
            ],
        ]);
    }
}
