@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'bank.cheque_input','method' => 'POST']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-bank"></i></span>Bank</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="pay_to"> Pay To</label>
                        <input type="text" class="form-control" id="name" name="pay_to" placeholder="pay_to" required>
                    </div>
                    <div class="form-group">
                        <label for="amount"> Amount </label>
                        <input type="text" class="form-control" id="amount_input" name="amount_input" placeholder="Amount" required>
                    </div>
                    <div class="form-group">
                        <label for="date"> Date </label>
                        <input type="date" class="form-control" id="date_input" name="date_input" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block" id="btn"><i class="mdi mdi-bank"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
