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
            // $table->integer('customerid')->unique();
            //  $table->foreign('customerid')->references('customerid')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('vehicleid')->unique();
            $table->foreign('vehicleid')->references('vehicleid')->on('vehicles')->onDelete('cascade')->onUpdate('cascade');
            $table->string('color');
            $table->integer('seat');
            $table->integer('value');
            $table->date('manufacture');
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
