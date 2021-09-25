@extends('layouts.callermaster')


@section('content')

    <!-- jQuery library -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <div class="row">
                <div class="col">
                    <h2 class="mb-4">Quick Enquiery Info</h2>
                </div>
                <div class="col mt-1">
                    @if (session('admin'))
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('OwnLeadAssigntoadmin.index') }}">Back</a></p>
                        </div>
                    @endif
                    @if (session('caller'))
                        <div class="float-right">
                            <p class="breadcrumb-item"><a
                                    href="{{ route('assignedNewLeads.index', session('caller')->id) }}">Back</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
     <div>

    <div class="container">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Quick Enquiery Info</h3>
            </div>
            <div class="row">
                <div class="col">
                          <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-book mr-1 mb-2"></i>Time To Call</strong>

                <p class="text-muted">
                 {{$enquiery->time_to_call}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Mode Of Contact</strong>

                <p class="text-muted">
                  {{$enquiery->mode_of_contact}}
                </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i>Employee Type</strong>

                <p class="text-muted">
                  {{$enquiery->emp_type}}

                </p>

                <hr>

                <strong><i class="far fa-file-alt mr-1"></i>Product Type</strong>

                <p class="text-muted">
                  {{$enquiery->productname}}
                </p>
              </div>
              <!-- /.card-body -->
                </div>
                <div class="col">
                          <!-- /.card-header -->
            <div class="card-body">
                <strong><i class="fas fa-book mr-1 mb-2"></i>Sub Product Type</strong>

                <p class="text-muted">
                 {{$enquiery->subproductname}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i>Cibil Score</strong>

                <p class="text-muted">
                  {{$enquiery->cibil_score}}
                </p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i>Created At</strong>

                <p class="text-muted">
                  {{$enquiery->created_at}}

                </p>

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

                //SECTION FOR HANDLING THE assign REQUEST

                $('body').on('click', '.assign', function(event) {
                    event.preventDefault();
                    var id = $('#assignment_for_user').val();
                    var leaderid = $('#single_leader_id').val();
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
                                    singleleaderid: leaderid
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
                                                    "{{ route('admin.LeadsbyCaller') }}";
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

                //section for handling the disabling function of user
                $('body').on('click', '.disable', function(event) {
                    event.preventDefault();
                    var id = $(this).attr('id');
                    var url = '{{ route('caller.show', ':id') }}';
                    url = url.replace(':id', id);

                    Swal.fire({
                        title: 'Do you want to Continue?',
                        showDenyButton: true,
                        showCancelButton: false,
                        confirmButtonText: `Ok`,
                        denyButtonText: `cancel`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            $.ajax({

                                url: url,
                                type: "GET",
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    id: id
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
                                                    "{{ route('caller.create') }}";
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





                });
                //end section for handling the disabling function of user


                //section to handle the edit button
                $('body').on('click', '.edit', function(event) {
                    $('.modal').modal('show');

                    event.preventDefault();

                    var id = $(this).attr('id');
                    var url = '{{ route('caller.edit', ':id') }}';
                    url = url.replace(':id', id);

                    $.ajax({

                        url: url,
                        type: "GET",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(data) {
                            var repsonse = JSON.parse(data);
                            $("#first_name_update").val(repsonse.firstname);
                            $("#last_name_update").val(repsonse.lastname);
                            $("#phone_number_update").val(repsonse.phonenumber);
                            $("#adhar_number_update").val(repsonse.adharnumber);
                            $("#callerPower_update").val(repsonse.power);
                            $("#update_id").val(repsonse.id);



                        }

                    });
                })

                //end section to handle the edit button

                //section to handle the update button
                $('body').on('click', '.proceed', function(event) {
                    event.preventDefault();

                    var assignment_for_user = $('#assignment_for_user').val();
                    var url = '{{ route('detailview.store') }}';
                    validation_status = true;

                    if (validation_status) {
                        $.ajax({

                            url: url,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                asignid: 'ADMIN',
                                userid: assignment_for_user



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
                                                "{{ route('admin.LeadsbyCaller') }}";
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

                //end section to handle the update button








            })
        </script>
