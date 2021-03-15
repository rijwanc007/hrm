<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Claim;
use App\Department;
use App\Employee;
use App\Grade;
use App\Http\Controllers\Controller;
use App\Kpi;
use App\Leave;
use App\Loan;
use App\Payroll;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PayrollController extends Controller
{
    public function index()
    {
        $from = null;
        $payrolls = Payroll::orderBy('id', 'DESC')->get();
        return view('payroll.index', compact('payrolls', 'from'));
    }

    public function create()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('payroll.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $payroll = Payroll::where('month', $request->month)->where('employee_id', $request->employee_id)->first();
        if(empty($payroll)){
            Payroll::create([
                'date'=>$request->date,
                'month'=>$request->month,
                'department_id'=>$request->department,
                'employee_id'=>$request->employee_id,
                'salary'=>$request->salary,
                'kpi'=>$request->kpi,
                'number_of_leaves'=>$request->leave,
                'leave_deduction'=>$request->leave_deduction,
                'late_attendance'=>$request->late_attendance,
                'late_attendance_fee'=>$request->late_attendance_fee,
                'performance_bonus'=>$request->performance_bonus,
                'apprisal'=>$request->apprisal,
                'bonus'=>$request->bonus_amount,
                'net_amount'=>$request->net_amount,
            ]);
            $loans = Loan::where('employee_id', $request->employee_id)->where('due_amount', '!=', '0')->orderBy('id', 'DESC')->get();
            foreach ($loans as $loan){
                $loan->update([
                   'total_paid'=>$loan->total_paid + $loan->repaid_p_m,
                   'due_amount'=>$loan->due_amount - $loan->repaid_p_m,
                ]);
            }
            Session::flash('success', 'Payroll Created Successfully');
        }
        else{
            Session::flash('error', 'Payroll is already created for this employee for this month');
        }

        return redirect()->route('payroll.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $payroll = Payroll::find($id);
        $departments = Department::orderBy('id', 'DESC')->get();
        $employees = Employee::where('department_id', $payroll->department_id)->orderBy('id', 'DESC')->get();
        return view('payroll.edit', compact('payroll', 'departments', 'employees'));
    }

    public function update(Request $request, $id)
    {
        $payroll = Payroll::find($id);
        $payroll2 = Payroll::where('id', '!=', $id)->where('month', $payroll->month)->where('employee_id', $payroll->employee_id)->first();
        if(empty($payroll2)){
            $payroll->update([
                'date'=>$request->date,
                'month'=>$request->month,
                'department_id'=>$request->department,
                'employee_id'=>$request->employee_id,
                'salary'=>$request->salary,
                'kpi'=>$request->kpi,
                'number_of_leaves'=>$request->leave,
                'leave_deduction'=>$request->leave_deduction,
                'late_attendance'=>$request->late_attendance,
                'late_attendance_fee'=>$request->late_attendance_fee,
                'performance_bonus'=>$request->performance_bonus,
                'apprisal'=>$request->apprisal,
                'bonus'=>$request->bonus_amount,
                'net_amount'=>$request->net_amount,
            ]);
            Session::flash('success', 'Payroll Created Successfully');
        }
        else{
            Session::flash('error', 'This employee already exists with different payroll.');
        }
        return redirect()->route('payroll.index');

    }

    public function destroy($id)
    {
        Payroll::find($id)->delete();
        Session::flash('success', 'Payroll Deleted Successfully');
        return redirect()->back();
    }
    public function payslip($id){
        $days_worked = 0;
        $days_absent = 0;
        $payroll = Payroll::find($id);
        $month = explode('-', $payroll->month);
        $employee = Employee::find($payroll->employee_id);
        $loans = Loan::where('employee_id', $payroll->employee_id)->where('due_amount', '!=', '0')->orderBy('id', 'DESC')->sum('repaid_p_m');
        $claims = Claim::where('employee_id', $payroll->employee_id)->orderBy('get');
        $attendance = Attendance::where('employee_id', $payroll->employee_id)->where('month', $month[1])->where('year', $month[0])->orderBy('id', 'DESC')->first();
        if(!empty($attendance)){
            $dates = explode(',',str_replace(str_split('[]""'),'',$attendance->dates));
            for($i=0;$i<count($dates); $i++){
                if($dates[$i] == 1){
                    $days_worked++;
                }
                else{
                    $days_absent++;
                }
            }
        }
        return view('payroll.payslip', compact('payroll', 'employee', 'loans', 'claims', 'days_worked', 'days_absent'));
    }

    public function report(){
        $from = null;
        $payrolls = Payroll::orderBy('id', 'DESC')->get();
        $loans = Loan::where('due_amount', '!=', '0')->orderBy('id', 'DESC')->get();
        return view('payroll.report', compact('payrolls', 'loans', 'from'));
    }
    public function report_date_search(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $payrolls = Payroll::whereDate('date','>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        $loans = Loan::where('due_amount', '!=', '0')->whereDate('create_date','>=', $from)->whereDate('create_date', '<=', $to)->orderBy('id', 'DESC')->get();
        return view('payroll.report', compact('payrolls', 'loans', 'from', 'to'));
    }

    public function date_search(Request $request){
        $from = $request->date_from;
        $to = $request->date_to;
        $payrolls = Payroll::whereDate('date','>=', $from)->whereDate('date', '<=', $to)->orderBy('id', 'DESC')->get();
        return view('payroll.index', compact('payrolls','from', 'to'));
    }

    public function salary($id){
        $eid = explode('_', $id);
        $month = explode('-', $eid[1]);
        $salary = Leave::where('employee_id', $eid[0])->whereYear('date_from',$month[0])->whereMonth('date_from', '>=', $month[1])->whereYear('date_from',$month[0])->whereMonth('date_to', '<=', $month[1])->sum('number_of_days');
        return response()->json($salary);
    }
    public function kpi($id){
        $employee = Employee::find($id);
        $kpi = Kpi::where('department_id', $employee->department_id)->where('designation_id', $employee->designation_id)->orderBy('id', 'DESC')->first();
        return response()->json($kpi);
    }
    public function grade($id){
        $employee = Employee::find($id);
        $grade = Grade::where('id', $employee->grade)->orderBy('id', 'DESC')->first();
        return response()->json($grade);
    }
    public function attendance($id){
        $day =0;
        $eid = explode('_', $id);
        $month = explode('-', $eid[1]);
        $employee = Employee::find($eid[0]);
        $grade = Grade::where('id', $employee->grade)->orderBy('id', 'DESC')->first();
        $attendance = Attendance::where('employee_id', $eid[0])->where('year',$month[0])->where('month', $month[1])->orderBy('id', 'DESC')->first();
        $time = explode(',',str_replace(str_split('[]""'),'',$attendance->time));
        for($i=0 ; $i<count($time) ;$i++){
            if($time[$i] > $grade->office_time && $time[$i] != 'null'){
                $day++;
            }
        }
        return response()->json($day);
    }

}
