<?php

namespace Database\Factories;

use App\Models\Grupos_Conciertos;
use Illuminate\Database\Eloquent\Factories\Factory;

class Grupos_ConciertosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grupos_Conciertos::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_grupo' => rand(1,20),
            'id_concierto' => rand(1,3)
        ];
    }
}
