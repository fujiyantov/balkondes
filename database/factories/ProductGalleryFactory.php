<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductGalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 20),
            'image' => $this->faker->imageUrl(),
            'is_published' => $this->faker->numberBetween(0, 1),
        ];
    }
}
