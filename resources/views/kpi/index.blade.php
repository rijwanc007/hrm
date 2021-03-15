@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">KPI Department Wise<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> S/L</th>
                                        <th> Department</th>
                                        <th> Designation</th>
                                        <th> KPI</th>
                                        <th> Option</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($kpis as $kpi)
                                        <tr class="text-center">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{!empty($kpi->department->department_name) ? $kpi->department->department_name : 'N/A'}}</td>
                                            <td>{{!empty($kpi->designation->designation) ? $kpi->designation->designation : 'N/A'}}</td>
                                            <td>{{$kpi->amount}}.00</td>
                                            <td>
                                                <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('kpi.edit',$kpi->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                <br/>
                                                <div class="modal fade" id="delete_modal_{{$kpi->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title">Delete KPI</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Are You Want To Delete These KPI.Once You Delete These KPI</p>
                                                                <p>You Will Delete the Information Permanently</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                {!! Form::open(['route' => ['kpi.destroy',$kpi->id],'method' => 'DELETE']) !!}
                                                                <button type="submit" class="btn btn-success">submit</button>
                                                                {!! Form::close() !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$kpi->id}}">Delete</button>
                                            </td>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center text-info">{{'No KPI Created Yet'}}</td>
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
