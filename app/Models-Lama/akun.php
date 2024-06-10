<?php


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class akun extends Authenticatable
{
    use HasFactory,AuthenticableTrait;

    protected $table = 'akun';

    protected $fillable = [
        'username', 'email', 'no_hp', 'role', 'password','is_active',
    ];

    protected $hidden = [
        'password',
    ];
}
