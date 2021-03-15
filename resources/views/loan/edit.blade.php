@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['loan.update', $loan->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span>Loan Update</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="create_date">Date</label>
                            <input type="date" class="form-control" id="create_date" name="create_date" value="{{$loan->create_date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="employee_id">Employee_id</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Employee ID" value="{{$loan->employee_id}}" required>
                        </div>
                        <div class="form-group">
                            <label for="loan_period" >Loan Period</label>
                            <select class="form-control" name="loan_period" id="loan_period" >
                                <option selected disabled value="">Choose Department</option>
                                @foreach($loan_periods as $loan_period)
                                    <option value="{{$loan_period->id}}" @if($loan_period->id == $loan->id) selected @endif>{{$loan_period->loan_period}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="loan_amount">Loan Amount</label>
                            <input type="number" class="form-control" id="loan_amount" name="loan_amount" value="{{$loan->loan_amount}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="interest">Interest (%)</label>
                            <input type="number" class="form-control" id="interest" name="interest" value="{{$loan->interest}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="net_amount">Net Amount</label>
                            <input type="number" class="form-control" id="net_amount" name="net_amount" value="{{$loan->net_amount}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="repaid_p_m">Repaid P/M</label>
                            <input type="number" class="form-control" id="repaid_p_m" name="repaid_p_m" value="{{$loan->repaid_p_m}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="total_paid">Total Paid</label>
                            <input type="number" class="form-control" id="total_paid" name="total_paid" value="{{$loan->total_paid}}" placeholder="Total Paid">
                        </div>
                        <div class="form-group">
                            <label for="due_amount">Due Amount</label>
                            <input type="number" class="form-control" id="due_amount" name="due_amount" value="{{$loan->due_amount}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="mature_date">Mature Date</label>
                            <input type="date" class="form-control" id="maturity_date" name="maturity_date" value="{{$loan->maturity_date}}" required>
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
        $(document).on('change', '#loan_period', function (){
            let load_period_id = $(this).val();
            @foreach($loan_periods as $loan_period)
            if(load_period_id == {{$loan_period->id}}){
                _('loan_amount').value = {{$loan_period->loan_amount}};
                _('interest').value = {{$loan_period->interest}};
                _('repaid_p_m').value = {{$loan_period->repaid_p_m}};
                let percentage = {{$loan_period->interest / 100}};
                let net_amount = (percentage * _('loan_amount').value) + +_('loan_amount').value;
                _('net_amount').value = net_amount;
                _('due_amount').value = net_amount;
            }
            @endforeach
        });
        $(document).on('input', '#total_paid', function (){
            let total_paid = _('total_paid').value;
            _('due_amount').value = _('net_amount').value - total_paid;
        });
    </script>
@endsection
