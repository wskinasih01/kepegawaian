
<?php $__env->startSection('title', 'Manage Roles'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Edit Data Roles</h3>
            <a href="<?php echo e(route('admin.role permission.roles.index')); ?>">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Edit Data Roles</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="<?php echo e(route('roles.update', $roles->id)); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="name"><strong>Roles</strong></label>
                                    <input type="text" value="<?php echo e(old('name', $roles->name)); ?>" name="name"
                                        placeholder="Contoh: Admin" class="form-control">
                                    <?php $__errorArgs = ['name'];
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
                                    <?php if($permissions->isNotEmpty()): ?>
                                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input
                                                            <?php echo e($hasPermissions->contains($permission->name) ? 'checked' : ''); ?>

                                                            type="checkbox" id="permission-<?php echo e($permission->id); ?>"
                                                            class="rounded" name="permission[]"
                                                            value="<?php echo e($permission->name); ?>">
                                                        <label
                                                            for="permission-<?php echo e($permission->id); ?>"><?php echo e($permission->name); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views\admin\role permission\roles\edit.blade.php ENDPATH**/ ?>