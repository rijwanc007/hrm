<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\LoanPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoanperiodController extends Controller
{
    public function index()
    {
        $loan_periods = LoanPeriod::orderBy('id', 'DESC')->get();
        return view('loan.loan_period_index', compact('loan_periods'));
    }

    public function create()
    {
        return view('loan.loan_period_create');
    }

    public function store(Request $request)
    {
        LoanPeriod::create([
           'loan_period'=>$request->loan_period,
           'loan_amount'=>$request->loan_amount,
           'interest'=>$request->interest,
           'repaid_p_m'=>$request->repaid_p_m,
        ]);
        Session::flash('success', 'Loan Period Created Successfully');
        return redirect()->route('loan_period.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $loan_period = LoanPeriod::find($id);
        return view('loan.loan_period_edit', compact('loan_period'));
    }

    public function update(Request $request, $id)
    {
        $loan_period = LoanPeriod::find($id);
        $loan_period->update([
            'loan_period'=>$request->loan_period,
            'loan_amount'=>$request->loan_amount,
            'interest'=>$request->interest,
            'repaid_p_m'=>$request->repaid_p_m,
        ]);
        Session::flash('success', 'Loan Period Updated Successfully');
        return redirect()->route('loan_period.index');
    }

    public function destroy($id)
    {
        LoanPeriod::find($id)->delete();
        Session::flash('success', 'Loan Period Deleted Successfully');
        return redirect()->back();
    }
}
