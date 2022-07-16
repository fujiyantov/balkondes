<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('village_id')->nullable();
            $table->string('name', 100);
            $table->unsignedBigInteger('price');
            $table->unsignedBigInteger('category')->nullable();
            $table->string('image');
            $table->text('address')->nullable();
            $table->text('description');
            $table->text('additional_information')->nullable();
            $table->string('seller_name')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->string('video_id')->nullable();
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
        Schema::dropIfExists('prodcuts');
    }
}
