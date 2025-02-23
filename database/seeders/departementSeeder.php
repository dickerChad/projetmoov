<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class departementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("departements")->insert([
            
            ["nom"=> "Direction Générale"],
            ["nom"=> "juridique et Réglementation"],
            [ "nom" => "Ressources Humaines "], 	
            [ "nom" => "Audit,qualité et Sécurité"],
            [ "nom" => "DAF"],
            ["nom"=> "Commerciale"],
            [ "nom" => "Reseaux et SI"]

        
        ]);
    }
}
