@extends('layouts.main')
@section('title', 'Data Pegawai')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Data Pegawai</h3>
            <a href="{{ route('admin.master.pegawai.index') }}">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="card my-4">
                <div class="card-header">
                    <strong>Tambah Data Pegawai</strong>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('pegawai.data-pribadi.store') }}" enctype="multipart/form-data">
                        @csrf
                        <h5>Biodata Pribadi</h5>
                        <div class="form-group">
                            <label for="nama_pegawai"><strong>Nama Lengkap <span
                                        style="color: red">*</span></strong></label>
                            <input type="text" name="nama_pegawai" id="nama_pegawai" class="form-control "
                                placeholder="Nama Pegawai">
                            @error('nama_pegawai')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nik"><strong>NIK <span style="color: red">*</span></strong></label>
                                    <input type="number" name="nik" id="nik" class="form-control "
                                        placeholder="NIK">
                                    @error('nik')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="tempat_lahir_pegawai"><strong>Tempat Lahir <span
                                                style="color: red">*</span></strong></label>
                                    <input type="text" name="tempat_lahir_pegawai" id="tempat_lahir_pegawai"
                                        class="form-control " placeholder="Tempat Lahir">
                                    @error('tempat_lahir_pegawai')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email"><strong>Email <span style="color: red">*</span></strong></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="Email">
                                    @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jabatan_id"><strong>Jabatan</strong></label>
                                    <select name="jabatan_id" id="jabatan_id" class="form-control select2">
                                        <option value="">Pilih Jabatan</option>
                                        @foreach ($jabatans as $jbt)
                                            <option value="{{ $jbt->id }}" data-tahun="{{ $jbt->nama_jabatan }}">
                                                {{ $jbt->nama_jabatan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('jabatan_id')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="alamat"><strong>Detail Alamat</strong></label>
                                    <textarea name="alamat" id="" cols="30" rows="5" class="form-control"
                                        placeholder="Detail Alamat: Jalan, RT, RW"></textarea>
                                    @error('alamat')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
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
                                @error('jenis_kelamin')
                                    <p style="color: red">{{ $message }}</p>
                                @enderror

                                <div class="form-group">
                                    <label for="tanggal_lahir_pegawai"><strong>Tanggal Lahir <span
                                                style="color: red">*</span></strong></label>
                                    <input type="date" name="tanggal_lahir_pegawai" id="tanggal_lahir_pegawai"
                                        class="form-control ">
                                    @error('tanggal_lahir_pegawai')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="no_telp"><strong>No Handphone <span
                                                style="color: red">*</span></strong></label>
                                    <input type="number" name="no_telp" id="no_telp" class="form-control"
                                        placeholder="No Handphone">
                                    @error('no_telp')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pas_foto"><strong>Pas Foto</strong> <small class="text-muted">Maksimal
                                            2Mb</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="pas_foto" name="pas_foto">
                                        <label class="custom-file-label" for="pas_foto">Upload Foto</label>
                                    </div>
                                    @error('pas_foto')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="cv"><strong>CV</strong> <small class="text-muted">Maksimal
                                            2Mb</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="cv" name="cv">
                                        <label class="custom-file-label" for="cv">Upload CV</label>
                                    </div>
                                    @error('cv')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="ktp"><strong>Identitas Pribadi (KTP/SIM/Passport)</strong> <small
                                            class="text-muted">Maksimal 2Mb</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ktp" name="ktp">
                                        <label class="custom-file-label" for="ktp">Upload KTP/SIM/Passport</label>
                                    </div>
                                    @error('ktp')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                            </div>

                        </div>

                        <hr>
                        {{-- <h5>Alamat Domisili</h5>
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="provinsi"><strong>Provinsi <span
                                                style="color: red">*</span></strong></label>
                                    <select name="provinsi" id="select2-provinsi" class="form-control select2">
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kota_kab"><strong>Kota/Kabupaten</strong></label>
                                    <select name="kota_kab" id="select2-kabupaten" class="form-control select2">
                                        <option value="">Pilih Kota/Kabupaten</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kecamatan"><strong>Kecamatan</strong></label>
                                    <select name="kecamatan" id="select2-kecamatan" class="form-control select2">
                                        <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="kelurahan"><strong>Kelurahan</strong></label>
                                    <select name="kelurahan" id="select2-kelurahan" class="form-control select2">
                                        <option value="">Pilih Kelurahan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat"><strong>Detail Alamat</strong></label>
                            <textarea name="alamat" id="" cols="30" rows="5" class="form-control"
                                placeholder="Detail Alamat: Jalan, RT, RW"></textarea>
                        </div> --}}

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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            var urlProvinsi = "https://ibnux.github.io/data-indonesia/provinsi.json";
            var urlKabupaten = "https://ibnux.github.io/data-indonesia/kabupaten/";
            var urlKecamatan = "https://ibnux.github.io/data-indonesia/kecamatan/";
            var urlKelurahan = "https://ibnux.github.io/data-indonesia/kelurahan/";

            function clearOptions(id) {
                console.log("on clearOptions :" + id);

                //$('#' + id).val(null);
                $('#' + id).empty().trigger('change');
            }

            console.log('Load Provinsi...');
            $.getJSON(urlProvinsi, function(res) {

                res = $.map(res, function(obj) {
                    obj.text = obj.nama
                    return obj;
                });

                data = [{
                    id: "",
                    nama: "Pilih Provinsi",
                    text: "Pilih Provinsi"
                }].concat(res);

                //implemen data ke select provinsi
                $("#select2-provinsi").select2({
                    dropdownAutoWidth: true,
                    width: '100%',
                    data: data
                })
            });

            var selectProv = $('#select2-provinsi');
            $(selectProv).change(function() {
                var value = $(selectProv).val();
                clearOptions('select2-kabupaten');

                if (value) {
                    console.log("on change selectProv");

                    var text = $('#select2-provinsi :selected').text();
                    console.log("value = " + value + " / " + "text = " + text);

                    console.log('Load Kabupaten di ' + text + '...')
                    $.getJSON(urlKabupaten + value + ".json", function(res) {

                        res = $.map(res, function(obj) {
                            obj.text = obj.nama
                            return obj;
                        });

                        data = [{
                            id: "",
                            nama: "- Pilih Kabupaten -",
                            text: "- Pilih Kabupaten -"
                        }].concat(res);

                        //implemen data ke select provinsi
                        $("#select2-kabupaten").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            data: data
                        })
                    })
                }
            });

            var selectKab = $('#select2-kabupaten');
            $(selectKab).change(function() {
                var value = $(selectKab).val();
                clearOptions('select2-kecamatan');

                if (value) {
                    console.log("on change selectKab");

                    var text = $('#select2-kabupaten :selected').text();
                    console.log("value = " + value + " / " + "text = " + text);

                    console.log('Load Kecamatan di ' + text + '...')
                    $.getJSON(urlKecamatan + value + ".json", function(res) {

                        res = $.map(res, function(obj) {
                            obj.text = obj.nama
                            return obj;
                        });

                        data = [{
                            id: "",
                            nama: "Pilih Kecamatan",
                            text: "Pilih Kecamatan"
                        }].concat(res);

                        //implemen data ke select provinsi
                        $("#select2-kecamatan").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            data: data
                        })
                    })
                }
            });

            var selectKec = $('#select2-kecamatan');
            $(selectKec).change(function() {
                var value = $(selectKec).val();
                clearOptions('select2-kelurahan');

                if (value) {
                    console.log("on change selectKec");

                    var text = $('#select2-kecamatan :selected').text();
                    console.log("value = " + value + " / " + "text = " + text);

                    console.log('Load Kelurahan di ' + text + '...')
                    $.getJSON(urlKelurahan + value + ".json", function(res) {

                        res = $.map(res, function(obj) {
                            obj.text = obj.nama
                            return obj;
                        });

                        data = [{
                            id: "",
                            nama: "Pilih Kelurahan",
                            text: "Pilih Kelurahan"
                        }].concat(res);

                        //implemen data ke select provinsi
                        $("#select2-kelurahan").select2({
                            dropdownAutoWidth: true,
                            width: '100%',
                            data: data
                        })
                    })
                }
            });

            var selectKel = $('#select2-kelurahan');
            $(selectKel).change(function() {
                var value = $(selectKel).val();

                if (value) {
                    console.log("on change selectKel");

                    var text = $('#select2-kelurahan :selected').text();
                    console.log("value = " + value + " / " + "text = " + text);
                }
            });
        });
    </script> --}}

@endsection
