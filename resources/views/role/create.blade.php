@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 text-center"><h4>Create Role</h4></div>
                        <div class="row">
                            <div class="col-md-4 text-right" style="margin-top: 10px">Role Name</div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <textarea class="form-control payment" id="amount" name="amount" style="border: 1px solid grey"></textarea>
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
