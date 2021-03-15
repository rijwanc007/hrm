@extends('master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h4 class="text-center text-info" id="create" style="cursor: pointer"><i class="mdi mdi-mail"></i> Create</h4>
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-center text-success" id="sent" style="cursor: pointer"> <i class="mdi mdi-mailbox-up"></i> Sent</h4>
                            </div>
                            <div class="col-md-4">
                                <h4 class="text-center text-danger" id="inbox" style="cursor: pointer"> <i class="mdi mdi-inbox-arrow-down"></i>Inbox</h4>
                            </div>
                        </div>
                        <hr/>
                        <br/>
                        <div class="create_message">
                            <div class="row">
                                <div class="col-md-4 text-right" style="margin-top: 10px">From</div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control payment" id="amount" name="amount" value="Mr. MNOP HAQ" style="border: 1px solid grey">
                                    </div>
                                </div>
                                <div class="col-md-4 text-right" style="margin-top: 10px">To Person</div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control payment" id="amount" name="amount"  placeholder="" style="border: 1px solid grey">
                                    </div>
                                </div>
                                <div class="col-md-4 text-right" style="margin-top: 10px">To Group</div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <input type="text" class="form-control payment" id="amount" name="amount"  placeholder="" style="border: 1px solid grey">
                                    </div>
                                </div>
                                <div class="col-md-4 text-right" style="margin-top: 10px">Message</div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <textarea class="form-control payment" id="amount" name="amount" style="border: 1px solid grey"></textarea>
                                    </div>
                                </div>
                            </div>
                            <hr/>
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-gradient-info btn-lg btn-block"> Send Message </button>
                                </div>
                            </div>
                        </div>
                        <div class="sent_message" style="display: none">
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <h4 class="text-center">Sent Messages<hr/></h4>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th> Message From </th>
                                            <th> Message To </th>
                                            <th> Create Date </th>
                                            <th> Message </th>
                                            <th> In Reply </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="5" class="text-center text-info">{{'No Messages Sent Yet'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="inbox" style="display: none">
                            <div class="row table-responsive">
                                <div class="col-lg-12">
                                    <h4 class="text-center">Recieved Messages<hr/></h4>
                                    <table class="table table-striped">
                                        <thead>
                                        <tr class="text-center">
                                            <th> Message From </th>
                                            <th> Message To </th>
                                            <th> Create Date </th>
                                            <th> Message </th>
                                            <th> In Reply </th>
                                            <th> Reply </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td colspan="6" class="text-center text-info">{{'No Messages Recieved Yet'}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).on('click', '#sent', function (){
            $('.create_message, .inbox').hide();
            $('.sent_message').show();
            $('#sent').css("border", "2px solid");
            $('#create, #inbox').css("border", "0px solid")
        });
        $(document).on('click', '#create', function (){
            $('.sent_message, .inbox').hide();
            $('.create_message').show();
            $('#create').css("border", "2px solid")
            $('#sent, #inbox').css("border", "0px solid")
        });
        $(document).on('click', '#inbox', function (){
            $('.create_message, .sent_message').hide();
            $('.inbox').show();
            $('#inbox').css("border", "2px solid")
            $('#sent, #create').css("border", "0px solid")
        });
    </script>
@endsection
