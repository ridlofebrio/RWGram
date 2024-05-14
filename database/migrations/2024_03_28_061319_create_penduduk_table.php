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
        Schema::create('penduduk', function (Blueprint $table) {
            $table->id('penduduk_id');
            $table->unsignedBigInteger('kartu_keluarga_id')->index();
            $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga');
            $table->string('NIK', 16)->unique();
            $table->string('nama_penduduk', 50);
            $table->date('tanggal_lahir');
            $table->enum('status_perkawinan', ['kawin', 'belum kawin', 'cerai hidup', 'cerai mati']);
            $table->char('jenis_kelamin', 1);
            $table->enum('golongan_darah', ['a', 'b', 'ab', 'o']);
            $table->string('tempat_lahir', 20);
            $table->string('alamat', 100);
            $table->string('agama', 10);
            $table->string('pekerjaan', 40);
            $table->enum('status_tinggal', ['tetap', 'kontrak', 'pindah']);
            $table->boolean('status_kematian');
            $table->boolean('isDelete')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
