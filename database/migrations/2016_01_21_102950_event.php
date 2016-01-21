<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Event extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_id');
            $table->string('vehicle_id');
            $table->string('destination');
            $table->timestamp('date');
            $table->time('terminal_leave');
            $table->time('terminal_return');
            $table->time('client_arrive');
            $table->time('client_leave');
            $table->integer('min_spent');
            $table->integer('spidometer_start');
            $table->integer('spidometer_finish');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
