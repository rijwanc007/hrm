@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'guest.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="select_role" >Date</label>
                        <input type='date' id="date" class="form-control" name="date" required/>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >Guest Name</label>
                        <input type='text' id="guest_name" class="form-control" name="guest_name" required/>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >Meeting To</label>
                        <input type='text' id="meeting_to" class="form-control" name="meeting_to" required/>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >Starting Time</label>
                        <input type='time' id="starting_time" class="form-control" name="starting_time" required/>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >Meeting Room</label>
                        <input type='text' id="meeting_room" class="form-control" name="meeting_room" required/>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >Ending Time</label>
                        <input type='time' id="ending_time" class="form-control" name="ending_time" required/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
