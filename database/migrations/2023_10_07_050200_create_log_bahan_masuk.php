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
        Schema::create('log_bahan_masuk', function (Blueprint $table) {
            $table->id();
            $table->string('kode_bahan');
            $table->integer('jumlah_bahan');
            $table->integer('harga_total');
            $table->string('nama_bahan');
            $table->string('nama_supplier');
            $table->string('nama_petugas');
            $table->date('tanggal_datang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_bahan_masuk');
    }
};
