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
        <div class="row d-flex">
            <div class="col col-md-3">
                <div class="form-group">
                    <label>From:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control" class="" id="From_date">
                    </div>
                    <!-- /.input group -->
                  </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label>To:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                      </div>
                      <input type="date" class="form-control" class="" id="To_date">
                    </div>
                    <!-- /.input group -->
                  </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <label>Choose Type:</label>
                    <div class="input-group">
                        <select class="form-control" id="Report_type">
                            <option value="0">Report Type</option>
                            <option value="1">Converted</option>
                            <option value="2">Bending Leads</option>
                          </select>
                    </div>
                    <!-- /.input group -->
                  </div>
            </div>
            <div class="col col-md-3">
                <div class="form-group">
                    <div class="mt-4" id="gen_btn">
                        <span class="btn btn-success" ><i class="fas fa-search"></i>Get Report</span>
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


                //validation section for Date and Report Type
                $('body').on('click','#gen_btn',function()
                {
                     //reset alert
                     $('#From_date').removeClass('is-invalid');
                     $('#To_date').removeClass('is-invalid');
                     $('#Report_type').removeClass('is-invalid');

                    let from_date=$('#From_date').val();
                    let to_date=$('#To_date').val();
                    let Report_type=$('#Report_type').val();

                    var url = '{{ route('referalofCustomer.search') }}';
                    console.log(from_date);
                    console.log(to_date);
                    //SELECT * FROM `customer_enqiery_forms` WHERE  DATE(`created_at`)='2021-09-11'
                    let validation_status=true;

                            if(from_date=="")
                            {
                                $('#From_date').addClass('is-invalid');
                                validation_status=false;
                            }
                            if(to_date=="")
                            {
                                $('#To_date').addClass('is-invalid');
                                validation_status=false;
                            }
                            if(Report_type=="0")
                            {
                                $('#Report_type').addClass('is-invalid')
                                validation_status=false;
                            }


                           //request to server for customer refered users
                            if(validation_status)
                            {
                                $.ajax({

                                    url: url,
                                    type: "POST",
                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        from_date:from_date,
                                        to_date:to_date,
                                        Report_type:Report_type,
                                        type_of_ref:3

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
                // end validation section for Date and Report Type




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
