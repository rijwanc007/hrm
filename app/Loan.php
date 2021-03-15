<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $fillable = [
      'employee_id',
      'loan_period_id',
      'loan_amount',
      'interest',
      'net_amount',
      'repaid_p_m',
      'total_paid',
      'due_amount',
      'create_date',
      'maturity_date',
    ];
    protected $table = 'loans';

    public function employee(){
        return $this->belongsTo('App\Employee');
    }
    public function loan_period(){
        return $this->belongsTo('App\LoanPeriod');
    }
}
