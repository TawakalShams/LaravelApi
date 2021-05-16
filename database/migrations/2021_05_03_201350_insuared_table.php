<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsuaredTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insuared', function (Blueprint $table) {
            // $table->bigIncrements('insuaredid');
            $table->integer('insuaredid', 10);
             $table->integer('customerid');
              $table->foreign('customerid')->references('customerid')->on('customers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('insuared');
    }
}
