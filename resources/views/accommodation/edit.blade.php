@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['accommodation.update', $accommodation->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Add New Accommodation Cost</h3></div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="grades">Grades</label>
                        <select class="selectpicker form-control" multiple data-live-search="true" name="grade_id[]">
                            @foreach($grades as $grade)
                                <option value="{{$grade->id}}"
                                        @foreach(json_decode($accommodation->grade_id) as $gid)
                                        @if($gid == $grade->id) selected @endif
                                    @endforeach>{{$grade->grade}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="dhaka">Dhaka</label>
                        <input type="number" class="form-control" id="dhaka" name="dhaka" placeholder="Enter amount" value="{{$accommodation->dhaka}}">
                    </div>
                    <div class="form-group">
                        <label for="divisional_town">Divisional City/Town</label>
                        <input type="number" class="form-control" id="divisional_town" name="divisional_town" placeholder="Enter amount" value="{{$accommodation->divisional_town}}">
                    </div>
                    <div class="form-group">
                        <label for="other_area">Other Area</label>
                        <input type="number" class="form-control" id="other_area" name="other_area" placeholder="Enter amount" value="{{$accommodation->other_area}}">
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
