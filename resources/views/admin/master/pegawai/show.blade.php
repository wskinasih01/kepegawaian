@extends('layouts.main')
@section('title', 'Data Master Pegawai')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Data Pegawai</h3>
            <a href="{{ route('admin.master.pegawai.index') }}">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="biodata">
                    <div class="row d-flex justify-content-between align-items-center mb-12">
                        <div class="col">
                            <h5 class="font-body-1 m-0">Data Pribadi</h5>
                        </div>
                        <div class="col-auto d-inline-flex">
                            <button class="btn btn-outline-primary btn-md border-primary" data-toggle="modal"
                                data-target="#data-pribadi-modals" data-id="{{ $pegawais->id }}">
                                <span class="fe fe-12 fe-edit"></span> Edit
                            </button>
                        </div>
                    </div>
                    <div class="row-mb-4">
                        <div class="col-md-2">
                            @if (isset($pegawais->pas_foto) && $pegawais->pas_foto)
                                <img src="{{ asset('storage/' . $pegawais->pas_foto) }}" class="avatar-img rounded-circle"
                                    alt="Profile picture" style="width: 125px; height: 125px; object-fit: cover;">
                            @else
                                <img src="{{ asset('assets/assets/avatars/face-1.jpg') }}" class="avatar-img rounded-circle"
                                    alt="Default Profile picture" style="width: 125px; height: 125px; object-fit: cover;">
                            @endif
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 mb-4"><strong>Nama Lengkap</strong> <span
                                        class="d-block">{{ $pegawais->nama_pegawai }}</span></div>
                                <div class="col-md-4 mb-4"><strong>NIK</strong> <span
                                        class="d-block">{{ $pegawais->nik }}</span></div>
                                <div class="col-md-4 mb-4"><strong>Jenis Kelamin</strong> <span
                                        class="d-block">{{ $pegawais->jenis_kelamin }}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4"><strong>Tempat, Tanggal Lahir</strong> <span
                                        class="d-block">{{ $pegawais->tempat_lahir_pegawai }},
                                        {{ \Carbon\Carbon::parse($pegawais->tanggal_lahir_pegawai)->locale('id')->translatedFormat('j F Y') }}</span>
                                </div>
                                <div class="col-md-4 mb-4"><strong>Alamat</strong> <span
                                        class="d-block">{{ $pegawais->alamat }}</span></div>
                                <div class="col-md-4 mb-4"><strong>No Handphone</strong> <span
                                        class="d-block">{{ $pegawais->no_telp }}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4"><strong>Email</strong> <span
                                        class="d-block">{{ $pegawais->email }}</span></div>
                                <div class="col-md-4 mb-4"><strong>Jabatan</strong> <span
                                        class="d-block">{{ $pegawais->jabatan->nama_jabatan }}</span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4"><strong>CV</strong>
                                    @if ($pegawais->cv)
                                        <span class="d-block"><a href="{{ asset('storage/' . $pegawais->cv) }}"
                                                target="_blank">Download CV</a></span>
                                    @else
                                        <span class="d-block">Belum ada CV yang diupload</span>
                                    @endif
                                </div>
                                <div class="col-md-4 mb-4"><strong>Identitas Pribadi (KTP/SIM/Passport)</strong>
                                    @if ($pegawais->ktp)
                                        <span class="d-block"><a href="{{ asset('storage/' . $pegawais->ktp) }}"
                                                target="_blank">Download KTP</a></span>
                                    @else
                                        <span class="d-block">Belum ada kartu identitas yang diupload</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            {{-- PENDIDIKAN --}}
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="pendidikan">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Riwayat Pendidikan</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-pendidikan-modals" data-id="{{ $pegawais->id }}"> <span
                                class="fe fe-12 fe-edit"></span> Tambah
                            Riwayat Pendidikan</button>
                    </div>
                    <br>
                    @foreach ($riwayatPendidikan as $pendidikan)
                        <div class="row d-flex justify-content-between align-items-center mb-12">
                            <div class="col">
                                <h6 class="font-paragraph-4 m-0">
                                    {{ $pendidikan->institusi }}
                                    <br class="d-block d-sm-none">
                                    <span
                                        class="btn btn-info btn-sm">{{ \Carbon\Carbon::parse($pendidikan->tahun_lulus)->translatedFormat('Y') }}</span>
                                </h6>
                                <p class="m-0">
                                    {{ $pendidikan->pendidikan->pendidikan }}, {{ $pendidikan->jurusan }}, GPA:
                                    {{ $pendidikan->ipk }}
                                </p>
                                @if ($pendidikan->ijazah)
                                    <span class="d-block"><a href="{{ asset('storage/' . $pendidikan->ijazah) }}"
                                            target="_blank">Download Ijazah</a></span>
                                @else
                                    <span class="d-block">Belum ada ijazah yang diupload</span>
                                @endif
                                <br>
                            </div>
                            <div class="col-auto d-inline-flex">
                                <div class="row ">
                                    <div class="form-group">
                                        <button href="javascript:;" class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#data-pendidikan-edit-modals-{{ $pendidikan->id ?? '' }}">
                                            <span class="fe fe-12 fe-edit"></span></button>
                                        <form action="{{ route('pegawai.data-pendidikan.destroy', $pendidikan->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawais->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.master.pegawai.modals.data_pendidikan_edit_modals')
                    @endforeach
                </div>
            </div>


            {{-- RIWAYAT KERJA --}}
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="pekerjaan">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Riwayat Pekerjaan</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-pekerjaan-modals" data-id="{{ $pegawais->id }}"> <span
                                class="fe fe-12 fe-edit"></span> Tambah
                            Riwayat Pekerjaan</button>
                    </div>
                    <br>
                    @foreach ($riwayatKerja as $pekerjaan)
                        <div class="row d-flex justify-content-between align-items-center mb-12">
                            <div class="col">
                                <h6 class="font-paragraph-4 m-0">
                                    {{ $pekerjaan->nama_perusahaan }} -
                                    <br class="d-block d-sm-none">
                                    {{ $pekerjaan->jabatan }}
                                </h6>
                                <span
                                    class="m-0">{{ \Carbon\Carbon::parse($pekerjaan->tgl_mulai)->translatedFormat('j M Y') }}
                                    -
                                    {{ \Carbon\Carbon::parse($pekerjaan->tgl_selesai)->translatedFormat('j M Y') }}</span>
                                <p class="m-0">
                                    @if ($pekerjaan->alamat == '')
                                        - <br>
                                    @else
                                        {{ $pekerjaan->alamat }} <br>
                                    @endif
                                    {{ $pekerjaan->jenis_pengalaman }} <br>
                                    {{ $pekerjaan->deskripsi }}
                                </p>
                                @if ($pekerjaan->surat_pengalaman_kerja)
                                    <span class="d-block"><a
                                            href="{{ asset('storage/' . $pekerjaan->surat_pengalaman_kerja) }}"
                                            target="_blank">Download Surat Pengalaman Kerja</a></span>
                                @else
                                    <span class="d-block">Belum ada surat pengalaman kerja yang diupload</span>
                                @endif
                                <br>
                            </div>
                            <div class="col-auto d-inline-flex">
                                <div class="row ">
                                    <div class="form-group">
                                        <button href="javascript:;" class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#data-pekerjaan-edit-modals-{{ $pekerjaan->id ?? '' }}">
                                            <span class="fe fe-12 fe-edit"></span></button>
                                        <form action="{{ route('pegawai.data-pekerjaan.destroy', $pekerjaan->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawais->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.master.pegawai.modals.riwayat_pekerjaan_edit_modals')
                    @endforeach
                </div>
            </div>

            {{-- PELATIHAN --}}
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="pelatihan">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Pelatihan</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-pelatihan-modals" data-id="{{ $pegawais->id }}"> <span
                                class="fe fe-12 fe-edit"></span> Tambah Pelatihan</button>
                    </div>
                    <br>
                    @foreach ($pelatihan as $pelatihanss)
                        <div class="row d-flex justify-content-between align-items-center mb-12">
                            <div class="col">
                                <h6 class="font-paragraph-4 m-0">
                                    {{ $pelatihanss->nama_pelatihan }}
                                    <br class="d-block d-sm-none">
                                    <span
                                        class="btn btn-info btn-sm">{{ \Carbon\Carbon::parse($pelatihanss->tgl_pelatihan)->translatedFormat('j F Y') }}</span>
                                </h6>
                                <p class="m-0">
                                    Topik: {{ $pelatihanss->topik_pelatihan }}
                                    <br>Lokasi: {{ $pelatihanss->lokasi }}
                                </p>
                                @if ($pelatihanss->sertifikat)
                                    <span class="d-block"><a href="{{ asset('storage/' . $pelatihanss->sertifikat) }}"
                                            target="_blank">Sertifikat Pelatihan</a></span>
                                @else
                                    <span class="d-block">Belum ada sertifikat pelatihan yang diupload</span>
                                @endif
                                <br>
                            </div>
                            <div class="col-auto d-inline-flex">
                                <div class="row ">
                                    <div class="form-group">
                                        <button href="javascript:;" class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#data-pelatihan-edit-modals-{{ $pelatihanss->id ?? '' }}">
                                            <span class="fe fe-12 fe-edit"></span></button>
                                        <form action="{{ route('pegawai.data-pelatihan.destroy', $pelatihanss->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawais->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.master.pegawai.modals.pelatihan_edit_modals')
                    @endforeach
                </div>
            </div>

            {{-- SURAT IZIN PROFESI --}}
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="sip">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Surat Izin Profesi (STR/SIP/SIPA/DLL)</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-sip-modals" data-id="{{ $pegawais->id }}"> <span
                                class="fe fe-12 fe-edit"></span> Tambah Surat Izin
                            Profesi</button>
                    </div>
                    <br>
                    @foreach ($suratIzinProfesi as $sip)
                        <div class="row d-flex justify-content-between align-items-center mb-12">
                            <div class="col">
                                <h6 class="font-paragraph-4 m-0">
                                    {{ $sip->jenis_dokumen }}
                                </h6>
                                <p class="m-0">
                                    No. Sertifikat : {{ $sip->no_sertifikat }}
                                    <br>
                                    Tanggal Berlaku:
                                    {{ \Carbon\Carbon::parse($sip->tgl_mulai)->translatedFormat('j M Y') }} -
                                    {{ \Carbon\Carbon::parse($sip->tgl_selesai)->translatedFormat('j M Y') }}
                                </p>
                                @if ($sip->dokumen)
                                    <span class="d-block"><a href="{{ asset('storage/' . $sip->dokumen) }}"
                                            target="_blank">{{ $sip->jenis_dokumen }}</a></span>
                                @else
                                    <span class="d-block">Belum ada {{ $sip->jenis_dokumen }} yang diupload</span>
                                @endif
                                <br>
                            </div>
                            <div class="col-auto d-inline-flex">
                                <div class="row ">
                                    <div class="form-group">
                                        <button href="javascript:;" class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal" data-target="#data-sip-edit-modals-{{ $sip->id ?? '' }}">
                                            <span class="fe fe-12 fe-edit"></span></button>
                                        <form action="{{ route('pegawai.data-surat-izin-profesi.destroy', $sip->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawais->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @include('admin.master.pegawai.modals.surat_izin_profesi_edit_modals')
                    @endforeach
                </div>
            </div>

            {{-- LAINNYA --}}
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="dokumenLain">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Dokumen Lainnya</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-dokumen-lain-modals" data-id="{{ $pegawais->id }}"> <span
                                class="fe fe-12 fe-edit"></span> Tambah Dokumen
                            Lainnya</button>
                    </div>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>Jenis Dokumen</th>
                                <th>Dokumen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dokumenLain as $docs)
                                <tr>
                                    <td>{{ $docs->jenis_dokumen }}</td>
                                    <td>
                                        @if ($docs->dokumen)
                                            <span class="d-block"><a href="{{ asset('storage/' . $docs->dokumen) }}"
                                                    target="_blank">Dokumen {{ $docs->jenis_dokumen }}</a></span>
                                        @else
                                            <span class="d-block">Belum ada dokumen {{ strtolower($docs->jenis_dokumen) }}
                                                yang
                                                diupload</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="javascript:;" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                            data-target="#data-dokumen-lain-edit-modals-{{ $docs->id ?? '' }}">
                                            <span class="fe fe-12 fe-edit"></span></a>
                                        <form action="{{ route('pegawai.data-dokumen-lain.destroy', $docs->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="pegawai_id" value="{{ $pegawais->id }}">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                @include('admin.master.pegawai.modals.dokumen_lain_edit_modals')
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @include('admin.master.pegawai.modals.data_pribadi_modals')
        @include('admin.master.pegawai.modals.data_pendidikan_modals')
        @include('admin.master.pegawai.modals.riwayat_pekerjaan_modals')
        @include('admin.master.pegawai.modals.pelatihan_modals')
        @include('admin.master.pegawai.modals.surat_izin_profesi_modals')
        @include('admin.master.pegawai.modals.dokumen_lain_modals')

    @endsection
