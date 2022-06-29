<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'village_id' => $this->faker->numberBetween(1, 6),
            'name' => 'TRIP - ' . $this->faker->name(),
            'price' => $this->faker->numberBetween(500000, 200000),
            'category' => $this->faker->numberBetween(1, 3),
            'image' => $this->faker->imageUrl(),
            'address' => $this->faker->address(),
            'description' => $this->faker->text(),
            'addtional_information' => $this->faker->text(),
            'seller_name' => $this->faker->name(),
            'is_published' => $this->faker->numberBetween(0, 1),
        ];
    }
}
