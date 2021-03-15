@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">All Employee Attendance<hr/></h4>
                            <br>
                            {!! Form::open(['route' => 'attendance.employee_search','method' => 'GET']) !!}
                            <div class="row text-center">
                                <div class="col-md-2"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="item" name="item" placeholder="Search in table.....">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <button class="btn btn-gradient-primary btn-lg btn-block form-control" id="search_balance">Search</button>
                                    </div>
                                </div>
                            </div>
                            {!! Form::close() !!}
                            <br>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L </th>
                                    <th> Name </th>
                                    <th> Department </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($attendances as $attendance)
                                    <tr class="text-center">
                                        <td>{{$loop->index+1}}</td>
                                        <td>{{!empty($attendance->employee->name) ? $attendance->employee->name : 'N/A'}}</td>
                                        <td>{{!empty($attendance->employee->department->department_name) ? $attendance->employee->department->department_name : 'N/A'}}</td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm btn-block" onclick="window.location='{{route('attendance.show',$attendance->employee_id)}}'" data-toggle="tooltip" title="View Attendance">View</button>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-info">{{'No Attendance Created Yet'}}</td>
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
