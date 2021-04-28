<?php

namespace Database\Factories;

use App\Models\Grupos_Medios;
use Illuminate\Database\Eloquent\Factories\Factory;

class Grupos_MediosFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Grupos_Medios::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_medio' => rand(1,20),
            'id_concierto' => rand(1,3)
        ];
    }
}
