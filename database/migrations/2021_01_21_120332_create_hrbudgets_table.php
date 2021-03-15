<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrbudgetsTable extends Migration
{
    public function up()
    {
        Schema::create('hrbudgets', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('item')->nullable();
            $table->string('amount')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('hrbudgets');
    }
}
