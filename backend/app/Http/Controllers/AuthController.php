<?php

namespace App\Http\Controllers;

use App\Services\JWTService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public $jwtService;
    public function __construct(JWTService $jwtService)
    {
        $this->jwtService = $jwtService;
    }

    function register()
    {
        $user = [
            "name" => 'feri',
            "password" => 'test',
            "email" => 'feri.jumaidi@gmail.com'
        ];
        $token = $this->jwtService->createToken($user);
        return response()->json([
            'token' => $token
        ]);
    }
}
