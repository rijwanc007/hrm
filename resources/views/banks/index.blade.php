@extends('master')
@section('content')
    <div class="container">
         <div class="card">
                <div class="card-body">
                    <div class="row table-responsive">
                        <div class="col-lg-12">
                            <h2 class="text-center text-info">Banks<hr/></h2><br/>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th> S/L</th>
                                    <th>Bank Name</th>
                                    <th> Branch </th>
                                    <th> Account Number </th>
                                    <th> Balance </th>
                                    <th> Option </th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($banks as $bank)
                                    <tr>
                                        <td>{{ ($banks->currentpage()-1) * $banks ->perpage() + $loop->index + 1 }}</td>
                                        <td>{{$bank->bank_name}}</td>
                                        <td>{{$bank->branch}} </td>
                                        <td>{{$bank->account}} </td>
                                        <td>{{!empty($bank->balance) ? $bank->balance : 0}} /-</td>
                                        <td>
{{--                                            @can('bank_edit',Auth::user())--}}
                                            <button type="button" class="btn btn-inverse-info btn-sm btn-block" onclick="window.location='{{route('bank.edit',$bank->id)}}'"><i class="mdi mdi-pencil" data-toggle="tooltip" title="Edit"></i></button>
{{--                                            @endcan--}}
{{--                                            @can('bank_show',Auth::user())--}}
{{--                                            <button type="button" class="btn btn-inverse-primary btn-icon" onclick="window.location='{{route('bank.show',$bank->id)}}'"><i class="mdi mdi-eye"></i></button>--}}
{{--                                            @endcan--}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center text-info">{{'No Bank Created Yet'}}</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                            {!! $banks->links() !!}
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
