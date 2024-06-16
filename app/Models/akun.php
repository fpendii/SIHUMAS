<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class akun extends Model implements Authenticatable
{
    use HasFactory,AuthenticableTrait;

    protected $table = 'akun';

    protected $primaryKey = 'id_akun'; // Pastikan huruf kecil dan benar

    protected $fillable = [
        'username', 'email', 'no_hp', 'role', 'password','is_active',
    ];


}
