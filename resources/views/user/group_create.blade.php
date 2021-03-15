@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center">Create User Group</h4>
                            </div>
                            <div class="col-md-4 text-right" style="margin-top: 10px">Group Member</div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control payment" id="amount" name="amount" placeholder="" style="border: 1px solid grey">
                                </div>
                            </div>
                        </div>
                        <hr/>
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-gradient-info btn-lg btn-block"> Submit </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
