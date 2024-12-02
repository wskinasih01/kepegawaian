  {{-- Pendidikan --}}
  <div class="modal fade" id="data-pendidikan-modals" tabindex="-1" role="dialog"
      aria-labelledby="data-pendidikan-modalsTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="data-pendidikan-modalsTitle">Riwayat Pendidikan</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form method="POST" action="{{ route('pegawai.data-pendidikan.store') }}" id="store-form"
                      enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" id="nama_pegawai" name="nama_pegawai" value="{{ $pegawais->nama_pegawai }}">
                      <input type="hidden" id="pegawai_id" name="pegawai_id" value="{{ $pegawais->id }}">

                      <div class="form-group">
                          <label for="jenjang_pendidikan_id"><strong>Jenjang
                                  Pendidikan <span style="color: red">*</span></strong></label>
                          <select name="jenjang_pendidikan_id" id="jenjang_pendidikan_id"
                              class="form-select form-control select2">
                              <option value="">Pilih Jenjang Pendidikan</option>
                              @foreach ($pendidikans as $pend)
                                  <option value="{{ $pend->id }}" data-tahun="{{ $pend->pendidikan }}">
                                      {{ $pend->pendidikan }}</option>
                              @endforeach
                          </select>
                          @error('jenjang_pendidikan_id')
                              <p style="color: red">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label for="institusi"><strong>Institusi Pendidikan <span
                                      style="color: red">*</span></strong></label>
                          <input type="text" name="institusi" id="institusi" class="form-control"
                              placeholder="Nama Institusi Pendidikan">
                          @error('institusi')
                              <p style="color: red">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="form-group">
                          <label for="jurusan"><strong>Program Studi/Jurusan <span
                                      style="color: red">*</span></strong></label>
                          <input type="text" name="jurusan" id="jurusan" class="form-control"
                              placeholder="Program Studi/Jurusan">
                          @error('jurusan')
                              <p style="color: red">{{ $message }}</p>
                          @enderror
                      </div>

                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label for="tahun_lulus"><strong>Kelulusan <span
                                              style="color: red">*</span></strong></label>
                                  <input type="month" name="tahun_lulus" id="tahun_lulus" class="form-control">
                                  @error('tahun_lulus')
                                      <p style="color: red">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>

                          <div class="col-md-7">
                              <div class="form-group">
                                  <label for="ipk"><strong>IPK <span style="color: red">*</span></strong></label>
                                  <input type="text" name="ipk" id="ipk" class="form-control"
                                      placeholder="IPK/Nilai Rata-Rata Sekolah">
                                  <small class="text-muted">IPK Maks: 4.00</small><br>
                                  <small class="text-muted">Nilai Rata-Rata Sekolah Maks: 100</small>
                                  @error('ipk')
                                      <p style="color: red">{{ $message }}</p>
                                  @enderror
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="ijazah"><strong>Ijazah <span style="color: red">*</span></strong></label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="ijazah" name="ijazah">
                              <label class="custom-file-label" for="ijazah">Upload Ijazah</label>
                          </div>
                          @error('ijazah')
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
