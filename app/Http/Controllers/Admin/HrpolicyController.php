<?php

namespace App\Http\Controllers\Admin;

use App\Hrpolicy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HrpolicyController extends Controller
{
    public function index()
    {
        $hr_policies = Hrpolicy::orderBy('id', 'DESC')->get();
        return view('hr_policy.index', compact('hr_policies'));
    }

    public function create()
    {
        return view('hr_policy.create');
    }

    public function store(Request $request)
    {
        $document = $request->file('content');
        $document_name = rand().'.'.$document->getClientOriginalExtension();
        $document->move(public_path().'/assets/images/hr_policy/',$document_name);

        Hrpolicy::create([
           'title'=>$request->title,
           'content'=>$document_name,
        ]);

        Session::flash('success', 'Content Added Successfully');
        return redirect()->route('hr_policy.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $hr_policy = Hrpolicy::find($id);
        if(!empty($hr_policy->content)){
            unlink('assets/images/hr_policy/'.$hr_policy->content);
        }
        $hr_policy->delete();
        Session::flash('success', 'HR Policy Deleted Successfully');
        return redirect()->back();
    }
}
