<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DesignationController extends Controller
{
    public function index()
    {
        $designations = Designation::orderBy('id', 'DESC')->get();
        return view('designation.index', compact('designations'));
    }

    public function create()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('designation.create', compact('departments'));
    }

    public function store(Request $request)
    {
        Designation::create([
           'department_id'=>$request->department,
           'designation'=>$request->designation,
        ]);
        Session::flash('success', 'Designation added Successfully');
        return redirect()->route('designation.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $designation = Designation::find($id);
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('designation.edit', compact('designation', 'departments'));
    }

    public function update(Request $request, $id)
    {
        $designation = Designation::find($id);
        $designation->update([
            'department_id'=>$request->department,
            'designation'=>$request->designation,
        ]);
        Session::flash('success', 'Designation Updated Successfully');
        return redirect()->route('designation.index');
    }

    public function destroy($id)
    {
        Designation::find($id)->delete();
        Session::flash('success', 'Designation Deleted Successfully');
        return redirect()->back();
    }
}
