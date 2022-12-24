<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visa>
 */
class VisaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'user_id'=>fake()->numberBetween(1,10),
            'bank_name'=>fake()->realText(50),
            'visa_number'=>fake()->numberBetween(1111111111111,99999999999999),
            'visa_password'=>fake()->numberBetween(0000,9999)
        ];
    }
}
