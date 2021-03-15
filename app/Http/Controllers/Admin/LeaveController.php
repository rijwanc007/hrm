<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::orderBy('id', 'DESC')->get();
        return view('leave.index', compact('leaves'));
    }

    public function create()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('leave.create', compact('departments'));
    }

    public function store(Request $request)
    {
        Leave::create([
           'department_id'=>$request->department,
           'employee_id'=>$request->employee_id,
            'date_from'=>$request->date_from,
            'date_to'=>$request->date_to,
            'number_of_days'=>$request->number_of_days,
            'reason'=>$request->reason,
            'approved'=>'pending',
        ]);
        Session::flash('success', 'Leave is created successfully');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $leave = Leave::find($id);
        $departments = Department::orderBy('id', 'DESC')->get();
        $employees = Employee::where('department_id', $leave->department_id)->orderBy('id', 'DESC')->get();
        return view('leave.edit', compact('leave', 'departments', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $leave = Leave::find($id);
        $leave->update([
            'department_id'=>$request->department,
            'employee_id'=>$request->employee_id,
            'date_from'=>$request->date_from,
            'date_to'=>$request->date_to,
            'number_of_days'=>$request->number_of_days,
            'no_of_days_taken'=>$request->number_of_days_taken,
            'reason'=>$request->reason,
        ]);
        Session::flash('success', 'Leave is updated successfully');
        return redirect()->route('leave.index');
    }

    public function destroy($id)
    {
        Leave::find($id)->delete();
        Session::flash('success', 'Leave is deleted successfully');
        return redirect()->back();
    }

    public function approve(Request $request, $id){
        $leave = Leave::find($id);
        $leave->update([
           'no_of_days_approved'=> $request->no_of_days_approved,
            'approved'=>'Approved',
        ]);
        Session::flash('success', 'Leave is approved successfully');
        return redirect()->back();
    }
    public function cancel($id){
        $leave = Leave::find($id);
        $leave->update([
            'approved'=>'Canceled',
        ]);
        Session::flash('success', 'Leave is Canceled successfully');
        return redirect()->back();
    }
}
