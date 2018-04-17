<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventInstanceEventTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_instance_event_type', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('event_instance_id')->unsigned()->nullable();
            $table->foreign('event_instance_id')->references('id')
              ->on('event_instances')->onDelete('cascade');

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
        Schema::dropIfExists('event_instance_event_type');
    }
}
