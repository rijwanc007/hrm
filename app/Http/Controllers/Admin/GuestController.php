<?php

namespace App\Http\Controllers\Admin;

use App\Guest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    public function index()
    {
        $guests = Guest::orderBy('id', 'DESC')->get();
        return view('guest.index', compact('guests'));
    }

    public function create()
    {
        return view('guest.create');
    }

    public function store(Request $request)
    {
        $guest = Guest::where('date', $request->date)->where('meeting_to',$request->meeting_to)->where('starting_time', $request->starting_date)->orderBy('id','DESC')->first();
        if(empty($guest)){
            Guest::create([
                'date'=>$request->date,
                'guest_name'=>$request->guest_name,
                'meeting_to'=>$request->meeting_to,
                'starting_time'=>$request->starting_time,
                'meeting_room'=>$request->meeting_room,
                'ending_time'=>$request->ending_time,
            ]);
            Session::flash('success', 'Guest Created Successfully');
        }
        else{
            Session::flash('error', 'Meeting room is engaged');
        }
        return redirect()->route('guest.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $guest = Guest::find($id);
        return view('guest.edit', compact('guest'));
    }

    public function update(Request $request, $id)
    {
        $guest = Guest::find($id);
        $guest->update([
            'date'=>$request->date,
            'guest_name'=>$request->guest_name,
            'meeting_to'=>$request->meeting_to,
            'starting_time'=>$request->starting_time,
            'meeting_room'=>$request->meeting_room,
            'ending_time'=>$request->ending_time,
        ]);
        Session::flash('success', 'Guest Updated Successfully');
        return redirect()->route('guest.index');
    }

    public function destroy($id)
    {
        Guest::find($id)->delete();
        Session::flash('success', 'Guest Deleted Successfully');
        return redirect()->back();
    }
}
