@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['kpi.update', $kpi->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span>KPI Update Form</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department" >Department</label>
                            <select class="form-control" name="department" id="department" >
                                <option selected disabled value="">Choose Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}" @if($department->id == $kpi->department_id) selected @endif>{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <select class="form-control" data-live-search="true" name="designation" id="designation">
                                <option selected disabled value="">Choose an option</option>
                                @foreach($designations as $designation)
                                    <option value="{{$designation->id}}" @if($designation->id == $kpi->designation_id) selected @endif>{{$designation->designation}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount" >Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" value="{{$kpi->amount}}" required>
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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block" id="submit"><i class="mdi mdi-pencil"></i> Update </button>
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
