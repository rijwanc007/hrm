<?php

namespace App\Http\Controllers\Admin;

use App\Asset;
use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AssetController extends Controller
{
    public function index()
    {
        $assets = Asset::where('status', 'approved')->orderBy('id', 'DESC')->get();
        return view('asset.index', compact('assets'));
    }

    public function create()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('asset.create', compact('departments'));
    }


    public function store(Request $request)
    {
        Asset::create([
           'department_id'=>$request->department,
           'employee_id'=>$request->employee_id,
           'item'=>json_encode($request->item),
           'status'=>'approved',
        ]);
        Session::flash('success', 'Asset Assigned to Employee successfully');
        return redirect()->route('asset.index');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $asset = Asset::find($id);
        $departments = Department::orderBy('id', 'DESC')->get();
        $employees = Employee::where('department_id', $asset->department_id)->orderBy('id', 'DESC')->get();
        return view('asset.edit', compact('asset', 'departments', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $asset = Asset::find($id);
        $asset->update([
            'department_id'=>$request->department,
            'employee_id'=>$request->employee_id,
            'item'=>json_encode($request->item),
            'status'=>'approved',
        ]);
        Session::flash('success', 'Asset Assigned to Employee Updated successfully');
        return redirect()->route('asset.index');
    }

    public function destroy($id)
    {
        Asset::find($id)->delete();
        Session::flash('success', 'Asset Assigned to Employee Deleted successfully');
        return redirect()->back();
    }

    public function create_requisition()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('asset.create_requisition', compact('departments'));
    }
    public function store_requisition(Request $request)
    {
        Asset::create([
            'department_id'=>$request->department,
            'employee_id'=>$request->employee_id,
            'item'=>json_encode($request->item),
            'status'=>'pending',
        ]);
        Session::flash('success', 'Asset Requisition is pending for approval');
        return redirect()->back();
    }
    public function index_requisition()
    {
        $assets = Asset::orderBy('id', 'DESC')->get();
        return view('asset.index_requisition', compact('assets'));
    }

}
