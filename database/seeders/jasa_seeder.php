<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class jasa_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jasa')->insert([
            [
                'nama_jasa' => 'desain'
            ],
            [
                'nama_jasa' => 'pas_foto'
            ],
            [
                'nama_jasa' => 'peliputan'
            ],
            [
                'nama_jasa' => 'publikasi'
            ],
            [
                'nama_jasa' => 'editing'
            ],
        ]);
    }
}
