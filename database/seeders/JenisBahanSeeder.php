<?php

namespace Database\Seeders;

use App\Models\Bahan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisBahanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahan = new Bahan();
        $bahan->nama_bahan = 'bayam';
        $bahan->masa_kadaluarsa = 3;
        $bahan->satuan = 'ikat';
        $bahan->jumlah_minimal = 30;
        $bahan->save();

        $bahan = new Bahan();
        $bahan->nama_bahan = 'kangkung';
        $bahan->masa_kadaluarsa = 3;
        $bahan->satuan = 'ikat';
        $bahan->jumlah_minimal = 30;
        $bahan->save();

        $bahan = new Bahan();
        $bahan->nama_bahan = 'jahe';
        $bahan->masa_kadaluarsa = 7;
        $bahan->satuan = 'gram';
        $bahan->jumlah_minimal = 30;
        $bahan->save();
    }
}
