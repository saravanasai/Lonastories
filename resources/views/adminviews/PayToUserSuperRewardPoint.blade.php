@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <div class="row">
                <div class="col">
                    <h5 class="mb-4 mt-5">UPDATE FOR SUPER REWARD POINT GIVEN TO USER</h5>
                </div>
                <div class="col mt-1">
                    @if (session('admin'))
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('wallteByAdmin.index') }}">Back</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div>
            <div class="container p-2 mt-4">
                <div class="card p-3">
                   <div class="card-header">
                      <b> Name:</b> {{$srp_data->userInfo->name}} <br>
                      <b> PhoneNumber:</b> {{$srp_data->userInfo->cus_phonenumber}}<br>
                      <b> Email:</b> {{$srp_data->userInfo->email}}<br>
                      <b> Promo Code:</b> {{$srp_data->userInfo->PromoCode}}<br>
                   </div>
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-4">
                            <h4>Remark</h4>
                            <p>{{$srp_data->remark_of_super_reward_point}}</p>
                           </div>
                           <div class="col-md-4">
                            <h4>SRP</h4>
                            <p>{{$srp_data->points_given}}</p>
                            <input type="hidden" id="srp_points_given" value="{{$srp_data->points_given}}">
                           </div>
                           <div class="col-md-4">
                            <h4>Redeem Option: </h4>
                            <p>{{$srp_data->redem_option_choosed }}</p>
                           </div>
                       </div>
                       <div class="row">
                        <div class="col-md-6 offset-md-6">
                          <button type="button" class="btn btn-sm btn-primary" data-id="{{$srp_data->spr_to_user}}" id="updateRedemforSRP">Update Redeem</button>
                        </div>
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

            $('body').on('click', '#updateRedemforSRP', function(event) {
                event.preventDefault();
                var id = $(this).attr('data-id');
                var url = '{{ route('wallteByAdmin.update', ':id') }}';
                url = url.replace(':id', id);
                let srp_points_given=$('#srp_points_given').val();
                Swal.fire({
                    title: 'Do you want to Update Redeem Status?',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: `Pay`,
                    denyButtonText: `cancel`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({

                            url: url,
                            type: "PUT",
                            data: {
                                _token: "{{ csrf_token() }}",
                                srp_points_given:srp_points_given
                            },
                            success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        title: 'Success',
                                        text: "Status Updated Successfully",
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ route('wallteByAdmin.index') }}";
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
