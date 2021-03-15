<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKpisTable extends Migration
{
    public function up()
    {
        Schema::create('kpis', function (Blueprint $table) {
            $table->id();
            $table->string('department_id')->nullable();
            $table->string('designation_id')->nullable();
            $table->string('amount')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('kpis');
    }
}
