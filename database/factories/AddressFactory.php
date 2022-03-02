<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address_type_id' => rand(1,2),
            'address' => $this->faker->streetName() . ' ' . rand(1,250),
            'zipcode' => $this->faker->postcode(),
            'city' => $this->faker->city(),
        ];
    }
}
