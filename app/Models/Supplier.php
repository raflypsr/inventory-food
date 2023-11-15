<?php

namespace App\Models;

use App\Models\Bahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'suppliers';

    protected $fillable = [
        'name',
        'email',
        'alamat',
        'phone',
    ];

    // relasi many to many dari table ini ke table Bahan menggunakan table pivot 'bahan_suppliers'
    public function bahan()
    {
        return $this->belongsToMany(Bahan::class);
    }
}
