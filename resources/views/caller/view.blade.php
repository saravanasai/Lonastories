@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <h2 class="mb-4">User List</h2>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></p></div>
            @endif
            <table class="table table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Phone No</th>
                        <th>Adhar No</th>
                        <th>Power</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($caller_info as $sno => $single_caller)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $single_caller->firstname }}</td>
                            <td>{{ $single_caller->lastname }}</td>
                            <td>{{ $single_caller->phonenumber }}</td>
                            <td>{{ $single_caller->adharnumber }}</td>
                            <td>{{ $single_caller->power }}</td>
                            <td>{{ $single_caller->status }}</td>
                            <td><a  href="{{route('caller.edit',$single_caller->id)}}" class="btn btn-sm btn-success"
                                >EDIT</a></td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" id="{{ $single_caller->id }}"
                                        class="btn btn-sm btn-danger delete">DELETE</button>
                                    <button type="button" id="{{ $single_caller->id }}"
                                        class="btn btn-sm btn-outline-secondary disable">
                                        @if ($single_caller->status == 'ACTIVE') DISABLE
                                        @else ACTIVE @endif
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <div class="float-right">
                    {{$caller_info->links()}}
                </div>
            </table>
        </div>
     <div class="modal fade" id="caller_model" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Caller Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="first_name_update">First Name</label>
                                    <input type="email" class="form-control" id="first_name_update"
                                        placeholder="first name">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="last_name_update">Last Name</label>
                                    <input type="email" class="form-control" id="last_name_update"
                                        placeholder="Enter email">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone_number_update">Phone Number</label>
                                    <input type="email" class="form-control" id="phone_number_update"
                                        placeholder="Enter Phone number">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="adhar_number_update">Adhar Number</label>
                                    <input type="email" class="form-control" id="adhar_number_update"
                                        placeholder="Enter adhar number">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="callerPower_update">Power</label>
                                    <select class="form-control" id="callerPower_update" name="power">
                                        <option value="0" selected>Choose the power</option>
                                        <option value="Leader">Leader</option>
                                        <option value="Caller">Caller</option>
                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button"  class="btn btn-primary update">Save changes</button>
                        <input type="hidden" value="" id="update_id">
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>



@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
  <Script>
      Swal.fire('ok');
  </Script>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
{{-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> --}}

<script>
    $(function() {

        $('.yajra-datatable').DataTable({
            dom: 'Bfrt',
            buttons: [
            'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
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
        $('body').on('click', '.caller-edit', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var url = '{{ route('caller.edit', ':id') }}';
            url = url.replace(':id',id);

            $.ajax({

                url:url,
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
