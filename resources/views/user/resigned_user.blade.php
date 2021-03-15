@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" name="type_of_collection" id="type_of_collection" style="border: 1px solid grey" >
                    <option selected disabled value="">Select Card No.</option>
                    <option value="advanced_received">All</option>
                    <option value="during_project">DT- 0025</option>
                    <option value="after_service_rendered">Dt-00235</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <select class="form-control" name="type_of_collection" id="type_of_collection" style="border: 1px solid grey" >
                    <option selected disabled value="">Select Department.</option>
                    <option value="advanced_received">All</option>
                    <option value="during_project">IT</option>
                    <option value="after_service_rendered">Management</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control payment" id="amount" name="amount" placeholder="Start Date" style="border: 1px solid grey">
            </div>
        </div>
        <div class="col-md-2">
            <div class="form-group">
                <input type="text" class="form-control payment" id="amount" name="amount" placeholder="End Date" style="border: 1px solid grey">
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-gradient-info btn-lg btn-block"><i class="mdi mdi-magnify"></i> Search </button>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">Resigned Employee<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> S/L </th>
                                    <th> Image </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    <th> Designation </th>
                                    <th> Joining Date </th>
                                    <th> Contact Number </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td colspan="8" class="text-center text-info">{{'No Resigned User Created Yet'}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
