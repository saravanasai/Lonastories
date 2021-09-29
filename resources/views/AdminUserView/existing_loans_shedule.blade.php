@extends('layouts.master')

@section('content')
    <div class="container p-3">
        <h4>Existing Loan Detais Of User</h4>
    </div>
    <!-- Main content -->
    <div class="content ">
        <div class="container">
            <div class="card card-purple">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                  <div class="card-tools">
                    <div class="float-right">
                        <a href="{{route('customer.master')}}"><i class="fas fa-backward px-2"></i>Back</a>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table">
                    <thead>
                      <tr>
                        <th style="width: 10px">SNO</th>
                        <th>BANK NAME</th>
                        <th>PRODUCT TYPE</th>
                        <th>LOAN AMOUNT</th>
                        <th>ROI</th>
                        <th>TENURE</th>
                        <th>EMI</th>
                        <th>SHEDULE</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($ex_shedules as $ex_shedule )
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$ex_shedule->emi_sh_name_of_bank}}</td>
                                <td>{{$ex_shedule->emi_sh_type_of_loan}}</td>
                                <td>{{$ex_shedule->emi_sh_loan_amount}}</td>
                                <td>{{$ex_shedule->emi_sh_roi}}</td>
                                <td>{{$ex_shedule->emi_sh_tenure}}</td>
                                <td>{{$ex_shedule->emi_sh_emi}}</td>
                                <td><a href="{{asset('SheduleDocs/'.$ex_shedule->emi_sh_file)}}" download="Shedule{{$ex_shedule->id}}" class="btn btn-sm btn-primary"><i class="fas fa-download px-1"></i>Shedule</a></td>
                                {{-- <td>{{$ex_shedule->emi_sh_file}}</td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="float-right">
                      {{$ex_shedules->links()}}
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    </div>
</div>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {

    })
</script>
