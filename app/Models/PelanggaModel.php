<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelanggaModel extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $id = 'id_pelanggan';

    protected $fillable = ['id_akun','nama_pelanggan'];

    public $timestamps = false;

}

