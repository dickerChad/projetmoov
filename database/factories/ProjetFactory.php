<?php

namespace Database\Factories;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjetFactory extends Factory
{
    protected $model = Projet::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" =>array_rand(["projet_appli","projet_Audit","projet_backbone","projet_pilone","projet_dev","projet_sim"]),
            "date_debut" =>$this->faker->date('Y-m-d'),
            "date_fin" =>$this->faker->date('Y-m-d'),
            // "duree" =>$this->faker->text,
            "description" =>$this->faker->text,
            "departement_id" =>rand(1,3),
            "statut_id" =>rand(1,3),
            // "tache_id" =>rand(1,10),
            "user_id" =>rand(1,10)





            //
        ];
    }
}
