<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->boolean('active')->default(1);
            $table->integer('order')->nullable();
            $table->integer('points')->nullable();
            $table->integer('rank')->nullable();
            $table->string('name')->nullable();
            $table->string('alias')->nullable();
            $table->string('avatar')->nullable();
            $table->string('background')->nullable();
            $table->text('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
