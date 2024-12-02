   {{-- Pekerjaan --}}
   <div class="modal fade" id="data-pekerjaan-edit-modals-{{ $pekerjaan->id }}" tabindex="-1" role="dialog"
       aria-labelledby="data-pekerjaan-modalsTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="data-pekerjaan-modalsTitle">Riwayat Pekerjaan</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form method="POST" action="{{ route('pegawai.data-pekerjaan.update', $pekerjaan->id ?? '') }}"
                       id="update-form" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                       <input type="hidden" name="id" id="id" value="{{ $pekerjaan->id ?? '' }}">
                       <input type="hidden" id="nama_pegawai" name="nama_pegawai"
                           value="{{ $pekerjaan->pegawai->nama_pegawai ?? '' }}">
                       <input type="hidden" id="pegawai_id" name="pegawai_id"
                           value="{{ $pekerjaan->pegawai->id ?? '' }}">

                       <div class="form-group">
                           <label for="jabatan"><strong>Jabatan</strong></label>
                           <input type="text" name="jabatan" id="jabatan" class="form-control"
                               placeholder="Jabatan" value="{{ old('jabatan', $pekerjaan->jabatan ?? '') }}">
                           @error('jabatan')
                               <p style="color: red">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="nama_perusahaan"><strong>Nama Perusahaan<span
                                       style="color: red">*</span></strong></label>
                           <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"
                               placeholder="Nama Perusahaan"
                               value="{{ old('nama_perusahaan', $pekerjaan->nama_perusahaan ?? '') }}">
                           @error('naa_perusahaan')
                               <p style="color: red">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="alamat_perusahaan"><strong>Alamat<span
                                       style="color: red">*</span></strong></label>
                           <textarea name="alamat_perusahaan" id="alamat_perusahaan" cols="30" rows="3" class="form-control"
                               placeholder="Alamat Perusahaan">{{ old('alamat_perusahaan', $pekerjaan->alamat_perusahaan ?? '') }}</textarea>
                           @error('alamat_perusahaan')
                               <p style="color: red">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="jenis_pengalaman"><strong>Jenis Pengalaman<span
                                       style="color: red">*</span></strong></label>
                           <select name="jenis_pengalaman" id="jenis_pengalaman" class="form-control">
                               <option value="">Pilih Jenis Pengalaman</option>
                               <option value="Internship"
                                   {{ old('jenis_pengalaman', $pekerjaan->jenis_pengalaman) == 'Internship' ? 'selected' : '' }}>
                                   Internship</option>
                               <option value="Freelance"
                                   {{ old('jenis_pengalaman', $pekerjaan->jenis_pengalaman) == 'Freelance' ? 'selected' : '' }}>
                                   Freelance</option>
                               <option value="Part Time"
                                   {{ old('jenis_pengalaman', $pekerjaan->jenis_pengalaman) == 'Part Time' ? 'selected' : '' }}>
                                   Part Time</option>
                               <option value="Full Time"
                                   {{ old('jenis_pengalaman', $pekerjaan->jenis_pengalaman) == 'Full Time' ? 'selected' : '' }}>
                                   Full Time</option>
                           </select>
                       </div>
                       @error('jenis_pengalaman')
                           <p style="color: red">{{ $message }}</p>
                       @enderror

                       <div class="form-group">
                           <div class="row">
                               <div class="col-md-6">
                                   <label for="tgl_mulai"><strong>Tanggal
                                           Mulai</strong></label>
                                   <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control"
                                       value="{{ old('tgl_mulai', $pekerjaan->tgl_mulai ?? '') }}">
                                   @error('tgl_mulai')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>

                               <div class="col-md-6">
                                   <label for="tgl_selesai"><strong>Tanggal
                                           Selesai</strong></label>
                                   <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control"
                                       value="{{ old('tgl_selesai', $pekerjaan->tgl_selesai ?? '') }}">
                                   @error('tgl_selesai')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>
                           </div>
                       </div>

                       <div class="form-group">
                           <label for="deskripsi">Deskripsi</label>
                           <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"
                               placeholder="Tuliskan deskripsi singkat tentang pengalaman atau kegiatan sebelumnya">{{ old('deskripsi', $pekerjaan->deskripsi ?? '') }}</textarea>
                           @error('deskripsi')
                               <p style="color: red">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="form-group">
                           <label for="surat_pengalaman_kerja">Surat Pengalaman Kerja</label>
                           <div class="custom-file">
                               <input type="file" class="custom-file-input" id="surat_pengalaman_kerja"
                                   name="surat_pengalaman_kerja">
                               <label class="custom-file-label" for="surat_pengalaman_kerja">Upload Surat Pengalaman
                                   Kerja</label>
                           </div>
                           @if (isset($pekerjaan->surat_pengalaman_kerja))
                               <small class="text-muted">Current file:
                                   {{ basename($pekerjaan->surat_pengalaman_kerja) }}</small>
                           @endif
                           @error('surat_pengalaman_kerja')
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
