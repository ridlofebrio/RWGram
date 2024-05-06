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
        Schema::create('status_nikah', function (Blueprint $table) {
            $table->id('id_status_nikah');
            $table->unsignedBigInteger('penduduk_id')->index();
            $table->foreign('penduduk_id')->references('penduduk_id')->on('penduduk');
            $table->string('nama_pasangan', 50);
            $table->string('NIK_pasangan', 16);
            $table->enum('status', ['kawin', 'cerai']);
            $table->longText('foto_bukti')->nullable();
            $table->enum('status_pengajuan', ['diterima', 'menunggu','ditolak'])->default('menunggu');
            $table->boolean('terbaca')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status_nikah');
    }
};
