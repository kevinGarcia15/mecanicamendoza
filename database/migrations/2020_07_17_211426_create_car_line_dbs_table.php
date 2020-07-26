<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarLineDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_line_dbs', function (Blueprint $table) {
            $table->id('line_id');
            $table->string('line_name');
            $table->BigInteger('brand_car_id')->unsigned();
            $table->foreign('brand_car_id')->references('brand_id')->on('brand_car_dbs');
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
        Schema::dropIfExists('car_line_dbs');
    }
}
