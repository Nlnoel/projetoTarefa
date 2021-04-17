<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", function(){

});
Route::prefix("Login")->group(function(){
    Route::get("/", ["as" => "Login", "uses" => "App\Http\Controllers\Api\LoginController@index"]);
    Route::post("Autenticar", ["as" => "Autenticar", "uses" => "App\Http\Controllers\Api\LoginController@login"]);
    Route::post("sair", ["as" => "Autenticar", "uses" => "App\Http\Controllers\Api\LoginController@login"]);
    Route::get("Validar", ["as" => "ValidaLogin", "uses" => "App\Http\Controllers\Api\LoginController@autenticacao"]);
});

Route::get("/", ["as" => "Home", "uses" => "App\Http\Controllers\Web\PrincipalController@index"]);

//Route::any("Usuarios", ["as" => "ListaUsuarios", "uses" => "App\Http\Controllers\ListaUsuarios@index"]);
