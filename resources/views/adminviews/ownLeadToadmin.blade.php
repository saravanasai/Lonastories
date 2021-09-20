@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h4 class="mb-2 p-2">MY LEADS</h4>
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Back</a></p>
                </div>
            <div class="container">
                <table class="table table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>NAME</th>
                            <th>PHONE NO</th>
                            <th>EMAIL</th>
                            <th>ENQUIERY</th>
                            <th>STATUS</th>
                            <th>ACTION</th>
                            <th>UPDATE</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($new_own_leads as $sno => $new_own_leads)
                            <tr>
                                <td>{{ ++$sno }}</td>
                                <td>{{ $new_own_leads->name }}</td>
                                <td>{{ $new_own_leads->cus_phonenumber }}</td>
                                <td>{{ $new_own_leads->email }}</td>
                                <td class="text-center">
                                    <a type="button" href="{{route('OwnLeadAssigntoadmin.edit',$new_own_leads->enq_id)}}"
                                        class="btn btn-sm btn-info">
                                        <i class="fas fa-eye px-1"></i>view
                                    </a>
                                </td>
                                <td class="text-center">
                                    @if ($new_own_leads->cs_enq_status_enq_tb=="1")
                                    <span class="badge badge-danger">New Enquiery</span>
                                    @else
                                    <span class="badge badge-success">{{$new_own_leads->status_code}}</span>
                                    @endif
                                </td>
                                <td  class="text-center">
                                    <a href="{{route('OwnLeadAssigntoadmin.show',$new_own_leads->cus_id)}}"
                                        class="btn btn-sm btn-success"><i class="fas fa-file-signature px-1"></i>Fill Info</a>

                                </td>
                                <td>
                                    <div class="input-group">
                                        <select class="form-control" id="cus_over_all_status{{$new_own_leads->enq_id}}">
                                            <option value="0" selected>Choose the status</option>
                                        @foreach ($status_code as $status)
                                            <option value="{{$status->id}}">{{$status->status_code}}</option>
                                        @endforeach
                                        </select>
                                        <div class="input-group-prepend">
                                            <button type="button" id="{{ $new_own_leads->enq_id}}"
                                                class="btn btn-sm btn-warning updateStatus"><i class="fas fa-user-edit"></i></button>
                                          </div>
                                      </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                 </table>
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

        //section for handling the updatestatus function of user
        $('body').on('click', '.updateStatus', function(event) {
            event.preventDefault();

            var id = $(this).attr('id');
            let status_code=$('select#cus_over_all_status'+id).val();

             //section for toast
             var toastMixin = Swal.mixin({
                toast: true,
                icon: 'success',
                title: 'General Title',
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
                });

               if(status_code==0)
               {
                toastMixin.fire({
                    icon: 'error',
                    title: 'Choose The Status'
                    });

                }
                //section chaning the customer over all status
                if(status_code!=0)
                {
                    Swal.fire({
                title: 'Do you want to Continue?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Ok`,
                denyButtonText: `cancel`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    let ov_cus_status = '{{ route('OwnLeadAssigntoadmin.update', ':id') }}';
                    ov_cus_status = ov_cus_status.replace(':id', id);
                    console.log(ov_cus_status);
                    $.ajax({

                        url: ov_cus_status,
                        type: "PUT",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status_Code:status_code
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
                                        window.location.reload();
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

                }
                //end of changing the customer over all status




        });
        //end section for hanging the customer over all status


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
