
<?php $__env->startSection('title', 'Data Master Pegawai'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Data Pegawai</h3>
            <a href="<?php echo e(route('admin.master.pegawai.index')); ?>">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="biodata">
                    <div class="row d-flex justify-content-between align-items-center mb-12">
                        <div class="col">
                            <h5 class="font-body-1 m-0">Data Pribadi</h5>
                        </div>
                        <div class="col-auto d-inline-flex">
                            <button class="btn btn-outline-primary btn-md border-primary" data-toggle="modal"
                                data-target="#data-pribadi-modals" data-id="<?php echo e($pegawais->id); ?>">
                                <span class="fe fe-12 fe-edit"></span> Edit
                            </button>
                        </div>
                    </div>
                    <div class="row-mb-4">
                        <div class="col-md-2">
                            <?php if(isset($pegawais->pas_foto) && $pegawais->pas_foto): ?>
                                <img src="<?php echo e(asset('storage/' . $pegawais->pas_foto)); ?>" class="avatar-img rounded-circle"
                                    alt="Profile picture" style="width: 125px; height: 125px; object-fit: cover;">
                            <?php else: ?>
                                <img src="<?php echo e(asset('assets/assets/avatars/face-1.jpg')); ?>" class="avatar-img rounded-circle"
                                    alt="Default Profile picture" style="width: 125px; height: 125px; object-fit: cover;">
                            <?php endif; ?>
                        </div>
                    </div>
                    <br>
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4 mb-4"><strong>Nama Lengkap</strong> <span
                                        class="d-block"><?php echo e($pegawais->nama_pegawai); ?></span></div>
                                <div class="col-md-4 mb-4"><strong>NIK</strong> <span
                                        class="d-block"><?php echo e($pegawais->nik); ?></span></div>
                                <div class="col-md-4 mb-4"><strong>Jenis Kelamin</strong> <span
                                        class="d-block"><?php echo e($pegawais->jenis_kelamin); ?></span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4"><strong>Tempat, Tanggal Lahir</strong> <span
                                        class="d-block"><?php echo e($pegawais->tempat_lahir_pegawai); ?>,
                                        <?php echo e(\Carbon\Carbon::parse($pegawais->tanggal_lahir_pegawai)->locale('id')->translatedFormat('j F Y')); ?></span>
                                </div>
                                <div class="col-md-4 mb-4"><strong>Alamat</strong> <span
                                        class="d-block"><?php echo e($pegawais->alamat); ?></span></div>
                                <div class="col-md-4 mb-4"><strong>No Handphone</strong> <span
                                        class="d-block"><?php echo e($pegawais->no_telp); ?></span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4"><strong>Email</strong> <span
                                        class="d-block"><?php echo e($pegawais->email); ?></span></div>
                                <div class="col-md-4 mb-4"><strong>Jabatan</strong> <span
                                        class="d-block"><?php echo e($pegawais->jabatan->nama_jabatan); ?></span></div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4"><strong>CV</strong>
                                    <?php if($pegawais->cv): ?>
                                        <span class="d-block"><a href="<?php echo e(asset('storage/' . $pegawais->cv)); ?>"
                                                target="_blank">Download CV</a></span>
                                    <?php else: ?>
                                        <span class="d-block">Belum ada CV yang diupload</span>
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-4 mb-4"><strong>Identitas Pribadi (KTP/SIM/Passport)</strong>
                                    <?php if($pegawais->ktp): ?>
                                        <span class="d-block"><a href="<?php echo e(asset('storage/' . $pegawais->ktp)); ?>"
                                                target="_blank">Download KTP</a></span>
                                    <?php else: ?>
                                        <span class="d-block">Belum ada kartu identitas yang diupload</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>

            
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="pendidikan">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Riwayat Pendidikan</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-pendidikan-modals" data-id="<?php echo e($pegawais->id); ?>"> <span
                                class="fe fe-12 fe-edit"></span> Tambah
                            Riwayat Pendidikan</button>
                    </div>
                    <br>
                    <?php $__currentLoopData = $riwayatPendidikan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pendidikan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row d-flex justify-content-between align-items-center mb-12">
                            <div class="col">
                                <h6 class="font-paragraph-4 m-0">
                                    <?php echo e($pendidikan->institusi); ?>

                                    <br class="d-block d-sm-none">
                                    <span
                                        class="btn btn-info btn-sm"><?php echo e(\Carbon\Carbon::parse($pendidikan->tahun_lulus)->translatedFormat('Y')); ?></span>
                                </h6>
                                <p class="m-0">
                                    <?php echo e($pendidikan->pendidikan->pendidikan); ?>, <?php echo e($pendidikan->jurusan); ?>, GPA:
                                    <?php echo e($pendidikan->ipk); ?>

                                </p>
                                <?php if($pendidikan->ijazah): ?>
                                    <span class="d-block"><a href="<?php echo e(asset('storage/' . $pendidikan->ijazah)); ?>"
                                            target="_blank">Download Ijazah</a></span>
                                <?php else: ?>
                                    <span class="d-block">Belum ada ijazah yang diupload</span>
                                <?php endif; ?>
                                <br>
                            </div>
                            <div class="col-auto d-inline-flex">
                                <div class="row ">
                                    <div class="form-group">
                                        <button href="javascript:;" class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#data-pendidikan-edit-modals-<?php echo e($pendidikan->id ?? ''); ?>">
                                            <span class="fe fe-12 fe-edit"></span></button>
                                        <form action="<?php echo e(route('pegawai.data-pendidikan.destroy', $pendidikan->id)); ?>"
                                            method="POST" style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="pegawai_id" value="<?php echo e($pegawais->id); ?>">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('admin.master.pegawai.modals.data_pendidikan_edit_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>


            
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="pekerjaan">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Riwayat Pekerjaan</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-pekerjaan-modals" data-id="<?php echo e($pegawais->id); ?>"> <span
                                class="fe fe-12 fe-edit"></span> Tambah
                            Riwayat Pekerjaan</button>
                    </div>
                    <br>
                    <?php $__currentLoopData = $riwayatKerja; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pekerjaan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row d-flex justify-content-between align-items-center mb-12">
                            <div class="col">
                                <h6 class="font-paragraph-4 m-0">
                                    <?php echo e($pekerjaan->nama_perusahaan); ?> -
                                    <br class="d-block d-sm-none">
                                    <?php echo e($pekerjaan->jabatan); ?>

                                </h6>
                                <span
                                    class="m-0"><?php echo e(\Carbon\Carbon::parse($pekerjaan->tgl_mulai)->translatedFormat('j M Y')); ?>

                                    -
                                    <?php echo e(\Carbon\Carbon::parse($pekerjaan->tgl_selesai)->translatedFormat('j M Y')); ?></span>
                                <p class="m-0">
                                    <?php if($pekerjaan->alamat == ''): ?>
                                        - <br>
                                    <?php else: ?>
                                        <?php echo e($pekerjaan->alamat); ?> <br>
                                    <?php endif; ?>
                                    <?php echo e($pekerjaan->jenis_pengalaman); ?> <br>
                                    <?php echo e($pekerjaan->deskripsi); ?>

                                </p>
                                <?php if($pekerjaan->surat_pengalaman_kerja): ?>
                                    <span class="d-block"><a
                                            href="<?php echo e(asset('storage/' . $pekerjaan->surat_pengalaman_kerja)); ?>"
                                            target="_blank">Download Surat Pengalaman Kerja</a></span>
                                <?php else: ?>
                                    <span class="d-block">Belum ada surat pengalaman kerja yang diupload</span>
                                <?php endif; ?>
                                <br>
                            </div>
                            <div class="col-auto d-inline-flex">
                                <div class="row ">
                                    <div class="form-group">
                                        <button href="javascript:;" class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#data-pekerjaan-edit-modals-<?php echo e($pekerjaan->id ?? ''); ?>">
                                            <span class="fe fe-12 fe-edit"></span></button>
                                        <form action="<?php echo e(route('pegawai.data-pekerjaan.destroy', $pekerjaan->id)); ?>"
                                            method="POST" style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="pegawai_id" value="<?php echo e($pegawais->id); ?>">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('admin.master.pegawai.modals.riwayat_pekerjaan_edit_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="pelatihan">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Pelatihan</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-pelatihan-modals" data-id="<?php echo e($pegawais->id); ?>"> <span
                                class="fe fe-12 fe-edit"></span> Tambah Pelatihan</button>
                    </div>
                    <br>
                    <?php $__currentLoopData = $pelatihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelatihanss): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row d-flex justify-content-between align-items-center mb-12">
                            <div class="col">
                                <h6 class="font-paragraph-4 m-0">
                                    <?php echo e($pelatihanss->nama_pelatihan); ?>

                                    <br class="d-block d-sm-none">
                                    <span
                                        class="btn btn-info btn-sm"><?php echo e(\Carbon\Carbon::parse($pelatihanss->tgl_pelatihan)->translatedFormat('j F Y')); ?></span>
                                </h6>
                                <p class="m-0">
                                    Topik: <?php echo e($pelatihanss->topik_pelatihan); ?>

                                    <br>Lokasi: <?php echo e($pelatihanss->lokasi); ?>

                                </p>
                                <?php if($pelatihanss->sertifikat): ?>
                                    <span class="d-block"><a href="<?php echo e(asset('storage/' . $pelatihanss->sertifikat)); ?>"
                                            target="_blank">Sertifikat Pelatihan</a></span>
                                <?php else: ?>
                                    <span class="d-block">Belum ada sertifikat pelatihan yang diupload</span>
                                <?php endif; ?>
                                <br>
                            </div>
                            <div class="col-auto d-inline-flex">
                                <div class="row ">
                                    <div class="form-group">
                                        <button href="javascript:;" class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal"
                                            data-target="#data-pelatihan-edit-modals-<?php echo e($pelatihanss->id ?? ''); ?>">
                                            <span class="fe fe-12 fe-edit"></span></button>
                                        <form action="<?php echo e(route('pegawai.data-pelatihan.destroy', $pelatihanss->id)); ?>"
                                            method="POST" style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="pegawai_id" value="<?php echo e($pegawais->id); ?>">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('admin.master.pegawai.modals.pelatihan_edit_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="sip">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Surat Izin Profesi (STR/SIP/SIPA/DLL)</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-sip-modals" data-id="<?php echo e($pegawais->id); ?>"> <span
                                class="fe fe-12 fe-edit"></span> Tambah Surat Izin
                            Profesi</button>
                    </div>
                    <br>
                    <?php $__currentLoopData = $suratIzinProfesi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sip): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row d-flex justify-content-between align-items-center mb-12">
                            <div class="col">
                                <h6 class="font-paragraph-4 m-0">
                                    <?php echo e($sip->jenis_dokumen); ?>

                                </h6>
                                <p class="m-0">
                                    No. Sertifikat : <?php echo e($sip->no_sertifikat); ?>

                                    <br>
                                    Tanggal Berlaku:
                                    <?php echo e(\Carbon\Carbon::parse($sip->tgl_mulai)->translatedFormat('j M Y')); ?> -
                                    <?php echo e(\Carbon\Carbon::parse($sip->tgl_selesai)->translatedFormat('j M Y')); ?>

                                </p>
                                <?php if($sip->dokumen): ?>
                                    <span class="d-block"><a href="<?php echo e(asset('storage/' . $sip->dokumen)); ?>"
                                            target="_blank"><?php echo e($sip->jenis_dokumen); ?></a></span>
                                <?php else: ?>
                                    <span class="d-block">Belum ada <?php echo e($sip->jenis_dokumen); ?> yang diupload</span>
                                <?php endif; ?>
                                <br>
                            </div>
                            <div class="col-auto d-inline-flex">
                                <div class="row ">
                                    <div class="form-group">
                                        <button href="javascript:;" class="btn btn-outline-primary btn-sm"
                                            data-toggle="modal" data-target="#data-sip-edit-modals-<?php echo e($sip->id ?? ''); ?>">
                                            <span class="fe fe-12 fe-edit"></span></button>
                                        <form action="<?php echo e(route('pegawai.data-surat-izin-profesi.destroy', $sip->id)); ?>"
                                            method="POST" style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="pegawai_id" value="<?php echo e($pegawais->id); ?>">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php echo $__env->make('admin.master.pegawai.modals.surat_izin_profesi_edit_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>

            
            <div class="mb-4">
                <div class="card my-4 f-s-14 py-4 px-4" id="dokumenLain">
                    <div class="mb-3">
                        <h5 class="font-body-1 m-0">Dokumen Lainnya</h5>
                    </div>
                    <div class="text-left">
                        <button href="javascript:;" class="btn btn-primary" data-toggle="modal"
                            data-target="#data-dokumen-lain-modals" data-id="<?php echo e($pegawais->id); ?>"> <span
                                class="fe fe-12 fe-edit"></span> Tambah Dokumen
                            Lainnya</button>
                    </div>
                    <br>
                    <table>
                        <thead>
                            <tr>
                                <th>Jenis Dokumen</th>
                                <th>Dokumen</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $dokumenLain; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $docs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($docs->jenis_dokumen); ?></td>
                                    <td>
                                        <?php if($docs->dokumen): ?>
                                            <span class="d-block"><a href="<?php echo e(asset('storage/' . $docs->dokumen)); ?>"
                                                    target="_blank">Dokumen <?php echo e($docs->jenis_dokumen); ?></a></span>
                                        <?php else: ?>
                                            <span class="d-block">Belum ada dokumen <?php echo e(strtolower($docs->jenis_dokumen)); ?>

                                                yang
                                                diupload</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="javascript:;" class="btn btn-outline-primary btn-sm" data-toggle="modal"
                                            data-target="#data-dokumen-lain-edit-modals-<?php echo e($docs->id ?? ''); ?>">
                                            <span class="fe fe-12 fe-edit"></span></a>
                                        <form action="<?php echo e(route('pegawai.data-dokumen-lain.destroy', $docs->id)); ?>"
                                            method="POST" style="display:inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <input type="hidden" name="pegawai_id" value="<?php echo e($pegawais->id); ?>">
                                            <button type="submit" class="btn btn-sm btn-danger remove-item-btn"><span
                                                    class="fe fe-trash-2 fe-12"></span></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php echo $__env->make('admin.master.pegawai.modals.dokumen_lain_edit_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <?php echo $__env->make('admin.master.pegawai.modals.data_pribadi_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.master.pegawai.modals.data_pendidikan_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.master.pegawai.modals.riwayat_pekerjaan_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.master.pegawai.modals.pelatihan_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.master.pegawai.modals.surat_izin_profesi_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.master.pegawai.modals.dokumen_lain_modals', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views/admin/master/pegawai/show.blade.php ENDPATH**/ ?>