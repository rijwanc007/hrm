@extends('master')
@section('content')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h4 class="text-center">Pdf Bank<hr/></h4>
{{--                            <table class="table table-striped">--}}
{{--                                <thead>--}}
{{--                                <tr class="text-center">--}}
{{--                                    <th> Date </th>--}}
{{--                                    <th> File Name </th>--}}
{{--                                    <th> Option </th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @forelse($pdfs as $pdf)--}}
{{--                                    <tr class="text-center">--}}
{{--                                        <td></td>--}}
{{--                                        <td><a class="btn btn-info" href="{{asset('assets/images/employees/cv/'. $pdf->file_name)}}" target="_blank">Download</a> </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="modal fade" id="delete_modal_{{$pdf->id}}" role="dialog">--}}
{{--                                                <div class="modal-dialog">--}}
{{--                                                    <div class="modal-content">--}}
{{--                                                        <div class="modal-header">--}}
{{--                                                            <h4 class="modal-title">Delete Employee</h4>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-body">--}}
{{--                                                            <p>Are You Want To Delete This Employee</p>--}}
{{--                                                            <p>Once You Delete This Employee</p>--}}
{{--                                                            <p>You Will Delete His/Her Information Permanently</p>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="modal-footer">--}}
{{--                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>--}}
{{--                                                            {!! Form::open(['route' => ['pdf.destroy',$pdf->id],'method' => 'DELETE']) !!}--}}
{{--                                                            <button type="submit" class="btn btn-success">submit</button>--}}
{{--                                                            {!! Form::close() !!}--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <button type="button" class="btn btn-inverse-danger btn-icon" data-toggle="modal" data-target="#delete_modal_{{$pdf->id}}"><i class="mdi mdi-delete-forever"></i></button>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @empty--}}
{{--                                <tr>--}}
{{--                                    <td colspan="3" class="text-center text-info">{{'No Employees CV Created Yet'}}</td>--}}
{{--                                </tr>--}}
{{--                                @endforelse--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
                            <table class="table table-striped">
                                <thead>
                                <tr class="text-center">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="text-center">
                                    <td>{{$names[0][0]}}</td>
                                    <td>{{$emails[0][0]}}</td>
                                    <td>{{$phones[0][0]}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
