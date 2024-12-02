<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPendidikanModel extends Model
{
    protected $table = 'riwayat_pendidikan';
    protected $fillable = [
        'pegawai_id',
        'jenjang_pendidikan_id',
        'institusi',
        'jurusan',
        'tahun_lulus',
        'ipk',
        'ijazah',
    ];

    public function pendidikan()
    {
        return $this->belongsTo(PendidikanModel::class, 'jenjang_pendidikan_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(PegawaiModel::class, 'pegawai_id');
    }

}
