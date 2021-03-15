<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanPeriod extends Model
{
    protected $fillable = [
      'loan_period',
      'loan_amount',
      'interest',
      'repaid_p_m',
    ];

    protected $table = 'loan_periods';
}
