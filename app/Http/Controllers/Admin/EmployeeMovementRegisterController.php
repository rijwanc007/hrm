<?php

namespace App\Http\Controllers\Admin;

use App\Employeemovementregister;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EmployeeMovementRegisterController extends Controller
{
    public function index()
    {
        $employee_movement_registers = Employeemovementregister::orderBy('id', 'DESC')->get();
        return view('employee_movement_register.index', compact('employee_movement_registers'));
    }

    public function create()
    {
        return view('employee_movement_register.create');
    }

    public function store(Request $request)
    {
        Employeemovementregister::create([
           'date'=>$request->date,
           'employee_name'=>$request->employee_name,
           'designation'=>$request->designation,
           'exit_time'=>$request->exit_time,
           'tour_area'=>$request->tour_area,
           'clients_information'=>$request->client_info,
           'project_manager'=>$request->project_manager,
           'entry_time'=>$request->entry_time,
        ]);
        Session::flash('success', 'Employee Movement Register Created Successfully');
        return redirect()->route('employee_movement_register.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $employee_movement = Employeemovementregister::find($id);
        return view('employee_movement_register.edit', compact('employee_movement'));
    }

    public function update(Request $request, $id)
    {
        $employee_movement = Employeemovementregister::find($id);
        $employee_movement->update([
            'date'=>$request->date,
            'employee_name'=>$request->employee_name,
            'designation'=>$request->designation,
            'exit_time'=>$request->exit_time,
            'tour_area'=>$request->tour_area,
            'clients_information'=>$request->client_info,
            'project_manager'=>$request->project_manager,
            'entry_time'=>$request->entry_time,
        ]);
        Session::flash('success', 'Employee Movement Register Updated Successfully');
        return redirect()->route('employee_movement_register.index');
    }

    public function destroy($id)
    {
        Employeemovementregister::find($id)->delete();
        Session::flash('success', 'Employee Movement Register Deleted Successfully');
        return redirect()->back();
    }
}
