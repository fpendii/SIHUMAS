<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class akun extends Model
{
    use HasFactory;

    protected $table = 'akun';

    protected $fillable = [
        'username', 'email', 'no_hp', 'role', 'password','is_active',
    ];


}
