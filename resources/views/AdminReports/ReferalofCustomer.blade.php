@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <div class="row">
                <div class="col">
                    {{-- <h2 class="mb-4">All Customers</h2> --}}
                </div>
                <div class="col mt-1">
                    @if (session('admin'))
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Back</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
     <div>
    <div class="container">
        <div class="row">
            <div class="col col-md-4">
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="number" id="Cus_ph_number" class="form-control" placeholder="Enter Phonenumber">
                  </div>
            </div>
            <div class="col col-md-4">
                <div class="form-group">
                    <label for="">Referal type</label>
                    <select class="form-control" id="type_of_ref">
                        <option value="0">Referal Type</option>
                        <option value="1">Indirect Referal</option>
                        <option value="2">Direct Referal</option>
                      </select>
                  </div>
            </div>
            <div class="col col-md-4">
                <div class="form-group mt-4 p-2">
                    <div class="input-group-append" id="search_btn">
                        <span class="input-group-text bg-success"><i class="fas fa-search"></i>Get Report</span>
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


        <script>
            $(function() {

                  //hidding alert section
                  $('#ph_error_alert_numeric').hide();
                  $('#ph_error_alert_length').hide();

                //validation section for customer phone number
                $('body').on('keyup','#Cus_ph_number',function()
                {
                     //reset alert
                     $('#ph_error_alert_numeric').hide();

                    let cus_ph_number=$('#Cus_ph_number').val();
                    let validation_status=true;
                          if(cus_ph_number=="")
                          {
                            $('#ph_error_alert_numeric').show();
                            validation_status=false;
                          }
                          else
                          {
                            $('#ph_error_alert_numeric').hide();
                          }

                })
                // end validation section for customer phone number


                //validation section for customer phone number is only 10 digit
                $('body').on('click','#search_btn',function()
                {
                     //reset alert
                     $('#ph_error_alert_length').hide();
                     $('#type_of_ref').removeClass('is-invalid');

                    let cus_ph_number=$('#Cus_ph_number').val();
                    let type_of_ref=$('select#type_of_ref').val();
                    var url = '{{ route('referalofCustomer.search') }}';
                    let validation_status=true;
                          if(cus_ph_number.length>10 || cus_ph_number.length<10)
                          {
                            $('#ph_error_alert_length').show();
                            validation_status=false;
                          }
                          else
                          {
                            $('#ph_error_alert_length').hide();
                            if(type_of_ref=="0")
                            {
                                $('#type_of_ref').addClass('is-invalid');
                            }
                          }

                           //request to server for customer refered users
                            if(validation_status)
                            {
                                $.ajax({

                                    url: url,
                                    type: "POST",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        cus_ph_no:cus_ph_number,
                                        type_of_ref:type_of_ref

                                    },
                                    success: function(data) {

                                            if(data==0)
                                            {
                                                alert('NO REFERDED CUSTOMER EXITS');
                                            }
                                            else if (data==2)
                                            {
                                                alert('NO DIRECT REFERDED CUSTOMER EXITS');
                                            }
                                            else
                                            {
                                                window.location.href = data;
                                            }

                                    }

                                });
                            }

                })
                // end validation section for customer phone number is only 10 digit




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
