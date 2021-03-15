<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ta extends Model
{
    protected $fillable = [
      'grade_id',
      'designation_id',
      'mode_of_transport',
      'ta',
      'da',
      'total',
    ];

    protected $table= 'tas';
}
