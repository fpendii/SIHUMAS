<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaModel extends Model
{
    use HasFactory;

    protected $table = 'jasa';
    protected $id = 'id_jasa';

    protected $fillable = ['pilihan_publikasi','catatan_redaktur','tag_posmed','link_ringkasan_publikasi','pertanyaan_1','pertanyaan_2','pertanyaan_3','tipe_desain','ukuran_gambar','waktu_mulai','waktu_selesai','jadwal_foto','jenis_jasa','tema','unit'];

    public $timestamps = false;
}
