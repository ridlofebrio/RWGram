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
        Schema::create('kas', function (Blueprint $table) {
            $table->id('id_kas');
            $table->enum('pengelola', ['RT 01', 'RT 02','RT 03','RT 04','RW']);
            $table->unsignedBigInteger('kartu_keluarga_id')->index();
            $table->foreign('kartu_keluarga_id')->references('kartu_keluarga_id')->on('kartu_keluarga');
            $table->integer('tahun');
            $table->boolean('Januari')->default(false);
            $table->boolean('Februari')->default(false);
            $table->boolean('Maret')->default(false);
            $table->boolean('April')->default(false);
            $table->boolean('Mei')->default(false);
            $table->boolean('Juni')->default(false);
            $table->boolean('Juli')->default(false);
            $table->boolean('Agustus')->default(false);
            $table->boolean('September')->default(false);
            $table->boolean('Oktober')->default(false);
            $table->boolean('November')->default(false);
            $table->boolean('Desember')->default(false);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas');
    }
};
