@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['employee.update', $employee->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span> Update Employee</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Employee Name" value="{{$employee->name}}" required>
                    </div>
                    <div class="form-group">
                        <label for="select_role" >Upload Photo</label>
                        <input type='file' id="imageUpload" name="photo" accept=".png, .jpg, .jpeg" />
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Address" value="{{$employee->address}}" required>
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact</label>
                        <input type="text" class="form-control" id="contact" name="contact" placeholder="+88018*****" value="{{$employee->contact}}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="xyz@mail.com" value="{{$employee->email}}" required>
                    </div>
                    <div class="form-group">
                        <label for="department" >Department</label>
                        <select class="form-control" name="department" id="department" >
                            <option selected disabled value="">Choose Department</option>
                            @foreach($departments as $department)
                                <option value="{{$department->id}}" @if($department->id == $employee->department_id) selected @endif>{{$department->department_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <select class="form-control" data-live-search="true" name="designation" id="designation">
                            <option selected disabled value="">Choose an option</option>
                            @foreach($designations as $designation)
                                <option value="{{$designation->id}}" @if($designation->id == $employee->designation_id) selected @endif>{{$designation->designation}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="joining_date">Joining Date</label>
                        <input type="date" class="form-control" id="joining_date" name="joining_date" value="{{$employee->joining_date}}" required>
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="text" class="form-control" id="salary" name="salary" placeholder="salary" value="{{$employee->salary}}" required>
                    </div>
                    <div class="form-group">
                        <label for="grade" >Grade</label>
                        <select class="form-control" name="grade_id" id="grade_id" >
                            <option selected disabled value="">Choose Department</option>
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}" @if($grade->grade == $employee->grade) selected @endif>{{$grade->grade}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="bank_account">Bank Account</label>
                        <input type="text" class="form-control" id="bank_account" name="bank_account" placeholder="Bank Account" value="{{$employee->bank_account}}" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-pencil"></i> Update </button>
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '#department', function (){
            let department_id = $(this).val();
            $.ajax({
                url : 'designation_id/' + department_id,
                method : 'GET',
                success:function(data){
                    $('#designation').empty();
                    $('#designation').append('<option selected disabled value="">Choose an option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#designation').append("<option value='" + value.id + "'>" + value.designation + "</option>");
                    });
                }
            });
        });
    </script>
@endsection
