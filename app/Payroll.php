<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
      'date',
      'month',
      'department_id',
      'employee_id',
      'salary',
      'kpi',
      'number_of_leaves',
      'leave_deduction',
      'late_attendance',
      'late_attendance_fee',
      'performance_bonus',
      'apprisal',
      'travel_allowance',
      'medical_allowance',
      'lunch_allowance',
      'bonus',
      'net_amount',
    ];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    public function department(){
        return $this->belongsTo('App\Department');
    }
}
