<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Claim extends Model
{
    protected $fillable = [
      'employee_id',
      'claim',
      'date',
    ];

    protected $table = 'claims';

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
