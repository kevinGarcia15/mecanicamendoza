<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceCustumerDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_custumer_dbs', function (Blueprint $table) {
            $table->id('balance_custumer_id');
            $table->double('active', 11, 2);
            $table->double('balance', 11, 2);
            $table->double('pasive', 11, 2);
            $table->BigInteger('worksheet_id')->unsigned()->nullable();
            $table->foreign('worksheet_id')->references('worksheet_id')->on('worksheet_dbs');
            $table->BigInteger('client_id')->unsigned();
            $table->foreign('client_id')->references('client_id')->on('client_dbs');
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
        Schema::dropIfExists('balance_custumer_dbs');
    }
}
