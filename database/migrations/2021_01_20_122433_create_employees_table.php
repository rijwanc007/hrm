<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->integer('contact')->nullable();
            $table->string('department')->nullable();
            $table->string('designation')->nullable();
            $table->string('joining_date')->nullable();
            $table->string('salary')->nullable();
            $table->string('grade')->nullable();
            $table->string('bank_account')->nullable();
            $table->string('extra_curricullar_activity')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
