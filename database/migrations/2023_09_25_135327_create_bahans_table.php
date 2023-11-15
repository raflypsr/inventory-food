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
        Schema::create('bahans', function (Blueprint $table) { 
            $table->id();
            $table->string('nama_bahan')->unique();
            $table->string('kode_bahan')->unique();
            $table->integer('masa_kadaluarsa');
            $table->integer('jumlah_minimal');
            $table->integer('jumlah_bahan')->default(0);
            $table->string('satuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bahans');
    }
};
