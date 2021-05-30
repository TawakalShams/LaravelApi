<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Acident extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acident', function (Blueprint $table) {
            //   $table->bigIncrements('acidentid');
            $table->integer('acidentid', 10);
            $table->integer('customerid')->unique();
            $table->foreign('customerid')->references('customerid')->on('customers')->onDelete('cascade')->onUpdate('cascade');
            $table->string('typeofacident');
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
        Schema::dropIfExists('acident');
    }
}
