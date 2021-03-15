@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <h4 class="text-center">Create Overtime</h4>
                            </div>
                            <div class="col-md-4 text-right" style="margin-top: 10px">Select Card No.</div>
                            <div class="col-md-8">
                                <select class="form-control" name="type_of_collection" id="type_of_collection" style="border: 1px solid grey" >
                                    <option selected disabled value="">Select Card No.</option>
                                    <option value="during_project">IT-0052</option>
                                    <option value="after_service_rendered">Mgt-0235</option>
                                    <option value="after_service_rendered">IT-0525</option>
                                </select>
                            </div>
                        </div>
                        <br/>
                        <div class="row">
                            <div class="col-md-4 text-right" style="margin-top: 10px">Employee Name</div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control payment" id="amount" name="amount" placeholder="Employee Name" style="border: 1px solid grey">
                                </div>
                            </div>
                            <div class="col-md-4 text-right" style="margin-top: 10px">Works Hour</div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control payment" id="amount" name="amount" placeholder="Working Hour" style="border: 1px solid grey">
                                </div>
                            </div>
                            <div class="col-md-4 text-right" style="margin-top: 10px">Regular Time</div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control payment" id="amount" name="amount" placeholder="Regular Time" style="border: 1px solid grey">
                                </div>
                            </div>
                            <div class="col-md-4 text-right" style="margin-top: 10px">Rate P/H</div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <input type="text" class="form-control payment" id="amount" name="amount" placeholder="Rate Per Hour" style="border: 1px solid grey">
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
