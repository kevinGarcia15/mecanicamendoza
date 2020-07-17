<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkToDoDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_to_do_dbs', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->BigInteger('worksheet_id')->unsigned();
            $table->foreign('worksheet_id')->references('id')->on('worksheet_dbs');
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
        Schema::dropIfExists('work_to_do_dbs');
    }
}
