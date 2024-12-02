 
 <div class="modal fade" id="data-pelatihan-edit-modals-<?php echo e($pelatihanss->id); ?>" tabindex="-1" role="dialog"
     aria-labelledby="data-pelatihan-modalsTitle" aria-hidden="true">
     <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="data-pelatihan-modalsTitle">Pelatihan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="<?php echo e(route('pegawai.data-pelatihan.update', $pelatihanss->id ?? '')); ?>"
                     id="update-form" enctype="multipart/form-data">
                     <?php echo csrf_field(); ?>
                     <?php echo method_field('PUT'); ?>
                     <input type="hidden" name="id" id="id" value="<?php echo e($pelatihanss->id ?? ''); ?>">
                     <input type="hidden" id="nama_pegawai" name="nama_pegawai"
                         value="<?php echo e($pelatihanss->pegawai->nama_pegawai ?? ''); ?>">
                     <input type="hidden" id="pegawai_id" name="pegawai_id"
                         value="<?php echo e($pelatihanss->pegawai->id ?? ''); ?>">

                     <div class="form-group">
                         <label for="nama_pelatihan"><strong>Nama Pelatihan</strong></label>
                         <input type="text" name="nama_pelatihan" id="nama_pelatihan" class="form-control"
                             placeholder="Nama Pelatihan"
                             value="<?php echo e(old('nama_pelatihan', $pelatihanss->nama_pelatihan ?? '')); ?>">
                         <?php $__errorArgs = ['nama_pelatihan'];
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
                         <label for="topik_pelatihan"><strong>Topik Pelatihan<span
                                     style="color: red">*</span></strong></label>
                         <input type="text" name="topik_pelatihan" id="topik_pelatihan" class="form-control"
                             placeholder="Topik Pelatihan"
                             value="<?php echo e(old('topik_pelatihan', $pelatihanss->topik_pelatihan ?? '')); ?>">
                         <?php $__errorArgs = ['topik_pelatihan'];
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
                         <label for="lokasi"><strong>Lokasi<span style="color: red">*</span></strong></label>
                         <input type="text" name="lokasi" id="lokasi" class="form-control" placeholder="Lokasi"
                             value="<?php echo e(old('lokasi', $pelatihanss->lokasi ?? '')); ?>">
                         <?php $__errorArgs = ['lokasi'];
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
                         <div class="col-md-4">
                             <div class="form-group">
                                 <label for="tgl_pelatihan"><strong>Tanggal Pelatihan</strong></label>
                                 <input type="date" name="tgl_pelatihan" id="tgl_pelatihan" class="form-control"
                                     value="<?php echo e(old('tgl_pelatihan', $pelatihanss->tgl_pelatihan ?? '')); ?>">
                                 <?php $__errorArgs = ['tgl_pelatihan'];
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

                         <div class="col-md-8">
                             <div class="form-group">
                                 <label for="sertifikat">Sertifikat</label>
                                 <div class="custom-file">
                                     <input type="file" class="custom-file-input" id="sertifikat" name="sertifikat">
                                     <label class="custom-file-label" for="sertifikat">Upload Sertifikat</label>
                                 </div>
                                 <?php if(isset($pelatihanss->sertifikat)): ?>
                                     <small class="text-muted">Current file:
                                         <?php echo e(basename($pelatihanss->sertifikat)); ?></small>
                                 <?php endif; ?>
                                 <?php $__errorArgs = ['sertifikat'];
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
<?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views\admin\master\pegawai\modals\pelatihan_edit_modals.blade.php ENDPATH**/ ?>