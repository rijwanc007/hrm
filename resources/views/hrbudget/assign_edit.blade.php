@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['hr_budget.update', $budget->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span> Update Budget Expense</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label class="date">Date From</label>
                            <input type="date" class="form-control" name="date_from" id="date_from" value="{{$budget->date_from}}">
                        </div>
                        <div class="form-group">
                            <label class="date">Date To</label>
                            <input type="date" class="form-control" name="date_to" id="date_to" value="{{$budget->date_to}}">
                        </div>
                        <div class="form-group">
                            <label class="date">Budget</label>
                            <input type="text" class="form-control" name="budget" id="budget" value="{{$budget->budget}}">
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
    <script>
        function _(x){
            return document.getElementById(x);
        }
    </script>
@endsection
