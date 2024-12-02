
<?php $__env->startSection('title', 'Dashboard'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-12">
            
            <div class="card shadow mb-4">
                <div class="card-header">
                    <strong class="card-title">Pegawai yang Mendekati Pensiun</strong>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>Nama</th>
                                    <th>Usia</th>
                                    <th>Tanggal Pensiun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($pegawai->isEmpty()): ?>
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Pegawai yang Mendekati Pensiun
                                        </td>
                                    </tr>
                                <?php else: ?>
                                    <?php
                                        $waktuSaatIni = Carbon\Carbon::now();
                                        $pegawai = $pegawai->sortBy(function ($pgw) use ($usiaPensiun) {
                                            $tanggalLahir = Carbon\Carbon::parse($pgw->tanggal_lahir_pegawai);
                                            return $tanggalLahir->copy()->addYears($usiaPensiun);
                                        });
                                    ?>
                                    <?php $__currentLoopData = $pegawai; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pgw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $tanggalLahir = Carbon\Carbon::parse($pgw->tanggal_lahir_pegawai);
                                            $tahunBulanHari = $tanggalLahir->diff($waktuSaatIni);
                                            $tanggalPensiun = $tanggalLahir->copy()->addYears($usiaPensiun);
                                        ?>
                                        <tr>
                                            <td><?php echo e($pgw->nama_pegawai); ?></td>
                                            <td><?php echo e($tahunBulanHari->y); ?> tahun, <?php echo e($tahunBulanHari->m); ?> bulan,
                                                <?php echo e($tahunBulanHari->d); ?> hari</td>
                                            <td><?php echo e($tanggalPensiun->locale('id')->translatedFormat('j F Y')); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            

                    <div class="row my-4">
                        <div class="col-md-6 mb-4">
                            <div class="card shadow">
                                <div class="card-header">
                                    <strong class="card-title mb-0">Pegawai Berdasarkan Jenis Kelamin</strong>
                                </div>
                                <div class="card-body">
                                    <canvas id="genderPieChart" width="400" height="300"></canvas>
                                </div> <!-- /.card-body -->
                            </div> <!-- /.card -->
                        </div> <!-- /. col -->
                    </div> <!-- end section -->
        </div> <!-- .col-12 -->
    </div> <!-- .row -->
    <script>
        const ctx = document.getElementById('genderPieChart').getContext('2d');
        const data = {
            labels: ['Laki-laki', 'Perempuan'],
            datasets: [{
                label: 'Jumlah Pegawai',
                data: [<?php echo e($laki2); ?>, <?php echo e($perempuan); ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 99, 132, 0.5)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 1
            }]
        };

        const config = {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                let label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.raw;
                                return label;
                            }
                        }
                    }
                }
            }
        };

        new Chart(ctx, config);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\kepegawaian-crud-spatie2\resources\views\dashboard.blade.php ENDPATH**/ ?>