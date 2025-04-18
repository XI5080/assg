<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events_venues', function (Blueprint $table) {
            $table->id();
            $table->integer('venues_id');
            $table->foreign("venues_id")->references("id")->on("venues");
            $table->integer('events_id');
            $table->foreign("events_id")->references("id")->on("events");
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
        Schema::dropIfExists('events_venues');
    }
}
