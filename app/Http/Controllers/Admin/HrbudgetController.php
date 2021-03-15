<?php

namespace App\Http\Controllers\Admin;

use App\hr_budget_assign;
use App\Hrbudget;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HrbudgetController extends Controller
{
    public function index()
    {
        $from = null;
        $to =null;
        $hr_budgets = Hrbudget::orderBy('id', 'DESC')->get();
        return view('hrbudget.index', compact('hr_budgets','from', 'to'));
    }


    public function create()
    {
        return view('hrbudget.create');
    }

    public function store(Request $request)
    {
        $budget = hr_budget_assign::whereDate('date_from', '<=', $request->date)->whereDate('date_to', '>=', $request->date)->first();
        $budget->update([
           'budget'=> $budget->budget_remains - array_sum($request->amount),
        ]);
        Hrbudget::create([
           'date'=>$request->date,
           'item'=>json_encode($request->item),
           'amount'=>json_encode($request->amount),
           'total'=>array_sum($request->amount),
        ]);
        Session::flash('success', 'Budget Expense Submitted Successfully');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $budget = hr_budget_assign::find($id);
        return view('hrbudget.assign_edit', compact('budget'));
    }

    public function update(Request $request, $id)
    {
        $budget = hr_budget_assign::find($id);
        $budget->update([
            'date_from'=>$request->date_from,
            'date_to'=>$request->date_to,
            'budget'=>$request->budget,
            'budget_remains'=>$request->budget,
        ]);
        Session::flash('success', 'Hr Budget Assigned for this year Updated successfully');
        return redirect()->route('hr_budget.assign_index');
    }


    public function destroy($id)
    {
        //
    }
    public function date_search(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $hr_budgets = Hrbudget::whereDate('date','>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        return view('hrbudget.index', compact('hr_budgets','from', 'to'));
    }

    public function assign_index(){
        $hr_budgets_indexes = hr_budget_assign::orderBy('id', 'DESC')->get();
        return view('hrbudget.assign_index', compact('hr_budgets_indexes'));
    }
    public function assign(){
        return view('hrbudget.assign');
    }
    public function assign_store(Request $request){
        hr_budget_assign::create([
           'date_from'=>$request->date_from,
           'date_to'=>$request->date_to,
           'budget'=>$request->budget,
           'budget_remains'=>$request->budget,
        ]);

        Session::flash('success', 'Hr Budget Assigned for this year successfully');
        return redirect()->back();
    }

    public function budget_remains($date){
        $budget = hr_budget_assign::whereDate('date_from', '<=', $date)->whereDate('date_to', '>=', $date)->sum('budget_remains');
        return response()->json($budget);

    }
}
