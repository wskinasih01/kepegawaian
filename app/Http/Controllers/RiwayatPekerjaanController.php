<?php

namespace App\Http\Controllers;

use App\Models\RiwayatPekerjaanModel;
use Illuminate\Http\Request;

class RiwayatPekerjaanController extends Controller
{
    public function store(Request $request)
    {
        $pegawai = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'jabatan' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'jenis_pengalaman' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'surat_pengalaman_kerja' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $namaPerusahaan = str_replace(' ', '_', strtolower($request->nama_perusahaan));

        if ($request->hasFile('surat_pengalaman_kerja')) {
            $filePaths['surat_pengalaman_kerja'] = $request->file('surat_pengalaman_kerja')
                ->storeAs('surat_pengalaman_kerja_files', $namaPegawai . '_surat_pengalaman_kerja_' . $namaPerusahaan . '.' . $request->file('surat_pengalaman_kerja')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->all();
        $requestData['surat_pengalaman_kerja'] = $filePaths['surat_pengalaman_kerja'] ?? null;

        $pegawai = RiwayatPekerjaanModel::create($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai->pegawai_id]);
    }
    public function update(Request $request, $id)
    {
        $riwayatKerja = RiwayatPekerjaanModel::with('pegawai')->findOrFail($id);
        $pegawaiId = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'jabatan' => 'required',
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'jenis_pengalaman' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'surat_pengalaman_kerja' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $namaPerusahaan = str_replace(' ', '_', strtolower($request->nama_perusahaan));

        if ($request->hasFile('surat_pengalaman_kerja')) {
            $filePaths['surat_pengalaman_kerja'] = $request->file('surat_pengalaman_kerja')
                ->storeAs('surat_pengalaman_kerja_files', $namaPegawai . '_surat_pengalaman_kerja_' . $namaPerusahaan . '.' . $request->file('surat_pengalaman_kerja')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->except('surat_pengalaman_kerja');
        $requestData['surat_pengalaman_kerja'] = $filePaths['surat_pengalaman_kerja'] ?? $riwayatKerja->surat_pengalaman_kerja;

        $riwayatKerja->update($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawaiId]);
    }

    public function destroy(Request $request, $id)
    {
        $pegawaiId = $request->pegawai_id;
        $riwayatKerja = RiwayatPekerjaanModel::findOrFail($id);
        $riwayatKerja->delete();

        return redirect()->route('pegawai.show', ['id' => $pegawaiId]);
    }


}
