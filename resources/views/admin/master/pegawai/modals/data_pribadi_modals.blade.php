   {{-- Data Pribadi --}}
   <div class="modal fade" id="data-pribadi-modals" tabindex="-1" role="dialog" aria-labelledby="data-pribadi-modalsTitle"
       aria-hidden="true">
       <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title" id="data-pribadi-modalsTitle">Data Pribadi</h5>
                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <div class="modal-body">
                   <form method="POST" action="{{ route('pegawai.data-pribadi.update', $pegawais->id) }}"
                       id="update-form" enctype="multipart/form-data">
                       @csrf
                       @method('PUT')
                       <input type="hidden" id="id" name="id" value="{{ $pegawais->id }}">

                       <div class="row">
                           <div class="col-md-3">
                               @if (isset($pegawais->pas_foto) && $pegawais->pas_foto)
                                   <img src="{{ asset('storage/' . $pegawais->pas_foto) }}"
                                       class="avatar-img rounded-circle" alt="Profile picture"
                                       style="width: 125px; height: 125px; object-fit: cover;">
                               @else
                                   <img src="{{ asset('assets/assets/avatars/face-1.jpg') }}"
                                       class="avatar-img rounded-circle" alt="Default Profile picture"
                                       style="width: 125px; height: 125px; object-fit: cover;">
                               @endif
                           </div>

                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="pas_foto"><strong>Foto <span style="color: red">*</span></strong> <small
                                           class="text-muted">Maksimal 2Mb</small></label>
                                   <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="pas_foto" name="pas_foto">
                                       <label class="custom-file-label" for="pas_foto">Upload Foto</label>
                                   </div>

                                   @if (isset($pegawais->pas_foto))
                                       <small class="text-muted">Current file:
                                           {{ basename($pegawais->pas_foto) }}</small>
                                   @endif
                               </div>
                           </div>
                       </div>

                       <br>
                       <div class="form-group">
                           <label for="nama_pegawai"><strong>Nama Lengkap <span
                                       style="color: red">*</span></strong></label>
                           <input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai"
                               value="{{ old('nama_pegawai', $pegawais->nama_pegawai) }}" class="form-control">
                           @error('nama_pegawai')
                               <p style="color: red">{{ $message }}</p>
                           @enderror
                       </div>

                       <div class="row">
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="nik"><strong>NIK <span style="color: red">*</span></strong></label>
                                   <input type="number" name="nik" id="nik" placeholder="NIK"
                                       value="{{ old('nik', $pegawais->nik) }}" class="form-control">
                                   @error('nik')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <label for="tempat_lahir_pegawai"><strong>Tempat Lahir <span
                                               style="color: red">*</span></strong></label>
                                   <input type="text" name="tempat_lahir_pegawai" id="tempat_lahir_pegawai" placeholder="Tempat Lahir"
                                       value="{{ old('tempat_lahir_pegawai', $pegawais->tempat_lahir_pegawai) }}"
                                       class="form-control">
                                   @error('tempat_lahir_pegawai')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <label for="email"><strong>Email <span
                                               style="color: red">*</span></strong></label>
                                   <input type="email" name="email" id="email" placeholder="Email"
                                       value="{{ old('email', $pegawais->email) }}" class="form-control">
                                   @error('email')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <label for="jabatan_id"><strong>Jabatan <span
                                               style="color: red">*</span></strong></strong></label>
                                   <select name="jabatan_id" id="jabatan_id" class="form-control select2">
                                       <option value="">Pilih Jabatan</option>
                                       @foreach ($jabatan as $jbt)
                                           <option value="{{ $jbt->id }}" data-tahun="{{ $jbt->nama_jabatan }}"
                                               {{ old('jabatan_id', $pegawais->jabatan_id) == $jbt->id ? 'selected' : '' }}>
                                               {{ $jbt->nama_jabatan }}
                                           </option>
                                       @endforeach
                                   </select>
                               </div>
                               @error('jabatan_id')
                                   <p style="color: red">{{ $message }}</p>
                               @enderror

                               <div class="form-group">
                                   <label for="alamat"><strong>Alamat <span
                                               style="color: red">*</span></strong></label>
                                   <textarea name="alamat" placeholder="Detail Alamat: Jalan, RT, RW" id="" cols="30" rows="5" class="form-control">{{ old('alamat', $pegawais->alamat) }}</textarea>
                                   @error('alamat')
                                       <p style="color: red">{{ $alamat }}</p>
                                   @enderror
                               </div>
                           </div>

                           <div class="col-md-6 ">
                               <div class="form-group">
                                   <label for="jenis_kelamin"><strong>Jenis Kelamin <span
                                               style="color: red">*</span></strong></label>
                                   <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                                       <option value="">Pilih Jenis Kelamin</option>
                                       <option value="Laki-Laki"
                                           {{ old('jenis_kelamin', $pegawais->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                           Laki-Laki</option>
                                       <option value="Perempuan"
                                           {{ old('jenis_kelamin', $pegawais->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                           Perempuan</option>
                                   </select>
                               </div>
                               @error('jenis_kelamin')
                                   <p style="color: red">{{ $message }}</p>
                               @enderror

                               <div class="form-group">
                                   <label for="tanggal_lahir_pegawai"><strong>Tanggal Lahir <span
                                               style="color: red">*</span></strong></label>
                                   <input type="date" name="tanggal_lahir_pegawai" id="tanggal_lahir_pegawai"
                                       class="form-control"
                                       value="{{ old('tanggal_lahir_pegawai', $pegawais->tanggal_lahir_pegawai) }}">
                                   @error('tanggal_lahir_pegawai')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <label for="no_telp"><strong>No Handphone <span
                                               style="color: red">*</span></strong></label>
                                   <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="No Handphone"
                                       value="{{ old('no_telp', $pegawais->no_telp) }}">
                                   @error('no_telp')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <label for="cv"><strong>CV
                                           <span style="color: red">*</span></strong> <small
                                           class="text-muted">Maksimal 2Mb</small></label>
                                   <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="cv"
                                           name="cv">
                                       <label class="custom-file-label" for="cv">Upload CV</label>
                                   </div>
                                   @if (isset($pegawais->cv))
                                       <small class="text-muted">Current file:
                                           {{ basename($pegawais->cv) }}</small>
                                   @endif
                                   @error('cv')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>

                               <div class="form-group">
                                   <label for="ktp"><strong>Identitas Pribadi (KTP/SIM/Passport) <span
                                               style="color: red">*</span></strong> <small class="text-muted">Maksimal
                                           2Mb</small></label>
                                   <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="ktp"
                                           name="ktp">
                                       <label class="custom-file-label" for="ktp">Upload KTP/SIM/Passport</label>
                                   </div>
                                   @if (isset($pegawais->ktp))
                                       <small class="text-muted">Current file:
                                           {{ basename($pegawais->ktp) }}</small>
                                   @endif
                                   @error('ktp')
                                       <p style="color: red">{{ $message }}</p>
                                   @enderror
                               </div>
                           </div>
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

   {{-- <script>
       $('#data-pribadi-modals').on('show.bs.modal', function(event) {
           var button = $(event.relatedTarget);
           var pegawaiId = button.data('id');
           var namaPegawai = button.data('nama');
           var nik = button.data('nik');
           var tempatLahir = button.data('tempat_lahir');
           var email = button.data('email');
           var jabatan = button.data('jabatan');
           var alamat = button.data('alamat');
           var jenisKelamin = button.data('jenis_kelamin');
           var tanggalLahir = button.data('tanggal_lahir');
           var noTelp = button.data('no_telp');

           var modal = $(this);
           modal.find('#id').val(pegawaiId);
           modal.find('#nama_pegawai').val(namaPegawai);
           modal.find('#nik').val(nik);
           modal.find('#tempat_lahir_pegawai').val(tempatLahir);
           modal.find('#email').val(email);
           modal.find('#jabatan_id').val(jabatan);
           modal.find('#alamat').val(alamat);
           modal.find('#jenis_kelamin').val(jenisKelamin);
           modal.find('#tanggal_lahir_pegawai').val(tanggalLahir);
           modal.find('#no_telp').val(noTelp);
       });
   </script> --}}
