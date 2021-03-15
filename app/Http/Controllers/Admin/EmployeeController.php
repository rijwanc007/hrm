<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use App\Employee;
use App\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::paginate(20);
        return view('employee.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        $grades = Grade::orderBy('id', 'DESC')->get();
        return view('employee.create', compact('departments', 'grades'));
    }

    public function store(Request $request)
    {
        $document = $request->file('photo');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move(public_path().'/assets/images/employees/',$document_name);
        Employee::create([
            'name'=>$request->name,
            'photo'=>$document_name,
            'address'=>$request->address,
            'contact'=>$request->contact,
            'email'=>$request->email,
            'department_id'=>$request->department,
            'designation_id'=>$request->designation,
            'joining_date'=>$request->joining_date,
            'salary'=>$request->salary,
            'grade'=>$request->grade_id,
            'bank_account'=>$request->bank_account,
        ]);
        Session::flash('success', 'Employee created Successfully');
        return redirect()->route('employee.index');
    }

    public function show($id)
    {
        $employee = Employee::find($id);
        return view('employee.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = Department::orderBy('id', 'DESC')->get();
        $grades = Grade::orderBy('id', 'DESC')->get();
        $designations = Designation::orderBy('id', 'DESC')->get();
        return view('employee.edit', compact('employee', 'departments', 'grades', 'designations'));

    }

    public function update(Request $request, $id)
    {
        $employee = Employee::find($id);
        $d = Employee::find($id);
        $document = $request->file('photo');
        if(!empty($document)){
            $document_name = rand().'.'.$document->getClientOriginalExtension();
            $document->move(public_path().'/assets/images/employees/',$document_name);
            $employee->update([
                'name'=>$request->name,
                'photo'=>$document_name,
                'address'=>$request->address,
                'contact'=>$request->contact,
                'email'=>$request->email,
                'department_id'=>$request->department,
                'designation_id'=>$request->designation,
                'joining_date'=>$request->joining_date,
                'salary'=>$request->salary,
                'grade'=>$request->grade_id,
                'bank_account'=>$request->bank_account,
            ]);
            unlink('assets/images/employees/'.$d->photo);
        }
        else{
            $employee->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'contact'=>$request->contact,
                'email'=>$request->email,
                'department_id'=>$request->department,
                'designation_id'=>$request->designation,
                'joining_date'=>$request->joining_date,
                'salary'=>$request->salary,
                'grade'=>$request->grade_id,
                'bank_account'=>$request->bank_account,
            ]);
        }
        Session::flash('success', 'Employee profile updated succesfully');
        return redirect()->route('employee.index');

    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        if(!empty($employee->photo)){
            unlink('assets/images/employees/'.$employee->photo);
        }
        $employee->delete();
        return redirect()->back();
    }

    public function extra_activity(Request $request, $id){
        $employee = Employee::find($id);
        $employee->update([
           'extra_curricullar_activity'=>json_encode($request->list),
        ]);
        Session::flash('success', 'Extra Curricular Activity added Successfully');
        return redirect()->back();
    }
}
