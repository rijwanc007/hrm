<?php

namespace App\Http\Controllers\Admin;

use App\Claim;
use App\Http\Controllers\Controller;
use App\Reclaim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClaimController extends Controller
{
    public function index()
    {
        $claims = Claim::orderBy('id', 'DESC')->get();
        return view('claim.index', compact('claims'));
    }

    public function create()
    {
        return view('claim.create');
    }

    public function store(Request $request)
    {
        Claim::create([
           'employee_id'=>$request->employee_id,
           'claim'=>$request->claim,
           'date'=>$request->date,
        ]);
        Session::flash('success', 'Claim Created Successfully');
        return redirect()->route('claim.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $claim = Claim::find($id);
        return view('claim.edit', compact('claim'));
    }

    public function update(Request $request, $id)
    {
        $claim = Claim::find($id);
        $claim->update([
            'employee_id'=>$request->employee_id,
            'claim'=>$request->claim,
            'date'=>$request->date,
        ]);
        Session::flash('success', 'Claim Updated Successfully');
        return redirect()->route('claim.index');
    }

    public function destroy($id)
    {
        Claim::find($id)->delete();
        Reclaim::where('claim_id', $id)->delete();
        Session::flash('success', 'Claim Deleted Successfully');
        return redirect()->back();
    }
}
