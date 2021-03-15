@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3"> </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="text-center"><img class="student_image" src="{{asset('/assets/images/employees/'. $employee->photo)}}" alt="Employee_image"></div>
                                <br/>
                                <div><span class="project_info_tag">Name :</span> <span class="project_info_details"> {{$employee->name}}</span> </div><br/>
                                <div><span class="project_info_tag">Phone :</span> <span class="project_info_details"> {{$employee->contact}}</span> </div><br/>
                                <div><span class="project_info_tag">Address :</span> <span class="project_info_details"> {{$employee->address}}</span> </div><br/>
                                <div><span class="project_info_tag">Email :</span> <span class="project_info_details"> {{$employee->email}}</span> </div><br/>
                                <div><span class="project_info_tag">Department :</span> <span class="project_info_details"> {{$employee->department->department_name}}</span> </div><br/>
                                <div><span class="project_info_tag">Designation :</span> <span class="project_info_details"> {{$employee->designation->designation}}</span> </div><br/>
                                <div><span class="project_info_tag">Grade :</span> <span class="project_info_details"> {{$employee->grade}}</span> </div><br/>
                                <div><span class="project_info_tag">Salary :</span> <span class="project_info_details"> {{$employee->salary}}</span> </div><br/>
                                <div><span class="project_info_tag">Bank Account :</span> <span class="project_info_details"> {{$employee->bank_account}}</span> </div><br/>
                                @if(!empty($employee->extra_curricullar_activity))
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead><tr class="text-center">
                                            <th>S/L</th>
                                            <th>Extra Curricular Activities</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @for($i=0 ;$i<count(json_decode($employee->extra_curricullar_activity)) ;$i++)
                                        <tr class="text-center">
                                            <td>{{$i +1}}</td>
                                            <td>{{json_decode($employee->extra_curricullar_activity)[$i]}}</td>
                                        </tr>
                                        @endfor
                                        </tbody>
                                    </table>
{{--                                    <span class="project_info_tag">Extra Curricular Activity :</span>--}}
{{--                                    @for($i=0 ;$i<count(json_decode($employee->extra_curricullar_activity)) ;$i++)--}}
{{--                                    <span class="project_info_details">--}}
{{--                                        {{json_decode($employee->extra_curricullar_activity)[$i]}},--}}
{{--                                    </span>--}}
{{--                                    @endfor--}}
                                </div>
                                    <br/>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <br/><br/>
                {!! Form::open(['class' =>'form-sample','route' => ['employees.extra_activity', $employee->id],'method' => 'GET']) !!}
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="list">Add Extra Curricullar Activities to this employee</label>
                            <input type="text" id="list" name="list[]" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="item"></label>
                            <button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon text-center"></i></button>
                        </div>
                    </div>
                </div>
                <div id="append_item">

                </div>
                <br/><br/>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Add </button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
    </div>
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('click', '#add_item', function (){
            var html ='';
            html += '<div class="row"> <div class="col-md-8"> <div class="form-group"> <label for="list">List</label> <input type="text" id="list" name="list[]" class="form-control"> </div> </div> <div class="col-md-2"> <div class="form-group"><label for="item"></label><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon"></i></button></div> </div><div class="col-md-2"><label for="item"></label> <div class="form-group"><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="minus_item"><i class="mdi mdi-minus menu-icon"></i></button></div> </div></div>'
            $('#append_item').append(html);
        });
        $(document).on('click','#minus_item',function(){
            $(this).parent().parent().parent().remove();

        });
    </script>
@endsection
