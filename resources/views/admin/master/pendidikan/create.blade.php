@extends('layouts.main')
@section('title', 'Data Master Pendidikan')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Tambah Data Pendidikan</h3>
            <a href="{{ route('admin.master.pendidikan.index') }}">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data Pendidikan</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('pendidikan.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="pendidikan">Pendidikan</label>
                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan"
                                        placeholder="Pendidikan, Contoh: S1">
                                    @error('pendidikan')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
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
@endsection
