<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGameTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_team', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('game_id')->unsigned()->nullable();
            $table->foreign('game_id')->references('id')->on('games')->onDelete('cascade');

            $table->integer('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');

            $table->boolean('active')->default(1);
            $table->integer('rank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game_team');
    }
}
