<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVillageHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('village_histories', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('village_id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('video_id')->nullable();
            $table->string('video_vr')->nullable();
            $table->string('video_etc')->nullable();
            $table->double('lat')->nullable();
            $table->double('long')->nullable();
            $table->string('type')->default('video');
            $table->text('content')->nullable();
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
        Schema::dropIfExists('village_histories');
    }
}
