<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Department;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::orderBy('id', 'DESC')->get();
        return view('attendance.index', compact('attendances'));
    }

    public function create()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('attendance.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $explode = explode('-',$request->month);
        $month = $explode[1];
        $year = $explode[0];
        $var = json_encode($request->date);
        $time = json_encode($request->time);
        Attendance::create([
            'employee_id'=>$request->employee_id,
            'month'=>$month,
            'year'=>$year,
            'dates'=>$var,
            'time'=>$time,
        ]);
        Session::flash('success', 'Attendance Created Successfully');
        return redirect()->route('attendance.index');
    }

    public function show($id)
    {
        return view('attendance.show', compact('id'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $var = json_encode($request->date);
        $time = json_encode($request->time);

        $attendance = Attendance::find($id);
        $attendance->update([
            'dates'=>$var,
            'time'=>$time,
        ]);
        Session::flash('success', 'Attendance Updated Successfully');
        return redirect()->route('attendance.index');
    }

    public function destroy($id)
    {
        //
    }

    public function attendance_Month(Request $request){
        $month_year = $request->month;
        $explode = explode('-',$request->month);
        $month = $explode[1];
        $year = $explode[0];
        $employee = Employee::find($request->employee_id);
        $departments = Department::orderBy('id', 'DESC')->get();
        if($year > $employee->created_at->format('Y') || $year == $employee->created_at->format('Y')){
            if($month > $employee->created_at->format('m') || $month == $employee->created_at->format('m')){
                $attendances = Attendance::where('employee_id',$request->employee_id)->where('year',$year)->where('month',$month)->first();
                $check = 1;
                $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
                return view('attendance.create', compact('employee','departments','attendances','check','month_year','days'));
            }else{
                echo 'invalid month';
            }
        }else{
            echo 'invalid year';
        }
    }

    public function employee_search(Request $request){
        $input = $request->item;
        $employees = Employee::where('name', 'like', "%$input%")
            ->orWhereIn('department_id', Department::where('department_name', 'like', "%$input%")->orderBy('id', 'DESC')->pluck('id')->toArray())
            ->orderBy('id', 'DESC')->pluck('id')->toArray();
        $attendances = Attendance::whereIn('employee_id',$employees)->orderBy('id', 'DESC')->get();
        return view('attendance.index', compact('attendances'));
    }

    public function employee($id){
        $employees = Employee::where('department_id', $id)->get();
        return response()->json($employees);
    }
}
