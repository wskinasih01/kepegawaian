<?php

namespace App\Http\Controllers;

use App\Models\PendidikanModel;
use Illuminate\Http\Request;
use App\Models\RiwayatPendidikanModel;

class RiwayatPendidikanController extends Controller
{
    public function store(Request $request)
    {
        $pegawai = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'jenjang_pendidikan_id' => 'required',
            'institusi' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required',
            'ipk' => 'nullable',
            'ijazah' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',

        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $jenjang = PendidikanModel::find($request->jenjang_pendidikan_id)->pendidikan ?? 'pendidikan';
        $jenjangPendidikan = str_replace(' ', '_', strtolower($jenjang));

        if ($request->hasFile('ijazah')) {
            $filePaths['ijazah'] = $request->file('ijazah')
                ->storeAs('ijazah_files', $namaPegawai . '_ijazah_' . $jenjangPendidikan . '.' . $request->file('ijazah')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->all();
        $requestData['ijazah'] = $filePaths['ijazah'] ?? null;

        $pegawai = RiwayatPendidikanModel::create($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai->pegawai_id]);
    }

    public function update(Request $request, $id)
    {
        $pendidikan = RiwayatPendidikanModel::with('pegawai', 'pendidikan')->findOrFail($id);

        $pegawaiId = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'jenjang_pendidikan_id' => 'required',
            'institusi' => 'required',
            'jurusan' => 'required',
            'tahun_lulus' => 'required',
            'ipk' => 'nullable',
            'ijazah' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);

        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $jenjang = PendidikanModel::find($request->jenjang_pendidikan_id)->pendidikan ?? 'pendidikan';
        $jenjangPendidikan = str_replace(' ', '_', strtolower($jenjang));

        if ($request->hasFile('ijazah')) {
            // $timestamp = now()->format('YmdHis');
            $filePaths['ijazah'] = $request->file('ijazah')
                ->storeAs('ijazah_files', $namaPegawai . '_ijazah_' . $jenjangPendidikan . '.' . $request->file('ijazah')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->except('ijazah');
        $requestData['ijazah'] = $filePaths['ijazah'] ?? $pendidikan->ijazah;
        $pendidikan->update($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawaiId]);
    }

    public function destroy(Request $request, $id)
    {
        $pegawaiId = $request->pegawai_id;
        $riwayat_pendidikan = RiwayatPendidikanModel::findOrFail($id);
        $riwayat_pendidikan->delete();

        return redirect()->route('pegawai.show', ['id' => $pegawaiId]);
    }
}
