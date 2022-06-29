<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VillageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->city(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'video_id' => 'Lv_GojoT1v4',
            'video_vr' => 'hNAbQYU0wpg', // video 360
            'lat' => $this->faker->latitude(),
            'long' => $this->faker->longitude(),
            'is_published' => 1,
        ];
    }
}
