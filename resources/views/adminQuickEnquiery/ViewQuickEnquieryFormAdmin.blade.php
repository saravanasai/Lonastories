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
                            <p class="breadcrumb-item"><a href="{{ route('admin.NewLeadsbyown') }}">Back</a></p>
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
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#activity"
                                            data-toggle="tab">General info</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Summarized View</a></li>
                                    <li class="nav-item"><a class="nav-link " href="#settings" data-toggle="tab">Assign To
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
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">Working form</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">{{ $enquiery->take_home_salary }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">Cibil
                                                                    Score</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">{{ $enquiery->final_obligation }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">
                                                                    Loan Expected</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">{{ $enquiery->loan_amount_required }}</span>
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
                                                                <b>Current Location</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->current_loation }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Dob</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->dob }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Product</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->productname }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Product Sub Type</b> <a
                                                                    class=" float-right text-md">{{ $enquiery->subproductname }}</a>
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
                                    <!-- start of second tab.tab-pane -->
                                    <div class="tab-pane" id="timeline">

                                        <div class="row">
                                            <div class="col col-md-6">
                                                <div class="card-body">
                                                    <strong><i class="fas fa-book mr-1"></i>Name</strong>

                                                    <p class="text-muted">
                                                        {{ $enquiery->name }}
                                                    </p>

                                                    <hr>

                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                                                    <p class="text-muted">{{ $enquiery->current_loation }}</p>

                                                    <hr>

                                                    <strong><i class="fab fa-product-hunt mr-1"></i>Product</strong>

                                                    <p class="text-muted mt-1">
                                                        <span class="tag tag-danger">{{ $enquiery->productname }}</span>

                                                    </p>

                                                    <hr>

                                                    <strong><i class="fas fa-info-circle mr-1"></i>Additinal Info</strong>

                                                    <p class="text-muted mt-1">{{ $enquiery->additional_details }}</p>
                                                </div>

                                            </div>
                                            <div class="col">
                                                <div class="card-body">
                                                    <strong><i class="fas fa-phone-alt mr-1"></i>Phone Number</strong>

                                                    <p class="text-muted">
                                                        {{ $enquiery->cus_phonenumber }}
                                                    </p>

                                                    <hr>

                                                    <strong><i class="fas fa-map-marker-alt mr-1"></i>Dob</strong>

                                                    <p class="text-muted">{{ $enquiery->dob }}</p>

                                                    <hr>

                                                    <strong><i class="fas fa-sitemap mr-1"></i>Sub Product</strong>

                                                    <p class="text-muted mt-1">
                                                        <span
                                                            class="tag tag-danger">{{ $enquiery->subproductname }}</span>

                                                    </p>

                                                    <hr>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- / end of second tab.tab-pane -->
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

