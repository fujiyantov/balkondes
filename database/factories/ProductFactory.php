<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'village_id' => $this->faker->numberBetween(1,6),
            'name' => $this->faker->name(),
            'price' => $this->faker->numberBetween(100000,1000000),
            'category' => $this->faker->numberBetween(1,3),
            'image' => $this->faker->imageUrl(),
            'address' => $this->faker->address(),
            'description' => $this->faker->text(),
            'additional_information' => $this->faker->text(),
            'seller_name' => $this->faker->name(),
            'is_published' => $this->faker->numberBetween(0,1),
            'lat' => $this->faker->latitude(),
            'long' => $this->faker->longitude(),
            'video_id' => 'Lv_GojoT1v4',
        ];
    }
}
