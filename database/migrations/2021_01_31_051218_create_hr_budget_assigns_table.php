<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHrBudgetAssignsTable extends Migration
{
    public function up()
    {
        Schema::create('hr_budget_assigns', function (Blueprint $table) {
            $table->id();
            $table->string('date_from')->nullable();
            $table->string('date_to')->nullable();
            $table->string('budget')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('hr_budget_assigns');
    }
}
