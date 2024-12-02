<?php

namespace App\Http\Controllers;

use App\Models\DokumenLainModel;
use Illuminate\Http\Request;

class DokumenLainController extends Controller
{
    public function store(Request $request)
    {
        $pegawai = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'jenis_dokumen' => 'required',
            'dokumen' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $jenisDokumen = str_replace(' ', '_', strtolower($request->jenis_dokumen));
        $timestamp = now()->format('Ymd_His');

        if ($request->hasFile('dokumen')) {
            $filePaths['dokumen'] = $request->file('dokumen')
                ->storeAs('dokumen_lain_files', $namaPegawai . '_' . $jenisDokumen . '_' . $timestamp . '.' . $request->file('dokumen')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->all();
        $requestData['dokumen'] = $filePaths['dokumen'] ?? null;

        $pegawai = DokumenLainModel::create($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai->pegawai_id]);
    }
    public function update(Request $request, $id)
    {
        $docs = DokumenLainModel::with('pegawai')->findOrFail($id);
        $pegawai = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'jenis_dokumen' => 'required',
            'dokumen' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',

        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));

        if ($request->hasFile('dokumen')) {
            $filePaths['dokumen'] = $request->file('dokumen')
                ->storeAs('dokumen_lain_files', $namaPegawai . '_Dokumen Lain' . '.' . $request->file('dokumen')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->except('dokumen');
        $requestData['dokumen'] = $filePaths['dokumen'] ?? $docs->dokumen;

        $docs->update($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai]);
    }
    public function destroy(Request $request, $id)
    {
        $pegawai = $request->pegawai_id;
        $docs = DokumenLainModel::findOrFail($id);
        $docs->delete();

        return redirect()->route('pegawai.show', ['id' => $pegawai]);
    }
}
