@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">Re-Claim<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L </th>
                                    <th> Date </th>
                                    <th> Employee </th>
                                    <th> Re-Claim Amount </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($reclaims as $reclaim)
                                    <tr class="text-center">
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$reclaim->date}}</td>
                                        <td>{{!empty($reclaim->employee->name) ? $reclaim->employee->name : 'N/A'}}</td>
                                        <td>{{$reclaim->reclaim}} /-</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('re_claim.edit',$reclaim->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$reclaim->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Re-Claim</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are You Want To Delete These Re-Claim</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['re_claim.destroy',$reclaim->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$reclaim->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-info">{{'No Re-Claim Created Yet'}}</td>
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
