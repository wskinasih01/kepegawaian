<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PegawaiModel;
use App\Models\PendidikanModel;
use App\Models\JabatanModel;
use App\Models\DokumenLainModel;
use App\Models\PelatihanModel;
use App\Models\RiwayatPekerjaanModel;
use App\Models\RiwayatPendidikanModel;
use App\Models\SuratIzinProfesiModel;

class PegawaiController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:pegawai-list', ['only' => ['index']]);
        $this->middleware('permission:pegawai-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:pegawai-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:pegawai-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $pegawais = PegawaiModel::with('pendidikan', 'jabatan')->get();

        return view('admin.master.pegawai.index', compact('pegawais'));
    }

    public function create()
    {
        $pendidikans = PendidikanModel::orderBy('id', 'DESC')->get();
        $jabatans = JabatanModel::orderBy('nama_jabatan', 'ASC')->get();

        return view('admin.master.pegawai.create', compact('pendidikans', 'jabatans'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'nik' => 'required',
            'nama_pegawai' => 'required',
            'tempat_lahir_pegawai' => 'required',
            'tanggal_lahir_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'nullable',
            'email' => 'required',
            'jabatan_id' => 'required',
            // 'provinsi' => 'nullable',
            // 'kota_kab' => 'nullable',
            // 'kecamatan' => 'nullable',
            // 'kelurahan' => 'nullable',
            'alamat' => 'nullable',
            'pas_foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'ktp' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        if ($request->hasFile('pas_foto')) {
            $filePaths['pas_foto'] = $request->file('pas_foto')
                ->storeAs('photos', $namaPegawai . '_Pas_Foto' . '.' . $request->file('pas_foto')->getClientOriginalExtension(), 'public');
        }

        if ($request->hasFile('cv')) {
            $filePaths['cv'] = $request->file('cv')
                ->storeAs('cv_files', $namaPegawai . '_CV' . '.' . $request->file('cv')->getClientOriginalExtension(), 'public');
        }

        if ($request->hasFile('ktp')) {
            $filePaths['ktp'] = $request->file('ktp')
                ->storeAs('ktp_files', $namaPegawai . '_KTP' . '.' . $request->file('ktp')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->all();
        $requestData['pas_foto'] = $filePaths['pas_foto'] ?? null;
        $requestData['cv'] = $filePaths['cv'] ?? null;
        $requestData['ktp'] = $filePaths['ktp'] ?? null;

        $pegawai = PegawaiModel::create($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai->id])->with('success', 'Data Pegawai created successfully.');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'nik' => 'required',
            'nama_pegawai' => 'required',
            'tempat_lahir_pegawai' => 'required',
            'tanggal_lahir_pegawai' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'nullable',
            'email' => 'nullable',
            'jabatan_id' => 'required',
            // 'provinsi' => 'nullable',
            // 'kota_kab' => 'nullable',
            // 'kecamatan' => 'nullable',
            // 'kelurahan' => 'nullable',
            'alamat' => 'nullable',
            'pas_foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:10240',
            'ktp' => 'nullable|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $pegawai = PegawaiModel::findOrFail($id);

        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));

        if ($request->hasFile('pas_foto')) {
            $filePaths['pas_foto'] = $request->file('pas_foto')
                ->storeAs('photos', $namaPegawai . '_Pas_Foto' . '.' . $request->file('pas_foto')->getClientOriginalExtension(), 'public');
        }

        if ($request->hasFile('cv')) {
            $filePaths['cv'] = $request->file('cv')
                ->storeAs('cv_files', $namaPegawai . '_CV' . '.' . $request->file('cv')->getClientOriginalExtension(), 'public');
        }

        if ($request->hasFile('ktp')) {
            $filePaths['ktp'] = $request->file('ktp')
                ->storeAs('ktp_files', $namaPegawai . '_KTP' . '.' . $request->file('ktp')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->except(['pas_foto', 'cv', 'ktp']);
        $requestData['pas_foto'] = $filePaths['pas_foto'] ?? $pegawai->pas_foto;
        $requestData['cv'] = $filePaths['cv'] ?? $pegawai->cv;
        $requestData['ktp'] = $filePaths['ktp'] ?? $pegawai->ktp;

        $pegawai->update($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai->id])->with('success', 'Data Pegawai updated successfully.');
    }

    public function destroy($id)
    {
        $pegawais = PegawaiModel::findOrFail($id);
        $pegawais->delete();

        return redirect()->route('admin.master.pegawai.index')->with('success', 'Data Pegawai deleted successfully');
    }

    public function show($id)
    {
        $pegawais = PegawaiModel::with('pendidikan', 'jabatan', 'riwayatPendidikan', 'pelatihan')->findOrFail($id);
        $pendidikans = PendidikanModel::all();
        $jabatan = JabatanModel::all();
        $riwayatPendidikan = RiwayatPendidikanModel::where('pegawai_id', $id)->get();
        $riwayatKerja = RiwayatPekerjaanModel::where('pegawai_id', $id)->get();
        $pelatihan = PelatihanModel::where('pegawai_id', $id)->get();
        $suratIzinProfesi = SuratIzinProfesiModel::where('pegawai_id', $id)->get();
        $dokumenLain = DokumenLainModel::where('pegawai_id', $id)->get();
        // dd($pegawais);
        return view('admin.master.pegawai.show', compact('pendidikans', 'pegawais', 'jabatan', 'riwayatPendidikan', 'riwayatKerja', 'pelatihan', 'suratIzinProfesi', 'dokumenLain'));
    }

}
