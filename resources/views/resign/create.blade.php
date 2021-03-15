@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'resign.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Resignation Form</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department" >Department</label>
                            <select class="form-control" name="department" id="department" >
                                <option selected disabled value="">Choose Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Employees">Employee</label>
                            <select class="form-control" data-live-search="true" name="employee_id" id="employee_id" required>
                                <option selected disabled value="">Choose Department</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="item">Application</label>
                            <input type="file" id="application" name="application" class="form-control" accept=".pdf .doc .docx .png .jpg .jpeg" required>
                        </div>
                        <div class="form-group">
                            <label for="termination_date">Termination Date</label>
                            <input type="date" id="termination_date" name="termination_date" class="form-control" required>
                        </div>
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
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '#department', function (){
            let department_id = $(this).val();
            $.ajax({
                url : 'department_id/' + department_id,
                method : 'GET',
                success:function(data){
                    $('#employee_id').empty();
                    $('#employee_id').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#employee_id').append("<option value='" + value.id + "'>" + value.name + "</option>");
                    });
                }
            });
        });
    </script>
@endsection
