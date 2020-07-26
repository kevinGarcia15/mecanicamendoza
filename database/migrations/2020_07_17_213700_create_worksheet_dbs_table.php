<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksheetDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worksheet_dbs', function (Blueprint $table) {
            $table->id('worksheet_id');
            $table->string('code');
            $table->BigInteger('users_id')->unsigned();
            $table->BigInteger('client_id')->unsigned();
            $table->BigInteger('vehicle_id')->unsigned();
            $table->foreign('users_id')->references('id')->on('users');
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
        Schema::dropIfExists('worksheet_dbs');
    }
}
