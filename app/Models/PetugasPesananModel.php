<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasPesananModel extends Model
{
    use HasFactory;

    protected $table = 'petugas_pesanan';

    protected $fillable = ['id_petugas','id_pesanan'];

    public $timestamps = false;
}
