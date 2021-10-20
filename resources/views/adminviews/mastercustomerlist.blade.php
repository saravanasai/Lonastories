@extends('layouts.master')
{{-- error section --}}
@if (session('error'))
    <script>
        alert('NO DOCUMENTS AVAILABLE');
    </script>
@endif
@if (session()->has('customer.master'))
  <script>
      Swal.fire(
  'Good job!',
  'You Deleted User!',
  'success'
)
  </script>
@endif
@section('content')
    <!-- Main content -->
    <div class="content mt-5">
        <div class="container">
            @if (session('admin'))
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Back</a></p>
                </div>
            @endif
            <div class="card-body table-responsive p-0">
                <table class="table  table-bordered table-hover table-head-fixed text-nowrap  table-striped yajra-datatable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            {{-- <th>PROFILE</th> --}}
                            <th>NAME</th>
                            <th>PHONE</th>
                            <th>EMAIL</th>
                            <th>DOB</th>
                            <th>ACTION</th>
                            <th>PR_FORM</th>
                            <th>EX-EMI</th>
                            <th>PROFILE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($new_user as $sno => $single_user)
                            <tr>
                                <td>{{ ++$sno }}</td>
                                {{-- <td>
                                    @if ($single_user->user_profile_img == null)
                                    <a href="#"><img alt="User Profile Image" height="10" class="profile-user-img img-fluid img-circle" src="https://cdn.pixabay.com/photo/2016/08/31/11/54/user-1633249_960_720.png">
                                    @else
                                    <a href="{{asset('profileimg/'.$single_user->user_profile_img)}}"><img alt="User Profile Image" height="10" width="10" class="profile-user-img img-fluid img-circle" src="{{asset('profileimg/'.$single_user->user_profile_img)}}">
                                    @endif
                                </td> --}}
                                <td>{{ $single_user->name }}</td>
                                <td>{{ $single_user->cus_phonenumber }}</td>
                                <td>{{ $single_user->email }}</td>
                                <td>{{ $single_user->dob }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('wallteByAdmin.show', $single_user->id) }}"
                                            class="btn btn-sm btn-success"><i class="fas fa-wallet px-1"></i>Wallet</a>
                                        <a href="{{ route('OverAllCusEnquiery.show', $single_user->id) }}"
                                            class="btn btn-sm btn-info"><i class="fas fa-book px-1"></i>View</a>
                                        <a href="{{ route('OverAllCusEnquiery.edit', $single_user->id) }}"
                                            class="btn btn-sm btn-warning"><i class="fas fa-file-pdf px-1"></i>Docs</a>
                                        @if ($single_user->user_profile_img == null)
                                            <a href="#" class="btn btn-sm btn-danger disabled"><i
                                                    class="fas fa-history p-1"></i></a>
                                        @else
                                            <a href="{{ asset('profileimg/' . $single_user->user_profile_img) }}"
                                                class="btn btn-sm btn-success"><i class="far fa-id-badge p-1"></i></a>
                                        @endif
                                    </div>
                                </td>
                                <td>
                                    <a href="{{ route('PersonalInfoAdmin.show', $single_user->id) }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-align-right px-1"></i>PR-FORM</a>
                                </td>
                                <td>
                                    <a href="{{ route('ExistingLoans.show', $single_user->id) }}"
                                        class="btn btn-sm btn-success"><i class="fas fa-history px-1"></i>Exist</a>
                                </td>
                                <td>
                                    <a href="{{ route('AdminUserProfile.show', $single_user->id) }}"
                                        class="btn btn-sm btn-danger"><i class="fas fa-id-card px-1"></i>PROFILE</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {{-- {{ $new_user->links()}} --}}
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

        $('.yajra-datatable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
            ],
            // pageLength : 8,
            // lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'List']]
        });


        //SECTION FOR HANDLING THE DELETE REQUEST

        $('body').on('click', '.delete', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var url = '{{ route('caller.destroy', ':id') }}';
            url = url.replace(':id', id);


            Swal.fire({
                title: 'Do you want to Delete?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Delete`,
                denyButtonText: `cancel`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({

                        url: url,
                        type: "DELETE",
                        data: {
                            _token: "{{ csrf_token() }}",
                            id: id
                        },
                        success: function(data) {
                            if (data == 1) {
                                Swal.fire({
                                    title: 'Success',
                                    text: "You won't be able to revert this!",
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





        })

        //END OF SECTION FOR HANDLING THE DELETE REQUEST

        //section for handling the disabling function of user
        $('body').on('click', '.disable', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var url = '{{ route('customer.disable') }}';
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
                        type: "post",
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
                                            "{{ route('customer.master') }}";
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
