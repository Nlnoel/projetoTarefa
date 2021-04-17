<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuarios;

class ListaUsuarios extends Controller
{
    
    public function index(){
        
        $usuarios = Usuarios::all();

        return response()->json($usuarios);

    }
}
