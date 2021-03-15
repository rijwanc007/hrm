@extends('master')
@section('content')
    <div class="container">
        {!! Form::open(['class' =>'form-sample','route' => 'department.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <label for="select_role" >Department name</label>
            <input type='text' id="department" class="form-control" name="department" placeholder="Department Name" required/>
        </div>
        <br/><br/>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create </button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
