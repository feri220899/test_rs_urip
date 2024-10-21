<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\JWTService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $jwtService;
    public function __construct(JWTService $jwtService)
    {
        $this->jwtService = $jwtService;
    }
    public function register(Request $request)
    {
        $user = [
            'name' => 'admin',
            'email' => 'admin@gmail.com',
        ];
        $token = $this->jwtService->createToken($user);
        dd($token);
        return response()->json(compact('user', 'token'), 201);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if ($token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Invalid Credentials'], 401);
        }

        return response()->json(compact('token'));
    }
}
