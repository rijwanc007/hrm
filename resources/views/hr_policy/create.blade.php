@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'hr_policy.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New HR Policy</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" required>
                    </div>
                    <div class="form-group">
                        <label for="content" >Upload Content</label>
                        <input type='file' class="form-control" id="content" name="content" accept=".pdf, .doc, .docx .ppt .pptx .xls" />
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
