<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GameHero extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_hero', function (Blueprint $table) {

            $table->integer('game_id')->unsigned()->index();

            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('hero_id')->unsigned()->index();

            $table->foreign('hero_id')->references('id')->on('heroes')->onDelete('cascade')
            ->onUpdate('cascade');

            $table->primary(['game_id', 'hero_id']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_hero');
    }
}
