@extends('master')
@section('content')
    {!! Form::open(['class' =>'form-sample','route' => 'hr_budget.store','method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="page-header" id="bannerClose"><h3 class="page-title"><span class="page-title-icon bg-gradient-primary text-white mr-2"><i class="mdi mdi-account"></i></span> Budget Expense</h3></div>
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                       <div class="form-group">
                           <label class="date">Date</label>
                           <input type="date" class="form-control" name="date" id="date">
                       </div>
                        <div class="form-group" id="budget_remains_field" style="display: none">
                            <label class="budget_remains">Budget Remains</label>
                            <input type="text" class="form-control" name="budget_remains" id="budget_remains" readonly>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="item">Item</label>
                                    <input type="text" id="item" name="item[]" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input type="number" id="amount" name="amount[]" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="item"></label>
                                    <button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon text-center"></i></button>
                                </div>
                            </div>
                        </div>
                        <div id="append_item">

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
            <button type="submit" class="btn btn-gradient-primary btn-lg btn-block"><i class="mdi mdi-account"></i> Create </button>
        </div>
    </div>
    {!! Form::close() !!}
    <script>
        function _(x){
            return document.getElementById(x);
        }
        $(document).on('input', '#date', function (){
           let date = $(this).val();
           $.ajax({
              url : '/budget_date/'+ date,
              method : 'GET',
              success : function (data){
                  $('#budget_remains_field').show();
                  _('budget_remains').value = data;

              }
           });
        });
        $(document).on('click', '#add_item', function (){
            var html ='';
            html += '<div class="row"> <div class="col-md-4"> <div class="form-group"> <label for="item">Item</label> <input type="text" id="item" name="item[]" class="form-control"> </div> </div><div class="col-md-4"> <div class="form-group"> <label for="amount">Amount</label> <input type="number" id="amount" name="amount[]" class="form-control"> </div> </div> <div class="col-md-2"> <div class="form-group"><label for="item"></label><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="add_item"><i class="mdi mdi-plus menu-icon"></i></button></div> </div><div class="col-md-2"><label for="item"></label> <div class="form-group"><button type="button" class="btn btn-gradient-info btn-lg btn-block" id="minus_item"><i class="mdi mdi-minus menu-icon"></i></button></div> </div></div>'
            $('#append_item').append(html);
        });
        $(document).on('click','#minus_item',function(){
            $(this).parent().parent().parent().remove();

        });
    </script>
@endsection
