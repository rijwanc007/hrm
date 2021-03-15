<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReclaimsTable extends Migration
{
    public function up()
    {
        Schema::create('reclaims', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('claim_id')->nullable();
            $table->string('reclaim')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reclaims');
    }
}
