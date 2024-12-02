    
    <div class="modal fade" id="data-pekerjaan-modals" tabindex="-1" role="dialog"
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
                    <form method="POST" action="<?php echo e(route('pegawai.data-pekerjaan.store')); ?>" id="store-form"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="nama_pegawai" name="nama_pegawai"
                            value="<?php echo e($pegawais->nama_pegawai); ?>">
                        <input type="hidden" id="pegawai_id" name="pegawai_id" value="<?php echo e($pegawais->id); ?>">

                        <div class="form-group">
                            <label for="jabatan"><strong>Jabatan</strong></label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control"
                                placeholder="Jabatan">
                            <?php $__errorArgs = ['jabatan'];
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
                            <label for="nama_perusahaan"><strong>Nama Perusahaan<span
                                        style="color: red">*</span></strong></label>
                            <input type="text" name="nama_perusahaan" id="nama_perusahaan" class="form-control"
                                placeholder="Nama Perusahaan">
                            <?php $__errorArgs = ['nama_perusahaan'];
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
                            <label for="alamat_perusahaan"><strong>Alamat<span
                                        style="color: red">*</span></strong></label>
                            <textarea name="alamat_perusahaan" id="alamat_perusahaan" cols="30" rows="3" class="form-control"
                                placeholder="Alamat Perusahaan"></textarea>
                            <?php $__errorArgs = ['alamat_perusahaan'];
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
                            <label for="jenis_pengalaman"><strong>Jenis Pengalaman<span
                                        style="color: red">*</span></strong></label>
                            <select name="jenis_pengalaman" id="jenis_pengalaman" class="form-control">
                                <option value="">Pilih Jenis Pengalaman</option>
                                <option value="Internship">Internship</option>
                                <option value="Freelance">Freelance</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Full Time">Full Time</option>
                            </select>
                        </div>
                        <?php $__errorArgs = ['jenis_pengalaman'];
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
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="tgl_mulai"><strong>Tanggal
                                            Mulai</strong></label>
                                    <input type="date" name="tgl_mulai" id="tgl_mulai" class="form-control">
                                    <?php $__errorArgs = ['tgl_mulai'];
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

                                <div class="col-md-6">
                                    <label for="tgl_selesai"><strong>Tanggal
                                            Selesai</strong></label>
                                    <input type="date" name="tgl_selesai" id="tgl_selesai" class="form-control">
                                    <?php $__errorArgs = ['tgl_selesai'];
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
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"
                                placeholder="Tuliskan deskripsi singkat tentang pengalaman atau kegiatan sebelumnya"></textarea>
                            <?php $__errorArgs = ['deskripsi'];
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
                            <label for="surat_pengalaman_kerja">Surat Pengalaman Kerja</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="surat_pengalaman_kerja"
                                    name="surat_pengalaman_kerja">
                                <label class="custom-file-label" for="surat_pengalaman_kerja">Upload Surat Pengalaman
                                    Kerja</label>
                            </div>
                            <?php $__errorArgs = ['surat_pengalaman_kerja'];
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
<?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views\admin\master\pegawai\modals\riwayat_pekerjaan_modals.blade.php ENDPATH**/ ?>