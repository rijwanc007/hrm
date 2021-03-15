@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'payroll.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span>Payroll Form</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="joining_date" >Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="month" >Month</label>
                            <input type="month" class="form-control" id="month" name="month">
                        </div>
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
                            <select class="form-control" data-live-search="true" name="employee_id" id="employee_name">
                                <option selected disabled value="">Choose Employee</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="salary" >Salary</label>
                            <input type="text" class="form-control" id="salary" name="salary" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kpi" >KPI</label>
                            <input type="text" class="form-control" id="kpi" name="kpi" readonly>
                        </div>
                        <div class="form-group">
                            <label for="leave" >Number of Leave in That Month</label>
                            <input type="text" class="form-control" id="leave" name="leave" readonly>
                        </div>
                        <div class="form-group">
                            <label for="leave_deduction" >Leave Deduction Amount / Day</label>
                            <input type="text" class="form-control" id="leave_deduction" name="leave_deduction" readonly>
                        </div>
                        <div class="form-group">
                            <label for="late_attendance" >Late Attendance in that Month</label>
                            <input type="text" class="form-control" id="late_attendance" name="late_attendance" readonly>
                        </div>
                        <div class="form-group">
                            <label for="late_attendance_fee" >Late Attendance Deduction Amount / Day</label>
                            <input type="text" class="form-control" id="late_attendance_fee" name="late_attendance_fee" readonly>
                        </div>
                        <div class="form-group">
                            <label for="performance_bonus" >Performance Bonus</label>
                            <input type="text" class="form-control" id="performance_bonus" name="performance_bonus" placeholder="5000/-">
                        </div>
                        <div class="form-group">
                            <label for="apprisal" >Apprisal</label>
                            <input type="text" class="form-control" id="apprisal" name="apprisal" placeholder="5000/-">
                        </div>
                        <div class="form-group">
                            <label for="bonus" >Bonus</label>
                            <select class="form-control" name="bonus" id="bonus" >
                                <option selected disabled value="">Choose Department</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group" id="bonus_amount_field" style="display: none">
                            <label for="bonus_amount" >Bonus Amount</label>
                            <input type="text" class="form-control" id="bonus_amount" name="bonus_amount" readonly>
                        </div>
                        <div class="form-group">
                            <label for="net_amount" >Net Amount</label>
                            <input type="text" class="form-control" id="net_amount" name="net_amount" readonly>
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
    {!! Form::close() !!}
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('change', '#department', function (){
            let department_id = $(this).val();
            $.ajax({
                url : '/department_id/' + department_id,
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
            let month = employee_id.concat('_', _('month').value);
            $.ajax({
                url : '/employee_id/' + employee_id,
                method : 'GET',
                success:function(data){
                    _('salary').value = data.salary;
                    _('net_amount').value = data.salary;
                }

            });
            $.ajax({
                url : '/leave_data/' + month,
                method : 'GET',
                success:function(data){
                    _('leave').value = data;
                }
            });
            $.ajax({
                url : '/kpi/' + employee_id,
                method : 'GET',
                success:function(data){
                    _('kpi').value = data.amount;
                    _('net_amount').value = +_('salary').value + +_('kpi').value;
                }
            });
            $.ajax({
                url : '/grade_id/' + employee_id,
                method : 'GET',
                success:function(data){
                    _('leave_deduction').value = data.leave_deduction;
                    _('late_attendance_fee').value = data.late_attendance_fee;
                    if(_('leave').value > 0){
                        $('#performance_bonus, #apprisal').val('');
                        let leave = _('leave_deduction').value * _('leave').value;
                        _('net_amount').value = +_('net_amount').value - leave;
                    }
                }
            });
            $.ajax({
                url : '/attendance_date/' + month,
                method : 'GET',
                success:function(data){
                    _('late_attendance').value = data;
                    if(_('late_attendance').value > 0){
                        $('#performance_bonus, #apprisal').val('');
                        let late_amount = _('late_attendance_fee').value * _('late_attendance').value;
                        _('net_amount').value = +_('net_amount').value - late_amount;
                    }
                }
            });
        });
        $(document).on('input', '#performance_bonus', function (){
            $('#apprisal').val('');
            let leave = _('leave_deduction').value * _('leave').value;
            _('net_amount').value = +_('net_amount').value - leave + +_('performance_bonus').value;
        });
        $(document).on('input', '#apprisal', function (){
            let leave = _('leave_deduction').value * _('leave').value;
            _('net_amount').value = +_('net_amount').value
                - leave + +_('performance_bonus').value + +_('apprisal').value;

        });
        $(document).on('change', '#bonus', function (){
           if($(this).val() == 'yes'){
               $('#bonus_amount_field').show();
               let bonus = _('salary').value / 2;
               _('bonus_amount').value = bonus;
               _('net_amount').value = +_('net_amount').value + bonus;
           }
           else{
               $('#bonus_amount_field').hide();
               let bonus = _('salary').value / 2;
               _('net_amount').value = +_('net_amount').value - bonus;
           }
        });
    </script>
@endsection
