<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_model_dbs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->BigInteger('brand_car_id')->unsigned();
            $table->foreign('brand_car_id')->references('id')->on('brand_car_dbs');
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
        Schema::dropIfExists('car_model_dbs');
    }
}
