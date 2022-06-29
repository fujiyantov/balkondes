<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductTestimonialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'product_id' => $this->faker->numberBetween(1, 20),
            'comment' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'is_published' => $this->faker->numberBetween(0, 1),
        ];
    }
}
