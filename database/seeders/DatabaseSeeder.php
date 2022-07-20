<?php

namespace Database\Seeders;

use App\Models\Trip;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Village;
use App\Models\TripGallery;
use App\Models\ProductGallery;
use App\Models\TripTestimonial;
use Illuminate\Database\Seeder;
use App\Models\ProductTestimonial;
use App\Models\TripCategory;
use App\Models\VillageHistory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(1)->create();
        ProductCategory::factory(4)->create();
        TripCategory::factory(2)->create();
        Village::factory(6)->create();
        Product::factory(6)->create();
        Trip::factory(6)->create();
        ProductTestimonial::factory(100)->create();
        TripTestimonial::factory(100)->create();
        ProductGallery::factory(50)->create();
        TripGallery::factory(50)->create();
        VillageHistory::factory(12)->create();
        $this->call(LaratrustSeeder::class);
    }
}
