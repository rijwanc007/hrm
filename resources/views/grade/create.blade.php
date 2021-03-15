@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'grade.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New Grade</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Grade</label>
                        <input type="text" class="form-control" id="grade" name="grade" placeholder="Enter grade Name" required>
                    </div>
                    <div class="form-group">
                        <label for="designation">Designations</label>
                        <select class="selectpicker form-control" multiple data-live-search="true" name="designation_id[]">
                            @foreach($designations as $designation)
                                <option value="{{$designation->id}}">{{$designation->designation}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="leave_deduction">Leave Deduction/Day</label>
                        <input type="number" class="form-control" id="leave_deduction" name="leave_deduction" placeholder="Enter leave deduction amount" required>
                    </div>
                    <div class="form-group">
                        <label for="office_time">Office Reporting Time</label>
                        <input type="time" class="form-control" id="office_time" name="office_time" required>
                    </div>
                    <div class="form-group">
                        <label for="late_attendance_fee">Late Attendance fee/Day</label>
                        <input type="number" class="form-control" id="late_attendance_fee" name="late_attendance_fee" placeholder="Enter late attendance fee" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
@endsection
