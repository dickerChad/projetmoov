<?php

namespace Database\Seeders;

use App\Models\Departement;
use App\Models\Projet;
use App\Models\Role;
use App\Models\Tache;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
  
      
       $this->call(statutSeeder::class);
        $this->call(departementSeeder::class);
     
       
       
       User::factory(10)->create();
       $this->call(roleSeeder::class);
      // //$this->call(projetSeeder::class);
    Projet::factory(05)->create();
    Tache::factory(10)->create();
        User::find(1)->roles()->attach(1);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
        User::find(4)->roles()->attach(4);

    }
}
