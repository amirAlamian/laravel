<?php

namespace Database\Factories;

use App\Models\Workers;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Workers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "branch_id" => $this->faker->numberBetween(10, 20) 
        ];
    }
}
