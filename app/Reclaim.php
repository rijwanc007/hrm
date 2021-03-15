<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reclaim extends Model
{
    protected $fillable = [
      'date',
      'employee_id',
      'claim_id',
      'reclaim',
    ];
    protected $table = 'reclaims';

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
}
