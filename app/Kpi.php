<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $fillable = [
      'department_id',
      'designation_id',
      'amount',
    ];
    public function department(){
        return $this->belongsTo('App\Department');
    }
    public function designation(){
        return $this->belongsTo('App\Designation');
    }
}
