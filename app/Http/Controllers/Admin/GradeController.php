<?php

namespace App\Http\Controllers\Admin;

use App\Designation;
use App\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use function GuzzleHttp\Promise\all;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::orderBy('id', 'DESC')->get();
        $designations = Designation::orderBy('id', 'DESC')->get();
        return view('grade.index', compact('grades', 'designations'));
    }

    public function create()
    {
        $designations = Designation::orderBy('id', 'DESC')->get();
        return view('grade.create', compact('designations'));
    }

    public function store(Request $request)
    {
        Grade::create([
           'grade'=>$request->grade,
           'designation_id'=>json_encode($request->designation_id),
            'leave_deduction'=>$request->leave_deduction,
            'office_time'=>$request->office_time,
            'late_attendance_fee'=>$request->late_attendance_fee,
        ]);
        Session::flash('success', 'Grade added successfully');
        return redirect()->route('grade.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $grade = Grade::find($id);
        $designations = Designation::orderBy('id', 'DESC')->get();
        return view('grade.edit', compact('grade', 'designations'));
    }


    public function update(Request $request, $id)
    {
        $grade = Grade::find($id);
        $grade->update([
            'grade'=>$request->grade,
            'designation_id'=>json_encode($request->designation_id),
            'leave_deduction'=>$request->leave_deduction,
            'office_time'=>$request->office_time,
            'late_attendance_fee'=>$request->late_attendance_fee,
        ]);
        Session::flash('success', 'Grade updated successfully');
        return redirect()->route('grade.index');
    }

    public function destroy($id)
    {
        Grade::find($id)->delete();
        Session::flash('success', 'Grade Deleted successfully');
        return redirect()->back();
    }
}
