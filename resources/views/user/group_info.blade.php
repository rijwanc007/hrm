@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                <h4 class="text-center">All User Group<hr/></h4>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> S/L </th>
                                        <th> User Group </th>
                                        <th> Group Members </th>
                                        <th> Created At </th>
                                        <th> Option </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="5" class="text-center text-info">{{'No User Group Created Yet'}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
