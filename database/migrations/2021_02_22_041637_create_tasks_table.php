<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{

    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('client_id')->nullable();
            $table->string('project_id')->nullable();
            $table->string('priority')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('start_date')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_date')->nullable();
            $table->string('end_time')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
