<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class tacheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("taches")->insert([
           
            ["nom"=> "miseenplacedune appli"],
            [ "dateDebut" => "2021-02-02"],
            [ "dateFin" => "2022-02-02"]
        
        ]);
    }
}
