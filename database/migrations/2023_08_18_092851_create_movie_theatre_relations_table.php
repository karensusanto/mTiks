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
        Schema::create('movie_theatre_relations', function (Blueprint $table) {
            $table->unsignedInteger('movie_id');
            $table->unsignedInteger('theatre_id');
            $table->foreign('movie_id')->references('movie_id')->on('movies');
            $table->foreign('theatre_id')->references('theatre_id')->on('theatres');
            $table->primary(['movie_id','theatre_id']);
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
        Schema::dropIfExists('movie_theatre_relations');
    }
};
