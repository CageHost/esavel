<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventEventTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_event_type', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('event_id')->unsigned()->nullable();
            $table->foreign('event_id')->references('id')
              ->on('events')->onDelete('cascade');

            $table->integer('event_type_id')->unsigned()->nullable();
            $table->foreign('event_type_id')->references('id')
              ->on('event_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_event_type');
    }
}
