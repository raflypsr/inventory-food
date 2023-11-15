<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = new Supplier();
        $supplier->name = 'rafly permana';
        $supplier->email = 'rafyndc11@gmail.com';
        $supplier->alamat = 'Jawa Barat, Depok, Bojongsari, Duren Mekar RT04 RW06 NO37';
        $supplier->phone = '098918276781';
        $supplier->save();

        $supplier = new Supplier();
        $supplier->name = 'dika kamaludin';
        $supplier->email = 'dikaQ11@gmail.com';
        $supplier->alamat = 'Jawa Barat, Depok, Bojongsari, Duren Mekar RT04 RW06 NO37';
        $supplier->phone = '098238901928';
        $supplier->save();

        $supplier = new Supplier();
        $supplier->name = 'rizki salomeh';
        $supplier->email = 'rimeh99@gmail.com';
        $supplier->alamat = 'Jawa Barat, Depok, Bojongsari, Duren Mekar RT04 RW06 NO37';
        $supplier->phone = '098387827162';
        $supplier->save();
    }
}
