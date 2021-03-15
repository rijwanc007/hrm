<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClaimsTable extends Migration
{
    public function up()
    {
        Schema::create('claims', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('claim')->nullable();
            $table->string('date')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('claims');
    }
}
