
<?php $__env->startSection('title', 'Data Pegawai'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Data Pegawai</h3>
            <a href="<?php echo e(route('admin.master.pegawai.index')); ?>">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="card my-4">
                <div class="card-header">
                    <strong>Tambah Data Pegawai</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('pegawai.data-pribadi.store')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <h5>Biodata Pribadi</h5>
                        <div class="form-group">
                            <label for="nama_pegawai"><strong>Nama Lengkap <span
                                        style="color: red">*</span></strong></label>
                            <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control "
                                placeholder="Nama Pegawai">
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
                                    <input type="number" name="nik" id="nik" class="form-control "
                                        placeholder="NIK">
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
                                    <input type="text" name="tempat_lahir_pegawai" id="tempat_lahir_pegawai"
                                        class="form-control " placeholder="Tempat Lahir">
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
                                    <label for="email"><strong>Email <span style="color: red">*</span></strong></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email">
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
                                    <label for="jabatan_id"><strong>Jabatan</strong></label>
                                    <select name="jabatan_id" id="jabatan_id" class="form-control select2">
                                        <option value="">Pilih Jabatan</option>
                                        <?php $__currentLoopData = $jabatans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $jbt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($jbt->id); ?>" data-tahun="<?php echo e($jbt->nama_jabatan); ?>">
                                                <?php echo e($jbt->nama_jabatan); ?></option>
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
                                    <label for="alamat"><strong>Detail Alamat</strong></label>
                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control"
                                        placeholder="Detail Alamat: Jalan, RT, RW"></textarea>
                                    <?php $__errorArgs = ['alamat'];
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

                            <div class="col-md-6 ">
                                <div class="form-group">
                                    <label for="jenis_kelamin"><strong>Jenis Kelamin <span
                                                style="color: red">*</span></strong></label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" class="form-control select2">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
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
                                        class="form-control ">
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
                                    <input type="number" name="no_telp" id="no_telp" class="form-control"
                                        placeholder="No Handphone">
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
                                    <label for="pas_foto"><strong>Pas Foto</strong> <small class="text-muted">Maksimal
                                            2Mb</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pas_foto" name="pas_foto">
                                        <label class="custom-file-label" for="pas_foto">Upload Foto</label>
                                    </div>
                                    <?php $__errorArgs = ['pas_foto'];
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
                                    <label for="cv"><strong>CV</strong> <small class="text-muted">Maksimal
                                            2Mb</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cv" name="cv">
                                        <label class="custom-file-label" for="cv">Upload CV</label>
                                    </div>
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
                                    <label for="ktp"><strong>Identitas Pribadi (KTP/SIM/Passport)</strong> <small
                                            class="text-muted">Maksimal 2Mb</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ktp" name="ktp">
                                        <label class="custom-file-label" for="ktp">Upload KTP/SIM/Passport</label>
                                    </div>
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

                        <hr>
                        

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-md"><span class="fe fe-12 fe-save"></span>
                                Submit</button>
                            <button type="reset" class="btn btn-danger btn-md"><span class="fe fe-12 fe-x"></span>
                                Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views\admin\master\pegawai\create.blade.php ENDPATH**/ ?>