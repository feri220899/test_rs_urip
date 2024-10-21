<?php

namespace App\Http\Middleware;

use Closure;
use App\Services\JWTService;
use Illuminate\Http\Request;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    protected $jwtService;

    public function __construct(JWTService $jwtService)
    {
        $this->jwtService = $jwtService;
    }

    public function handle(Request $request, Closure $next)
    {
        $token = $request->bearerToken();

        if ($token && $decoded = $this->jwtService->decodeToken($token)) {
            // Token valid, lanjutkan ke request
            $request->attributes->add(['user' => $decoded]);
            return $next($request);
        }

        // Jika token tidak valid
        return response()->json(['message' => 'Unauthorized'], 401);
    }
}
