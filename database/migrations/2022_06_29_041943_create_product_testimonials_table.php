<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->text('comment')->nullable();
            $table->string('image')->nullable()->nullable();
            $table->unsignedBigInteger('is_published')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_testimonials');
    }
}
