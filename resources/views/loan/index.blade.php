@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">All Loans<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> Employee Name </th>
                                    <th> Loan_Period </th>
                                    <th> Loan_Amount </th>
                                    <th> Interest(%) </th>
                                    <th> Net_Amount </th>
                                    <th> Repaid_P/M </th>
                                    <th> Total_Paid </th>
                                    <th> Due_Amount </th>
                                    <th> Create_Date </th>
                                    <th> Maturity_Date </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($loans as $loan)
                                    <tr class="text-center">
                                        <td>{{!empty($loan->employee->name) ? $loan->employee->name : 'N/A'}}</td>
                                        <td>{{!empty($loan->loan_period->loan_period) ? $loan->loan_period->loan_period : 'N/A'}}</td>
                                        <td>{{$loan->loan_amount}}</td>
                                        <td>{{$loan->interest}}</td>
                                        <td>{{$loan->net_amount}}</td>
                                        <td>{{$loan->repaid_p_m}}</td>
                                        <td>{{!empty($loan->total_paid) ? $loan->total_paid : '0'}}</td>
                                        <td>{{$loan->due_amount}}</td>
                                        <td>{{$loan->create_date}}</td>
                                        <td>{{$loan->maturity_date}}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('loan.edit',$loan->id)}}'">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$loan->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Loan</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete These Loan?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['loan.destroy',$loan->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$loan->id}}">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center text-info">{{'No Loan Created Yet'}}</td>
                                </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
