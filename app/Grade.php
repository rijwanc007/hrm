<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = [
      'grade',
      'designation_id',
      'leave_deduction',
      'office_time',
      'late_attendance_fee',
    ];
    protected $table = 'grades';
}
