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
            $table->id('vehicle_id');
            $table->string('plateNumber')->unique();
            $table->string('line')->nullable();
            $table->BigInteger('color_id')->unsigned();
            $table->BigInteger('model_id')->unsigned();
            $table->foreign('color_id')->references('color_id')->on('car_color_dbs');
            $table->timestamps();
        });

        Schema::table('vehicle_dbs', function($table) {
          $table->foreign('model_id')->references('model_id')->on('car_model_dbs');
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
