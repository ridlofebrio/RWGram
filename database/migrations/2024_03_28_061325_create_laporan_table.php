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
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('laporan_id');
            $table->unsignedBigInteger('penduduk_id')->index();
            $table->foreign('penduduk_id')->references('penduduk_id')->on('penduduk');
            $table->text('deskripsi_laporan');
            $table->string('foto_laporan', 250)->nullable();
            $table->string('asset_id', 250)->nullable();

            $table->enum('status_laporan', ['Menunggu', 'Selesai', 'Proses', 'Ditolak']);
            $table->dateTime('tanggal_laporan');
            $table->text('pesan')->nullable();
            $table->boolean('terbaca')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan');
    }
};
