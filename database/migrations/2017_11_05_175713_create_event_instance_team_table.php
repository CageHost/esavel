<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventInstanceTeamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_instance_team', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('team_id')->unsigned()->nullable();
            $table->foreign('team_id')->references('id')
              ->on('teams')->onDelete('cascade');

            $table->integer('event_instance_id')->unsigned()->nullable();
            $table->foreign('event_instance_id')->references('id')
              ->on('event_instances')->onDelete('cascade');

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
        Schema::dropIfExists('event_instance_team');
    }
}
