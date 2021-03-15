@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Promotion Letter Form</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department" >Department</label>
                            <select class="form-control" name="department" id="department" >
                                <option selected disabled value="">Choose Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id .'_'.$department->department_name}}">{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Employees">Employee</label>
                            <select class="form-control" data-live-search="true" name="name" id="name">
                                <option selected disabled value="">Choose Employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="joining_date" >Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="department_promoted_to" >Department</label>
                            <select class="form-control" name="department_promoted_to" id="department_promoted_to" >
                                <option selected disabled value="">Choose Department</option>
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}">{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="promoted_to">Promoted To</label>
                            <select class="form-control" data-live-search="true" name="promoted_to" id="promoted_to">
                                <option selected disabled value="">Choose Designation</option>
                            </select>
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
                            <div class="col-md-12 text-center"><h3>Promotion Letter<hr/></h3></div>
                            <br/><br/>
                            <div class="col-md-12"><b>Date:</b> <div id="date_field"></div></div>
                            <br/><br/>
                            <div class="col-md-12"><b>To:<div id="employee_name_top"></div></b></div>
                            <br/><br/>
                            <div class="col-md-12"><b><div id="designation_field_top"></div></b> </div>
                            <br/><br/>
                            <div class="col-md-12"><b>Subject:</b> Transfer Letter</div>
                            <br/><br/>
                            <div class="col-md-12">Dear Mr/Mrs <div id="employee_name"></div></div>
                            <br/><br/>
                            <div class="col-md-12">We would inform you that you are promoted from <div id="current_designation_field"></div> in <div id="current_department"></div> of Skies Engineering and Technologies Company to <div id="promoted_designation"></div> in  <div id="promoted_department"></div> of Skies Engineering and Technologies Company starting from the date</div>
                            <br/><br/>
                            <div class="col-md-12">You are one of our top talents and we need all the expertise in the newly established position. This promotion comprises a substantial push given the enormous progress opportunities there.</div>
                            <br/><br/>
                            <div class="col-md-12">We are confident that you will enjoy your new work environment. Wish you the best of luck.</div>
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
        $(document).on('change', '#department', function (){
            let string = $(this).val();
            let department_id = string.split('_');
            $('#current_department').append(department_id[1]);
            $.ajax({
                url : 'department_id/' + department_id[0],
                method : 'GET',
                success:function(data){
                    $('#name').empty();
                    $('#name').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#name').append("<option value='" + value.id + "'>" + value.name + "</option>");
                    });
                }
            });
        });
        $(document).on('change', '#name', function (){
            let employee_id = $(this).val();
            $.ajax({
                url : 'employee_id/' + employee_id,
                method : 'GET',
                success:function(data){
                    $('#employee_name_top').append(data.name);
                    $('#employee_name').append(data.name + ',');
                }
            });
        });
        $(document).on('change', '#department_promoted_to', function (){
            let department_id = $(this).val();
            $.ajax({
                url : 'designation_id/' + department_id,
                method : 'GET',
                success:function(data){
                    $('#promoted_to').empty();
                    $('#promoted_to').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#promoted_to').append("<option value='" + value.designation + "'>" + value.designation + "</option>");
                    });
                }
            });
        });
        $(document).on('click', '#submit', function (){
            $('#designation_field_top').append(_('designation').value);
            $('#promoted_designation').append(_('promoted_to').value);
            $('#promoted_department').append(_('department_promoted_to').value);
            $('#date_field').append(_('date').value);
            $("#employee_name_top,#employee_name,#date_field,#designation_field_top,#current_designation_field,#current_department,#promoted_designation,#promoted_department").css('display', 'inline-block');
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
