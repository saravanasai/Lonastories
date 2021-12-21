@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h4 class="mb-4">QUICK ENQUIERY INFO</h4>
                </div>
                <div class="col mt-1">
                        <div class="float-right">
                            <p class="breadcrumb-item"><a class="btn btn-sm btn-primary" href="{{ route('admin.NewLeadsbyown') }}"> <i class="fas fa-backward px-2"></i>Back</a></p>
                        </div>
                </div>
            </div>
        </div>
     <div>
    <div class="container mt-2">
        <div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card card-purple">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link text-white active" href="#activity"
                                            data-toggle="tab">General info</a></li>

                                    <li class="nav-item"><a class="nav-link text-white " href="#settings" data-toggle="tab">Assign To
                                        </a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    {{-- first tab --}}
                                    <div class="tab-pane active" id="activity">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                                                <div class="row">
                                                    <div class="col-12 col-md-6 col-sm-3">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">
                                                                    Loan Expected</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">{{ $enquiery->how_soon }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6 col-sm-3">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">
                                                                    Loan Required</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">{{ $enquiery->Loan_Amount }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <h4>General Information</h4>
                                                        <ul class="list-group list-group mb-3">
                                                            <li class="list-group-item">
                                                                <b>Name</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->name }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Mode Of Contact</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->mode_to_connect }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Date To Call</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->enq_date }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Time To Call</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->enq_time }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Product</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->productname }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>City</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->City_Name }}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                                <h3 class="text-gray"><i class="fas fa-info-circle"></i>Additional Info</h3>
                                                <p class="text-muted">{{ $enquiery->additional_details }}</p>
                                                <br>
                                                <div class="text-muted">
                                                    {{-- <p class="text-lg text-bold">Client Company
                                                        <b class="d-block">{{ $enquiery->companyname }}</b>
                                                    </p> --}}
                                                </div>

                                                <h5 class="mt-5 text-lg">Contact Details</h5>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <a><i
                                                                class="fas fa-phone-alt pr-3"></i>{{ $enquiery->cus_phonenumber}}</a>
                                                    </li>
                                                    <li>
                                                        <a><i class="fas fa-envelope pr-3"></i>{{ $enquiery->email }}</a>
                                                    </li>

                                                </ul>
                                                <div class="text-center mt-5 mb-3">
                                                    <div class="btn-group">
                                                        <form action="{{route('EnquieryAssign.store')}}" method="post">
                                                            @csrf
                                                        <input type="hidden"  name="q_enq_id"  value="{{$enquiery->q_enq_id   }}">
                                                        <input type="hidden"  name="table" value="1">
                                                         {{-- tabel value one means assign to admin --}}
                                                        <button type="submit"
                                                            class="btn btn-success"><i class="fas fa-vote-yea px-1"></i>Proceed</button>
                                                        </form>
                                                        <div class=" px-2" role="menu">
                                                            <a class="btn  btn-danger" href="#settings"
                                                                data-toggle="tab"><i class="fas fa-vote-yea px-1"></i>To Leader</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- / end of first tab.tab-pane -->

                                    <div class="tab-pane" id="settings">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Leader Name</th>
                                                    <th>Phone Number</th>
                                                    <th>status</th>
                                                    <th>Assign</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($leader_info as $single_leader)
                                                <form action="{{route('EnquieryAssign.store')}}" method="post">
                                                    @csrf
                                                    <tr>
                                                        <td>{{ $single_leader->firstname }}</td>
                                                        <td>{{ $single_leader->phonenumber }}</td>
                                                        <td>{{ $single_leader->status }}</td>
                                                        <td><button type="submit"
                                                                class="btn btn-sm btn-primary"><i class="fas fa-clipboard-check px-1"></i>Assign</button>
                                                        </td>
                                                        <input type="hidden" value="{{ $single_leader->id }}"
                                                            name="leader_id">
                                                        <input type="hidden" value="{{ $enquiery->q_enq_id}}"
                                                            name="q_enq_id">
                                                        </td>
                                                    </tr>
                                                </form>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <div class="float-right">
                                            {{$leader_info->links()}}
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                    </div>
                </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('success'))
    <script >
        Swal.fire({
      title: 'Success',
      text: "{{session('success')}}",
      icon: 'success',
      showCancelButton: false,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Ok'
    }).then((result) => {
      if (result.isConfirmed) {
        window.location.href='{{ route('admin.NewLeadsbyown') }}';
      }
    })
    </script>
    @endif
 @endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

