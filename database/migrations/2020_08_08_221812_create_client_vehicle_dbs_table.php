<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientVehicleDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_vehicle_dbs', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('client_id')->unsigned();
            $table->BigInteger('vehicle_id')->unsigned();
            $table->foreign('client_id')->references('client_id')->on('client_dbs');
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicle_dbs');
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
        Schema::dropIfExists('client_vehicle_dbs');
    }
}
