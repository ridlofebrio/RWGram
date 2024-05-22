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
        Schema::create('detail_kas', function (Blueprint $table) {
            $table->id('id_detail_kas');
            $table->unsignedBigInteger('id_kas')->index();
            $table->foreign('id_kas')->references('id_kas')->on('kas');
            $table->integer('jumlah_kas');
            $table->date('tanggal_kas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kas');
    }
};
