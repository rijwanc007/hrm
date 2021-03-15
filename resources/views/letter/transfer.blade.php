@extends('master')
@section('content')
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Transfer Letter Form</h3></div>
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
                            <select class="form-control" data-live-search="true" name="name" id="name">
                                <option selected disabled value="">Choose Employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="joining_date" >Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="joining_date" >Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>
                        <div class="form-group">
                            <label for="joining_date" >Transfer To</label>
                            <input type="text" class="form-control" id="transfer_to" name="transfer_to">
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
                            <div class="col-md-12 text-center"><h3>Transfer Letter<hr/></h3></div>
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
                            <div class="col-md-12">We would inform you that you will be transferred from the current branch of Skies Engineering and Technologies Company to <div id="transfer_to_field"></div> branch of Skies Engineering and Technologies Company starting from the date</div>
                            <br/><br/>
                            <div class="col-md-12">You are one of our top talents and we need all the expertise in the newly established branch. This transfer comprises a substantial push given the enormous progress opportunities there.</div>
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
            let department_id = $(this).val();
            $.ajax({
                url : 'department_id/' + department_id,
                method : 'GET',
                success:function(data){
                    $('#name').empty();
                    $('#name').append('<option selected disabled value="">Choose An Option</option>');
                    jQuery.each( data, function( item, value ) {
                        $('#name').append("<option value='" + value.name + "'>" + value.name + "</option>");
                    });
                }
            });
        });
        $(document).on('click', '#submit', function (){
            $('#employee_name_top').append(_('name').value);
            $('#employee_name').append(_('name').value + ',');
            $('#designation_field_top').append(_('designation').value);
            $('#date_field').append(_('date').value);
            $('#transfer_to_field').append(_('transfer_to').value);
            $("#employee_name_top").css('display', 'inline-block');
            $("#employee_name").css('display', 'inline-block');
            $("#date_field").css('display', 'inline-block');
            $("#designation_field_top").css('display', 'inline-block');
            $("#transfer_to_field").css('display', 'inline-block');
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
