@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h2 class="text-center text-info">Employees<hr/></h2><br/>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> Employee ID </th>
                                        <th>Photo</th>
                                        <th> Name </th>
                                        <th> Address </th>
                                        <th> Salary </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($employees->count() ==! 0)
                                        @foreach($employees as $employee)
                                            <tr class="text-center">
                                                <td>{{$employee->id}}</td>
                                                <td><img src="{{asset('assets/images/employees/'.$employee->photo)}}" alt=""></td>
                                                <td>{{$employee->name}}</td>
                                                <td>{{$employee->address}}</td>
                                                <td>{{$employee->salary}}</td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('employee.show',$employee->id)}}'" data-toggle="tooltip" title="Show">Show</button>
                                                    <br/>
                                                    <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('employee.edit',$employee->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                    <br/>
                                                    <div class="modal fade" id="delete_modal_{{$employee->id}}" role="dialog">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Delete Employee</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <p>Are You Want To Delete These Employee.Once You Delete These Employee</p>
                                                                    <p>You Will Delete His/Her Information Permanently</p>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    {!! Form::open(['route' => ['employee.destroy',$employee->id],'method' => 'DELETE']) !!}
                                                                    <button type="submit" class="btn btn-success">submit</button>
                                                                    {!! Form::close() !!}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$employee->id}}" data-title="tooltip" title="Delete">Delete</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6" class="text-center text-info">{{'No Employee Created Yet'}}</td>
                                        </tr>
                                    @endif
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
