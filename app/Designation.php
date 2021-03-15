<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $fillable = [
        'department_id',
        'designation',
    ];
    public function department(){
        return $this->belongsTo('App\Department');
    }
}
