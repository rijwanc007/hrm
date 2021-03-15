@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-4">
            <div class="form-group">
                <select class="form-control" name="type_of_collection" id="type_of_collection" style="border: 1px solid grey" >
                    <option selected disabled value="">Select Card No.</option>
                    <option value="during_project">IT-0052</option>
                    <option value="after_service_rendered">Mgt-0235</option>
                    <option value="after_service_rendered">IT-0525</option>
                </select>
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-gradient-info btn-lg btn-block"><i class="mdi mdi-magnify"></i> Search </button>
        </div>
        <div class="col-md-3"></div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">Provident Funds<hr/></h4>
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th> Name </th>
                                    <th> Card No </th>
                                    <th> Salary </th>
                                    <th> PA/PM </th>
                                    <th> PFA Amount </th>
                                    <th> Status </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="6" class="text-center text-info">{{'No Provident Fund Created Yet'}}</td>
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
