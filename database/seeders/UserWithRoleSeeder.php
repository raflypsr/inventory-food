<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserWithRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User;
        $admin->name = 'Administrator';
        $admin->email = 'admin@app.test';
        $admin->email_verified_at = date('Y-m-d H:i:s');
        $admin->password = bcrypt('password');
        $admin->alamat = 'Jawa Barat, Depok, Sawangan, Duren Seribu RT02 RW09 NO27';
        $admin->role = 'admin';
        $admin->save();

        $petugas = new User;
        $petugas->name = 'petugas';
        $petugas->email = 'petugas@app.test';
        $petugas->email_verified_at = date('Y-m-d H:i:s');
        $petugas->password = bcrypt('password');
        $petugas->alamat = 'Jawa Barat, Depok, Bojongsari, Duren Mekar RT04 RW06 NO37';
        $petugas->role = 'petugas';
        $petugas->save();
    }
}
