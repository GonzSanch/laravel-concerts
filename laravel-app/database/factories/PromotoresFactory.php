<?php

namespace Database\Factories;

use App\Models\Promotores;
use Illuminate\Database\Eloquent\Factories\Factory;

class PromotoresFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Promotores::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->unique()->firstName()
        ];
    }
}
