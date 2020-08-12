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
            $table->id('worktodo_id');
            $table->string('description');
            $table->boolean('statusWork')->default(1);
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
        Schema::dropIfExists('work_to_do_dbs');
    }
}
