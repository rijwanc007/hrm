@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['leave.update', $leave->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span> Update Leave Application Form</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department" >Department</label>
                            <select class="form-control" name="department" id="department" >
                                <option selected disabled value="">Choose Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}" @if($department->id == $leave->department_id) selected @endif>{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Employees">Employee</label>
                            <select class="form-control" data-live-search="true" name="employee_id" id="employee_id">
                                <option selected disabled value="">Choose Department</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" @if($employee->id == $leave->employee_id) selected @endif>{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date_from">Date From</label>
                            <input type="date" class="form-control" id="date_from" name="date_from" value="{{$leave->date_from}}" required>
                        </div>
                        <div class="form-group">
                            <label for="date_to">Date To</label>
                            <input type="date" class="form-control" id="date_to" name="date_to" value="{{$leave->date_to}}" required>
                        </div>
                        <div class="form-group">
                            <label for="number_of_days">Number OF Days</label>
                            <input type="number" class="form-control" id="number_of_days" name="number_of_days" placeholder="number_of_days" value="{{$leave->number_of_days}}" readonly required>
                        </div>
                        <div class="form-group">
                            <label for="number_of_days">Number OF Days Taken</label>
                            <input type="number" class="form-control" id="number_of_days_taken" name="number_of_days_taken" placeholder="number_of_days_taken">
                        </div>
                        <div class="form-group">
                            <label for="reason">Reason</label>
                            <textarea  class="form-control" id="reason" name="reason" placeholder="Reason" required>{{$leave->reason}}</textarea>
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
                url : '/department_id/' + department_id,
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
        $(document).on('input','#date_to', function (){
            var date_from = new Date(_('date_from').value);
            var date_to = new Date($(this).val());

            let days = date_to.getTime() - date_from.getTime();
            let number_of_days = days / (1000 * 60 * 60 * 24);

            _('number_of_days').value = number_of_days;
        })
    </script>
@endsection
