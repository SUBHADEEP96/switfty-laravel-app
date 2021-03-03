<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Illuminate\Http\Request;

class JwtMiddleware extends BaseMiddleware

{

/**

* Handle an incoming request.

*

* @param \Illuminate\Http\Request $request

* @param \Closure $next

* @return mixed

*/
     public function handle ($request, Closure $next)
    {
        if(!$request->header("Authorization")) {
            return response()->json(['error' => 'Token not found', "success" => false], 200);
        }
        try {
            $request->currentuser = $this->auth->parseToken()->authenticate();
        } catch (Exception $e) {
            if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException) {
                return response()->json([ 'error' => 'Token is Invalid', "success" => false ], 200);
            } else if ($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException) {
                return response()->json([ 'error' => 'Token is Expired', "success" => false ], 200);
            } else {
                return response()->json([ 'error' => 'Something is wrong', "success" => false ], 200);
            }
        }
        return $next($request);
    }


}