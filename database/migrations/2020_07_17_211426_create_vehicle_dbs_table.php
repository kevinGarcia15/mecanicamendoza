<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_dbs', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->string('line');
            $table->BigInteger('color_id')->unsigned();
            $table->BigInteger('brand_car_id')->unsigned();
            $table->foreign('brand_car_id')->references('id')->on('brand_car_dbs');
            $table->foreign('color_id')->references('id')->on('car_color_dbs');
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
        Schema::dropIfExists('vehicle_dbs');
    }
}
