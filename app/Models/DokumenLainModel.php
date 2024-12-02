<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DokumenLainModel extends Model
{
    protected $table = 'dokumen_lain';
    protected $fillable = [
        'pegawai_id',
        'jenis_dokumen',
        'dokumen',
    ];

    public function pegawai()
    {
        return $this->belongsTo(PegawaiModel::class, 'pegawai_id');
    }
}
