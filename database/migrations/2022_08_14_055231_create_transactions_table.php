<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('type')->nullable();
            $table->unsignedInteger('product_id')->nullable();
            $table->unsignedInteger('trip_id')->nullable();
            $table->string('file')->nullable();
            $table->unsignedInteger('status')->default(0);
            $table->unsignedInteger('grand_total')->default(0);
            $table->unsignedInteger('updated_by')->nullable();
            $table->string('complete_date')->nullable();
            $table->unsignedInteger('is_read')->default(0);
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
        Schema::dropIfExists('transactions');
    }
}
