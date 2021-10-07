@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
       <div class="container mt-3">
          <div class="card card-purple">
              <div class="card-header">
                  EXISTING LOAN INFO
                  <div class="card-tools">
                      <a href="{{route('ExistingEmiInfoAddAdmin.show',$user_info->id)}}" class="btn btn-sm btn-success"><i class="fas fa-paper-plane px-1"></i>ADD</a>
                      <a href="{{route('customer.master')}}" class="btn btn-sm btn-primary"><i class="fas fa-backward px-2"></i>BACK</a>
                  </div>
              </div>
              <div class="card-body">
                  @if(Session::has('success'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Emi Added
                  </div>
                  @endif
                  @if(Session::has('deleted'))
                  <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Emi is Deleted
                  </div>
                  @endif
                 @if($user_info->customer_one_view_status==1)

                      <table class="table table-sm">
                        <thead>
                          <tr>
                            <th style="width: 10px">Sno</th>
                            <th>Bank Name</th>
                            <th>Loan Type</th>
                            <th>Loan Amount</th>
                            <th>Roi</th>
                            <th>Tennure</th>
                            <th>Emi</th>
                            <th>Shedule</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($ex_ln_info as $ex_loan)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$ex_loan->emi_sh_name_of_bank}}</td>
                                <td>{{$ex_loan->emi_sh_type_of_loan}}</td>
                                <td>{{$ex_loan->emi_sh_loan_amount}}</td>
                                <td><span class="badge bg-success">{{$ex_loan->emi_sh_roi }}%</span></td>
                                <td>{{$ex_loan->emi_sh_tenure }}</td>
                                <td>{{$ex_loan->emi_sh_emi }}</td>
                                @if ($ex_loan->emi_shedule_status==1)
                                <td><a href="{{asset('SheduleDocs/'.$ex_loan->emi_sh_file)}}" download="Shedule{{$ex_loan->id}}" class="btn btn-sm btn-primary"><i class="fas fa-download px-1"></i>Shedule</a></td>
                                @else
                                <td><a href="{{asset('SheduleDocs/'.$ex_loan->emi_sh_file)}}" download="Shedule{{$ex_loan->id}}" class="btn btn-sm btn-primary disabled"><i class="fas fa-download px-1"></i>Not Uploaded</a></td>
                                @endif
                                <td>
                                    <form action="{{route('ExistingLoans.destroy',$ex_loan->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                     <button class="btn btn-sm btn-danger" type="submit"><i class="fas fa-trash-alt px-2"></i>Delete</button>
                                    </form>
                                </td>
                              </tr>
                            @endforeach
                        </tbody>
                      </table>
                      <div class="float-right">
                          {{$ex_ln_info->links()}}
                      </div>
                 @endif
              </div>
          </div>
       </div>
    </div>
    @endsection
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}
