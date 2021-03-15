@extends('master')
@section('content')
    <div class="page-header">
        <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-home"></i>
                </span> Employee Ratio</h3>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-danger card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{route('employees.index')}}" style="color: white; text-decoration: none;">
                            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Current Employees <i class="mdi mdi-human-male mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">{{$employee}}</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-dark card-img-holder text-white">
                    <div class="card-body">
                        <a href="{{route('resign.index')}}" style="color: white; text-decoration: none;">
                            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Resigned Employee  <i class="mdi mdi-human-male mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">{{$resign_employee}}</h2>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card bg-gradient-info card-img-holder text-white">
                    <div class="card-body">
                            <img src="{{asset('assets/images/dashboard/circle.svg')}}" class="card-img-absolute" alt="circle-image" />
                            <h4 class="font-weight-normal mb-3">Ratio <i class="mdi mdi-percent mdi-24px float-right"></i>
                            </h4>
                            <h2 class="mb-5">{{$ratio}}%</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
