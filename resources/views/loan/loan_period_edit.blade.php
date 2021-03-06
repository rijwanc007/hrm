@extends('master')
@section('content')
        {!! Form::open(['class' =>'form-sample','route' => ['loan_period.update', $loan_period->id],'method' => 'PATCh', 'enctype' => 'multipart/form-data']) !!}
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span>Loan Period Update</h3></div>
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="loan_period">Loan Period</label>
                                <input type="text" class="form-control" id="loan_period" name="loan_period" placeholder="12 months" value="{{$loan_period->loan_period}}" required>
                            </div>
                            <div class="form-group">
                                <label for="loan_amount">Loan Amount</label>
                                <input type="number" class="form-control" id="loan_amount" name="loan_amount" placeholder="Loan Amount" value="{{$loan_period->loan_amount}}" required>
                            </div>
                            <div class="form-group">
                                <label for="interest">Interest (%)</label>
                                <input type="number" class="form-control" id="interest" name="interest" placeholder="interest %" value="{{$loan_period->interest}}" required>
                            </div>
                            <div class="form-group">
                                <label for="repaid_p_m">Repaid P/M</label>
                                <input type="number" class="form-control" id="repaid_p_m" name="repaid_p_m" placeholder="repaid per month" value="{{$loan_period->repaid_p_m}}" required>
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
