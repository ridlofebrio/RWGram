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
        Schema::create('umkm', function (Blueprint $table) {
            $table->id('umkm_id');
            $table->unsignedBigInteger('penduduk_id')->index();
            $table->foreign('penduduk_id')->references('penduduk_id')->on('penduduk');
            $table->string('nama_umkm', 50);
            $table->string('foto_umkm', 250)->nullable();
            $table->string('no_wa', 20);
            $table->string('link_medsos', 250)->nullable();
            $table->string('nama_medsos', 250)->nullable();
            $table->text('deskripsi_umkm');
            $table->string('lokasi_umkm', 100);
            $table->dateTime('tanggal_umkm');

            $table->enum('status_pengajuan', ['diterima', 'menunggu', 'ditolak'])->default('menunggu');

            $table->boolean('terbaca')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkm');
    }
};
