@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12"><h4 class="text-center">Guest Register<hr/></h4> </div>
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L </th>
                                    <th> Date </th>
                                    <th> Guest Name </th>
                                    <th> Meeting To </th>
                                    <th> Sarting Time </th>
                                    <th> Meeting Room </th>
                                    <th> Ending Time </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse($guests as $guest)
                                        <tr class="text-center">
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$guest->date}}</td>
                                            <td>{{$guest->guest_name}}</td>
                                            <td>{{$guest->meeting_to}}</td>
                                            <td>{{$guest->starting_time}}</td>
                                            <td>{{$guest->meeting_room}}</td>
                                            <td>{{$guest->ending_time}}</td>
                                            <td>
                                                <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('guest.edit',$guest->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                <br/>
                                                <div class="modal fade" id="delete_modal_{{$guest->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Guest History</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Do You Want To Delete This Guest History.</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['guest.destroy',$guest->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$guest->id}}" title="Delete" data-title="tooltip" title="Delete">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-info">{{'No Guest Created Yet'}}</td>
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
