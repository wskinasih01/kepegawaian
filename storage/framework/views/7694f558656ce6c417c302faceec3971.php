
<?php $__env->startSection('title', 'Data Master Jabatan'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Edit Data Jabatan</h3>
            <a href="<?php echo e(route('admin.master.jabatan.index')); ?>">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Edit Data Jabatan</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('jabatan.update', $jabatan->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('PUT'); ?>
                                <div class="form-group">
                                    <label for="nama_jabatan">nama_jabatan</label>
                                    <input type="text" class="form-control" id="nama_jabatan" name="nama_jabatan"
                                        placeholder="Jabatan"
                                        value="<?php echo e(old('nama_jabatan', $jabatan->nama_jabatan)); ?>">
                                    <?php $__errorArgs = ['nama_jabatan'];
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
                                <button type="submit" class="btn btn-success btn-md"><span class="fe fe-12 fe-save"></span>
                                    Submit</button>
                                <button type="reset" class="btn btn-danger btn-md"><span class="fe fe-12 fe-x"></span>
                                    Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views\admin\master\jabatan\edit.blade.php ENDPATH**/ ?>