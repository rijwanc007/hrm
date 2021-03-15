@extends('master')
@section('content')
@php
  $s = 1;
  $debit_sum = array();
  $credit_sum = array();
@endphp
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row table-responsive">
                            <div class="col-lg-12">
                                {!! Form::open(['route' => 'bank.balance.search','method' => 'GET']) !!}
                                <input type="hidden" name="id" value="{{$id}}"/>
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
                                <div id="printBalance">
                                    <div class="row"><div class="col-md-12"><h2 class="text-center text-info">{{\App\Bank::find($id)->bank_name}}<hr/></h2><br/></div></div>
                                    @if(!empty($from))
                                    <div class="row">
                                    <div class="col-md-3">From : {{$from}} <br/> To : {{$to}}</div>
                                    <div class="col-md-6"><h4 class="project_info_tag text-center">Debit & Credit History</h4></div>
                                    <div class="col-md-3">Date :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                    @else
                                    <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6"><h4 class="project_info_tag text-center">Debit & Credit History</h4></div>
                                    <div class="col-md-3">Date :: {{date('Y-m-d')}}</div>
                                    </div>
                                    <br/>
                                    @endif
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">S/L</th>
                                            <th class="text-center"> Date </th>
                                            <th class="text-center"> Type </th>
                                            <th class="text-center"> Bank </th>
                                            <th class="text-center"> Account Number </th>
                                            <th class="text-center"> Amount </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if($debits->count() ==! 0)
                                        @foreach($debits as $debit)
                                            <tr>
                                                <td class="text-center">{{ $s++ }}</td>
                                                <td class="text-center" id="balance_date">{{date('d-m-Y', strtotime($debit->created_at))}}</td>
                                                <td class="text-center">{{$debit->type}}</td>
                                                <td class="text-center">{!! (!empty($debit->bank->id)) ? $debit->bank->bank_name :  '<h4" class="text-danger">'.'N/A'.'</h4>' !!}</td>
                                                <td class="text-center">{!! (!empty($debit->bank->id)) ? $debit->bank->account :  '<h4" class="text-danger">'.'N/A'.'</h4>' !!}</td>
                                                <td class="text-center">{{$debit->amount}}/-</td>
                                                @php
                                                    $debit_sum[$debit->id] = $debit->amount
                                                @endphp
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <td colspan="2" class="text-center text-info"> <h4>Total Debit</h4> </td>
                                                <td colspan="2" class="text-center text-info"> <h4>:</h4> </td>
                                                <td colspan="2" class="text-center text-info"> <h4>{{array_sum($debit_sum)}}/-</h4> </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center text-info">{{'No Debit Created Yet'}}</td>
                                            </tr>
                                        @endif
                                        @if($credits->count() ==! 0)
                                        @foreach($credits as $credit)
                                            <tr>
                                                <td class="text-center">{{ $s++ }}</td>
                                                <td class="text-center" id="balance_date">{{date('d-m-Y', strtotime($credit->created_at))}}</td>
                                                <td class="text-center">{{$credit->type}}</td>
                                                <td class="text-center">{!! (!empty($credit->bank->id)) ? $credit->bank->bank_name :  '<h4" class="text-danger">'.'N/A'.'</h4>' !!}</td>
                                                <td class="text-center">{!! (!empty($credit->bank->id)) ? $credit->bank->account :  '<h4" class="text-danger">'.'N/A'.'</h4>' !!}</td>
                                                <td class="text-center">{{$credit->amount}}/-</td>
                                                @php
                                                    $credit_sum[$credit->id] = $credit->amount
                                                @endphp
                                            </tr>
                                        @endforeach
                                            <tr>
                                                <td colspan="2" class="text-center text-info"> <h4>Total Credit</h4> </td>
                                                <td colspan="2" class="text-center text-info"> <h4>:</h4> </td>
                                                <td colspan="2" class="text-center text-info"> <h4>{{array_sum($credit_sum)}}/-</h4> </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center text-info">{{'No Credit Created Yet'}}</td>
                                            </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row text-center">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <br/>
                                            <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('printBalance')" value="print" />
                                        </div>
                                    </div>
                                </div>
                            </div>
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
