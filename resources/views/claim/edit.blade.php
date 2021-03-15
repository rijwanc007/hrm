@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['claim.update', $claim->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span>Claim</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$claim->date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="employee_id">Employee Id</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" value="{{$claim->employee_id}}" required>
                        </div>
                        <div class="form-group">
                            <label for="claim">Claim</label>
                            <input type="number" class="form-control" id="claim" name="claim" placeholder="Claim" value="{{$claim->claim}}" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-pencil"></i> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
