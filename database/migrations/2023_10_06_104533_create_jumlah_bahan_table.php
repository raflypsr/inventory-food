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
        // Schema::create('jumlah_bahans', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('kode_bahan')->unique();
        //     $table->integer('jumlah_bahan');
        //     $table->foreignId('bahan_id')->constrained()->onDelete('cascade'); // relasi ke table bahann
                                        
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('jumlah_bahans');
    }
};
