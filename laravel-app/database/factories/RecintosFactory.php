<?php

namespace Database\Factories;

use App\Models\Recintos;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecintosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recintos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->realText($maxNbChars = 20),
            'coste_alquiler' => rand(100,2000),
            'precio_entrada' => rand(50,120)
        ];
    }
}
