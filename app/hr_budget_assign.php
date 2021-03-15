<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class hr_budget_assign extends Model
{
    protected $fillable = [
      'date_from',
      'date_to',
      'budget',
    ];
}
