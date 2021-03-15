@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="col-md-12"><h4 class="text-center">All Candidates</h4> </div>
                    <div class="row table-responsive">
                        <div class="col-lg-12">
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
                                        <td colspan="8" class="text-center text-info">{{'No Candidate Created Yet'}}</td>
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
