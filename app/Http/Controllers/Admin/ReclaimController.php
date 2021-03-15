<?php

namespace App\Http\Controllers\Admin;

use App\Claim;
use App\Http\Controllers\Controller;
use App\Reclaim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ReclaimController extends Controller
{
    public function index()
    {
        $reclaims = Reclaim::orderBy('id', 'DESC')->get();
        return view('reclaim.index', compact('reclaims'));
    }

    public function create()
    {
        return view('reclaim.create');
    }

    public function store(Request $request)
    {
        $claim = Claim::find($request->claim_id);
        if($request->reclaim > $claim->claim){
            Session::flash('error', 'Can not recalimed more than claimed amount');
        }
        else{
            Reclaim::create([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'claim_id'=>$request->claim_id,
                'reclaim'=>$request->reclaim,
            ]);
            $claim->update([
                'claim'=>$claim->claim - $request->reclaim,
            ]);
            Session::flash('success', 'Reclaimed successfully');
        }
        return redirect()->route('re_claim.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $reclaim = Reclaim::find($id);
        $claims = Claim::where('employee_id', $reclaim->employee_id)->orderBy('id', 'DESC')->get();
        return view('reclaim.edit', compact('reclaim', 'claims'));
    }

    public function update(Request $request, $id)
    {
        $reclaim = Reclaim::find($id);
        $claim = Claim::find($request->claim_id);
        if($reclaim->claim_id == $request->claim_id){
            $claim->update([
               'claim'=> $claim->claim+ $reclaim->reclaim,
            ]);
        }
        if($request->reclaim > $claim->claim){
            Session::flash('error', 'Can not recalimed more than claimed amount');
        }
        else{
            $reclaim->update([
                'date'=>$request->date,
                'employee_id'=>$request->employee_id,
                'claim_id'=>$request->claim_id,
                'reclaim'=>$request->reclaim,
            ]);
            $claim->update([
                'claim'=>$claim->claim - $request->reclaim,
            ]);
            Session::flash('success', 'Reclaimed successfully');
        }
        return redirect()->route('re_claim.index');

    }

    public function destroy($id)
    {
        $reclaim = Reclaim::find($id);

        $claim = Claim::find($reclaim->claim_id);
        $claim->update([
           'claim'=>$claim->claim + $reclaim->reclaim,
        ]);
        $reclaim->delete();
        Session::flash('success', 'Reclaime Deleted successfully');
        return redirect()->back();
    }
    public function claim($id){
        $claims = Claim::where('employee_id', $id)->where('claim', '!=', 0)->orderBy('id', 'DESC')->get();
        return response()->json($claims);
    }
}
