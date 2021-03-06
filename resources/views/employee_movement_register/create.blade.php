@extends('master')
@section('content')
        {!! Form::open(['class' =>'form-sample','route' => 'employee_movement_register.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="select_role" >Date</label>
                            <input type='date' id="date" class="form-control" name="date"required/>
                        </div>
                        <div class="form-group">
                            <label for="select_role" >Employee Name</label>
                            <input type='text' id="employee_name" class="form-control" name="employee_name"required/>
                        </div>
                        <div class="form-group">
                            <label for="select_role" >Designation</label>
                            <input type='text' id="designation" class="form-control" name="designation"required/>
                        </div>
                        <div class="form-group">
                            <label for="select_role" >Exit Time</label>
                            <input type='time' id="exit_time" class="form-control" name="exit_time"required/>
                        </div>
                        <div class="form-group">
                            <label for="select_role" >Tour Area</label>
                            <input type='text' id="tour_area" class="form-control" name="tour_area"required/>
                        </div>
                        <div class="form-group">
                            <label for="select_role" >Client's Information</label>
                            <input type='text' id="client_info" class="form-control" name="client_info"required/>
                        </div>
                        <div class="form-group">
                            <label for="select_role" >Project Manager</label>
                            <input type='text' id="project_manager" class="form-control" name="project_manager"required/>
                        </div>
                        <div class="form-group">
                            <label for="select_role" >Entry Time</label>
                            <input type='time' id="entry_time" class="form-control" name="entry_time"required/>
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
