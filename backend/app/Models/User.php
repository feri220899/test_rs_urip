<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

     // Fungsi wajib untuk mengembalikan "identifier" atau "ID" pengguna
     public function getJWTIdentifier()
     {
         return $this->getKey();
     }

     // Fungsi wajib untuk mengembalikan data tambahan yang disertakan dalam token
     public function getJWTCustomClaims()
     {
         return [];
     }
}
