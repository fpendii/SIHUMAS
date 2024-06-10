<?php


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EditingModel extends Model
{
    use HasFactory;

    protected $table = 'editing';

    protected $fillable = ['id_jasa', 'type_editing','id_pesanan'];
}
