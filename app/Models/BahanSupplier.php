<?php

namespace App\Models;

use App\Models\Bahan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BahanSupplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'bahan_id',
        'supplier_id'
    ];

     protected $table = 'bahan_supplier';


    public function bahan()
    {
        return $this->belongsTo(Bahan::class, 'bahan_id', 'id');
    }
}
