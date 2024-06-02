<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('status_tinggal', function (Blueprint $table) {
            $table->id('id_status_tinggal');
            $table->unsignedBigInteger('penduduk_id')->index();
            $table->foreign('penduduk_id')->references('penduduk_id')->on('penduduk');
            $table->string('alamat_pindah', 50);
            $table->enum('status', ['kontrak', 'tetap', 'keluar']);
            $table->longText('foto_bukti')->nullable();
            $table->string('asset_id', 250)->nullable();
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
        Schema::dropIfExists('status_tinggal');
    }
};
