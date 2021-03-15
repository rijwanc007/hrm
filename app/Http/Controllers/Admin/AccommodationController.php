<?php

namespace App\Http\Controllers\Admin;

use App\Accommodation;
use App\Designation;
use App\Grade;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccommodationController extends Controller
{
    public function index()
    {
        $accommodations = Accommodation::orderBy('id', 'DESC')->get();
        $grades = Grade::orderBy('id', 'DESC')->get();
        $designations = Designation::orderBy('id', 'DESC')->get();
        return view('accommodation.index', compact('accommodations', 'grades', 'designations'));
    }

    public function create()
    {
        $grades = Grade::orderBy('id', 'DESC')->get();
        return view('accommodation.create', compact('grades'));
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
        Accommodation::create([
           'grade_id'=>json_encode($request->grade_id),
           'designation_id'=>json_encode($designation_id),
           'dhaka'=>$request->dhaka,
           'divisional_town'=>$request->divisional_town,
           'other_area'=>$request->other_area,
        ]);

        Session::flash('success', 'Accommodation created successfully');
        return redirect()->route('accommodation.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $accommodation = Accommodation::find($id);
        $grades = Grade::orderBy('id', 'DESC')->get();
        return view('accommodation.edit', compact('accommodation', 'grades'));
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
        $accommodation = Accommodation::find($id);
        $accommodation->update([
            'grade_id'=>json_encode($request->grade_id),
            'designation_id'=>json_encode($designation_id),
            'dhaka'=>$request->dhaka,
            'divisional_town'=>$request->divisional_town,
            'other_area'=>$request->other_area,
        ]);
        Session::flash('success', 'Accommodation updated successfully');
        return redirect()->route('accommodation.index');
    }

    public function destroy($id)
    {
        Accommodation::find($id)->delete();
        Session::flash('success', 'Accommodation deleted successfully');
        return redirect()->back();
    }
}
