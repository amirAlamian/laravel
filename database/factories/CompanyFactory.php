<?php

namespace Database\Factories;

use App\Models\Company;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "value"=> $this->faker->randomDigit,
            "address"=> $this->faker->text,
            "owner_id" => $this->faker->numberBetween($min = 1, $max = 2) // 8567
        ];
    }
}
