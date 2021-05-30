<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Commission extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commission', function (Blueprint $table) {

            //$table->bigIncrements('commissionid');
            $table->integer('commissionid', 10);
            $table->integer('agentid')->unique();
            $table->foreign('agentid')->references('agentid')->on('agentsregstration')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('amount');
            $table->string('created_by');
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
        Schema::dropIfExists('commission_table');
    }
}
