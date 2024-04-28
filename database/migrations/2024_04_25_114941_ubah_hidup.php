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
        Schema::create('status_hidup', function (Blueprint $table) {
            $table->id('id_status_hidup');
            $table->unsignedBigInteger('penduduk_id')->index();
            $table->foreign('penduduk_id')->references('penduduk_id')->on('penduduk');
            $table->string('nama_pengaju', 50);
            $table->string('NIK_pengaju', 16);
            $table->string('nama_meninggal', 50);
            $table->string('NIK_meninggal', 16);
            $table->longText('foto_bukti')->nullable();
            $table->enum('status_pengajuan', ['diterima', 'menunggu','ditolak'])->default('menunggu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_hidup');
    }
};
