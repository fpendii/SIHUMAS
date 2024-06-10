<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\akun;
use App\Models\PelanggaModel;
use Illuminate\Support\Facades\DB;


class pelanggan_seeder extends Seeder
{

    public function run(): void
    {
        $akun = akun::first();

        DB::table('pelanggan')->insert([
            'id_akun' => $akun->id_akun,
            'nama_pelanggan' => 'Nurependi'
        ]);
    }
}
