@extends('master')
@section('content')
{{--    <div class="row">--}}
{{--        <div class="col-md-2"></div>--}}
{{--        <div class="col-md-2">--}}
{{--            <div class="form-group">--}}
{{--                <select class="form-control" name="type_of_collection" id="type_of_collection" style="border: 1px solid grey" >--}}
{{--                    <option selected disabled value="">Select Status</option>--}}
{{--                    <option value="advanced_received">All</option>--}}
{{--                    <option value="advanced_received">Pending</option>--}}
{{--                    <option value="during_project">Approved</option>--}}
{{--                    <option value="after_service_rendered">Cancelled</option>--}}
{{--                </select>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2">--}}
{{--            <div class="form-group">--}}
{{--                <input type="date" class="form-control payment" id="amount" name="amount" placeholder="Start Date" style="border: 1px solid grey">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2">--}}
{{--            <div class="form-group">--}}
{{--                <input type="date" class="form-control payment" id="amount" name="amount" placeholder="End Date" style="border: 1px solid grey">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-md-2">--}}
{{--            <button type="submit" class="btn btn-gradient-info btn-lg btn-block"><i class="mdi mdi-magnify"></i> Search </button>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">All Leaves<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>S/L</th>
                                    <th> Department </th>
                                    <th> Name </th>
                                    <th> From Date </th>
                                    <th> To Date </th>
                                    <th> No. of days </th>
                                    <th> No. of days approved </th>
                                    <th> Taken days </th>
                                    <th> Reason </th>
                                    <th> Status </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($leaves as $leave)
                                    <tr class="text-center">
                                        <td>{{$loop->index  + 1}}</td>
                                        <td>{{!empty($leave->employee->department->department_name) ? $leave->employee->department->department_name : 'N/A'}}</td>
                                        <td>{{!empty($leave->employee->name) ? $leave->employee->name : 'N/A'}}</td>
                                        <td>{{$leave->date_from}}</td>
                                        <td>{{$leave->date_to}}</td>
                                        <td>{{$leave->number_of_days}}</td>
                                        <td>{{$leave->no_of_days_approved}}</td>
                                        <td>{{!empty($leave->no_of_days_taken) ? $leave->no_of_days_taken : 'N/A'}}</td>
                                        <td>{{$leave->reason}}</td>
                                        <td>{{$leave->approved}}</td>
                                        <td>
                                            @if($leave->approved == 'pending')
                                            <div class="modal fade" id="approve_modal_{{$leave->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Approve Leave</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Please Put Number of days leave approved</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            {!! Form::open(['route' => ['leave.approve',$leave->id],'method' => 'GET']) !!}
                                                            <input type="number" class="form-control" name="no_of_days_approved" id="no_of_days_approved" placeholder="Number Of Days approved">
                                                            <br/>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-success btn-sm btn-block" data-toggle="modal" data-target="#approve_modal_{{$leave->id}}">Approve</button>
                                            <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('leave.cancel',$leave->id)}}'">Cancel</button>
                                            @endif
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('leave.edit',$leave->id)}}'">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$leave->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Leave</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete These Leave?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['leave.destroy',$leave->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$leave->id}}">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center text-info">{{'No Leaves Created Yet'}}</td>
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
