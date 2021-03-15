<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->longText('dates')->nullable();
            $table->longText('time')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('attendances');
    }
}
