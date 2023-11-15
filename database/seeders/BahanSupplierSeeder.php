<?php

namespace Database\Seeders;

use App\Models\BahanSupplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BahanSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bahanSupplier = new BahanSupplier();
        $bahanSupplier->supplier_id = 1;
        $bahanSupplier->bahan_id = 1;
        $bahanSupplier->save();

        $bahanSupplier = new BahanSupplier();
        $bahanSupplier->supplier_id = 1;
        $bahanSupplier->bahan_id = 3;
        $bahanSupplier->save();

        $bahanSupplier = new BahanSupplier();
        $bahanSupplier->supplier_id = 2;
        $bahanSupplier->bahan_id = 2;
        $bahanSupplier->save();

        $bahanSupplier = new BahanSupplier();
        $bahanSupplier->supplier_id = 3;
        $bahanSupplier->bahan_id = 1;
        $bahanSupplier->save();

        $bahanSupplier = new BahanSupplier();
        $bahanSupplier->supplier_id = 3;
        $bahanSupplier->bahan_id = 2;
        $bahanSupplier->save();

        $bahanSupplier = new BahanSupplier();
        $bahanSupplier->supplier_id = 3;
        $bahanSupplier->bahan_id = 3;
        $bahanSupplier->save();
    }
}
