@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['ta.update', $ta->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span> Update TA/DA</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="grades">Grades</label>
                        <select class="selectpicker form-control" multiple data-live-search="true" name="grade_id[]">
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}"
                                        @foreach(json_decode($ta->grade_id) as $gid)
                                        @if($gid == $grade->id) selected @endif
                                    @endforeach>{{$grade->grade}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mode_of_transport">Mode of Transport</label>
                        <input type="text" class="form-control" id="mode_of_transport" name="mode_of_transport" placeholder="Mode Of Transport seperate by comma." value="{{$mot}}">
                    </div>
                    <div class="form-group">
                        <label for="ta">TA</label>
                        <input type="number" class="form-control" id="ta" name="ta" placeholder="Enter amount" value="{{$ta->ta}}">
                    </div>
                    <div class="form-group">
                        <label for="da">D/A(Food)</label>
                        <input type="number" class="form-control" id="da" name="da" placeholder="Enter daily allowence for food" value="{{$ta->da}}">
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
@endsection
