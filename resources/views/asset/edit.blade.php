@extends('master')
@section('content')
    @php
        $items = explode(',',str_replace(str_split('[]""'),'',$asset->item));
    @endphp
    {!! Form::open(['class' =>'form-sample','route' => ['asset.update', $asset->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span> Update Asset Data</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department" >Department</label>
                            <select class="form-control" name="department" id="department" >
                                <option selected disabled value="">Choose Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}" @if($department->id == $asset->department_id) selected @endif>{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Employees">Employee</label>
                            <select class="form-control" data-live-search="true" name="employee_id" id="employee_id">
                                <option selected disabled value="">Choose Department</option>
                                @foreach($employees as $employee)
                                    <option value="{{$employee->id}}" @if($employee->id == $asset->employee_id) selected @endif>{{$employee->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        @for($i=0 ; $i<count($items) ; $i++)
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="item">Item</label>
                                    <input type="text" id="item" name="item[]" class="form-control" value="{{$items[$i]}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="item"></label>
                                    <button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon text-center"></i></button>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="item"></label>
                                    <button type="button" class="btn btn-gradient-info btn-lg btn-block" id="minus_item"><i class="mdi mdi-minus menu-icon"></i></button>
                                </div>
                            </div>
                        </div>
                        @endfor
                        <div id="append_item">

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
        $(document).on('click', '#add_item', function (){
            var html ='';
            html += '<div class="row"> <div class="col-md-8"> <div class="form-group"> <label for="item">Item</label> <input type="text" id="item" name="item[]" class="form-control"> </div> </div> <div class="col-md-2"> <div class="form-group"><label for="item"></label><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon"></i></button></div> </div><div class="col-md-2"><label for="item"></label> <div class="form-group"><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="minus_item"><i class="mdi mdi-minus menu-icon"></i></button></div> </div></div>'
            $('#append_item').append(html);
        });
        $(document).on('click','#minus_item',function(){
            $(this).parent().parent().parent().remove();

        });
    </script>
@endsection
