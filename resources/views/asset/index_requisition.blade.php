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
                                        <th>Status</th>
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
                                            <td>{{$asset->status}}</td>
                                            <td>
                                                @if($asset->status == 'pending')
                                                <button type="button" class="btn btn-inverse-success btn-sm btn-block" onclick="window.location='{{route('asset.pending',$asset->id)}}'" data-toggle="tooltip" title="Approve">Approve</button>
                                                @endif
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
