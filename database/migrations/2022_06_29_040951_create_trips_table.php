<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('name', 150);
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('category');
            $table->string('image');
            $table->text('address');
            $table->text('description');
            $table->text('additional_information')->nullable();
            $table->string('seller_name');
            $table->unsignedBigInteger('is_published')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trip');
    }
}
