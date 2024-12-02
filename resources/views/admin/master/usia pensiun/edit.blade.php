@extends('layouts.main')
@section('title', 'Data Usia Pensiun')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Edit Data Usia Pensiun</h3>
            <a href="{{ route('admin.master.usia pensiun.index') }}">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Edit Data Usia Pensiun</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('usia pensiun.update', $usias->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="usia">Usia Pensiun</label>
                                    <input type="text" class="form-control" id="usia" name="usia"
                                        placeholder="Usia Pensiun" value="{{ old('usia', $usias->usia) }}">
                                        @error('usia')
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
