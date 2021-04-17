<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TarefasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    private static $tarefas = [
        ["tarefa" => "Correr 100Km"],
        ["tarefa" => "Lavar a louça"],
        ["tarefa" => "Limpar a casa"],
        ["tarefa" => "Ir fazer compras"],

    ];

    public function run()
    {
        foreach(self::$tarefas as $tarefa){
            DB::table("tarefas")->insert([
                "tarefa" => $tarefa["tarefa"],
                "created_at" => date("Y-m-d H:i")
            ]);

        }
    }
}
