@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Resigned Employees<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> S/L</th>
                                        <th> Employee</th>
                                        <th> Department</th>
                                        <th> Application </th>
                                        <th> Status </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($resigned_applicatants as $resigned_applicatant)
                                        <tr class="text-center">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{!empty($resigned_applicatant->employee) ? $resigned_applicatant->employee->name : 'N/A'}}</td>
                                            <td>{{!empty($resigned_applicatant->employee->department->department_name) ? $resigned_applicatant->employee->department->department_name : 'N/A'}}</td>
                                            <td><a class="btn btn-info btn-sm btn-block" href="{{asset('assets/images/employees/resignation/'.$resigned_applicatant->application)}}" target="_blank">Application</a> </td>
                                            <td>{{$resigned_applicatant->status}}</td>
                                            <td>
                                                @if($resigned_applicatant->status == 'pending')
                                                    <button type="button" class="btn btn-inverse-success btn-sm btn-block" onclick="window.location='{{route('resign.edit',$resigned_applicatant->id)}}'" data-toggle="tooltip" title="Approve">Approve</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-info">{{'No Application Submitted Yet'}}</td>
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
