<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrpoliciesTable extends Migration
{
    public function up()
    {
        Schema::create('hrpolicies', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('content')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hrpolicies');
    }
}
