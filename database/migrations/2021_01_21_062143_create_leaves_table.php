<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('department_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->string('number_of_days')->nullable();
            $table->string('no_of_days_approved')->nullable();
            $table->string('no_of_days_taken')->nullable();
            $table->string('reason')->nullable();
            $table->string('approved')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leaves');
    }
}
