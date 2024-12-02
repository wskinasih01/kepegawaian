<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jabatan')->insert([
            ['nama_jabatan' => 'Administrasi'],
            ['nama_jabatan' => 'Kebersihan'],
            ['nama_jabatan' => 'SDM'],
            ['nama_jabatan' => 'Perawat'],
            ['nama_jabatan' => 'Bidan'],
            ['nama_jabatan' => 'Kebersihan & Laundry'],
            ['nama_jabatan' => 'Tenaga Teknik Kefarmasian'],
            ['nama_jabatan' => 'Gizi'],
            ['nama_jabatan' => 'Apoteker'],
            ['nama_jabatan' => 'Dokter Spesialis Kandungan dan Penyakit'],
            ['nama_jabatan' => 'Dokter Spesialis Anak'],
            ['nama_jabatan' => 'Direktur'],
            ['nama_jabatan' => 'Keamanan'],
            ['nama_jabatan' => 'Dokter Spesialis Anestesi'],
            ['nama_jabatan' => 'Dokter Umum'],
            ['nama_jabatan' => 'Pelaksana Gizi'],
            ['nama_jabatan' => 'Rekam Medis'],
            ['nama_jabatan' => 'Sopir'],
            ['nama_jabatan' => 'IT'],
            ['nama_jabatan' => 'Satpam'],
            ['nama_jabatan' => 'Radiografer'],
            ['nama_jabatan' => 'Dokter Spesialis Kandungan'],
            ['nama_jabatan' => 'Security'],
            ['nama_jabatan' => 'Dokter Spesialis Dalam'],
            ['nama_jabatan' => 'Fisioterapi'],
            ['nama_jabatan' => 'CS'],
            ['nama_jabatan' => 'ATLM'],
            ['nama_jabatan' => 'KESLING'],
            ['nama_jabatan' => 'Dokter Spesialis Neurologi'],
            ['nama_jabatan' => 'Wakil Direktur'],
            ['nama_jabatan' => 'CASEMIX'],
            ['nama_jabatan' => 'Kabid Keperawatan'],
            ['nama_jabatan' => 'Marketing'],
            ['nama_jabatan' => 'Dokter Spesialis Mata'],
            ['nama_jabatan' => 'Dokter Spesialis Radiologi'],
            ['nama_jabatan' => 'Dokter Spesialis Bedah'],
            ['nama_jabatan' => 'Keuangan'],
            ['nama_jabatan' => 'Admin'],
            ['nama_jabatan' => 'PPR'],
            ['nama_jabatan' => 'Kabid Umum',],
            ['nama_jabatan' => 'Sopir/Umum',],
            ['nama_jabatan' => 'Dokter Spesialis Orthopedi',],
        ]);
    }
}
