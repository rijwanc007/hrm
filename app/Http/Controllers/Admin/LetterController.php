<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LetterController extends Controller
{
    public function appointment(){
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('letter.appointment', compact('departments'));
    }
    public function show_cause(){
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('letter.show_cause', compact('departments'));
    }
    public function transfer(){
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('letter.transfer', compact('departments'));
    }
    public function joining(){
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('letter.joining', compact('departments'));
    }
    public function promotion(){
        $departments = Department::orderBy('id', 'DESC')->get();
        $designations = Designation::orderBy('id', 'DESC')->get();
        return view('letter.promotion', compact('departments', 'designations'));
    }
    public function increment(){
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('letter.increment', compact('departments'));
    }
    public function employee($id){
        $employee = Employee::find($id);
        return response()->json($employee);
    }
}
