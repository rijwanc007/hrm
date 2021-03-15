@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div id="print_payslip">
                        <div class="payslip" style="border: 1px solid">
                            <br/><br/>
                            <div class="row">
                                <div class="col-md-12 text-center"><img src="{{asset('assets/images/logo/setcol-logo.png')}}"> </div>
                                <div class="col-md-12"><h3 class="text-info text-center">Skies Engineering and Technologies Company</h3></div>
                                <div class="col-md-12"><h5 class="text-center">31/1 Sharif Complex, Purana Paltan, Dhaka, Bangladesh</h5></div>
                                <br/><br/>
                                <div class="col-md-12"><h4 class="text-center"><b>Payslip for the period of {{date('F, Y', strtotime($payroll->month))}}</b>  </h4></div>
                                <br/><br/>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5"><b>Employee ID</b></div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5">{{$payroll->employee_id}}</div>
                                        <br/><br/>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5"><b>Department</b></div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5">{{$payroll->department->department_name}}</div>
                                        <br/><br/>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5"><b>Days Worked</b></div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5">{{$days_worked}}</div>
                                        <br/><br/>
                                        <div class="col-md-1"></div>
                                        <div class="col-md-5"><b>Bank Account</b></div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5">{{$employee->bank_account}}</div>
                                        <br/><br/>
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
                                        <div class="col-md-5"><b>Days Absent</b></div>
                                        <div class="col-md-1">:</div>
                                        <div class="col-md-5">{{$days_absent}}</div>
                                        <br/><br/>
                                    </div>
                                </div>
                                <br/><br/>
                                <div class="col-md-1"></div>
                                <div class="col-md-10">
                                    <table class="table table-borderless">
                                            <thead>
                                            <tr class="text-center">
                                                <th><b>Earnings</b></th>
                                                <th><b>Ammount</b></th>
                                                <th><b>Deduction</b></th>
                                                <th><b>Ammount</b></th>
                                            </tr>
                                            </thead>
                                        <tbody>
                                        <tr class="text-center">
                                            <td>Basic Salary</td><td>{{$payroll->salary}}.00</td>
                                            <td>Leave Duduction</td><td>{{$payroll->number_of_leaves !=0 ? $payroll->number_of_leaves * $payroll->leave_deduction : '0'}}.00</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>KPI</td><td>{{!empty($payroll->kpi) ? $payroll->kpi : '0'}}.00</td>
                                            <td>Late Attendance</td><td>{{$payroll->late_attendance !=0 ? $payroll->late_attendance * $payroll->late_attendance_fee : '0'}}.00</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>Performance Bonus</td><td>{{ !empty($payroll->performance_bonus) ? $payroll->performance_bonus : '0'}}.00</td>
                                            <td>Loan</td><td>{{!empty($loans) ? $loans : '0'}}.00</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>Apprisal</td><td>{{ !empty($payroll->apprisal) ? $payroll->apprisal : '0'}}.00</td>
                                            <td>N/A</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td>Bonus</td><td>{{!empty($payroll->bonus) ? $payroll->bonus : '0'}}.00</td>
                                            <td>N/A</td>
                                            <td>0.00</td>
                                        </tr>
                                        <tr class="text-center">
                                            <td><b>Total Earnings</b></td>
                                            <td><b>{{$payroll->salary + $payroll->kpi + $payroll->performance_bonus + $payroll->apprisal +  $payroll->bonus}}.00</b></td>
                                            <td><b>Total Deduction</b></td>
                                            <td><b>{{($payroll->number_of_leaves * $payroll->leave_deduction) + ($payroll->late_attendance * $payroll->late_attendance_fee) + $loans}}.00</b></td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-center">
                                            <td colspan="2"><b>Net Amount</b></td>
                                            <td colspan="2" ><b>{{$payroll->net_amount - $loans}}.00</b></td>
                                        </tr>
                                        </tfoot>
                                        </table>
                                </div>
                            </div>
                            <br/><br/><br/>
                            <div class="row">
                                <div class="col-md-1"></div>
                                <div class="col-md-3 text-center">
                                    <h4 style="border-top: 3px dotted">Employer's Signature</h4>
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-3 text-center">
                                    <h4 style="border-top: 3px dotted">Employee's Signature</h4>
                                </div>
                            </div>
                            <br/><br/>
                        </div>
                        </div>
                        <br/><br/>
                        <div class="row text-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <br/>
                                    <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('print_payslip')" value="Print" />
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
