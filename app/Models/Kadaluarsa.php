<?php

namespace App\Models;

use App\Models\Bahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kadaluarsa extends Model
{
    use HasFactory;

    protected $table = 'kadaluarsa';

    protected $fillable = [
        'tanggal_datang',
        'jumlah_pantau',
        'bahan_id',
    ];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id', 'id');
    }
}
