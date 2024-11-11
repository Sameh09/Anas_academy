<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class verfiyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->token;
        if ($token) {
            $user =  JWTAuth::parseToken()->authenticate();
        } else {
            return response()->json(['msg' => 'invaled_token']);
        }
        return $next($request);
    }
}
