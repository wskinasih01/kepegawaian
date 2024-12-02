@extends('layouts.main')
@section('title', 'Manage Permissions')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Tambah Data Permissions</h3>
            <a href="{{ route('admin.role permission.permissions.index') }}">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="row">
                <div class="col-md-6">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data Permissions</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('permissions.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><strong>Permissions</strong></label>
                                    <input type="text" value="{{ old('name') }}" name="name"
                                        placeholder="Contoh: roles-list" class="form-control">
                                    @error('name')
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
