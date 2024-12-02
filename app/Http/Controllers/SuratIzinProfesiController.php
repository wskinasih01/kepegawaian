<?php

namespace App\Http\Controllers;

use App\Models\SuratIzinProfesiModel;
use Illuminate\Http\Request;

class SuratIzinProfesiController extends Controller
{
    public function store(Request $request)
    {
        $pegawai = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'jenis_dokumen' => 'required',
            'no_sertifikat' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'dokumen' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $jenisDokumen = str_replace(' ', '_', strtolower($request->jenis_dokumen));
        $thnMulai = date('Y', strtotime($request->tgl_mulai));
        $thnBerakhir = date('Y', strtotime($request->tgl_selesai));

        if ($request->hasFile('dokumen')) {
            $filePaths['dokumen'] = $request->file('dokumen')
                ->storeAs('sip_files', $namaPegawai . '_' . $jenisDokumen . '_' . $thnMulai . '_' . $thnBerakhir . '.' . $request->file('dokumen')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->all();
        $requestData['dokumen'] = $filePaths['dokumen'] ?? null;

        $pegawai = SuratIzinProfesiModel::create($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai->pegawai_id]);
    }
    public function update(Request $request, $id)
    {
        $sip = SuratIzinProfesiModel::with('pegawai')->findOrFail($id);
        $pegawai = $request->pegawai_id;
        $request->validate([
            'pegawai_id' => 'required',
            'jenis_dokumen' => 'required',
            'no_sertifikat' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'dokumen' => 'nullable|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',

        ]);
        $filePaths = [];
        $namaPegawai = str_replace(' ', '_', strtolower($request->nama_pegawai));
        $jenisDokumen = str_replace(' ', '_', strtolower($request->jenis_dokumen));
        $thnMulai = date('Y', strtotime($request->tgl_mulai));
        $thnBerakhir = date('Y', strtotime($request->tgl_selesai));

        if ($request->hasFile('dokumen')) {
            $filePaths['dokumen'] = $request->file('dokumen')
                ->storeAs('sip_files', $namaPegawai . '_' . $jenisDokumen . '_' . $thnMulai . '_' . $thnBerakhir . '.' . $request->file('dokumen')->getClientOriginalExtension(), 'public');
        }

        $requestData = $request->except('dokumen');
        $requestData['dokumen'] = $filePaths['dokumen'] ?? $sip->dokumen;

        $sip->update($requestData);

        return redirect()->route('pegawai.show', ['id' => $pegawai]);
    }
    public function destroy(Request $request, $id)
    {
        $pegawai = $request->pegawai_id;
        $sip = SuratIzinProfesiModel::findOrFail($id);
        $sip->delete();

        return redirect()->route('pegawai.show', ['id' => $pegawai]);
    }

}
