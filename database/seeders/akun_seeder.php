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
                'nama' => 'Nurependi',
                'no_hp' => '082150646254',
                'role' => 'pelanggan',
                'password' => hash::make('123'),
                'is_active' => true,
                'email_verified_at' => '2024-06-18 20:53:25'
            ],
            [
                'username' => 'pendi2',
                'email' => 'nurependi2@mhs.politala.ac.id',
                'nama' => 'Nurependi 2',
                'no_hp' => '082150646254',
                'role' => 'pelanggan',
                'password' => hash::make('123'),
                'is_active' => true,
                'email_verified_at' => '2024-06-18 20:53:25'
            ],
            [
                'username' => 'ferdi',
                'email' => 'ferdi.nurrahman@mhs.politala.ac.id',
                'nama' => 'Ferdi Nurrahman',
                'no_hp' => '083142170067',
                'role' => 'pelanggan',
                'password' => hash::make('123'),
                'is_active' => true,
                'email_verified_at' => '2024-06-18 20:53:25'
            ],
            [
                'username' => 'Bang Dimas',
                'email' => 'dimas@mhs.politala.ac.id',
                'nama' => 'Dimaz Nur Afrizal',
                'no_hp' => '082150646254',
                'role' => 'petugas',
                'password' => hash::make('123'),
                'is_active' => true,
                'email_verified_at' => '2024-06-18 20:53:25'
            ],
            [
                'username' => 'Bang Dimas 2',
                'email' => 'dimas2@mhs.politala.ac.id',
                'nama' => 'Dimaz',
                'no_hp' => '082150646254',
                'role' => 'petugas',
                'password' => hash::make('123'),
                'is_active' => true,
                'email_verified_at' => '2024-06-18 20:53:25'
            ],
            [
                'username' => 'Alam',
                'email' => 'alam@mhs.politala.ac.id',
                'nama' => 'Alam',
                'no_hp' => '082150646254',
                'role' => 'admin',
                'password' => hash::make('123'),
                'is_active' => true,
                'email_verified_at' => '2024-06-18 20:53:25'
            ],
            [
                'username' => 'risda',
                'email' => 'risda@mhs.politala.ac.id',
                'nama' => 'Risdaa',
                'no_hp' => '088804609540',
                'role' => 'pelanggan',
                'password' => hash::make('123'),
                'is_active' => true,
                'email_verified_at' => '2024-06-20 20:53:25'
            ],
         ]);

    }
}
