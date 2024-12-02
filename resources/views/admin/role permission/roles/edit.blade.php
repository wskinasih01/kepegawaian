@extends('layouts.main')
@section('title', 'Manage Roles')

@section('content')
    <div class="row justify-content-center">
        <div class="col-12">
            <h3 class="page-title">Edit Data Roles</h3>
            <a href="{{ route('admin.role permission.roles.index') }}">
                <button type="button" class="btn btn-secondary btn-md btn-icon-split mt-1 mb-2"><span
                        class="fe fe-12 fe-chevron-left"></span> Kembali </button>
            </a>
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Edit Data Roles</strong>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('roles.update', $roles->id) }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name"><strong>Roles</strong></label>
                                    <input type="text" value="{{ old('name', $roles->name) }}" name="name"
                                        placeholder="Contoh: Admin" class="form-control">
                                    @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="row">
                                    @if ($permissions->isNotEmpty())
                                        @foreach ($permissions as $permission)
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input
                                                            {{ $hasPermissions->contains($permission->name) ? 'checked' : '' }}
                                                            type="checkbox" id="permission-{{ $permission->id }}"
                                                            class="rounded" name="permission[]"
                                                            value="{{ $permission->name }}">
                                                        <label
                                                            for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
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
