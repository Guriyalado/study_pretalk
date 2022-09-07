<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goals', function (Blueprint $table) {
            $table->id();
             $table->string('title');
            $table->string('body');
            $table->bigInteger('subject_name')->unsigned();
            $table->foreign('subject_name')->references('id')->on('subjects')->onDelete('cascade');
            $table->time('time');
           $table->bigInteger('Credit')->unsigned();
            $table->foreign('Credit')->references('id')->on('subjects')->onDelete('cascade');
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
        Schema::dropIfExists('goals');
    }
}
