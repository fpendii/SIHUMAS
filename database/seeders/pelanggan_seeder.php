<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\akun;
use App\Models\PelanggaModel;


class pelanggan_seeder extends Seeder
{

    public function run(): void
    {
        $akun = akun::first();

        PelanggaModel::create([
            'id_akun' => $akun->id_akun,
            'nama_pelanggan' => 'Nurependi'
        ]);
    }
}
