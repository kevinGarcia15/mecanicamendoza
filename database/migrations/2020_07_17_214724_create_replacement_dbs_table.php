<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReplacementDbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('replacement_dbs', function (Blueprint $table) {
            $table->id('remplacement_id');
            $table->integer('quantity');
            $table->string('description');
            $table->double('price', 10, 2);
            $table->BigInteger('worksheet_id')->unsigned();
            $table->foreign('worksheet_id')->references('worksheet_id')->on('worksheet_dbs')->onDelete('cascade');
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
        Schema::dropIfExists('replacement_dbs');
    }
}
