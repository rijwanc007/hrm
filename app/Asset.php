<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
      'department_id',
      'employee_id',
      'item',
      'status',
    ];
    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
