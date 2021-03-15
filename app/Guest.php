<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
      'date',
      'guest_name',
      'meeting_to',
      'starting_time',
      'meeting_room',
      'ending_time',
    ];
    protected $table = 'guests';
}
