@extends('layouts.main')
@section('title', 'Manage User')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Edit Data Users</h3>
            <a href="{{ route('admin.users.index') }}">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Edit Data Users</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('users.update', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        @if (isset($user->profil) && $user->profil)
                                            <img src="{{ asset('storage/' . $user->profil) }}"
                                                class="avatar-img rounded-circle" alt="Profile picture"
                                                style="width: 125px; height: 125px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('assets/assets/avatars/face-1.jpg') }}"
                                                class="avatar-img rounded-circle" alt="Default Profile picture"
                                                style="width: 125px; height: 125px; object-fit: cover;">
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="profil"><strong>Foto Profil</strong> <small
                                                    class="text-muted">Maksimal
                                                    2Mb</small></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="profil"
                                                    name="profil">
                                                <label class="custom-file-label" for="profil">Upload Foto</label>
                                            </div>
                                            @if (isset($user->profil))
                                                <small class="text-muted">Current file:
                                                    {{ basename($user->profil) }}</small>
                                            @endif
                                            @error('profil')
                                                <p style="color: red">{{ $message }}</p>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="name"><strong>Nama</strong></label>
                                    <input type="text" value="{{ old('name', $user->name) }}" name="name"
                                        placeholder="Nama User" class="form-control">
                                    @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email"><strong>Email</strong></label>
                                    <input type="email" value="{{ old('email', $user->email) }}" name="email"
                                        placeholder="Email" class="form-control">
                                    @error('email')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password"><strong>Password</strong></label>
                                    <input type="text" name="password" class="form-control"
                                        placeholder="Password Baru (optional)">
                                    @error('password')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password"><strong>Konfirmasi Password</strong></label>
                                    <input type="text" name="confirm_password" class="form-control"
                                        placeholder="Konfirmasi Password">
                                    @error('confirm_password')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="row">
                                    @if ($roles->isNotEmpty())
                                        @foreach ($roles as $role)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-check">

                                                        <input {{ $hasRoles->contains($role->id) ? 'checked' : '' }}
                                                            type="checkbox" id="role-{{ $role->id }}" class="rounded"
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
