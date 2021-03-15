<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        $users = User::orderBy('id','DESC')->paginate(20);
        return view('user.index',compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
       $request->validate([
           'email' => 'unique:users',
           'password' => 'required|confirmed|',
       ]);
       $image = $request->file('image');
       $image_name = rand().'.'.$image->getClientOriginalExtension();
       $image->move(public_path().'/assets/images/user/',$image_name);
       $nid = $request->file('nid');
       $nid_name = rand().'.'.$nid->getClientOriginalExtension();
       $nid->move(public_path().'/assets/images/nid',$nid_name);
       $document = $request->file('document');
       $document_name = rand().'.'.$document->getClientOriginalExtension();
       $document->move(public_path().'/assets/images/document',$document_name);
       $user = User::create([
           'name' => $request->name,
           'image' => $image_name,
           'email' => $request->email,
           'phone' => $request->phone,
           'nid' => $nid_name,
           'designation' => $request->designation,
           'salary' => $request->salary,
           'grade' => $request->grade,
           'joining_date' => $request->joining_date,
           'address' => $request->address,
           'description' => $request->description,
           'document' => $document_name,
           'password' => bcrypt($request->password)
       ]);
       Session::flash('success','User Created Successfully');
       return redirect()->route('user.index');
    }
    public function show($id)
    {
        $show = User::find($id);
        return view('user.show',compact('show'));
    }
    public function edit($id)
    {
       $edit = User::find($id);
       return view('user.edit',compact('edit'));
    }
    public function update(Request $request, $id)
    {
        //
    }
    public function destroy($id)
    {
       $delete = User::find($id);
       unlink('assets/images/user/'.$delete->image);
       $delete->delete();
       Session::flash('success','User Deleted Successfully');
       return redirect()->route('user.index');
    }


    public function resigned(){
        return view('user.resigned_user');
    }
    public function terminated(){
        return view('user.terminate_user');
    }
    public function group_create(){
        return view('user.group_create');
    }
    public function group_info(){
        return view('user.group_info');
    }


    public function attendance_create(){
        return view('attendance.create');
    }
    public function attendance_info(){
        return view('attendance.index');
    }
    public function task_create(){
        return view('task.create');
    }
    public function task_info(){
        return view('task.index');
    }

    public function loan_create(){
        return view('loan.create');
    }
    public function loan_index(){
        return view('loan.index');
    }
    public function loan_period_create(){
        return view('loan.loan_period_create');
    }
    public function loan_period_index(){
        return view('loan.loan_period_index');
    }

    public function job_create(){
        return view('job.create');
    }
    public function job_info(){
        return view('job.index');
    }

    public function message_info(){
        return view('message.index');
    }

    public function leave_create(){
        return view('leave.create');
    }
    public function leave_info(){
        return view('leave.index');
    }

    public function overtime_create(){
        return view('overtime.create');
    }
    public function overtime_info(){
        return view('overtime.index');
    }

    public function payroll_create(){
        return view('payroll.create');
    }
    public function payroll_info(){
        return view('payroll.index');
    }

    public function provident_info(){
        return view('provident.index');
    }

    public function announcement_create(){
        return view('announcement.create');
    }
    public function announcement_info(){
        return view('announcement.index');
    }

    public function role_create(){
        return view('role.create');
    }
    public function role_info(){
        return view('role.index');
    }
}
