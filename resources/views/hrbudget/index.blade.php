@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        {!! Form::open(['route' => 'hr_budget.date_search_hr','method' => 'GET']) !!}
                        <div class="row text-center">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">Date From</label>
                                    <input type="date" class="form-control" id="date_from" name="date_from" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="age">Date To</label>
                                    <input type="date" class="form-control" id="date_to" name="date_to" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="none"></label>
                                    <button class="btn btn-gradient-primary btn-lg btn-block form-control" id="search_balance">Search</button>
                                </div>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <div id="printhrexpense">
                            <br/><br/>
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                @if(!empty($from))
                                    <div class="row">
                                        <div class="col-md-3">From : {{$from}} <br/> To : {{$to}}</div>
                                        <div class="col-md-6"><h4 class="project_info_tag text-center">HR Budget Expense Report<hr/></h4></div>
                                        <div class="col-md-3">Date :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                @else
                                    <h2 class="text-center text-info">HR Budget Expense<hr/></h2><br/>
                                @endif
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> S/L</th>
                                        <th> Date</th>
                                        <th> Expense</th>
                                        <th> Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($hr_budgets as $hr_budget)
                                        <tr class="text-center">
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$hr_budget->date}}</td>
                                            <td>
                                                <table class="table table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Item</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @for($i=0;$i<count(json_decode($hr_budget->item)) ; $i++)
                                                        <tr>
                                                            <td>{{json_decode($hr_budget->item)[$i]}}</td>
                                                            <td>{{json_decode($hr_budget->amount)[$i]}} /-</td>
                                                        </tr>
                                                    @endfor
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td>{{$hr_budget->total}} /-</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-info">{{'No Expense Created Yet'}}</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                    <tr class="text-center">
                                        <td colspan="3"><h3 class="text-info">Total</h3></td>
                                        <td ><h3 class="text-info">{{$hr_budgets->sum('total')}} /-</h3></td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        </div>
                        <br/>
                        <br/>
                        @if($hr_budgets->count() != 0)
                            <div class="row text-center">
                                <div class="col-md-3"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <br/>
                                        <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('printhrexpense')" value="Print" />
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function printDiv(divName)
        {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>
@endsection
