<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanPeriodsTable extends Migration
{
    public function up()
    {
        Schema::create('loan_periods', function (Blueprint $table) {
            $table->id();
            $table->string('loan_period')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('interest')->nullable();
            $table->string('repaid_p_m')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loan_periods');
    }
}
