@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div id="print_report">
                        <br/><br/>
                        <div class="row">
                            <div class="col-md-12 text-center"><img src="{{asset('assets/images/logo/setcol-logo.png')}}"> </div>
                            <div class="col-md-12"><h3 class="text-info text-center">Skies Engineering and Technologies Company</h3></div>
                            <div class="col-md-12"><h5 class="text-center">31/1 Sharif Complex, Purana Paltan, Dhaka, Bangladesh</h5></div>
                            <br/><br/>
                            <div class="col-md-12"><h4 class="text-center"><b>End Of Service Report For {{$employee->name}}</b><hr/> </h4></div>
                            <br/><br/><br/><br/><br/><br/>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Employee ID</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$employee->id}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Department</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$employee->department->department_name}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Joining Date</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$employee->joining_date}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Resigned/Terminated Date</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$resign->termination_date}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Employee's Working Duration</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$working_months}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Name</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$employee->name}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Designation</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$employee->designation->designation}}</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Employee's Working Duration</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">{{$working_months}} Months</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Employee's Salary Paid</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">0{{$paid_months}} Months</div>
                                    <br/><br/>
                                    <div class="col-md-1"></div>
                                    <div class="col-md-5"><b>Salary Due</b></div>
                                    <div class="col-md-1">:</div>
                                    <div class="col-md-5">0{{$working_months - $paid_months}} Months</div>
                                    <br/><br/><br/><br/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 table-responsive">
                                <h4 class="text-center">Employee's Debt<hr/></h4>
                                <table class="table table-striped">
                                    <thead>
                                    <tr class="text-center">
                                        <th> Type </th>
                                        <th> Due </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="text-center">
                                        <td>Loan</td>
                                        <td>{{$loans}}.00</td>
                                    </tr>
                                    <tr class="text-center">
                                        <td>Claim</td>
                                        <td>{{$claims}}.00</td>
                                    </tr>
                                    @foreach($assets as $asset)
                                        @php
                                            $items = explode(',',str_replace(str_split('[]""'),'',$asset->item));
                                        @endphp
                                        @for($i = 0; $i<count($items); $i++)
                                            <tr class="text-center">
                                                <td>Asset Possesed</td>
                                                <td>{{$items[$i]}}</td>
                                            </tr>
                                        @endfor
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-10" style="text-align: justify">
                                This is here by the authority, the employee need to clear all the debt according to the list, if unable the required measures will be taken by the authority.
                                If there is no debt and the employee did not recieve his/her salary the accounts department is bound to clear that.
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <br/><br/><br/><br/><br/><br/><br/><br/>
                        <div class="row">
                            <div class="col-md-1"></div>
                            <div class="col-md-3 text-center">
                                <h4 style="border-top: 3px dotted">HR Admin's Signature</h4>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-3 text-center">
                                <h4 style="border-top: 3px dotted">Employee's Signature</h4>
                            </div>
                        </div>
                    </div>
                    <br/><br/>
                    <div class="row text-center">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <br/>
                                <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('print_report')" value="Print" />
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
