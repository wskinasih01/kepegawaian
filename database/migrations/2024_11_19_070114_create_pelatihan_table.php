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
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pegawai_id')->nullable()
                ->constrained('pegawai')
                ->onDelete('cascade');
            $table->string('nama_pelatihan');
            $table->string('topik_pelatihan')->nullable();
            $table->string('lokasi')->nullable();
            $table->date('tgl_pelatihan')->nullable();
            $table->string('sertifikat')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelatihan');
    }
};
