<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('department.index', compact('departments'));
    }

    public function create()
    {
        return view('department.create');
    }

    public function store(Request $request)
    {
        Department::create([
           'department_name'=>$request->department,
        ]);
        Session::flash('success', 'Department Created Successfully');
        return redirect()->route('department.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $department = Department::find($id);
        return view('department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $department = Department::find($id);
        $department->update([
            'department_name'=>$request->department,
        ]);
        Session::flash('success', 'Department Updated Successfully');
        return redirect()->route('department.index');
    }

    public function destroy($id)
    {
        Department::find($id)->delete();
        Session::flash('success', 'Department Deleted Successfully');
        return redirect()->back();
    }
}
