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
        Schema::create('movies', function (Blueprint $table) {
            $table->string('movie_url');
            $table->increments('movie_id');
            $table->string('movie_name');
            $table->integer('duration');
            $table->enum('dimension',['2D','3D']);
            $table->enum('age',['SU','R13+','D17+']);
            $table->string('synopsis');
            $table->string('producer');
            $table->string('director');
            $table->string('writer');
            $table->string('casts');
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
        Schema::dropIfExists('movies');
    }
};
