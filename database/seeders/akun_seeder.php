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
                'password' => hash::make('pendi123'),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]
         ]);
    }
}
