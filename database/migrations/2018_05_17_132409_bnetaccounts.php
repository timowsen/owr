<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bnetaccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bnetaccounts', function (Blueprint $table) {
            
            $table->increments('id');

            $table->integer('user_id')->unsigned()->index();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')
            ->onUpdate('cascade');

            $table->string('bnetaccount');

            $table->integer('rating')->nullable();

            $table->string('tier')->nullable();

            $table->float('winrate', 4, 2)->nullable();

            $table->string('avatar')->nullable();

            $table->longText('statscache')->nullable();
            
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
        Schema::dropIfExists('bnetaccounts');
    }
}
