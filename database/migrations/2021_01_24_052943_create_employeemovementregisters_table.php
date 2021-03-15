<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeemovementregistersTable extends Migration
{
    public function up()
    {
        Schema::create('employeemovementregisters', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('exit_time')->nullable();
            $table->string('tour_area')->nullable();
            $table->string('clients_information')->nullable();
            $table->string('project_manager')->nullable();
            $table->string('entry_time')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('employeemovementregisters');
    }
}
