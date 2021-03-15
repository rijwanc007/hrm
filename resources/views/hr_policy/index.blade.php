@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">HR Policies<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th>S/L</th>
                                        <th>Title</th>
                                        <th> Content </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($hr_policies as $hr_policy)
                                        <tr class="text-center">
                                            <td>{{$loop->index + 1}}</td>
                                            <td>{{$hr_policy->title}}</td>
                                            <td><a class="btn btn-inverse-info btn-sm btn-block" href="{{asset('assets/images/hr_policy/'.$hr_policy->content)}}" target="_blank">File</a> </td>
                                            <td>
                                                <div class="modal fade" id="delete_modal_{{$hr_policy->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete Policy</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete These Policy</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['hr_policy.destroy',$hr_policy->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$hr_policy->id}}" data-title="tooltip" title="Delete">Delete</button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-info">{{'No HR Policies Yet'}}</td>
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
