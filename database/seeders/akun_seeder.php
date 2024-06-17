<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class akun_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('akun')->insert([
            [
                'username' => 'pendi',
                'email' => 'nurependi@mhs.politala.ac.id',
                'no_hp' => '082150646254',
                'role' => 'pelanggan',
                'password' => hash::make('123'),
                'is_active' => true,
            ],
            [
                'username' => 'pendi2',
                'email' => 'nurependi2@mhs.politala.ac.id',
                'no_hp' => '082150646254',
                'role' => 'pelanggan',
                'password' => hash::make('123'),
                'is_active' => true,
            ],
            [
                'username' => 'Bang Dimas',
                'email' => 'dimas@mhs.politala.ac.id',
                'no_hp' => '082150646254',
                'role' => 'petugas',
                'password' => hash::make('123'),
                'is_active' => true,
            ],
            [
                'username' => 'Bang Dimas 2',
                'email' => 'dimas2@mhs.politala.ac.id',
                'no_hp' => '082150646254',
                'role' => 'petugas',
                'password' => hash::make('123'),
                'is_active' => true,
            ],
            [
                'username' => 'Alam',
                'email' => 'alam@mhs.politala.ac.id',
                'no_hp' => '082150646254',
                'role' => 'admin',
                'password' => hash::make('123'),
                'is_active' => true,
            ],
         ]);

    }
}
