@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'kpi.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>KPI Generation Form</h3></div>
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
                            <label for="designation">Designation</label>
                            <select class="form-control" data-live-search="true" name="designation" id="designation">
                                <option selected disabled value="">Choose an option</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount" >Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block" id="submit"><i class="mdi mdi-account"></i> Submit </button>
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
