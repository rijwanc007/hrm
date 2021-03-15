<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
      'title',
      'client_id',
      'project_id',
      'priority',
      'employee_id',
      'start_date',
      'start_time',
      'end_date',
      'end_time',
      'message',
    ];

    protected $table = 'tasks';
}
