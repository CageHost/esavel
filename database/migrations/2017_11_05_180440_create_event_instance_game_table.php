<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventInstanceGameTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_instance_game', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')
              ->on('teams')->onDelete('cascade');

            $table->integer('game_id')->unsigned()->nullable();
            $table->foreign('game_id')->references('id')
              ->on('games')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_instance_game');
    }
}
