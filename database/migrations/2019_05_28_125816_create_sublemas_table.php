<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSublemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sublemas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('letter')->nullable();
            $table->integer('number')->nullable();
            $table->integer('total_votes')->nullable()->unsigned();

            $table->integer('lema_id')->unsigned();
            $table->foreign('lema_id')->references('id')->on('lemas');

            $table->integer('municipality_id')->unsigned();
            $table->foreign('municipality_id')->references('id')->on('municipalities');

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
        Schema::dropIfExists('sublemas');
    }
}
