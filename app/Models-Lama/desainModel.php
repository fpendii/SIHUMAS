<?php


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class desainModel extends Model
{
    use HasFactory;

    protected $table = 'desain';

    protected $fillable = ['id_jasa', 'tipe_desain', 'ukuran_gambar','id_pesanan'];
}
