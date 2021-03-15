@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'payroll.date_search','method' => 'GET']) !!}
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">Date From</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">Date To</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="none"></label>
                                    <button class="btn btn-gradient-primary btn-lg btn-block form-control" id="search_balance">Search</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                            <br/><br/>
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    @if(!empty($from))
                                        <div class="row">
                                            <div class="col-md-3">From : {{$from}} <br/> To : {{$to}}</div>
                                            <div class="col-md-6"><h4 class="project_info_tag text-center">HR Budget Expense Report<hr/></h4></div>
                                            <div class="col-md-3">Date :: {{date('Y-m-d')}}</div>
                                        </div>
                                        <br/>
                                    @else
                                        <h2 class="text-center text-info">Payroll Expense Sheet<hr/></h2><br/>
                                    @endif
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th> S/L</th>
                                            <th> Month</th>
                                            <th> Employee</th>
                                            <th> Department</th>
                                            <th> Salary</th>
                                            <th> KPI</th>
                                            <th> Performance Bonus</th>
                                            <th> Apprisal</th>
                                            <th> Bonus</th>
                                            <th> Leave Deduction</th>
                                            <th> Late Attendance Fee</th>
                                            <th> Total</th>
                                            <th> Option</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($payrolls as $payroll)
                                            <tr class="text-center">
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$payroll->month}}</td>
                                                <td>{{!empty($payroll->employee) ? $payroll->employee->name : 'N/A'}}</td>
                                                <td>{{!empty($payroll->department) ? $payroll->department->department_name : 'N/A'}}</td>
                                                <td>{{!empty($payroll->salary) ? $payroll->salary : '0'}} .00</td>
                                                <td>{{!empty($payroll->kpi) ? $payroll->kpi : '0'}} .00</td>
                                                <td>{{!empty($payroll->performance_bonus) ? $payroll->performance_bonus : '0'}} .00</td>
                                                <td>{{!empty($payroll->apprisal) ? $payroll->apprisal : '0'}} .00</td>
                                                <td>{{!empty($payroll->bonus) ? $payroll->bonus : '0'}} .00</td>
                                                <td>{{!empty($payroll->leave_deduction) ? ($payroll->leave_deduction * $payroll->number_of_leaves) : '0'}} .00</td>
                                                <td>{{!empty($payroll->late_attendance) ? ($payroll->late_attendance * $payroll->late_attendance_fee) : '0'}} .00</td>
                                                <td>{{$payroll->net_amount}} .00</td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('payroll.edit',$payroll->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                    <br/>
                                                    <div class="modal fade" id="delete_modal_{{$payroll->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Payroll</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Do You Want To Delete This Payroll.</p>
                                                                    <p>Once You Delete This Payroll</p>
                                                                    <p>You Will Delete This Payroll Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['payroll.destroy',$payroll->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$payroll->id}}" data-title="tooltip" title="Delete">Delete</button>
                                                    <br/>
                                                    <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('payroll.payslip',$payroll->id)}}'" data-toggle="tooltip" title="Payslip">Payslip</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="13" class="text-center text-info">{{'No Payroll Created Yet'}}</td>
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
    </div>
@endsection
