   
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
                   <form method="POST" action="<?php echo e(route('pegawai.data-pribadi.update', $pegawais->id)); ?>"
                       id="update-form" enctype="multipart/form-data">
                       <?php echo csrf_field(); ?>
                       <?php echo method_field('PUT'); ?>
                       <input type="hidden" id="id" name="id" value="<?php echo e($pegawais->id); ?>">

                       <div class="row">
                           <div class="col-md-3">
                               <?php if(isset($pegawais->pas_foto) && $pegawais->pas_foto): ?>
                                   <img src="<?php echo e(asset('storage/' . $pegawais->pas_foto)); ?>"
                                       class="avatar-img rounded-circle" alt="Profile picture"
                                       style="width: 125px; height: 125px; object-fit: cover;">
                               <?php else: ?>
                                   <img src="<?php echo e(asset('assets/assets/avatars/face-1.jpg')); ?>"
                                       class="avatar-img rounded-circle" alt="Default Profile picture"
                                       style="width: 125px; height: 125px; object-fit: cover;">
                               <?php endif; ?>
                           </div>

                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="pas_foto"><strong>Foto <span style="color: red">*</span></strong> <small
                                           class="text-muted">Maksimal 2Mb</small></label>
                                   <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="pas_foto" name="pas_foto">
                                       <label class="custom-file-label" for="pas_foto">Upload Foto</label>
                                   </div>

                                   <?php if(isset($pegawais->pas_foto)): ?>
                                       <small class="text-muted">Current file:
                                           <?php echo e(basename($pegawais->pas_foto)); ?></small>
                                   <?php endif; ?>
                               </div>
                           </div>
                       </div>

                       <br>
                       <div class="form-group">
                           <label for="nama_pegawai"><strong>Nama Lengkap <span
                                       style="color: red">*</span></strong></label>
                           <input type="text" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai"
                               value="<?php echo e(old('nama_pegawai', $pegawais->nama_pegawai)); ?>" class="form-control">
                           <?php $__errorArgs = ['nama_pegawai'];
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
                           <div class="col-md-6">
                               <div class="form-group">
                                   <label for="nik"><strong>NIK <span style="color: red">*</span></strong></label>
                                   <input type="number" name="nik" id="nik" placeholder="NIK"
                                       value="<?php echo e(old('nik', $pegawais->nik)); ?>" class="form-control">
                                   <?php $__errorArgs = ['nik'];
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
                                   <label for="tempat_lahir_pegawai"><strong>Tempat Lahir <span
                                               style="color: red">*</span></strong></label>
                                   <input type="text" name="tempat_lahir_pegawai" id="tempat_lahir_pegawai" placeholder="Tempat Lahir"
                                       value="<?php echo e(old('tempat_lahir_pegawai', $pegawais->tempat_lahir_pegawai)); ?>"
                                       class="form-control">
                                   <?php $__errorArgs = ['tempat_lahir_pegawai'];
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
                                   <label for="email"><strong>Email <span
                                               style="color: red">*</span></strong></label>
                                   <input type="email" name="email" id="email" placeholder="Email"
                                       value="<?php echo e(old('email', $pegawais->email)); ?>" class="form-control">
                                   <?php $__errorArgs = ['email'];
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
                                   <label for="jabatan_id"><strong>Jabatan <span
                                               style="color: red">*</span></strong></strong></label>
                                   <select name="jabatan_id" id="jabatan_id" class="form-control select2">
                                       <option value="">Pilih Jabatan</option>
                                       <?php $__currentLoopData = $jabatan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jbt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                           <option value="<?php echo e($jbt->id); ?>" data-tahun="<?php echo e($jbt->nama_jabatan); ?>"
                                               <?php echo e(old('jabatan_id', $pegawais->jabatan_id) == $jbt->id ? 'selected' : ''); ?>>
                                               <?php echo e($jbt->nama_jabatan); ?>

                                           </option>
                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                   </select>
                               </div>
                               <?php $__errorArgs = ['jabatan_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <p style="color: red"><?php echo e($message); ?></p>
                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                               <div class="form-group">
                                   <label for="alamat"><strong>Alamat <span
                                               style="color: red">*</span></strong></label>
                                   <textarea name="alamat" placeholder="Detail Alamat: Jalan, RT, RW" id="" cols="30" rows="5" class="form-control"><?php echo e(old('alamat', $pegawais->alamat)); ?></textarea>
                                   <?php $__errorArgs = ['alamat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                       <p style="color: red"><?php echo e($alamat); ?></p>
                                   <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                               </div>
                           </div>

                           <div class="col-md-6 ">
                               <div class="form-group">
                                   <label for="jenis_kelamin"><strong>Jenis Kelamin <span
                                               style="color: red">*</span></strong></label>
                                   <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                                       <option value="">Pilih Jenis Kelamin</option>
                                       <option value="Laki-Laki"
                                           <?php echo e(old('jenis_kelamin', $pegawais->jenis_kelamin) == 'Laki-Laki' ? 'selected' : ''); ?>>
                                           Laki-Laki</option>
                                       <option value="Perempuan"
                                           <?php echo e(old('jenis_kelamin', $pegawais->jenis_kelamin) == 'Perempuan' ? 'selected' : ''); ?>>
                                           Perempuan</option>
                                   </select>
                               </div>
                               <?php $__errorArgs = ['jenis_kelamin'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <p style="color: red"><?php echo e($message); ?></p>
                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                               <div class="form-group">
                                   <label for="tanggal_lahir_pegawai"><strong>Tanggal Lahir <span
                                               style="color: red">*</span></strong></label>
                                   <input type="date" name="tanggal_lahir_pegawai" id="tanggal_lahir_pegawai"
                                       class="form-control"
                                       value="<?php echo e(old('tanggal_lahir_pegawai', $pegawais->tanggal_lahir_pegawai)); ?>">
                                   <?php $__errorArgs = ['tanggal_lahir_pegawai'];
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
                                   <label for="no_telp"><strong>No Handphone <span
                                               style="color: red">*</span></strong></label>
                                   <input type="number" name="no_telp" id="no_telp" class="form-control" placeholder="No Handphone"
                                       value="<?php echo e(old('no_telp', $pegawais->no_telp)); ?>">
                                   <?php $__errorArgs = ['no_telp'];
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
                                   <label for="cv"><strong>CV
                                           <span style="color: red">*</span></strong> <small
                                           class="text-muted">Maksimal 2Mb</small></label>
                                   <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="cv"
                                           name="cv">
                                       <label class="custom-file-label" for="cv">Upload CV</label>
                                   </div>
                                   <?php if(isset($pegawais->cv)): ?>
                                       <small class="text-muted">Current file:
                                           <?php echo e(basename($pegawais->cv)); ?></small>
                                   <?php endif; ?>
                                   <?php $__errorArgs = ['cv'];
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
                                   <label for="ktp"><strong>Identitas Pribadi (KTP/SIM/Passport) <span
                                               style="color: red">*</span></strong> <small class="text-muted">Maksimal
                                           2Mb</small></label>
                                   <div class="custom-file">
                                       <input type="file" class="custom-file-input" id="ktp"
                                           name="ktp">
                                       <label class="custom-file-label" for="ktp">Upload KTP/SIM/Passport</label>
                                   </div>
                                   <?php if(isset($pegawais->ktp)): ?>
                                       <small class="text-muted">Current file:
                                           <?php echo e(basename($pegawais->ktp)); ?></small>
                                   <?php endif; ?>
                                   <?php $__errorArgs = ['ktp'];
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

   
<?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views/admin/master/pegawai/modals/data_pribadi_modals.blade.php ENDPATH**/ ?>