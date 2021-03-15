@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                        <h2 class="text-center text-info">Designations Department Wise<hr/></h2><br/>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th> S/L</th>
                                            <th> Department</th>
                                            <th> Designation</th>
                                            <th> Option</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($designations as $designation)
                                            <tr class="text-center">
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{!empty($designation->department->department_name) ? $designation->department->department_name : 'N/A'}}</td>
                                                <td>{{$designation->designation}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('designation.edit',$designation->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                    <br/>
                                                    <div class="modal fade" id="delete_modal_{{$designation->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Designation</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Want To Delete These designation.Once You Delete These designation</p>
                                                                    <p>You Will Delete the Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['designation.destroy',$designation->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$designation->id}}" data-title="tooltip" title="Delete">Delete</button>
                                                </td>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center text-info">{{'No Designation Created Yet'}}</td>
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
