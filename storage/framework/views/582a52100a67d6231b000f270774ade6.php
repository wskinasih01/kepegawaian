
<div class="modal fade" id="data-dokumen-lain-modals" tabindex="-1" role="dialog"
    aria-labelledby="data-lainnya-modalsTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="data-lainnya-modalsTitle">Dokumen Lainnya</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?php echo e(route('pegawai.data-dokumen-lain.store')); ?>" id="store-form"
                    enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" id="nama_pegawai" name="nama_pegawai" value="<?php echo e($pegawais->nama_pegawai); ?>">
                    <input type="hidden" id="pegawai_id" name="pegawai_id" value="<?php echo e($pegawais->id); ?>">
                    <div class="form-group">
                        <label for="jenis_dokumen"><strong>Jenis Dokumen</strong></label>
                        <select name="jenis_dokumen" id="jenis_dokumen" class="form-control select2">
                            <option value="">Pilih Jenis Dokumen</option>
                            <option value="Sertifikat Orientasi">Sertifikat Orientasi</option>
                            <option value="Uraian Tugas">Uraian Tugas</option>
                            <option value="Penilaian Kinerja">Penilaian Kinerja</option>
                            <option value="Medical Check Up">Medical Check Up</option>
                        </select>
                    </div>
                    <?php $__errorArgs = ['jenis_dokumen'];
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
                        <label for="dokumen">Dokumen</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="dokumen" name="dokumen">
                            <label class="custom-file-label" for="dokumen">Upload Dokumen</label>
                        </div>
                        <?php $__errorArgs = ['dokumen'];
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
<?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views/admin/master/pegawai/modals/dokumen_lain_modals.blade.php ENDPATH**/ ?>