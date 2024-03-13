<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class peliputanModel extends Model
{
    use HasFactory;

    protected $table = 'peliputan';

    protected $fillable = ['jadwal_mulai', 'jadwal_selesai', 'pertanyaan_1', 'pertanyaan_2', 'pertanyaan_3','servis_id'];
}
