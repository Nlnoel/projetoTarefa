<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;
use Tymon\JWTAuth\Facades\JWTAuth;

class AutenticacaoMiddleware extends BaseMiddleware{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        
        try{
            $user = JWTAuth::parseToken()->authenticate();
        } catch(\Exception $e){
            
            if($e instanceof \Tymon\JWTAuth\Exceptions\TokenInvalidException){
                return reponse()->json(["error" => "Token invalido"]);
            } elseif($e instanceof \Tymon\JWTAuth\Exceptions\TokenExpiredException){
                return reponse()->json(["error" => "Token expirado."]);
            } else{
                return redirect()->route('Login');
            }

        }
     
        return $next($request);
    }
}
