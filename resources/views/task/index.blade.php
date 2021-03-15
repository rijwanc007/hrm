@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">All Task<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> Title </th>
                                    <th> Client </th>
                                    <th> Project </th>
                                    <th> Priority </th>
                                    <th> Starting Date & Time </th>
                                    <th> Ending Date & Time </th>
                                    <th> Assigned Employees </th>
                                    <th> Message </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($tasks as $task)
                                    <tr class="text-center">
                                        <td>{{$task->title}}</td>
                                        <td>{{$task->client_id}}</td>
                                        <td>{{$task->project_id}}</td>
                                        <td>{{$task->priority}}</td>
                                        <td>{{$task->start_date}} & {{$task->start_time}}</td>
                                        <td>{{$task->end_date}} & {{$task->end_time}}</td>
                                        <td>{{$task->employee_id}}</td>
                                        <td>{{$task->message}}</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('task.edit',$task->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$task->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Task</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete These Task</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['task.destroy',$task->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$task->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                <tr>
                                    <td colspan="9" class="text-center text-info">{{'No Task Created Yet'}}</td>
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
