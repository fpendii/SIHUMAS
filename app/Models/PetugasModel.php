<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasModel extends Model
{
    use HasFactory;

    protected $table = 'petugas';

    protected $id = 'id_petugas';

    protected $fillable = ['id_akun','nama_petugas','foto'];

    public $timestamps = false;

}

?>
