<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama_pegawai');
            $table->string('tempat_lahir_pegawai');
            $table->date('tanggal_lahir_pegawai');
            $table->string('jenis_kelamin')->nullable();
            $table->string('no_telp');
            $table->string('email')->nullable();
            $table->foreignId('jabatan_id')->nullable()
            ->constrained('jabatan')
            ->onDelete('cascade');
            $table->string('provinsi')->nullable();
            $table->string('kota_kab')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pas_foto')->nullable();
            $table->string('cv')->nullable();
            $table->string('ktp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
