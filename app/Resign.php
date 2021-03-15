<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{
    protected $fillable = [
      'department_id',
      'employee_id',
      'application',
      'termination_date',
      'status',
    ];

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
