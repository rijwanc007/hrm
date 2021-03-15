<?php

namespace App\Http\Controllers\Admin;

use App\Asset;
use App\Claim;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Loan;
use App\Payroll;
use App\Reclaim;
use App\Resign;
use Illuminate\Http\Request;

class EndofserviceController extends Controller
{
    public function employees(){
        $employees = Resign::orderBy('id', 'DESC')->get();
        return view('endofservice.employees', compact('employees'));
    }
    public function eos($id){
        $employee = Employee::find($id);
        $resign = Resign::where('employee_id', $id)->orderBy('id', 'DESC')->first();
        $working_months = date_diff(date_create($employee->joining_date),date_create($resign->termination_date))->format('%M');
        $payrolls = Payroll::where('employee_id', $id)->orderBy('id', 'DESC')->get();
        $paid_months = count($payrolls);
        $loans = Loan::where('employee_id', $id)->where('due_amount', '!=', '0')->orderBy('id', 'DESC')->sum('due_amount');
        $claims = Claim::where('employee_id', $id)->where('claim', '!=', '0')->orderBy('id', 'DESC')->sum('claim');
        $reclaims = Reclaim::where('employee_id', $id)->orderBy('id', 'DESC')->get();
        $assets = Asset::where('employee_id', $id)->orderBy('id', 'DESC')->get();

        return view('endofservice.report', compact('employee', 'resign', 'payrolls', 'paid_months', 'loans', 'claims', 'reclaims', 'assets', 'working_months'));
    }
}
