<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $fillable = [
      'date_from',
      'date_to',
      'department_id',
      'employee_id',
      'number_of_days',
      'no_of_days_approved',
      'no_of_days_taken',
      'reason',
      'approved',
    ];
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
