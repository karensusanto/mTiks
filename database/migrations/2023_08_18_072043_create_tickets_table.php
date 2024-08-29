<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('ticket_id');
            $table->unsignedInteger('users_id');
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('theatre_id');
            $table->dateTime('movie_time');
            $table->foreign('users_id')->references('users_id')->on('users');
            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->foreign('theatre_id')->references('theatre_id')->on('theatres');
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
        Schema::dropIfExists('tickets');
    }
};
