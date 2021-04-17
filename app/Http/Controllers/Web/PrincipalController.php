<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class PrincipalController extends Controller
{
    
    public function __construct(){
        //$this->middleware('autenticacao');
    }

    public function index(){
        return view("paginaPrincipal");
    }

    public function cadastrar(){
        
    }

}
