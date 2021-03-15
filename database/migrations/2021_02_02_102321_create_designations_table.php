<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesignationsTable extends Migration
{
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('department_id')->nullable();
            $table->string('designation')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('designations');
    }
}
