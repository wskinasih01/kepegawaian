<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratIzinProfesiModel extends Model
{
    protected $table = 'surat_izin_profesi';
    protected $fillable = [
        'pegawai_id',
        'jenis_dokumen',
        'no_sertifikat',
        'tgl_mulai',
        'tgl_selesai',
        'dokumen',
    ];

    public function pegawai()
    {
        return $this->belongsTo(PegawaiModel::class, 'pegawai_id');
    }
}
