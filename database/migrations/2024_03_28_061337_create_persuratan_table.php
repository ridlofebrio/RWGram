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
        Schema::create('persuratan', function (Blueprint $table) {
            $table->id('persuratan_id');
            $table->unsignedBigInteger('penduduk_id')->index();
            $table->foreign('penduduk_id')->references('penduduk_id')->on('penduduk');
            $table->string('nomor_surat', 30);
            $table->string('keterangan', 50);
            $table->dateTime('tanggal_persuratan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persuratan');
    }
};
