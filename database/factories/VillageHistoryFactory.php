<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VillageHistoryFactory extends Factory
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
            'name' => $this->faker->city(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'video_id' => 'Lv_GojoT1v4',
            'video_vr' => 'hNAbQYU0wpg', // video 360
            'video_etc' => 'hNAbQYU0wpg', // 
        ];
    }
}
