@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4">More details</h2>
                </div>
                <div class="col mt-1">
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('assignToAdmin.index') }}">Back</a></p>
                        </div>
                </div>
            </div>
        </div>
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
                                                                <span class="info-box-text text-center text-muted">Total
                                                                    Salary</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">{{ $more_info->take_home_salary }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">Final
                                                                    Obligation</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">{{ $more_info->final_obligation }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-4">
                                                        <div class="info-box bg-light">
                                                            <div class="info-box-content">
                                                                <span class="info-box-text text-center text-muted">Loan
                                                                    Amount Required</span>
                                                                <span
                                                                    class="info-box-number text-center text-muted mb-0">{{ $more_info->loan_amount_required }}</span>
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
                                                                    class=" float-right text-md">{{ $more_info->name }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Current Location</b> <a
                                                                    class=" float-right text-md">{{ $more_info->current_loation }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Dob</b> <a
                                                                    class=" float-right text-md">{{ $more_info->dob }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Product</b> <a
                                                                    class=" float-right text-md">{{ $more_info->productname }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Product Sub Type</b> <a
                                                                    class=" float-right text-md">{{ $more_info->subproductname }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Salary Bank Account</b> <a
                                                                    class=" float-right text-md">{{ $more_info->sa_ac_bank_id }}</a>
                                                            </li>
                                                        </ul>




                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                                                <h3 class="text-gray"><i class="fas fa-info-circle"></i>Additional Info</h3>
                                                <p class="text-muted">{{ $more_info->additional_details }}</p>
                                                <br>
                                                <div class="text-muted">
                                                    <p class="text-lg text-bold">Client Company
                                                        <b class="d-block">{{ $more_info->companyname }}</b>
                                                    </p>
                                                </div>

                                                <h5 class="mt-5 text-lg">Contact Details</h5>
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <a><i
                                                                class="fas fa-phone-alt pr-3"></i>{{ $more_info->enquiery_cus_ph }}</a>
                                                    </li>
                                                    <li>
                                                        <a><i class="fas fa-envelope pr-3"></i>{{ $more_info->email }}</a>
                                                    </li>

                                                </ul>
                                                <div class="text-center mt-5 mb-3">
                                                    <div class="btn-group">
                                                        <input type="hidden"  id="enq_id" value="{{$more_info->enq_id}}">
                                                        <button type="button"
                                                            class="btn btn-success proceed"><i class="fas fa-vote-yea px-1"></i>Proceed</button>
                                                        <button type="button" class="btn btn-warning dropdown-toggle"
                                                            data-toggle="dropdown">
                                                            <span class="">More</span>
                                                        </button>
                                                        <div class="dropdown-menu" role="menu">
                                                            <a class="dropdown-item" href="#settings"
                                                                data-toggle="tab">Assign to Leader</a>
                                                            {{-- <a class="dropdown-item" href="#">Another action</a>
                                          <a class="dropdown-item" href="#">Something else here</a> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>
                                    <!-- / end of first tab.tab-pane -->
                                    <!-- start of second tab.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <div class="tab-pane" id="timeline">
                                            <div class="row mt-4">
                                                <div class="col col-md-4">
                                                    <b><strong>Phone number:</strong></b>
                                                    {{ $more_info->enquiery_cus_ph }}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Company Name:</strong></b>
                                                    {{ $more_info->companyname }}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Take Home Salary:</strong></b>
                                                    {{ $more_info->take_home_salary}}
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col col-md-4">
                                                    <b><strong>Total Obligation:</strong></b>
                                                    {{ $more_info->total_obligation}}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>No Of Credit Card:</strong></b>
                                                    {{ $more_info->no_of_credit_card}}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Credit Card Outstanding:</strong></b>
                                                    {{ $more_info->no_of_credit_card_outstanding}}
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col col-md-4">
                                                    <b><strong>Credit Card Obligation:</strong></b>
                                                    {{ $more_info->credit_card_obligation}}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Salary Bank Account Name:</strong></b>
                                                    {{ $more_info->sa_ac_bank_id}}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Product Type:</strong></b>
                                                    {{ $more_info->productname}}
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col col-md-4">
                                                    <b><strong>Sub Product Type:</strong></b>
                                                    {{ $more_info->subproductname}}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Final Obligation:</strong></b>
                                                    {{ $more_info->final_obligation}}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Existing Foir:</strong></b>
                                                    {{ $more_info->existing_foir}}
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col col-md-4">
                                                    <b><strong>Loan Amount Required:</strong></b>
                                                    {{ $more_info->loan_amount_required}}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Current Location:</strong></b>
                                                    {{ $more_info->current_loation}}
                                                </div>
                                                <div class="col col-md-4">
                                                    <b><strong>Additional details:</strong></b>
                                                    {{ $more_info->additional_details}}
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
                                                    <tr>
                                                        <td>{{ $single_leader->firstname }}</td>
                                                        <td>{{ $single_leader->phonenumber }}</td>
                                                        <td>{{ $single_leader->status }}</td>
                                                        <td><button type="button"
                                                                class="btn btn-sm btn-primary assign"><i class="fas fa-clipboard-check px-1"></i>Assign</button>
                                                            <input type="hidden" value="{{ $more_info->cus_id}}"
                                                                id="assignment_for_user">
                                                        </td>
                                                        <input type="hidden" value="{{ $single_leader->id }}"
                                                            id="single_leader_id">
                                                        <input type="hidden" value="{{ $single_leader->id }}"
                                                            id="enquiery_id">
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <div class="float-right">
                                                {{$leader_info->links()}}
                                            </div>
                                        </table>
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
        @endsection
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
                integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script>
            $(function() {

                //SECTION FOR HANDLING THE assign REQUEST
                $('body').on('click', '.assign', function(event) {
                    event.preventDefault();
                    var id = $('#assignment_for_user').val();
                    var leaderid = $('#single_leader_id').val();
                    var enq_id = $('#enq_id').val();
                    var url = '{{ route('detailview.update', ':id') }}';
                    url = url.replace(':id', id);

                    Swal.fire({
                        title: 'Do you want to Assign?',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: `Assign`,
                        denyButtonText: `cancel`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({

                                url: url,
                                type: "PUT",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    singleleaderid: leaderid,
                                    enq_id:enq_id
                                },
                                success: function(data) {
                                    if (data == 1) {
                                        Swal.fire({
                                            title: 'Success',
                                            text: "You Have assigned to Leader",
                                            icon: 'success',
                                            confirmButtonColor: '#3085d6',
                                            confirmButtonText: 'ok'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href =
                                                    "{{ route('assignToAdmin.index') }}";
                                            }
                                        })
                                    } else {
                                        Swal.fire(
                                            'Somthing Went Worng!',
                                            'You have not made any Changes.',
                                            'error'
                                        )

                                    }

                                }
                            });
                        } else if (result.isDenied) {
                            Swal.fire('You cancelled', '', 'info')
                        }
                    })

                })
                //END OF SECTION FOR HANDLING THE assign REQUEST

                //section to handle the proceed button
                $('body').on('click', '.proceed', function(event) {
                    event.preventDefault();

                    var assignment_for_user = $('#assignment_for_user').val();
                    var enq_id = $('#enq_id').val();
                    var url = '{{ route('detailview.store') }}';
                    validation_status = true;

                    if (validation_status) {
                        $.ajax({

                            url: url,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                asignid: 'ADMIN',
                                userid: assignment_for_user,
                                enq_id:enq_id



                            },
                            success: function(data) {

                                if (data == 1) {
                                    Swal.fire({
                                        title: 'Success',
                                        text: "You process done!",
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ route('assignToAdmin.index') }}";
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Somthing Went Worng!',
                                        'You have not made any Changes.',
                                        'error'
                                    )

                                }


                            }

                        });

                    }


                })
                //end section to handle the proceed button

            })
        </script>
