<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Loan;
use App\LoanPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::orderBy('id', 'DESC')->get();
        return view('loan.index', compact('loans'));
    }

    public function create()
    {
        $loan_periods = LoanPeriod::orderBy('id', 'DESC')->get();
        return view('loan.create', compact('loan_periods'));
    }

    public function store(Request $request)
    {
        Loan::create([
           'employee_id'=>$request->employee_id,
           'loan_period_id'=>$request->loan_period,
           'loan_amount'=>$request->loan_amount,
           'interest'=>$request->interest,
           'net_amount'=>$request->net_amount,
           'repaid_p_m'=>$request->repaid_p_m,
           'total_paid'=>$request->total_paid,
           'due_amount'=>$request->due_amount,
           'create_date'=>$request->create_date,
           'maturity_date'=>$request->maturity_date,
        ]);
        Session::flash('success', 'Loan Created successfully');
        return redirect()->route('loan.index');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $loan = Loan::find($id);
        $loan_periods = LoanPeriod::orderBy('id', 'DESC')->get();
        return view('loan.edit', compact('loan', 'loan_periods'));
    }


    public function update(Request $request, $id)
    {
        $loan = Loan::find($id);
        $loan->update([
            'employee_id'=>$request->employee_id,
            'loan_period_id'=>$request->loan_period,
            'loan_amount'=>$request->loan_amount,
            'interest'=>$request->interest,
            'net_amount'=>$request->net_amount,
            'repaid_p_m'=>$request->repaid_p_m,
            'total_paid'=>$request->total_paid,
            'due_amount'=>$request->due_amount,
            'create_date'=>$request->create_date,
            'maturity_date'=>$request->maturity_date,
        ]);
        Session::flash('success', 'Loan Updated successfully');
        return redirect()->route('loan.index');
    }

    public function destroy($id)
    {
        Loan::find($id)->delete();
        Session::flash('success', 'Loan Deleted Successfully');
        return redirect()->back();
    }
}
