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
        Schema::create('bansos', function (Blueprint $table) {
            $table->id('bansos_id');
            $table->dateTime('tanggal_bansos');
            $table->string('nama_pengaju', 50);
            $table->unsignedBigInteger('kartu_keluarga_id');
            $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga');
            $table->integer('total_pendapatan');
            $table->integer('jumlah_tanggungan');
            $table->decimal('luas_rumah');
            $table->decimal('luas_tanah');
            $table->integer('jumlah_kendaraan');
            $table->decimal('jumlah_watt');
            $table->longText('foto_dapur')->nullable();
            $table->longText('foto_depan_rumah')->nullable();
            $table->longText('foto_kamar_mandi')->nullable();
            $table->longText('foto_kamar_tidur')->nullable();
            $table->longText('foto_kamar_tamu')->nullable();
            $table->string('status')->default('tidak menerima');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos');
    }
};
