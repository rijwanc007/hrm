@extends('master')
@section('content')
    <div class="container">
        {!! Form::open(['class' =>'form-sample','route' => 'pdf.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                <label for="select_role" >CV/Resume</label>
                <input type='file' id="cv" class="form-control" name="cv" accept=".pdf" required/>
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
