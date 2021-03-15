<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function idcard(){
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('card.id', compact('departments'));
    }
    public function visitingcard(){
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('card.visiting', compact('departments'));
    }
    public function employee_designation($employee_id){
        $employee = Employee::find($employee_id);
        $designation = Designation::find($employee->designation_id);
        return response()->json($designation);
    }
}
