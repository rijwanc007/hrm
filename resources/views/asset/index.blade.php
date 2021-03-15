@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Assets<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> S/L</th>
                                        <th> Employee</th>
                                        <th> Department</th>
                                        <th> Items </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($assets as $asset)
                                            <tr class="text-center">
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{!empty($asset->employee) ? $asset->employee->name : 'N/A'}}</td>
                                                <td>{{!empty($asset->employee->department) ? $asset->employee->department->department_name : 'N/A'}}</td>
                                                <td>
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        @for($i=0;$i<count(json_decode($asset->item)) ; $i++)
                                                        <tr><td>{{json_decode($asset->item)[$i]}}</td></tr>
                                                        @endfor
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('asset.edit',$asset->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                    <br/>
                                                    <div class="modal fade" id="delete_modal_{{$asset->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Asset</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Want To Delete This Asset</p>
                                                                    <p>Once You Delete This Asset</p>
                                                                    <p>You Will Delete the Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['asset.destroy',$asset->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$asset->id}}" data-title="tooltip" title="Delete">Delete</button>
                                                </td>
                                            </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-info">{{'No Asset Created Yet'}}</td>
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
