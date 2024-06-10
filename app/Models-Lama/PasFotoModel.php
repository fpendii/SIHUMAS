<?php


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasFotoModel extends Model
{
    use HasFactory;

    protected $table = 'pas_foto';

    protected $fillable = ['id_jasa', 'jadwal_foto','id_pesanan'];
}
