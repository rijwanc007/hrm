<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskassignController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('id', 'DESC')->get();
        return view('task.index', compact('tasks'));
    }

    public function create()
    {
        return view('task.create');
    }


    public function store(Request $request)
    {
        Task::create([
           'title'=>$request->title,
           'client_id'=>$request->client,
           'project_id'=>$request->project,
           'priority'=>$request->priority,
           'employee_id'=>$request->employee_id,
           'start_date'=>$request->start_date,
           'start_time'=>$request->start_time,
           'end_date'=>$request->end_date,
           'end_time'=>$request->end_time,
           'message'=>$request->message,
        ]);
        Session::flash('success', 'Task assigned Successfully');
        return redirect()->route('task.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $task = Task::find($id);
        return view('task.edit', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);
        $task->update([
            'title'=>$request->title,
            'client_id'=>$request->client,
            'project_id'=>$request->project,
            'priority'=>$request->priority,
            'employee_id'=>$request->employee_id,
            'start_date'=>$request->start_date,
            'start_time'=>$request->start_time,
            'end_date'=>$request->end_date,
            'end_time'=>$request->end_time,
            'message'=>$request->message,
        ]);
        Session::flash('success', 'Task Updated Successfully');
        return redirect()->route('task.index');
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect()->back();
    }
}
