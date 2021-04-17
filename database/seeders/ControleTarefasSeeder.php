<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ControleTarefasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private static $demandas = [
        ["tarefa" => 1, "usuario" => 1],
        ["tarefa" => 2, "usuario" => 2],
        ["tarefa" => 3, "usuario" => 3],
        ["tarefa" => 4, "usuario" => 4],

    ];

    public function run()
    {
        foreach(self::$demandas as $demanda){
            DB::table("controle_tarefas")->insert([
                "tarefa" => $demanda["tarefa"],
                "usuario" => $demanda["usuario"],
                "created_at" => date("Y-m-d H:i")
            ]);

        }
    }
}
