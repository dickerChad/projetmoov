<?php

namespace Database\Factories;

use App\Models\Statut;
use Illuminate\Database\Eloquent\Factories\Factory;

class StatutFactory extends Factory
{

    protected $model = Statut::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "nom" =>$this->faker->name
            //
        ];
    }
}
