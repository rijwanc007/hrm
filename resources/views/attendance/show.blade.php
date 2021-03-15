@extends('master')
@php
    if(!empty($check)){
    if(!empty($attendances)){
        $dates = explode(',',str_replace(str_split('[]""'),'',$attendances->dates));
        $time = explode(',',str_replace(str_split('[]""'),'',$attendances->time));
      }
    }
@endphp
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>Create Attedance</h3></div>
                            <div class="card">
                                <div class="card-body">
                                    <div id="date_search">
                                        {!! Form::open(['class' =>'form-sample','route' => 'attendance_month','method' => 'POST']) !!}
                                        <input type="hidden" name="employee_id" id="eid" value="{{$id}}" />
                                        <div class="form-group">
                                            <label for="month">Select Month & Year</label>
                                            <input type="month" class="form-control" id="month" name="month" required>
                                        </div>
                                        <input type="submit" class="btn btn-success btn-sm btn-block" value="Submit"/>
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(!empty($check))
                        <div class="row">
                            @if(!empty($attendances))
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="text-center">Attendance for {{$employee->name}} for These Month & Year : {{$month_year}}</h3><br/>
                                            {!! Form::open(['class' =>'form-sample','route' => ['attendance.update',$attendances->id],'method' => 'PATCH']) !!}
                                            <div class="row">
                                                @for($i=1 ; $i<=$days;$i++)
                                                    <div class="col-md-3">
                                                        {{--                                                        <pre class="tab">--}}
                                                        {{--                                                            <select class="form-control" name="time[]" id="time">--}}
                                                        {{--                                                                <option @if($time[$i-1] =="null") selected @endif readonly="" value="null">Late Attendance</option>--}}
                                                        {{--                                                                <option value="yes" @if($time[$i-1]  =="yes") selected @endif>Yes</option>--}}
                                                        {{--                                                                <option value="no" @if($time[$i-1] =="no") selected @endif>No</option>--}}
                                                        {{--                                                            </select>--}}
                                                        {{--                                                        </pre>--}}
                                                        <input type="time" class="form-control" id="time" name="time[]" value="{{$time[$i-1]}}">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="text-info">
                                                            <div class="checkbox">
                                                                @if($dates[$i-1] == 0)
                                                                    <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" />
                                                                @else
                                                                    <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" checked/>
                                                                @endif
                                                                <input type="hidden" id="days_count_{{$i}}" name="date[]" value="{{$dates[$i-1]}}"/>
                                                                <label for="styled-checkbox-3"></label>
                                                                <span class="check-label-name">{{$i}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($i %2 == 1 && $i !=1)
                                                        <br/> <br/> <br/> <br/> <br/> <br/>
                                                    @endif
                                                @endfor
                                            </div>
                                            <br/>
                                            <input type="submit" class="btn btn-success btn-block" value="Update"/>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-12 grid-margin stretch-card">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3 class="text-center">Attendance for {{$employee->name}} for These Month & Year : {{$month_year}}</h3>
                                            {!! Form::open(['class' =>'form-sample','route' => ['attendance.store'],'method' => 'POST']) !!}
                                            <div class="row"><div class="col-md-12 text-center "><h2 class="text-info">Date</h2><hr/></div></div><br/><br/>
                                            <div class="row">
                                                @for($i=1 ; $i<=$days;$i++)
                                                    <div class="col-md-3">
                                                        <label for="time" class="text-left">Time</label>
                                                        {{--                                                            <select class="form-control" name="late_attendance[]" id="late_attendance">--}}
                                                        {{--                                                                <option selected readonly="" value="null">choose an option</option>--}}
                                                        {{--                                                                <option value="yes">yes</option>--}}
                                                        {{--                                                                <option value="no">no</option>--}}
                                                        {{--                                                            </select>--}}
                                                        <input type="time" class="form-control" id="time" name="time[]">
                                                    </div>
                                                    <div class="col-md-1">
                                                        <div class="text-info">
                                                            <div class="checkbox">
                                                                <input type="checkbox" class="days_check" id="days_check_{{$i}}" data-id="days_check_{{$i}}" data-count="days_count_{{$i}}" />
                                                                <input type="hidden" id="days_count_{{$i}}" name="date[]" value="0"/>
                                                                <label for="styled-checkbox-3"></label>
                                                                <span class="check-label-name">{{$i}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @if($i %2 == 1 && $i !=1)
                                                        <br/> <br/> <br/> <br/> <br/> <br/>
                                                    @endif
                                                @endfor
                                            </div>
                                            <input type="hidden" class="month" name="month" value="{{$month_year}}">
                                            <input type="hidden" class="eid" name="employee_id" value="{{$employee->id}}">
                                            <input type="hidden" class="salary" name="salary" value="{{$employee->salary}}">
                                            <br/><br/>
                                            <input type="submit" class="btn btn-success btn-block" value="Create"/>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('click','.days_check',function(){
            let check = _($(this).data('id')).checked;
            if(check == true){
                _($(this).data('count')).value = 1;
            }
            else if(check == false){
                _($(this).data('count')).value = 0;
            }
        });
    </script>
@endsection
