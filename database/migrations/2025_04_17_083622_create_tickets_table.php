<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->foreign("name")->references("name")->on("users");
            $table->integer("events_id");
            $table->foreign("events_id")->references("id")->on("events");
            $table->date("date");
            $table->time("time");
            $table->string("pax", 5);
            $table->integer("venues_id");
            $table->foreign("venues_id")->references("id")->on("venues");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
