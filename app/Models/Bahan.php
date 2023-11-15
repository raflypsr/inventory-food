<?php

namespace App\Models;

use App\Models\Bahan as Bahans;
use App\Events\BeforeBahanInsert;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bahan extends Model
{
    use HasFactory;

    protected $table = 'bahans';
    
    protected $fillable = [
        'nama_bahan',
        'masa_kadaluarsa',
        'jumlah_bahan',
        'satuan',
        'kode_bahan',
        'jumlah_minimal',
    ];

    // relasi many to many dari table ini ke table Bahan menggunakan table pivot 'bahan_suppliers'
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class, 'bahan_supplier');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $maxKodeBahan = Bahans::max('kode_bahan');
            $maxKodeBahanInt = intval(substr($maxKodeBahan, 3));
            $model->kode_bahan = str_pad($maxKodeBahanInt + 1, 4, '0', STR_PAD_LEFT);
        });
    }
    
    
    
}
