<?php

namespace App\Models;

use App\Models\User;
use App\Models\Bahan;
use App\Models\BahanMasuk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanKeluar extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_bahan',
        'jumlah_bahan',
        'nama_bahan',
        'nama_petugas',
        'alasan',
        'tanggal_keluar',
    ];

    protected $table = 'log_bahan_keluar';

}
