<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class statutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("statuts")->insert([
           
        ["nom"=> "Non démarré"],
        [ "nom" => "En cours"],
        [ "nom" => "Terminé "]
    
    ]);
    }
}
