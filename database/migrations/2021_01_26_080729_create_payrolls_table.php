<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollsTable extends Migration
{
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('month')->nullable();
            $table->string('department_id')->nullable();
            $table->string('employee_id')->nullable();
            $table->string('salary')->nullable();
            $table->string('kpi')->nullable();
            $table->string('number_of_leaves')->nullable();
            $table->string('leave_deduction')->nullable();
            $table->string('late_attendance')->nullable();
            $table->string('late_attendance_fee')->nullable();
            $table->string('performance_bonus')->nullable();
            $table->string('apprisal')->nullable();
            $table->string('travel_allowance')->nullable();
            $table->string('medical_allowance')->nullable();
            $table->string('lunch_allowance')->nullable();
            $table->string('bonus')->nullable();
            $table->string('net_amount')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
