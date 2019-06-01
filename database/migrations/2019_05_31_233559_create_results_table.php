<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('results', function (Blueprint $table) {
           /**
            * attributes
            */
            $table->increments('id');
            $table->integer('table_id')->unsigned();
            $table->integer('lema_id')->nullable()->unsigned();
            $table->integer('sublema_id')->nullable()->unsigned();
            $table->integer('charge_id')->unsigned();
            $table->integer('total');

            /**
             * Foreign Key
             */
            $table->foreign('table_id')->references('id')->on('tables');
            $table->foreign('lema_id')->references('id')->on('lemas');
            $table->foreign('sublema_id')->references('id')->on('sublemas');
            $table->foreign('charge_id')->references('id')->on('charges');

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
        Schema::dropIfExists('results');
    }
}
