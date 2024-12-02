<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PelatihanModel extends Model
{
    protected $table = 'pelatihan';
    protected $fillable = [
        'pegawai_id',
        'nama_pelatihan',
        'topik_pelatihan',
        'lokasi',
        'tgl_pelatihan',
        'sertifikat',
    ];

    public function pegawai()
    {
        return $this->belongsTo(PegawaiModel::class, 'pegawai_id');
    }
}
