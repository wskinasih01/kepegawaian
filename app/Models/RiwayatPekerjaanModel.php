<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPekerjaanModel extends Model
{
    protected $table = 'riwayat_pekerjaan';
    protected $fillable = [
        'pegawai_id',
        'jabatan',
        'nama_perusahaan',
        'alamat_perusahaan',
        'jenis_pengalaman',
        'tgl_mulai',
        'tgl_selesai',
        'deskripsi',
        'surat_pengalaman_kerja'
    ];

    public function pegawai()
    {
        return $this->belongsTo(PegawaiModel::class, 'pegawai_id');
    }
}
