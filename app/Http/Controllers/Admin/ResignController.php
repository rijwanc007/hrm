<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use App\Resign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResignController extends Controller
{
    public function index()
    {
        $resigned_applicatants = Resign::orderBy('id', 'DESC')->get();
        return view('resign.index', compact('resigned_applicatants'));
    }

    public function create()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('resign.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $application = $request->file('application');
        $application_name = rand().'.'.$application->getClientOriginalExtension();
        $application->move(public_path().'/assets/images/employees/resignation/',$application_name);
        Resign::create([
           'department_id'=>$request->department,
           'employee_id'=>$request->employee_id,
           'application'=>$application_name,
           'termination_date'=>$request->termination_date,
           'status'=>'pending',
        ]);
        Session::flash('success', 'Your Resignation is pending for approval');
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function ratio(){
        $employee = Employee::orderBy('id', 'DESC')->count();
        $resign_employee = Resign::where('status', 'approved')->orderBy('id', 'DESC')->count();
        if($resign_employee != 0){
            $ratio = ($employee/$resign_employee) * 100;
        }
        else{
            $ratio = 100;
        }

        return view('resign.ratio', compact('employee', 'resign_employee', 'ratio'));
    }
}
