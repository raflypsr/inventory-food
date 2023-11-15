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
        Schema::create('log_bahan_keluar', function (Blueprint $table) {
            $table->id();
            $table->integer('jumlah_bahan');
            $table->string('kode_bahan');
            $table->string('alasan');
            $table->string('nama_bahan'); //hapus jika parent di haous
            $table->string('nama_petugas');
            $table->date('tanggal_keluar');
            $table->timestamps();   
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_bahan_keluar');
    }
};
