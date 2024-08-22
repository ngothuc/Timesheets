<?php

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Admin extends Authenticate
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'name',
        'password',
        'email',
    ];

    protected $hidden = [
        // 'password',
        // 'remember_token',
    ];

    protected $casts = [
        // 'email_verified_at' => 'datetime',
        // 'password' => 'hashed',
    ];

}
