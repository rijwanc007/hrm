@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Resigned/Terminated Employees<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th>S/L</th>
                                        <th>Department</th>
                                        <th> Designation </th>
                                        <th> Employee ID </th>
                                        <th> Name </th>
                                        <th> Address </th>
                                        <th>Letter of Termination/ Resignation</th>
                                        <th> End Of Service </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($employees as $employee)
                                            <tr class="text-center">
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{!empty($employee->employee->department) ? $employee->employee->department->department_name : 'N/A'}}</td>
                                                <td>{{!empty($employee->employee->designation) ? $employee->employee->designation->designation : 'N/A'}}</td>
                                                <td>{{$employee->id}}</td>
                                                <td>{{!empty($employee->employee) ? $employee->employee->name : 'N/A'}}</td>
                                                <td>{{!empty($employee->employee) ? $employee->employee->address : 'N/A'}}</td>
                                                <td><a class="btn btn-inverse-info btn-sm btn-block" href="{{asset('assets/images/employees/resignation/'.$employee->application)}}" target="_blank">Letter</a> </td>
                                                <td><button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('end_of_service.eos',$employee->employee_id)}}'" data-toggle="tooltip" title="End Of Service">End Of Service</button></td>
                                            </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-info">{{'No Resigned/Terminated Employees Yet'}}</td>
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
