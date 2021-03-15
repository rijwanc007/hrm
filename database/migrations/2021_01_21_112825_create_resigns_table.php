<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResignsTable extends Migration
{
    public function up()
    {
        Schema::create('resigns', function (Blueprint $table) {
            $table->id();
            $table->string('department_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('application')->nullable();
            $table->string('termination_date')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('resigns');
    }
}
