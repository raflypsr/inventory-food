<?php

namespace App\Models;

use App\Models\User;
use App\Models\Bahan;
use App\Models\JumlahBahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanMasuk extends Model
{
    use HasFactory;

    protected $fillable = [
        'jumlah_bahan',
        'harga_total',
        'nama_bahan',
        'nama_supplier',
        'kode_bahan',
        'nama_petugas',
        'tanggal_datang',
    ];

    protected $table = 'log_bahan_masuk';

}
