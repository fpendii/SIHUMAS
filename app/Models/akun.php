<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class akun extends Authenticatable implements MustVerifyEmail
{
    use HasFactory,AuthenticableTrait;

    protected $table = 'akun';

    protected $primaryKey = 'id_akun'; // Pastikan huruf kecil dan benar

    protected $fillable = [
        'username', 'email', 'nama','no_hp', 'role', 'password','is_active', 'email_verified_at'
    ];


}
