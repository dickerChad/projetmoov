<?php

namespace Database\Factories;

use App\Models\Tache;
use Illuminate\Database\Eloquent\Factories\Factory;

class TacheFactory extends Factory
{
    protected $model = Tache::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" =>array_rand(["projet_commerciale","projet_Si","projet_Audit"], 1),
            "dateDebut" =>$this->faker->date('Y-m-d'),
            "dateFin" =>$this->faker->date('Y-m-d'),
            "projet_id"=>rand(1,3),
            "valeur"=>"10",
            "Estrealisee"=>"1"


        ];
    }
}
