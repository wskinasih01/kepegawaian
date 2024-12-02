<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\SuratIzinProfesiController;
use App\Http\Controllers\UsiaPensiunController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenLainController;
use App\Http\Controllers\RiwayatPekerjaanController;
use App\Http\Controllers\RiwayatPendidikanController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
  return redirect()->route('login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

  //    permissions routes
  Route::get('/permissions/', [PermissionController::class, 'index'])->name('admin.role permission.permissions.index');
  Route::get('/permissions/create', [PermissionController::class, 'create'])->name('permissions.create');
  Route::post('/permissions/store', [PermissionController::class, 'store'])->name('permissions.store');
  Route::get('/permissions/edit/{id}', [PermissionController::class, 'edit'])->name('permissions.edit');
  Route::post('/permissions/update/{id}', [PermissionController::class, 'update'])->name('permissions.update');
  Route::delete('/permissions/delete/{id}', [PermissionController::class, 'destroy'])->name('permissions.destroy');

  // roles routes
  Route::get('/roles/', [RoleController::class, 'index'])->name('admin.role permission.roles.index');
  Route::get('/roles/create', [RoleController::class, 'create'])->name('roles.create');
  Route::post('/roles/store', [RoleController::class, 'store'])->name('roles.store');
  Route::get('/roles/edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
  Route::post('/roles/update/{id}', [RoleController::class, 'update'])->name('roles.update');
  Route::delete('/roles/delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

  // users routes
  Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
  Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
  Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
  Route::get('/users/show', [UserController::class, 'show'])->name('users.show');
  Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
  Route::post('/users/update/{id}', [UserController::class, 'update'])->name('users.update');
  Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->name('users.destroy');

  // pendidikan routes
  Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('admin.master.pendidikan.index');
  Route::get('/pendidikan/create', [PendidikanController::class, 'create'])->name('pendidikan.create');
  Route::post('/pendidikan/store', [PendidikanController::class, 'store'])->name('pendidikan.store');
  Route::get('/pendidikan/edit/{id}', [PendidikanController::class, 'edit'])->name('pendidikan.edit');
  Route::put('/pendidikan/update/{id}', [PendidikanController::class, 'update'])->name('pendidikan.update');
  Route::delete('/pendidikan/delete/{id}', [PendidikanController::class, 'destroy'])->name('pendidikan.destroy');

  // jabatan routes
  Route::get('/jabatan', [JabatanController::class, 'index'])->name('admin.master.jabatan.index');
  Route::get('/jabatan/create', [JabatanController::class, 'create'])->name('jabatan.create');
  Route::post('/jabatan/store', [JabatanController::class, 'store'])->name('jabatan.store');
  Route::get('/jabatan/edit/{id}', [JabatanController::class, 'edit'])->name('jabatan.edit');
  Route::put('/jabatan/update/{id}', [JabatanController::class, 'update'])->name('jabatan.update');
  Route::delete('/jabatan/delete/{id}', [JabatanController::class, 'destroy'])->name('jabatan.destroy');

  // pegawai routes
  Route::get('/pegawai', [PegawaiController::class, 'index'])->name('admin.master.pegawai.index');
  Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('pegawai.create');
  Route::post('/pegawai/data-pribadi/store', [PegawaiController::class, 'store'])->name('pegawai.data-pribadi.store');
  Route::get('/pegawai/show/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
  Route::put('/pegawai/data-pribadi/update/{id}', [PegawaiController::class, 'update'])->name('pegawai.data-pribadi.update');

  Route::post('/pegawai/data-pendidikan/store', [RiwayatPendidikanController::class, 'store'])->name('pegawai.data-pendidikan.store');
  Route::get('/pegawai/data-pendidikan/{id}', [RiwayatPendidikanController::class, 'getPendidikanById']);
  Route::put('/pegawai/data-pendidikan/update/{id}', [RiwayatPendidikanController::class, 'update'])->name('pegawai.data-pendidikan.update');
  Route::delete('pegawai/data-pendidikan/delete/{id}', [RiwayatPendidikanController::class, 'destroy'])->name('pegawai.data-pendidikan.destroy');

  Route::post('/pegawai/data-pekerjaan/store', [RiwayatPekerjaanController::class, 'store'])->name('pegawai.data-pekerjaan.store');
  Route::put('/pegawai/data-pekerjaan/update/{id}', [RiwayatPekerjaanController::class, 'update'])->name('pegawai.data-pekerjaan.update');
  Route::delete('pegawai/data-pekerjaan/delete/{id}', [RiwayatPekerjaanController::class, 'destroy'])->name('pegawai.data-pekerjaan.destroy');

  Route::post('/pegawai/data-pelatihan/store', [PelatihanController::class, 'store'])->name('pegawai.data-pelatihan.store');
  Route::put('/pegawai/data-pelatihan/update/{id}/', [PelatihanController::class, 'update'])->name('pegawai.data-pelatihan.update');
  Route::delete('/pegawai/data-pelatihan/delete/{id}/', [PelatihanController::class, 'destroy'])->name('pegawai.data-pelatihan.destroy');

  Route::post('/pegawai/data-surat-izin-profesi/store', [SuratIzinProfesiController::class, 'store'])->name('pegawai.data-surat-izin-profesi.store');
  Route::put('/pegawai/data-surat-izin-profesi/update/{id}/', [SuratIzinProfesiController::class, 'update'])->name('pegawai.data-surat-izin-profesi.update');
  Route::delete('/pegawai/data-surat-izin-profesi/delete/{id}/', [SuratIzinProfesiController::class, 'destroy'])->name('pegawai.data-surat-izin-profesi.destroy');

  Route::post('/pegawai/data-dokumen-lain/store', [DokumenLainController::class, 'store'])->name('pegawai.data-dokumen-lain.store');
  Route::put('/pegawai/data-dokumen-lain/update/{id}/', [DokumenLainController::class, 'update'])->name('pegawai.data-dokumen-lain.update');
  Route::delete('/pegawai/data-dokumen-lain/delete/{id}/', [DokumenLainController::class, 'destroy'])->name('pegawai.data-dokumen-lain.destroy');

  Route::delete('/pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('pegawai.destroy');

  // usia pensiun routes
  Route::get('/usia-pensiun', [UsiaPensiunController::class, 'index'])->name('admin.master.usia pensiun.index');
  Route::get('/usia-pensiun/create', [UsiaPensiunController::class, 'create'])->name('usia pensiun.create');
  Route::post('/usia-pensiun/store', [UsiaPensiunController::class, 'store'])->name('usia pensiun.store');
  Route::get('/usia-pensiun/edit/{id}', [UsiaPensiunController::class, 'edit'])->name('usia pensiun.edit');
  Route::put('/usia-pensiun/update/{id}', [UsiaPensiunController::class, 'update'])->name('usia pensiun.update');
  Route::delete('/usia-pensiun/delete/{id}', [UsiaPensiunController::class, 'destroy'])->name('usia pensiun.destroy');
});

