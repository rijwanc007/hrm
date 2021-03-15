@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> ID Card Form</h3></div>
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
                            <select class="form-control" data-live-search="true" name="employee" id="employee">
                                <option selected disabled value="">Choose Employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="expire_date" >Expire Date</label>
                            <input type="date" class="form-control" id="expire_date" name="expire_date">
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
                            <div class="col-md-12 text-center"><img src="{{asset('assets/images/logo/setcol-logo.png')}}"></div>
                            <br/><br/>
                            <div class="col-md-12"><b>Employee ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <div id="employee_id"></div> </b></div>
                            <br/>
                            <div class="col-md-12"><b>Employee Name &nbsp;: <div id="employee_name"></div> </b></div>
                            <br/>
                            <div class="col-md-12"><b>Designation &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <div id="designation"></div> </b></div>
                            <br/>
                            <div class="col-md-12"><b>Expire Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;<div id="date"></div> </b></div>
                            <br/><br/>
                            <div class="col-md-12 text-center"><p style="font-size: 13px; line-height: 0;">Skies Engineering and Technologies Company</p><span style="font-size: 13px;">Phone: +8801825895727: Mail: info@setcolbd.com</span></div>
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
                    $('#employee').empty();
                    $('#employee').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#employee').append("<option value='" + value.id + "'>" + value.name + "</option>");
                    });
                }
            });
        });
        $(document).on('change', '#employee', function (){
            let employee_id = $(this).val();
            $.ajax({
                url : 'employee_id/' + employee_id,
                method : 'GET',
                success:function(data){
                    $('#employee_name').append(data.name);
                    $('#employee_id').append(data.id);
                    $("#employee_name,#employee_id").css('display', 'inline-block');
                }
            });
            $.ajax({
                url : 'employee-designation/' + employee_id,
                method : 'GET',
                success:function(data){
                    $('#designation').append(data.designation);
                    $("#designation").css('display', 'inline-block');
                }
            });
        });
        $(document).on('change', '#expire_date',function (){
            $('#date').empty();
            $('#date').append($('#expire_date').val());
            $("#date").css('display', 'inline-block');
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
