<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasTable extends Migration
{
    public function up()
    {
        Schema::create('tas', function (Blueprint $table) {
            $table->id();
            $table->longText('grade_id')->nullable();
            $table->longText('designation_id')->nullable();
            $table->string('mode_of_transport')->nullable();
            $table->string('ta')->nullable();
            $table->string('da')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tas');
    }
}
