<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Auth\MustVerifyEmail as MustVerifyEmailTrait;

class akun extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, MustVerifyEmailTrait;

    protected $table = 'akun';
    protected $primaryKey = 'id_akun';

    protected $fillable = [
        'username', 'email', 'nama', 'no_hp', 'role', 'password', 'is_active', 'email_verified_at'
    ];

    public $timestamps = false;
}
