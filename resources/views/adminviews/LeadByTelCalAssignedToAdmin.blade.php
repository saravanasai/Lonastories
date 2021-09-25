@extends('layouts.master')


@section('content')

    <!-- jQuery library -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2 p-2">
            <h5 class="mb-4">DIRECT LEADS</h5>
            @if (session('admin'))
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Back</a></p>
                </div>
            @endif
            @if (session('caller'))
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('caller.dashboard', session('caller')->id) }}">Back</a></p>
                </div>
            @endif
            <table class="table table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Cus id</th>
                        <th>Name</th>
                        <th>Phone No</th>
                        <th>Email</th>
                        <th>Dob</th>
                        <th>status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customer_info as $sno => $customer_info)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $customer_info->cus_id}}</td>
                            <td>{{ $customer_info->name }}</td>
                            <td>{{ $customer_info->cus_phonenumber }}</td>
                            <td>{{ $customer_info->email }}</td>
                            <td>{{ $customer_info->dob }}</td>
                            <td>
                                <span class="badge badge-success">{{$customer_info->status_code}}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{route('assignToAdmin.show',$customer_info->enq_id)}}"
                                    class="btn btn-sm btn-info"><i class="fas fa-binoculars px-1"></i>view</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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

        $('.yajra-datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });


        //SECTION FOR HANDLING THE DELETE REQUEST

        $('body').on('click', '.FillInfo', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var url = '{{ route('assignedNewLeads.show', ':id') }}';
            url = url.replace(':id', id);



            Swal.fire({
                title: 'Do you want to Fill More Details',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Yes`,
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

                              window.location.href='{{ route('assignedNewLeads.create')}}'
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('You cancelled', '', 'info')
                }
            })





        })

        //END OF SECTION FOR HANDLING THE DELETE REQUEST

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
        $('body').on('click', '.update', function(event) {
            event.preventDefault();



            //section for revoke validation
            $("#first_name_update").removeClass('is-invalid');
            $("#last_name_update").removeClass('is-invalid');
            $("#phone_number_update").removeClass('is-invalid');
            $("#adhar_number_update").removeClass('is-invalid');
            $("#callerPower_update").removeClass('is-invalid');


            var id = $('#update_id').val();
            var firstname = $('#first_name_update').val();
            var lastname = $("#last_name_update").val();
            var phonenumber = $("#phone_number_update").val();
            var adharnumber = $("#adhar_number_update").val();
            var power = $("#callerPower_update").val();
            var validation_status = false;

            if (firstname == "") {
                $("#first_name_update").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#first_name_update").addClass('is-valid');
                validation_status = true;
            }
            if (lastname == "") {
                $("#last_name_update").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#last_name_update").addClass('is-valid');
                validation_status = true;
            }
            if (power == "0") {
                $("#callerPower_update").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#callerPower_update").addClass('is-valid');
                validation_status = true;
            }
            if (phonenumber == "" || phonenumber.length > 10 || phonenumber.length < 10 || !$.isNumeric(
                    phonenumber)) {
                $("#phone_number_update").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#phone_number_update").addClass('is-valid');
                validation_status = true;
            }
            if (adharnumber == "" || adharnumber.length > 12 || adharnumber.length < 12 || !$.isNumeric(
                    adharnumber)) {
                $("#adhar_number_update").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#adhar_number_update").addClass('is-valid');
                validation_status = true;
            }

            console.log(power);
            console.log(validation_status);
            var url = '{{ route('caller.update', ':id') }}';
            url = url.replace(':id', id);

            if (validation_status) {
                $.ajax({

                    url: url,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        firstname: firstname,
                        lastname: lastname,
                        phonenumber: phonenumber,
                        adharnumber: adharnumber,
                        power: power

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

            }


        })

        //end section to handle the update button








    })
</script>
