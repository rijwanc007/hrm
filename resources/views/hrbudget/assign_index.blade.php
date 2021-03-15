@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                            <br/><br/>
                            <div class="row table-responsive">
                                <div class="col-lg-12">
{{--                                    @if(!empty($from))--}}
{{--                                        <div class="row">--}}
{{--                                            <div class="col-md-3">From : {{$from}} <br/> To : {{$to}}</div>--}}
{{--                                            <div class="col-md-6"><h4 class="project_info_tag text-center">HR Budget Expense Report<hr/></h4></div>--}}
{{--                                            <div class="col-md-3">Date :: {{date('Y-m-d')}}</div>--}}
{{--                                        </div>--}}
{{--                                        <br/>--}}
{{--                                    @else--}}
                                        <h2 class="text-center text-info">HR Budget Allocation<hr/></h2><br/>
{{--                                    @endif--}}
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th> S/L</th>
                                            <th> Date From</th>
                                            <th> Date To</th>
                                            <th> Budget</th>
                                            <th> Option</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($hr_budgets_indexes as $hr_budgets_index)
                                            <tr class="text-center">
                                                <td>{{$loop->index+1}}</td>
                                                <td>{{$hr_budgets_index->date_from}}</td>
                                                <td>{{$hr_budgets_index->date_to}}</td>
                                                <td>{{$hr_budgets_index->budget}} .00</td>
                                                <td>
                                                    <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('hr_budget.edit',$hr_budgets_index->id)}}'" data-toggle="tooltip" title="Edit">Edit</button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-info">{{'No Budget Created Yet'}}</td>
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
    </div>
@endsection
