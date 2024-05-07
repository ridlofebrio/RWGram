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
        Schema::create('kartu_keluarga', function (Blueprint $table) {
            $table->id('kartu_keluarga_id');
            $table->unsignedBigInteger('rt_id')->index();
            $table->foreign('rt_id')->references('rt_id')->on('rt');
            $table->string('NKK', 16)->unique();
            $table->string('no_telepon', 20);
            $table->dateTime('tanggal_kk');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kartu_keluarga');
    }
};
