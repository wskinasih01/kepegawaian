  
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
                  <form method="POST" action="<?php echo e(route('pegawai.data-pendidikan.store')); ?>" id="store-form"
                      enctype="multipart/form-data">
                      <?php echo csrf_field(); ?>
                      <input type="hidden" id="nama_pegawai" name="nama_pegawai" value="<?php echo e($pegawais->nama_pegawai); ?>">
                      <input type="hidden" id="pegawai_id" name="pegawai_id" value="<?php echo e($pegawais->id); ?>">

                      <div class="form-group">
                          <label for="jenjang_pendidikan_id"><strong>Jenjang
                                  Pendidikan <span style="color: red">*</span></strong></label>
                          <select name="jenjang_pendidikan_id" id="jenjang_pendidikan_id"
                              class="form-select form-control select2">
                              <option value="">Pilih Jenjang Pendidikan</option>
                              <?php $__currentLoopData = $pendidikans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($pend->id); ?>" data-tahun="<?php echo e($pend->pendidikan); ?>">
                                      <?php echo e($pend->pendidikan); ?></option>
                              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                          </select>
                          <?php $__errorArgs = ['jenjang_pendidikan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <p style="color: red"><?php echo e($message); ?></p>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="form-group">
                          <label for="institusi"><strong>Institusi Pendidikan <span
                                      style="color: red">*</span></strong></label>
                          <input type="text" name="institusi" id="institusi" class="form-control"
                              placeholder="Nama Institusi Pendidikan">
                          <?php $__errorArgs = ['institusi'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <p style="color: red"><?php echo e($message); ?></p>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="form-group">
                          <label for="jurusan"><strong>Program Studi/Jurusan <span
                                      style="color: red">*</span></strong></label>
                          <input type="text" name="jurusan" id="jurusan" class="form-control"
                              placeholder="Program Studi/Jurusan">
                          <?php $__errorArgs = ['jurusan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <p style="color: red"><?php echo e($message); ?></p>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                      </div>

                      <div class="row">
                          <div class="col-md-5">
                              <div class="form-group">
                                  <label for="tahun_lulus"><strong>Kelulusan <span
                                              style="color: red">*</span></strong></label>
                                  <input type="month" name="tahun_lulus" id="tahun_lulus" class="form-control">
                                  <?php $__errorArgs = ['tahun_lulus'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <p style="color: red"><?php echo e($message); ?></p>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>

                          <div class="col-md-7">
                              <div class="form-group">
                                  <label for="ipk"><strong>IPK <span style="color: red">*</span></strong></label>
                                  <input type="text" name="ipk" id="ipk" class="form-control"
                                      placeholder="IPK/Nilai Rata-Rata Sekolah">
                                  <small class="text-muted">IPK Maks: 4.00</small><br>
                                  <small class="text-muted">Nilai Rata-Rata Sekolah Maks: 100</small>
                                  <?php $__errorArgs = ['ipk'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                      <p style="color: red"><?php echo e($message); ?></p>
                                  <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                              </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="ijazah"><strong>Ijazah <span style="color: red">*</span></strong></label>
                          <div class="custom-file">
                              <input type="file" class="custom-file-input" id="ijazah" name="ijazah">
                              <label class="custom-file-label" for="ijazah">Upload Ijazah</label>
                          </div>
                          <?php $__errorArgs = ['ijazah'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                              <p style="color: red"><?php echo e($message); ?></p>
                          <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views/admin/master/pegawai/modals/data_pendidikan_modals.blade.php ENDPATH**/ ?>