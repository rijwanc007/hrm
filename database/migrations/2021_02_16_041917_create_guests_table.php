<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestsTable extends Migration
{
    public function up()
    {
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('guest_name')->nullable();
            $table->string('meeting_to')->nullable();
            $table->string('starting_time')->nullable();
            $table->string('meeting_room')->nullable();
            $table->string('ending_time')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('guests');
    }
}
