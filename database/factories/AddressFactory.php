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
            'user_id' => rand(1,10),
            'address_type_id' => rand(1,2),
            'address' => $this->faker->address(),
            'zipcode' => $this->faker->zipcode(),
            'city' => $this->faker->city(),
        ];
    }
}
