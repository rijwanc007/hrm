@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Joining Letter Form</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department" >Department</label>
                            <select class="form-control" name="department" id="department" >
                                <option selected disabled value="">Choose Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Employees">Employee</label>
                            <select class="form-control" data-live-search="true" name="name" id="employee_name">
                                <option selected disabled value="">Choose Employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="joining_date" >Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="employer_name" >Employer Name</label>
                            <input type="text" class="form-control" id="employer_name" name="employer_name">
                        </div>
                        <div class="form-group">
                            <label for="joining_date" >Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
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
            <div class="card">
                <div class="card-body">
                    <div id="printletter">
                        <div class="container">
                            <br/><br/>
                            <div class="col-md-12 text-center"><h3>Joining Letter<hr/></h3></div>
                            <br/><br/>
                            <div class="col-md-12 text-right"><div id="employee_name_top"></div></div>
                            <div class="col-md-12 text-right"><div id="employee_address"></div></div>
                            <div class="col-md-12 text-right"><b>Phone: </b><div id="employee_phone"></div> </div>
                            <br/><br/>
                            <div class="col-md-12"><b>Date:</b> {{date('d-m-Y')}}</div>
                            <br/><br/>
                            <div class="col-md-12"><b>To:<div id="employer_name_top"></div></b></div>
                            <div class="col-md-12"><b><div id="designation_field_top"></div></b> </div>
                            <div class="col-md-12"><b>Human Resource Division</b> </div>
                            <br/><br/>
                            <div class="col-md-12"><b>Skies Engineering and Technologies Company</b> </div>
                            <div class="col-md-12"><b>Head Office</b> </div>
                            <div class="col-md-12"><b>31/1 Purana Paltan, Dhaka-1000</b> </div>
                            <br/><br/>
                            <div class="col-md-12"><b>Subject:</b> Joining Letter</div>
                            <br/><br/>
                            <div class="col-md-12">Dear Sir,</div>
                            <br/><br/>
                            <div class="col-md-12">I have honor to inform you that i am joining the office from today as a <div id="employee_designation"></div> in respect to your appointment letter dated <div id="date_field"></div> </div>
                            <br/><br/>
                            <div class="col-md-12">I kindly request to accept my joining letter.</div>
                            <br/><br/>
                            <div class="col-md-12">Regards</div>
                            <br/><br/>
                            <div class="col-md-12"><div id="employee_name_bottom"></div></div>
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
        $(document).on('change', '#department', function (){
            let department_id = $(this).val();
            $.ajax({
                url : 'department_id/' + department_id,
                method : 'GET',
                success:function(data){
                    $('#employee_name').empty();
                    $('#employee_name').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#employee_name').append("<option value='" + value.id + "'>" + value.name + "</option>");
                    });
                }
            });
        });
        $(document).on('change', '#employee_name', function (){
            let employee_id = $(this).val();
            $.ajax({
                url : 'employee_id/' + employee_id,
                method : 'GET',
                success:function(data){
                    $('#employee_name_top,#employee_name_bottom').append(data.name);
                    $('#employee_address').append(data.address);
                    $('#employee_phone').append(data.contact);
                    $('#employee_designation').append(data.designation);
                    $("#employee_name_top,#employee_address, #employee_phone,#employee_name_bottom, #employee_designation").css('display', 'inline-block');
                }
            });
        });
        $(document).on('click', '#submit', function (){
            $('#employer_name_top').append(_('employer_name').value);
            $('#designation_field_top').append(_('designation').value);
            $('#date_field').append(_('date').value);
            $("#date_field, #designation_field_top").css('display', 'inline-block');
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
