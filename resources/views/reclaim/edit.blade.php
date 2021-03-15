@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => ['re_claim.update', $reclaim->id],'method' => 'PATCH', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-pencil"></i></span>Update Re-Claim</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="{{$reclaim->date}}" required>
                        </div>
                        <div class="form-group">
                            <label for="employee_id">Employee Id</label>
                            <input type="text" class="form-control" id="employee_id" name="employee_id" placeholder="Employee ID" value="{{$reclaim->employee_id}}" required>
                        </div>
                        <div class="form-group">
                            <label for="claim_id">Claims Remains</label>
                            <select class="form-control" data-live-search="true" name="claim_id" id="claim_id">
                                <option selected disabled value="">Choose an option</option>
                                @foreach($claims as $claim)
                                    <option value="{{$claim->id}}" @if($claim->id == $reclaim->claim_id) selected @endif>{{$claim->claim}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="reclaim">Re-Claim</label>
                            <input type="number" class="form-control" id="reclaim" name="reclaim" placeholder="Re-Claim" value="{{$reclaim->reclaim}}" required>
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
        $(document).on('input', '#employee_id', function (){
            let employee_id = $(this).val();
            console.log(employee_id);
            $.ajax({
                url : '/claim_id/' + employee_id,
                method : 'GET',
                success:function(data){
                    $('#claim_id').empty();
                    $('#claim_id').append('<option selected disabled value="">Choose an option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#claim_id').append("<option value='" + value.id + "'>" + value.claim + "</option>");
                    });
                }
            });
        });
    </script>
@endsection
