<?php

namespace App\Http\Controllers\Admin;

use App\Designation;
use App\Grade;
use App\Http\Controllers\Controller;
use App\Ta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Tacontroller extends Controller
{
    public function index()
    {
        $tas = Ta::orderBy('id', 'DESC')->get();
        $grades = Grade::orderBy('id', 'DESC')->get();
        $designations = Designation::orderBy('id', 'DESC')->get();
        return view('tada.index', compact('tas', 'grades', 'designations'));
    }
    public function create()
    {
        $grades = Grade::orderBy('id', 'DESC')->get();
        return view('tada.create', compact('grades'));
    }

    public function store(Request $request)
    {
        $grades = Grade::orderBy('id', 'DESC')->get();
        $designation_id = array();
        for($i=0; $i<count($request->grade_id) ; $i++){
            foreach($grades as $grade){
                if($grade->id == $request->grade_id[$i]){
                    $designation_id = json_decode($grade->designation_id);
                }
            }
        }

        $mode_of_transport= explode(',', $request->mode_of_transport);
        Ta::create([
           'grade_id'=>json_encode($request->grade_id),
           'designation_id'=>json_encode($designation_id),
           'mode_of_transport'=>json_encode($mode_of_transport),
            'ta'=>$request->ta,
            'da'=>$request->da,
            ]);

        Session::flash('success', 'TA/DA created Successfully');
        return redirect()->route('ta.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $ta = Ta::find($id);
        $mot = str_replace(str_split('[]""'),'',$ta->mode_of_transport);
        $grades = Grade::orderBy('id', 'DESC')->get();
        return view('tada.edit', compact('ta', 'grades', 'mot'));

    }

    public function update(Request $request, $id)
    {
        $grades = Grade::orderBy('id', 'DESC')->get();
        $designation_id = array();
        for($i=0; $i<count($request->grade_id) ; $i++){
            foreach($grades as $grade){
                if($grade->id == $request->grade_id[$i]){
                    $designation_id = json_decode($grade->designation_id);
                }
            }
        }
        $mode_of_transport= explode(',', $request->mode_of_transport);
        $ta = Ta::find($id);
        $ta->update([
            'grade_id'=>json_encode($request->grade_id),
            'designation_id'=>json_encode($designation_id),
            'mode_of_transport'=>json_encode($mode_of_transport),
            'ta'=>$request->ta,
            'da'=>$request->da,
        ]);
        Session::flash('success', 'TA/DA updated Successfully');
        return redirect()->route('ta.index');
    }

    public function destroy($id)
    {
        Ta::find($id)->delete();
        Session::flash('success', 'TA/DA deleted Successfully');
        return redirect()->back();
    }
}
