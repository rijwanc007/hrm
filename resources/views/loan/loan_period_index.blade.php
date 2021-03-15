@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">Available Loan Periods<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L </th>
                                    <th> Available Loans </th>
                                    <th> Amount </th>
                                    <th> Interest </th>
                                    <th> Repaid P/M </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($loan_periods as $loan_period)
                                    <tr class="text-center">
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$loan_period->loan_period}}</td>
                                        <td>{{$loan_period->loan_amount}} /-</td>
                                        <td>{{$loan_period->interest}} %</td>
                                        <td>{{$loan_period->repaid_p_m}}/-</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('loan_period.edit',$loan_period->id)}}'">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$loan_period->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Loan Period</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete These Loan period?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['loan_period.destroy',$loan_period->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$loan_period->id}}">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-info">{{'No Loan Periods Created Yet'}}</td>
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
