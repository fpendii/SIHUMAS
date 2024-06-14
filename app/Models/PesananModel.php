<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananModel extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $primaryKey = 'id_pesanan';

    protected $fillable = ['id_pesanan','id_pelanggan', 'id_jasa', 'status', 'link_mentahan', 'link_hasil','pesan','tenggat_pengerjaan','created_at','updated_at'];
}

?>
