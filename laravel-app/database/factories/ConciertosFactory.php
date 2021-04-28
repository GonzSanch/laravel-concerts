<?php

namespace Database\Factories;

use App\Models\Conciertos;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConciertosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Conciertos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_promotor' => rand(1,3),
            'id_recinto' => rand(1,3),
            'nombre' => $this->faker->realText($maxNBChars = 50),
            'numero_espectadores' => rand(1000, 1000**1),
            'fecha' => $this->faker->dateTimeBetween('+1 years', '+5 years'),
            'rentabilidad' => 0
        ];
    }
}
