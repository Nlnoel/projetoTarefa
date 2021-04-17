<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    private static $usuarios = [
        ["nome" => "Noel", "senha" => "123456", "permissao" => "1"],
        ["nome" => "Lucas", "senha" => "123456", "permissao" => "2"],
        ["nome" => "Matheus", "senha" => "123456", "permissao" => "1"],
        ["nome" => "Gustavo", "senha" => "123456", "permissao" => "2"],

    ];

    public function run()
    {
        foreach(self::$usuarios as $usuario){
            DB::table("usuarios")->insert([
                "nome" => $usuario["nome"],
                "permissao" => $usuario["permissao"],
                "created_at" => date("Y-m-d H:i"),
                "senha" => Hash::make($usuario["senha"])
            ]);

        }
    }
}
