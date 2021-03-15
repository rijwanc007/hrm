@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12"><h4 class="text-center">Accommodation List<hr/></h4> </div>
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L </th>
                                    <th> Grade </th>
                                    <th> Designation </th>
                                    <th> Dhaka </th>
                                    <th> Divisional City </th>
                                    <th> Other Area </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($accommodations as $accommodation)
                                    <tr class="text-center">
                                        <td>{{$loop->index +1}}</td>
                                        @php
                                            $grade = explode(',',str_replace(str_split('[]""'),'',$accommodation->grade_id));
                                        @endphp
                                        <td>
                                            @foreach($grades as $grade_id)
                                                @for($i=0; $i<count($grade) ; $i++)
                                                    @if($grade_id->id == $grade[$i])
                                                        {{$grade_id->grade}}<hr/>
                                                    @endif
                                                @endfor
                                            @endforeach
                                        </td>
                                        @php
                                            $designation = explode(',',str_replace(str_split('[]""'),'',$accommodation->designation_id));
                                        @endphp
                                        <td>
                                            @foreach($designations as $designation_id)
                                                @for($i=0; $i<count($designation) ; $i++)
                                                    @if($designation_id->id == $designation[$i])
                                                        {{$designation_id->designation}}<hr/>
                                                    @endif
                                                @endfor
                                            @endforeach
                                        </td>
                                        <td>{{$accommodation->dhaka}} /-</td>
                                        <td>{{$accommodation->divisional_town}} /-</td>
                                        <td>{{$accommodation->other_area}} /-</td>
                                        <td>
                                            <button type="button" class="btn btn-inverse-primary btn-sm btn-block" onclick="window.location='{{route('accommodation.edit',$accommodation->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                            <br/>
                                            <div class="modal fade" id="delete_modal_{{$accommodation->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete Accommodation</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Do You Want To Delete This Accommodation.</p>
                                                            <p>Once You Delete This Accommodation</p>
                                                            <p>You Will Delete This Accommodation Information Permanently</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['route' => ['accommodation.destroy',$accommodation->id],'method' => 'DELETE']) !!}
                                                            <button type="submit" class="btn btn-success">submit</button>
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-inverse-danger btn-sm btn-block" data-toggle="modal" data-target="#delete_modal_{{$accommodation->id}}" data-title="tooltip" title="Delete">Delete</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr class="text-center">
                                        <td colspan="7" class="text-center text-info">{{'No Accommodation Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
