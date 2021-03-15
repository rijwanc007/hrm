@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12"><h4 class="text-center">All Candidates<hr/></h4> </div>
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> S/L </th>
                                        <th> Department Name </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($departments as $department)
                                        <tr class="text-center">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$department->department_name}}</td>
                                            <td>
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('department.edit',$department->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                <br/>
                                                <div class="modal fade" id="delete_modal_{{$department->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Department</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete This Department</p>
                                                                <p>Once You Delete This Department</p>
                                                                <p>You Will Delete His/Her Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['department.destroy',$department->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$department->id}}" data-title="tooltip" title="Delete">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-info">{{'No Department Created Yet'}}</td>
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
