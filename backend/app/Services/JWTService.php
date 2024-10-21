<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Config;

class JWTService
{
    private $key;

    public function __construct()
    {
        // Kunci rahasia untuk menandatangani token
        $this->key = 'test';// Anda bisa menggunakan kunci yang lebih kuat
    }

    // Fungsi untuk membuat JWT Token
    public function createToken($user)
    {
        // Mengatur payload (data yang disimpan di dalam token)
        $payload = [
            'iss' => "laravel-jwt", // Issuer (mengidentifikasi siapa yang membuat token)
            'sub' => $user['email'], // Subject (ID pengguna)
            'iat' => time(), // Waktu token diterbitkan
            'exp' => time() + 3600, // Waktu kadaluarsa (1 jam)
        ];

        // Membuat token
        return JWT::encode($payload, $this->key, 'HS256');
    }

    // Fungsi untuk memverifikasi dan mendekode JWT Token
    public function decodeToken($token)
    {
        try {
            // Decode token using HS256 algorithm
            return JWT::decode($token, $this->key, ['HS256']);
        } catch (\Exception $e) {
            return null; // Return null if the token is invalid or expired
        }
    }

}
