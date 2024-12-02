<?php

namespace App\Http\Controllers;

use App\Models\PegawaiModel;
use Illuminate\Http\Request;
use App\Models\PelatihanModel;

class PelatihanController extends Controller
{

    public function store(Request $request)
    {
        $pegawai = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'nama_pelatihan' => 'required',
            'topik_pelatihan' => 'required',
            'lokasi' => 'required',
            'tgl_pelatihan' => 'required',
            'sertifikat' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',

        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $namaPelatihan = str_replace(' ', '_', strtolower($request->nama_pelatihan));
        $tgl = $request->tgl_pelatihan;

        if ($request->hasFile('sertifikat')) {
            $filePaths['sertifikat'] = $request->file('sertifikat')
                ->storeAs('pelatihan_files', $namaPegawai . '_pelatihan_' . $namaPelatihan . '_' . $tgl . '.' . $request->file('sertifikat')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->all();
        $requestData['sertifikat'] = $filePaths['sertifikat'] ?? null;

        $pegawai = PelatihanModel::create($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai->pegawai_id]);
    }

    public function update(Request $request, $id)
    {
        $pelatihan = PelatihanModel::with('pegawai')->findOrFail($id);
        $pegawai = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'nama_pelatihan' => 'required',
            'topik_pelatihan' => 'required',
            'lokasi' => 'required',
            'tgl_pelatihan' => 'required',
            'sertifikat' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',

        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $namaPelatihan = str_replace(' ', '_', strtolower($request->nama_pelatihan));
        $tgl = $request->tgl_pelatihan;

        if ($request->hasFile('sertifikat')) {
            $filePaths['sertifikat'] = $request->file('sertifikat')
                ->storeAs('pelatihan_files', $namaPegawai . '_pelatihan_' . $namaPelatihan . '_' . $tgl . '.' . $request->file('sertifikat')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->except('sertifikat');
        $requestData['sertifikat'] = $filePaths['sertifikat'] ?? $pelatihan->sertifikat;

        $pelatihan->update($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai]);
    }

    public function destroy(Request $request, $id)
    {
        $pegawai = $request->pegawai_id;
        $pelatihans = PelatihanModel::findOrFail($id);
        $pelatihans->delete();

        return redirect()->route('pegawai.show', ['id' => $pegawai]);
    }
}
