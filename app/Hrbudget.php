<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hrbudget extends Model
{
    protected $fillable = [
      'date',
      'item',
      'amount',
      'total',
    ];
}
