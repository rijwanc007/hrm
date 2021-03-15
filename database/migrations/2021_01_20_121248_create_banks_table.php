<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->id();
            $table->string('bank_name')->nullable();
            $table->string('branch')->nullable();
            $table->string('account')->nullable();
            $table->bigInteger('balance')->nullable();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
