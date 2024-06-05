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
        Schema::create('kas_log', function (Blueprint $table) {
            $table->id('kas_log_id');
            $table->unsignedBigInteger('user_id')->index();
            $table->foreign('user_id')->references('user_id')->on('user');
            $table->integer('jumlah');
            $table->boolean('status_kas_log')->default(0);
            $table->string('keterangan_kas_log', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kas_log');
    }
};
