<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendees', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('event_id');

            $table->string('name');
            $table->string('email');
            $table->boolean('paid')->default(0);
            $table->string('payerID')->nullable();
            $table->string('qr')->nullable();
            $table->boolean('attended')->default(0);
            $table->dateTime('datetime')->nullable();

            $table->foreign('event_id')->references('id')->on('events');

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
        Schema::dropIfExists('attendees');
    }
}
