<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Insuarance extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insuarance', function (Blueprint $table) {
          //  $table->bigIncrements('insuaranceid');
            $table->integer('insuaranceid', 10);
            $table->integer('insuaredid');
            $table->foreign('insuaredid')->references('insuaredid')->on('insuared')->onDelete('cascade')->onUpdate('cascade');
            $table->string('platenumber',50);
            $table->foreign('platenumber')->references('platenumber')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');

            $table->date('startdate');
            $table->date('enddate');
            $table->string('create_by');
            $table->timestamp('create_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insuarance');
    }
}
