@extends('layouts.master')


@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">ADD USER</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if(session('admin'))
                        <li class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">

        <div class="conatiner col-md-8 offset-md-2">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Add User Form</h3>
                </div>
                <form method="POST"  action="" id="telecaller_form">
                    @csrf
                    <div class="card-body">
                        {{-- form first row --}}
                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstname" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastname"  placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="callerPower">Power</label>
                                    <select class="form-control" id="callerPower" name="power">
                                        <option value="0" selected>Choose the power</option>
                                        <option value="Leader">Leader</option>
                                        <option value="Caller">Caller</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        {{-- end of form first row --}}
                        {{-- form second row --}}
                        <div class="row">
                            <div class="col col-md-4">

                                <div class="form-group">
                                    <label for="phonenumber">Phone Number</label>
                                    <input type="text" class="form-control" name="phonenumber" id="phonenumber"
                                        placeholder="Enter The Phone Numner">
                                </div>
                            </div>

                            <div class=" col col-md-4">
                                <div class="form-group">
                                    <label for="adharNumber">Adhar Number</label>
                                    <input type="text" class="form-control" id="adharNumber" name="adharnumber" placeholder="Adhar Number">
                                </div>
                            </div>
                            <div class=" col col-md-4">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success float-right">Submit</button>
                        </div>
                    </div>
                    {{-- end of form second row --}}
            </div>

            </form>
        </div>
    </div>
    <!-- /.content -->
@endsection


{{-- section ajax --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">


</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


<script>
    $(function() {

        //section to handle the form submission

        $("#telecaller_form").submit(function(event) {
            event.preventDefault();

             //section for revoke validation
                $("#firstName").removeClass('is-invalid');
                $("#lastName").removeClass('is-invalid');
                $("#phonenumber").removeClass('is-invalid');
                $("#adharNumber").removeClass('is-invalid');
                $("#password").removeClass('is-invalid');
                $("#callerPower").removeClass('is-invalid');

            var validation_status=true;
            var first_name = $("#firstName").val();
            var last_name = $("#lastName").val();
            var phone_number = $("#phonenumber").val();
            var adhar_number = $("#adharNumber").val();
            var password = $("#password").val();
            var power = $("#callerPower").val();

                    //validation

                     if(first_name=="")
                     {
                        $("#firstName").addClass('is-invalid');
                        validation_status=false;
                     }
                     else
                     {
                        $("#firstName").addClass('is-valid');
                        validation_status=true;
                     }
                     if(last_name=="")
                     {
                        $("#lastName").addClass('is-invalid');
                        validation_status=false;
                     }
                     else
                     {
                        $("#lastName").addClass('is-valid');
                        validation_status=true;
                     }
                     if(phone_number==""||phone_number.length>10||phone_number.length<10||!$.isNumeric(phone_number))
                     {
                        $("#phonenumber").addClass('is-invalid');
                        $("#phonenumber").val("");
                        validation_status=false;
                     }
                     else
                     {
                        $("#phonenumber").addClass('is-valid');
                        validation_status=true;

                     }
                     if(adhar_number==""||adhar_number.length>12||adhar_number.length<12||!$.isNumeric(adhar_number))
                     {
                        $("#adharNumber").addClass('is-invalid');
                        $("#adharNumber").val("");
                        validation_status=false;
                     }
                     else
                     {
                        $("#adharNumber").addClass('is-valid');
                        validation_status=true;
                     }
                     if(password==""||password.length<4)
                     {
                        $("#password").addClass('is-invalid');
                        validation_status=false;
                     }
                     else
                     {
                        $("#password").addClass('is-valid');
                        validation_status=true;
                     }
                     if(power==0)
                     {
                        $("#callerPower").addClass('is-invalid');
                        validation_status=false;
                     }
                     else
                     {
                        $("#callerPower").addClass('is-valid');
                        validation_status=true;
                     }

                     //section if all then field arr ok
                     if(validation_status)
                     {
                        $.ajax({

                                url: '{{ route('caller.store') }}',

                                type:'POST',

                                data: {
                                    _token:"{{csrf_token()}}",
                                    firstname:first_name,
                                    lastname:last_name,
                                    phonenumber:phone_number,
                                    adharnumber:adhar_number,
                                    password:password,
                                    power:power

                                },

                                success: function(data) {

                                      if(data==1)
                                      {
                                        Swal.fire({
                                            title: 'you Have Added Caller Sucessfully',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: `Ok`,
                                            denyButtonText: `Don't save`,
                                            }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                                if (result.isConfirmed) {
                                                   window.location.href="{{route('admindashboard')}}";
                                                } else if (result.isDenied) {
                                                    Swal.fire('Changes are not saved', '', 'info')
                                                }
                                            })
                                      }
                                      else
                                      {
                                        Swal.fire(
                                                'Caller Phone Number Exits!',
                                                'You are trying to create existing Caller',
                                                'warning'
                                                ).then(()=>{
                                                    window.location.href="{{route('caller.index')}}";
                                                })



                                      }

                                }

                                });

                     }

        })



    });
</script>
