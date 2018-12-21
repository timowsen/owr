<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('map_id')->unsigned()->index();
            $table->foreign('map_id')->references('id')->on('maps');
            $table->integer('season_id')->unsigned()->index();
            $table->foreign('season_id')->references('id')->on('seasons');
            $table->integer('win');
            $table->integer('rating');
            $table->integer('bobos');
            $table->unique(['user_id', 'map_id', 'win', 'rating', 'bobos']);
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
        Schema::dropIfExists('games');
    }
}
