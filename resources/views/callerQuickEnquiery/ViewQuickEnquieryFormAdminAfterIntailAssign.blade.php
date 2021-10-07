@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-4">
            <div class="row">
                <div class="col">
                    <h4 class="mb-4">QUICK ENQUIERY VIEW INFO</h4>
                </div>
                <div class="col mt-1">
                    <div class="float-right">
                        <p class="breadcrumb-item"><a class="btn btn-sm btn-primary"
                                href="{{ route('assignedNewLeads.index') }}"><i class="fas fa-backward px-2"></i>Back</a>
                        </p>
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
                                            <li class="nav-item"><a class="nav-link text-white active"
                                                    href="#activity" data-toggle="tab">General info</a></li>
                                            <li class="nav-item"><a class="nav-link text-white" href="#timeline"
                                                    data-toggle="tab">Summarized View</a></li>
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
                                                                        <span
                                                                            class="info-box-text text-center text-muted">Working
                                                                            form home</span>
                                                                        <span
                                                                            class="info-box-number text-center text-muted mb-0">{{ $enquiery->working_from_home }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <div class="info-box bg-light">
                                                                    <div class="info-box-content">
                                                                        <span
                                                                            class="info-box-text text-center text-muted">Cibil
                                                                            Score</span>
                                                                        <span
                                                                            class="info-box-number text-center text-muted mb-0">{{ $enquiery->cibil_score }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-4">
                                                                <div class="info-box bg-light">
                                                                    <div class="info-box-content">
                                                                        <span class="info-box-text text-center text-muted">
                                                                            Loan Expected</span>
                                                                        <span
                                                                            class="info-box-number text-center text-muted mb-0">{{ $enquiery->loan_expected }}</span>
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
                                                                            class=" float-right text-md">{{ $enquiery->mode_of_contact }}</a>
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
                                                        <h3 class="text-gray"><i
                                                                class="fas fa-info-circle"></i>Additional Info</h3>
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
                                                                        class="fas fa-phone-alt pr-3"></i>{{ $enquiery->cus_phonenumber }}</a>
                                                            </li>
                                                            <li>
                                                                <a><i
                                                                        class="fas fa-envelope pr-3"></i>{{ $enquiery->email }}</a>
                                                            </li>

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- / end of first tab.tab-pane -->
                                            <!-- start of second tab.tab-pane -->
                                            <div class="tab-pane" id="timeline">

                                                <div class="row mt-5">
                                                    <div class="col col-md-4"><strong>Name
                                                            :</strong>{{ $enquiery->name }}</div>
                                                    <div class="col col-md-4"><strong>Phone No
                                                            :</strong>{{ $enquiery->cus_phonenumber }}</div>
                                                    <div class="col col-md-4">
                                                        <strong>Email:</strong>{{ $enquiery->email }}</div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col col-md-4"><strong>Date To Call
                                                            :</strong>{{ $enquiery->date_to_call }}</div>
                                                    <div class="col col-md-4"><strong>Time To Call
                                                            :</strong>{{ $enquiery->time_to_call }}</div>
                                                    <div class="col col-md-4"><strong>Mode Of Contact
                                                            :</strong>{{ $enquiery->mode_of_contact }}</div>
                                                </div>
                                                <div class="row mt-5">
                                                    @if ($enquiery->product_type == 1)
                                                        <div class="col col-md-3">
                                                            <strong>Priority</strong>{{ $enquiery->date_to_call }}</div>
                                                        <div class="col col-md-3"><strong>Product
                                                                :</strong>{{ $enquiery->productname }}</div>
                                                        <div class="col col-md-3"><strong>Product Type
                                                                :</strong>{{ $enquiery->time_to_call }}</div>
                                                        <div class="col col-md-3"><strong>Mode Of
                                                                Contact</strong>{{ $enquiery->mode_of_contact }}</div>
                                                    @else
                                                        <div class="col col-md-4"><strong>Product
                                                                :</strong>{{ $enquiery->productname }}</div>
                                                        <div class="col col-md-4"><strong>Product Type
                                                                :</strong>{{ $enquiery->subproductname }}</div>
                                                        <div class="col col-md-4"><strong>Mode Of
                                                                Contact</strong>{{ $enquiery->mode_of_contact }}</div>
                                                    @endif
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col col-md-4"><strong>Company Name
                                                            :</strong>{{ $enquiery->company_name }}</div>
                                                    <div class="col col-md-4"><strong>Monthly Income
                                                            :</strong>{{ $enquiery->monthly_income }}</div>
                                                    <div class="col col-md-4"><strong>Residence
                                                            :</strong>{{ $enquiery->residence }}</div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col col-md-4"><strong>Working From Home
                                                            :</strong>{{ $enquiery->working_from_home }}</div>
                                                    <div class="col col-md-4"><strong>Loan Expected
                                                            :</strong>{{ $enquiery->loan_expected }}</div>
                                                    <div class="col col-md-4"><strong>Cibil Score
                                                            :</strong>{{ $enquiery->cibil_score }}</div>
                                                </div>

                                            </div>
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
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Success',
                text: "{{ session('success') }}",
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ok'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = '{{ route('admin.NewLeadsbyown') }}';
                }
            })
        </script>
    @endif
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
