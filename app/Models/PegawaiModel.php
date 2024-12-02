<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $fillable = [
        'nik',
        'nama_pegawai',
        'tempat_lahir_pegawai',
        'tanggal_lahir_pegawai',
        'jenis_kelamin',
        'no_telp',
        'email',
        'jabatan_id',
        // 'provinsi',
        // 'kota_kab',
        // 'kecamatan',
        // 'kelurahan',
        'alamat',
        'pas_foto',
        'cv',
        'ktp',
    ];


    public function pendidikan()
    {
        return $this->belongsTo(PendidikanModel::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(JabatanModel::class, 'jabatan_id');
    }

    public function riwayatPendidikan()
    {
        return $this->hasMany(RiwayatPendidikanModel::class, 'pegawai_id', 'id');
    }
    public function riwayatPekerjaan()
    {
        return $this->hasMany(RiwayatPekerjaanModel::class, 'pegawai_id', 'id');
    }
    public function pelatihan()
    {
        return $this->hasMany(PelatihanModel::class, 'pegawai_id', 'id');
    }
    public function suratIzinProfesi()
    {
        return $this->hasMany(SuratIzinProfesiModel::class, 'pegawai_id', 'id');
    }
    public function dokumenLain()
    {
        return $this->hasMany(DokumenLainModel::class, 'pegawai_id', 'id');
    }
}
