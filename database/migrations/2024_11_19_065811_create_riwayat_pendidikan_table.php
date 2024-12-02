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
        Schema::create('riwayat_pendidikan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')
                ->constrained('pegawai')
                ->onDelete('cascade');
            $table->foreignId('jenjang_pendidikan_id')->nullable()
                ->constrained('pendidikan')
                ->onDelete('cascade');
            $table->string('institusi');
            $table->string('jurusan');
            $table->string('tahun_lulus');
            $table->string('ipk')->nullable();
            $table->string('ijazah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_pendidikan');
    }
};
