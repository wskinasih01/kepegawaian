{{-- Edit Surat Izin Profesi --}}
<div class="modal fade" id="data-sip-edit-modals-{{ $sip->id }}" tabindex="-1" role="dialog"
    aria-labelledby="data-sip-modalsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="data-sip-modalsTitle">Surat Izin Profesi (STR/SIP/SIPA/DLL)</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('pegawai.data-surat-izin-profesi.update', $sip->id ?? '') }}"
                    id="update-form" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id" value="{{ $sip->id ?? '' }}">
                    <input type="hidden" id="nama_pegawai" name="nama_pegawai"
                        value="{{ $sip->pegawai->nama_pegawai ?? '' }}">
                    <input type="hidden" id="pegawai_id" name="pegawai_id" value="{{ $sip->pegawai->id ?? '' }}">

                    <div class="form-group">
                        <label for="jenis_dokumen"><strong>Jenis Dokumen</strong></label>
                        <select name="jenis_dokumen" id="jenis_dokumen" class="form-control select2">
                            <option value="">Pilih Jenis Dokumen</option>
                            <option value="STR"
                                {{ old('jenis_dokumen', $sip->jenis_dokumen ?? '') == 'STR' ? 'selected' : '' }}>
                                STR</option>
                            <option value="SIP"
                                {{ old('jenis_dokumen', $sip->jenis_dokumen ?? '') == 'SIP' ? 'selected' : '' }}>
                                SIP</option>
                            <option value="SIPA"
                                {{ old('jenis_dokumen', $sip->jenis_dokumen ?? '') == 'SIPA' ? 'selected' : '' }}>
                                SIPA</option>
                        </select>
                    </div>
                    @error('jenis_dokumen')
                        <p style="color: red">{{ $message }}</p>
                    @enderror

                    <div class="form-group">
                        <label for="no_sertifikat"><strong>Nomor Sertifikat<span
                                    style="color: red">*</span></strong></label>
                        <input type="text" name="no_sertifikat" id="no_sertifikat" class="form-control"
                            placeholder="Nomor Sertifikat"
                            value="{{ old('no_sertifikat', $sip->no_sertifikat ?? '') }}">
                        @error('no_sertifikat')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_mulai">Tanggal Mulai Berlaku</label>
                                <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control"
                                    value="{{ old('tgl_mulai', $sip->tgl_mulai ?? '') }}">
                                @error('tgl_mulai')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_selesai">Tanggal Berakhir</label>
                                <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control"
                                    value="{{ old('tgl_selesai', $sip->tgl_selesai ?? '') }}">
                                @error('tgl_selesai')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="dokumen">Dokumen</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="dokumen" name="dokumen">
                            <label class="custom-file-label" for="dokumen">Upload Dokumen</label>
                        </div>
                        @if (isset($sip->dokumen))
                            <small class="text-muted">Current file:
                                {{ basename($sip->dokumen) }}</small>
                        @endif
                        @error('dokumen')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <div class="form-group">
                    <button type="reset" class="btn btn-danger btn-md"><span class="fe fe-12 fe-x"></span>
                        Reset</button>
                    <button type="submit" class="btn btn-success btn-md"><span class="fe fe-12 fe-save"></span>
                        Submit</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
