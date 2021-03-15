<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employeemovementregister extends Model
{
    protected $fillable = [
      'date',
      'employee_name',
      'designation',
      'exit_time',
      'tour_area',
      'clients_information',
      'project_manager',
      'entry_time',
    ];
}
