<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    
    public function index(){
        return view('Login');
    }

    public function autenticacao(){
        if(Auth::check())
            return redirect()->route("Home");
        
        return redirect()->route("Login");

    }

    public function login(Request $data){

        $credentials = $data->only(['nome', 'senha']);

        if (!$token = Auth::attempt($credentials)) {
            return response()->json("Nome ou senha incorreto.", 401);
        }

        return $this->respondWithToken($token);

    }

    public function logout(){
        Auth::logout();

        //return response()->json(['message' => 'Successfully logged out']);
        return redirect()->route('Login');
    }

    protected function respondWithToken($token){
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }


}
