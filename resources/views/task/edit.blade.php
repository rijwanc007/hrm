@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['task.update', $task->id],'method' => 'PATCH','enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="col-md-12">
                <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span> Assign Task</h3></div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title" value="{{$task->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="client">Client</label>
                        <input type="text" class="form-control" id="client" name="client" placeholder="Enter Client Info" value="{{$task->client_id}}" required>
                    </div>
                    <div class="form-group">
                        <label for="project">Project</label>
                        <input type="text" class="form-control" id="project" name="project" placeholder="Enter Project Info" value="{{$task->project_id}}" required>
                    </div>
                    <div class="form-group">
                        <label for="grade">Priority</label>
                        <select class="form-control" id="priority" name="priority" required>
                            <option selected disabled value="">Choose An Option</option>
                            <option value="prime" @if($task->priority == 'prime') selected @endif>Prime</option>
                            <option value="medium" @if($task->priority == 'medium') selected @endif>Medium</option>
                            <option value="normal" @if($task->priority == 'normal') selected @endif>Normal</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employee_id">Employee Id</label>
                        <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Enter Employee Id" value="{{$task->employee_id}}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="Enter Starting Date" value="{{$task->start_date}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_time">Start Time</label>
                                <input type="time" class="form-control" id="start_time" name="start_time" placeholder="Enter Starting Time" value="{{$task->start_time}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" placeholder="Enter Ending Date" value="{{$task->end_date}}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="end_time">End Time</label>
                                <input type="time" class="form-control" id="end_time" name="end_time" placeholder="Enter Ending Time" value="{{$task->end_time}}" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" required>{{$task->message}}</textarea>
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
