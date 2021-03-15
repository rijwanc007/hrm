<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name',
        'photo',
        'address',
        'contact',
        'email',
        'department_id',
        'designation_id',
        'joining_date',
        'salary',
        'grade',
        'bank_account',
        'extra_curricullar_activity',
    ];

    protected $table = 'employees';

    public function department(){
        return $this->belongsTo('App\Department');
    }
    public function designation(){
        return $this->belongsTo('App\Designation');
    }
}
