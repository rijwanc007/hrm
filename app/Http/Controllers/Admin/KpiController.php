<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Designation;
use App\Http\Controllers\Controller;
use App\Kpi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KpiController extends Controller
{
    public function index()
    {
        $kpis = Kpi::orderBy('id', 'DESC')->get();
        return view('kpi.index', compact('kpis'));
    }

    public function create()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('kpi.create', compact('departments'));
    }

    public function store(Request $request)
    {
        Kpi::create([
           'department_id'=>$request->department,
            'designation_id'=>$request->designation,
            'amount'=>$request->amount,
        ]);
        Session::flash('success', 'KPI added successfully');
        return redirect()->route('kpi.index');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $kpi = Kpi::find($id);
        $departments = Department::orderBy('id', 'DESC')->get();
        $designations = Designation::where('department_id',$kpi->department_id)->orderBy('id', 'DESC')->get();
        return view('kpi.edit', compact('kpi', 'departments', 'designations'));
    }


    public function update(Request $request, $id)
    {
        $kpi = Kpi::find($id);
        $kpi->update([
            'department_id'=>$request->department,
            'designation_id'=>$request->designation,
            'amount'=>$request->amount,
        ]);
        Session::flash('success', 'KPI Updated successfully');
        return redirect()->route('kpi.index');
    }

    public function destroy($id)
    {
        Kpi::find($id)->delete();
        Session::flash('success', 'KPI Deleted successfully');
        return redirect()->back();
    }
    public function designation($department_id){
        $designations = Designation::where('department_id',$department_id)->orderBy('id', 'DESC')->get();
        return response()->json($designations);
    }
}
