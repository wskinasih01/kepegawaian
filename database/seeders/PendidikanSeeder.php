<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PendidikanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pendidikan')->insert([
            [
                'pendidikan' => 'SMA',
            ],
            [
                'pendidikan' => 'D1',
            ],
            [
                'pendidikan' => 'D2',
            ],
            [
                'pendidikan' => 'D3',
            ],
            [
                'pendidikan' => 'D4',
            ],
            [
                'pendidikan' => 'S1',
            ],
            [
                'pendidikan' => 'S1 Profesi',
            ],
            [
                'pendidikan' => 'S2',
            ],
            [
                'pendidikan' => 'S3',
            ],
        ]);
    }
}
