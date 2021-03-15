@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Appointment Letter Form</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department" >Employee Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label for="designation" >Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>
                        <div class="form-group">
                            <label for="joining_date" >Joining Date</label>
                            <input type="date" class="form-control" id="joining_date" name="joining_date">
                        </div>
                        <div class="form-group">
                            <label for="salary" >Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block" id="submit"><i class="mdi mdi-account"></i> Submit </button>
        </div>
    </div>
    <br/><br/><br/>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div id="printletter">
                                <br/><br/>
                            <div class="col-md-12 text-center"><h3>Appointment Letter<hr/></h3></div>
                            <br/><br/>
                                <div class="col-md-12"><b>To:</b> <div id="employee_name"></div></div>
                            <br/><br/>
                            <div class="col-md-12">On Behalf of <b>Skies Engineering and Technologies Company</b> , We here by inform you that you are appointed as <b><div id="designation_field_employee" style=""></div></b> in our organization.Details as follows:</div>
                            <br/><br/><br/><br/>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-3"><b>Designation :</b></div>
                                <div class="col-md-7 text-left"><div id="designation_field"></div> </div>
                            </div>

                            <br/>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-3"><b>Salary :</b></div>
                                <div class="col-md-7 text-left"><div id="salary_field"></div> </div>
                            </div>

                            <br/>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-3"><b>Joining Date :</b></div>
                                <div class="col-md-7 text-left"><div id="joining_date_field"></div> </div>
                            </div>

                            <br/>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-3"><b>Annual Bonus :</b></div>
                                <div class="col-md-7 text-left">Based On Your Performance </div>
                            </div>

                            <br/><br/><br/><br/>
                            <div class="col-md-12">In the best interest of <b>Skies Engineering and Technologies Company</b> , We will need your confirmation immediately</div>
                            <br/>
                            <div class="col-md-12">We look forward to you being a part of our team</div>
                            <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
                            <div class="row">
                                <div class="col-md-6"></div>
                                <div class="col-md-6 text-right"><h5 class="text-center">On behalf of the Company<hr/></h5></div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
    </div>
    <br/><br/>
    <div class="row text-center">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="form-group">
                <br/>
                <input type="button" class="print_button btn-gradient-primary btn-block form-control" onclick="printDiv('printletter')" value="Print" />
            </div>
        </div>
    </div>
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('click', '#submit', function (){
            $('#employee_name').append('<b>'+_('name').value +'</b>');
            $('#designation_field').append(_('designation').value);
            $('#designation_field_employee').append(_('designation').value);
            $('#salary_field').append(_('salary').value + '/-');
            $('#joining_date_field').append(_('joining_date').value);
            $("#designation_field_employee").css('display', 'inline-block');
            $("#employee_name").css('display', 'inline-block');
        });

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
