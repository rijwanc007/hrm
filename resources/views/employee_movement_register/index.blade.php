@extends('master')
@section('content')
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12"><h4 class="text-center">Employee Movement Register<hr/></h4> </div>
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> S/L </th>
                                        <th> Date </th>
                                        <th> Employee Name </th>
                                        <th> Designation </th>
                                        <th> Exit Time </th>
                                        <th> Tour Area </th>
                                        <th> Client's Information </th>
                                        <th> Project Manager </th>
                                        <th> Entry Time </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($employee_movement_registers as $employee_movement_register)
                                        <tr class="text-center">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$employee_movement_register->date}}</td>
                                            <td>{{$employee_movement_register->employee_name}}</td>
                                            <td>{{$employee_movement_register->designation}}</td>
                                            <td>{{date("g:i a", strtotime($employee_movement_register->exit_time))}}</td>
                                            <td>{{$employee_movement_register->tour_area}}</td>
                                            <td>{{$employee_movement_register->clients_information}}</td>
                                            <td>{{$employee_movement_register->project_manager}}</td>
                                            <td>{{date("g:i a", strtotime($employee_movement_register->entry_time))}}</td>
                                            <td>
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('employee_movement_register.edit',$employee_movement_register->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                <br/>
                                                <div class="modal fade" id="delete_modal_{{$employee_movement_register->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Register</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete This Register</p>
                                                                <p>Once You Delete This Register</p>
                                                                <p>You Will Delete This Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['employee_movement_register.destroy',$employee_movement_register->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$employee_movement_register->id}}" data-title="tooltip" title="Delete">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="10" class="text-center text-info">{{'No Register Created Yet'}}</td>
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
