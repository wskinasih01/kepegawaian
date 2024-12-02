<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PegawaiModel;
use App\Models\UsiaPensiunModel;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {

        $usiaPensiunModel = UsiaPensiunModel::first();
        if ($usiaPensiunModel) {
            $usiaPensiun = $usiaPensiunModel->usia;
        } else {
            $usiaPensiun = null;
        }

        $usiaMendekatiPensiun = $usiaPensiun ? $usiaPensiun - 2 : null;
        $waktuSaatIni = Carbon::now();
        $pegawai = PegawaiModel::all()->filter(function ($pegawai) use ($waktuSaatIni, $usiaMendekatiPensiun, $usiaPensiun) {
            $tanggalLahir = Carbon::parse($pegawai->tanggal_lahir_pegawai);
            $usia = $tanggalLahir->diffInYears($waktuSaatIni);
            return $usiaMendekatiPensiun !== null && $usia >= $usiaMendekatiPensiun && $usia < $usiaPensiun;
        });

        $laki2 = PegawaiModel::where('jenis_kelamin', 'Laki-laki')->count();
        $perempuan = PegawaiModel::where('jenis_kelamin', 'Perempuan')->count();

        $educationCounts = PegawaiModel::with('pendidikan')
            ->get()
            ->groupBy(function ($pegawai) {
                return $pegawai->pendidikan ? $pegawai->pendidikan->pendidikan : 'Tidak diketahui';
            })
            ->map->count()
            ->toArray();

        return view('dashboard', [
            'pegawai' => $pegawai,
            'waktuSaatIni' => $waktuSaatIni,
            'usiaPensiun' => $usiaPensiun,
            'laki2' => $laki2,
            'perempuan' => $perempuan,
            'educationCounts' => $educationCounts
        ]);
    }
}
