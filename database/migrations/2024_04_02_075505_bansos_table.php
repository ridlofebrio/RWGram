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
        Schema::create('bansos', function (Blueprint $table) {
            $table->id('bansos_id');
            $table->dateTime('tanggal_bansos');
            $table->string('nama_pengaju', 50);
            $table->unsignedBigInteger('kartu_keluarga_id');
            $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga');
            $table->double('c1');
            $table->double('c2');
            $table->double('c3');
            $table->double('c4');
            $table->double('c5');
            $table->double('c6');
            $table->longText('foto_dapur')->nullable();
            $table->longText('foto_depan_rumah')->nullable();
            $table->longText('foto_kamar_mandi')->nullable();
            $table->longText('foto_kamar_tidur')->nullable();
            $table->longText('foto_kamar_tamu')->nullable();
            $table->double('wsm')->default(0);
            $table->enum('status', ['menunggu', 'menerima', 'tidak menerima'])->default('menunggu');
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
