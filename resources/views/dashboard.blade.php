@extends('layouts.main')
@section('title', 'Dashboard')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            {{-- <div class="col-md-12 grid-margin"> --}}
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
                                @if ($pegawai->isEmpty())
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Pegawai yang Mendekati Pensiun
                                        </td>
                                    </tr>
                                @else
                                    @php
                                        $waktuSaatIni = Carbon\Carbon::now();
                                        $pegawai = $pegawai->sortBy(function ($pgw) use ($usiaPensiun) {
                                            $tanggalLahir = Carbon\Carbon::parse($pgw->tanggal_lahir_pegawai);
                                            return $tanggalLahir->copy()->addYears($usiaPensiun);
                                        });
                                    @endphp
                                    @foreach ($pegawai as $pgw)
                                        @php
                                            $tanggalLahir = Carbon\Carbon::parse($pgw->tanggal_lahir_pegawai);
                                            $tahunBulanHari = $tanggalLahir->diff($waktuSaatIni);
                                            $tanggalPensiun = $tanggalLahir->copy()->addYears($usiaPensiun);
                                        @endphp
                                        <tr>
                                            <td>{{ $pgw->nama_pegawai }}</td>
                                            <td>{{ $tahunBulanHari->y }} tahun, {{ $tahunBulanHari->m }} bulan,
                                                {{ $tahunBulanHari->d }} hari</td>
                                            <td>{{ $tanggalPensiun->locale('id')->translatedFormat('j F Y') }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
            {{-- </div> --}}

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
                data: [{{ $laki2 }}, {{ $perempuan }}],
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
@endsection
