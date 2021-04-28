<?php

namespace Database\Factories;

use App\Models\Grupos;
use Illuminate\Database\Eloquent\Factories\Factory;

class GruposFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grupos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->realText($maxNbChars = 20),
            'cache' => rand(100, 2000)
        ];
    }
}
