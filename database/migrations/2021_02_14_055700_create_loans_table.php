<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->nullable();
            $table->string('loan_period_id')->nullable();
            $table->string('loan_amount')->nullable();
            $table->string('interest')->nullable();
            $table->string('net_amount')->nullable();
            $table->string('repaid_p_m')->nullable();
            $table->string('total_paid')->nullable();
            $table->string('due_amount')->nullable();
            $table->string('create_date')->nullable();
            $table->string('maturity_date')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
