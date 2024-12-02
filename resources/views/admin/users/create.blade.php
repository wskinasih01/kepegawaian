@extends('layouts.main')
@section('title', 'Manage User')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Tambah Data Users</h3>
            <a href="{{ route('admin.users.index') }}">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data Users</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><strong>Nama</strong></label>
                                    <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                        placeholder="Nama User">
                                    @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email"><strong>Email</strong></label>
                                    <input type="email" value="{{ old('email') }}" name="email" class="form-control"
                                        placeholder="Email">
                                    @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password"
                                        placeholder="Password">
                                    @error('password')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="confirm_password"
                                        name="confirm_password" placeholder="Konfirmasi Password">
                                    @error('confirm_password')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="profil"><strong>Foto Profil</strong> <small class="text-muted">Maksimal
                                            2Mb</small></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="profil" name="profil">
                                        <label class="custom-file-label" for="profil">Upload Foto</label>
                                    </div>
                                    @error('profil')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="row">
                                    @if ($roles->isNotEmpty())
                                        @foreach ($roles as $role)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input type="checkbox" id="role-{{ $role->id }}" class="rounded"
                                                            name="role[]" value="{{ $role->name }}">
                                                        <label for="role-{{ $role->id }}">{{ $role->name }}</label>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
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
