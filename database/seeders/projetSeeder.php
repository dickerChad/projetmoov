<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class projetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("projets")->insert([
           
            ["nom"=> "Mise_en_place_dune_appli"],
            [ "date_debut" => "2021-02-02"],
            [ "date_fin" => "2022-02-02"],
            [ "duree" => "2 mois"],
            [ "description" => "centralisation_de_projets"],
            [ "statut_id" => "Admin",],
            [ "tache_id" => "miseenplacedune appli"],
            [ "user_id" => "1"],
            [ "departement_id" => "RH"]
        
        
        ]);  
    }
}
