@extends('layouts.callermaster')
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h4 class="m-0">ADD MORE INFO TELECALLER VIEW</h4>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if(session('admin'))
                        <li class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></li>
                        @endif
                        @if(session('caller'))
                        <li class="breadcrumb-item"><a href="{{route('assignedNewLeads.index') }}">Back</a></li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

        <div class="conatiner col-md-12">
            <div class="card card-info">
                <div class="card-header">
                    <h5 class="card-title">More Details of Customer</h5>
                </div>
                <form method="POST"  action="" id="new_customer_more_info_form">
                    @csrf
                    <div class="card-body">
                        {{-- form first row --}}
                        <div class="row">
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="firstName">First Name *</label>
                                    <input type="text" class="form-control" id="firstName" value="{{$customer_info->name}}" name="firstname" placeholder="Enter First Name" disabled>
                                    <input type="hidden" class="form-control" id="cus_id" value="{{$customer_info->id}}" name="firstname" placeholder="Enter First Name" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastname"  placeholder="Enter Last Name">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="callerPower">Phone Number *</label>
                                    <input type="text" class="form-control" id="PhoneNumber" value="{{$customer_info->cus_phonenumber}}" name="Phone Number"  placeholder="Enter Phone Number" disabled>
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="{{$customer_info->email}}"  id="email"
                                        placeholder="Enter The Email" disabled>
                                </div>
                            </div>
                        </div>
                        {{-- end of form first row --}}
                        {{-- form second row --}}
                        <div class="row">
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="company_name">Company Name</label>
                                    <input type="text" class="form-control" name="company_name" id="company_name"
                                        placeholder="Enter Company Name">
                                </div>
                            </div>
                            <div class=" col col-md-2">
                                <div class="form-group">
                                    <label for="total_salary">Take Home Salary</label>
                                    <input type="number" class="form-control" id="total_salary" name="total_salary" placeholder="Total Salary">
                                </div>
                            </div>
                            <div class=" col col-md-3">
                                <div class="form-group">
                                    <label for="sa_bank_name">Salary Bank Account</label>
                                    <select class="form-control" id="sa_bank_name" name="sa_bank_name">
                                        <option value="0" selected>Choose bank name</option>
                                       @foreach ($banks as $bank )
                                        <option value="{{$bank->id}}">{{$bank->bank_name}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class=" col col-md-2">
                                <div class="form-group">
                                    <label for="total_obligation">Emi Obligation</label>
                                    <input type="number" class="form-control" id="total_obligation" name="total_obligation" placeholder="Total Obligation">
                                </div>
                            </div>
                            <div class=" col col-md-2">
                                <div class="form-group">
                                    <label for="no_of_credit_card">No of Credit Card</label>
                                    <input type="number" class="form-control" id="no_of_credit_card" name="no_of_credit_card" placeholder="No of credit Cards">
                                </div>
                            </div>
                        </div>
                         {{-- end of form second row --}}
                          {{-- form third row --}}
                        <div class="row">
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="credit_card_outstanding">Credit Card Outstanding</label>
                                    <input type="number" class="form-control" id="credit_card_outstanding" name="credit_card_outstanding" placeholder="Card outstanding amount">
                                </div>
                            </div>
                            <div class=" col col-md-3">
                                <div class="form-group">
                                    <label for="credit_card_obligation">Credit Card Obligation</label>
                                    <input type="text" class="form-control" name="credit_card_obligation" id="credit_card_obligation" placeholder="Total credit card obligation" disabled>
                                </div>
                            </div>
                            <div class=" col col-md-3">
                                <div class="form-group">
                                    <label for="final_obligation">Final Obligation</label>
                                    <input type="text" class="form-control" id="final_obligation" name="final_obligation" placeholder="Final Obligation" disabled>
                                </div>

                            </div>
                            <div class=" col col-md-3">
                                <div class="form-group">
                                    <label for="existing_foir">Existing FOIR</label>
                                    <input type="text" class="form-control" id="existing_foir" name="existing_foir" disabled value="0">
                                </div>
                            </div>
                        </div>
                         {{-- end of form third row --}}
                          {{-- form fourth row --}}
                        <div class="row">
                            <div class=" col col-md-3">
                                <div class="form-group">
                                    <label for="type_of_Product">Type of Product</label>
                                    <select class="form-control" id="type_of_Product" name="type_of_existing_loan" >
                                        <option value="0" selected>Exitsing loan type</option>
                                       @foreach ($products as $product )
                                        <option value="{{$product->id}}">{{$product->productname}}</option>
                                       @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="type_of_sub_product">Sub Product</label>
                                    <select class="form-control" id="type_of_sub_product" name="loan_sub_product" disabled>
                                        <option value="0" selected>Exitsing loan type</option>
                                    </select>
                                </div>

                            </div>

                            <div class=" col col-md-3">
                                <div class="form-group">
                                    <label for="required_loan_amount">Loan amount require</label>
                                    <input type="number" class="form-control" id="required_loan_amount" name="required_loan_amount" placeholder="Loan amount required">
                                </div>
                            </div>
                            <div class=" col col-md-3">
                                <div class="form-group">
                                    <label for="current_loaction">Current Location</label>
                                    <input type="text" class="form-control" id="current_loaction" name="current_loaction" placeholder="Enter Current location">
                                </div>
                            </div>
                        </div>
                         {{-- end of form fourth row --}}
                         <div class="row">
                             <div class="col col-md-8">
                                <div class="form-group">
                                    <label>Addtional details</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="additional_detail"></textarea>
                                  </div>
                             </div>
                             <div class="col col-md-4">
                                <div class="form-group">
                                    <label for="">Status</label>
                                    <select class="form-control" id="lead_status">
                                        <option value="0" selected>Choose the status</option>
                                       @foreach ($status_code as $status)
                                         <option value="{{$status->id}}">{{$status->status_code}}</option>
                                       @endforeach
                                    </select>
                                  </div>
                             </div>
                         </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col col-md-1">
                                    <button type="reset" class="btn btn-danger" >Reset</button>
                                </div>
                                <div class="col col-md-1 offset-md-8">
                                    <button type="button" class="btn btn-warning" id="calculate_final_obligation">Calculate</button>
                                </div>
                                <div class="col col-md-2">

                                    <button type="submit" class="btn btn-success btnleadgen">Generate lead</button>
                                    <input type="hidden" value="{{session('caller')->id}}" id="id">
                                </div>
                            </div>


                        </div>
                    </div>

            </div>

            </form>
        </div>
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

              //hiding the generate lead button
              $('.btnleadgen').hide();



            //section to handle teh final  obligation
             $('body').on('click','#calculate_final_obligation',function()
             {
                    //section for reset validation in from
                    $("#total_salary").removeClass('is-invalid');
                    $("#sa_bank_name").removeClass('is-invalid');
                    $("#total_obligation").removeClass('is-invalid');
                    $("#no_of_credit_card").removeClass('is-invalid');
                    $("#credit_card_outstanding").removeClass('is-invalid');
                    $("#credit_card_obligation").removeClass('is-invalid');

                    let total_salary=$("#total_salary").val();
                    let salary_bank_name=$("#sa_bank_name").val();
                    let total_obligation=$("#total_obligation").val();
                    let no_of_credit_card=$("#no_of_credit_card").val();
                    let credit_card_outstanding=$("#credit_card_outstanding").val();


                    let validation_status=true;
                    //validating the field
                    if(total_salary=="")
                    {
                        $("#total_salary").addClass('is-invalid');
                        validation_status=false;
                        $("#total_salary").val('');
                    }
                    if(salary_bank_name==0)
                    {
                        $("#sa_bank_name").addClass('is-invalid');
                        validation_status=false;
                    }
                    if(total_obligation=="")
                    {
                        $("#total_obligation").addClass('is-invalid');
                        validation_status=false;
                        $("#total_obligation").val('');
                    }
                    if(no_of_credit_card=="")
                    {
                        $("#no_of_credit_card").addClass('is-invalid');
                        validation_status=false;
                        $("#no_of_credit_card").val('');
                    }
                    if(no_of_credit_card=="")
                    {
                        $("#no_of_credit_card").addClass('is-invalid');
                        validation_status=false;
                        $("#no_of_credit_card").val('');
                    }
                    if(credit_card_outstanding=="")
                    {
                        $("#credit_card_outstanding").addClass('is-invalid');
                        validation_status=false;
                        $("#credit_card_outstanding").val('');
                    }
                     //end of validating the field
                     //appending the value to final_obligation and foir
                         if(validation_status)
                          {
                              //showuing the generatre leand button
                              $('.btnleadgen').show();

                             let credit_card_obligation=(Number(credit_card_outstanding)*5)/100;
                             let final_obligation=Number(total_obligation)+Number(credit_card_obligation);
                             let Exiting_foir=(final_obligation/total_salary)*100;
                             $('#credit_card_obligation').val(credit_card_obligation);
                             $('#final_obligation').val(final_obligation);
                             $('#existing_foir').val(Exiting_foir+'%');

                          }

                    //appending the value to final_obligation and foir

             });
            //end section to handle teh final  obligation











         //section for loadig the subproducts section by products
         $('body').on('change','#type_of_Product',function()
         {
            let product_id=$(this).val();
            if(product_id!=0)
            {
                                //request to get a sub products
                            $.ajax({

                url:'{{route("caller.getsubproductsbyproduct")}}',

                type:'POST',

                data: {
                    _token:"{{csrf_token()}}",
                    productid:product_id,


                },

                success: function(data) {

                    let response=JSON.parse(data);
                    var tr = '';
                    $.each(response, function(i,subproduct) {
                    tr += '<option value="'+subproduct.id+'">'+subproduct.subproductname+'</option>';
                    });
                    $('#type_of_sub_product').prop("disabled", false);
                    $('#type_of_sub_product').html(tr);




                    }
                });
                //end of ajax request

            }else
            {
                $('#type_of_sub_product').prop("disabled", true);
                $('#type_of_sub_product').html('<option value="0" selected>Sub product type</option>');
            }



         });
         //end section for loadig the subproducts section by products










        //section to handle the form submission

        $(".btnleadgen").click(function(event) {
            event.preventDefault();

             //section for revoke validation
                $("#firstName").removeClass('is-invalid');
                $("#PhoneNumber").removeClass('is-invalid');
                $("#company_name").removeClass('is-invalid');
                $("#total_salary").removeClass('is-invalid');
                $("#sa_bank_name").removeClass('is-invalid');
                $("#total_obligation").removeClass('is-invalid');
                $("#no_of_credit_card").removeClass('is-invalid');
                $("#credit_card_outstanding").removeClass('is-invalid');
                $("#credit_card_obligation").removeClass('is-invalid');
                $("#final_obligation").removeClass('is-invalid');
                $("#existing_foir").removeClass('is-invalid');
                $("#type_of_Product").removeClass('is-invalid');
                $("#type_of_sub_product").removeClass('is-invalid');
                $("#required_loan_amount").removeClass('is-invalid');
                $("#current_loaction").removeClass('is-invalid');
                $("#additional_detail").removeClass('is-invalid');
                $("select#lead_status").removeClass('is-invalid');


            let validation_status_to_submit=true;
            var first_name = $("#firstName").val();
            var last_name = $("#lastName").val();
            var phone_number = $("#PhoneNumber").val();
            var email = $("#email").val();
            var companyname = $("#company_name").val();
            var take_home_salary_submit = $("#total_salary").val();
            var sa_account_on_bank = $("#sa_bank_name").val();
            var total_obligation_submit = $("#total_obligation").val();
            var No_of_credit_card = $("#no_of_credit_card").val();
            var No_of_credit_card_outstanding = $("#credit_card_outstanding").val();
            var credit_card_obligation_submit = $("#credit_card_obligation").val();
            var final_obligation_submit = $("#final_obligation").val();
            var existing_foir = $("#existing_foir").val();
            var type_of_loan_submit = $("#type_of_Product").val();
            var sub_type_of_loan = $("#type_of_sub_product").val();
            var loan_amount_required = $("#required_loan_amount").val();
            var current_location = $("#current_loaction").val();
            var additional_details = $("#additional_detail").val();
            var id=$("#id").val();
            var cus_id=$('#cus_id').val();
            var cus_over_all_status=$("select#lead_status").val();

                     var url = '{{ route('assignedNewLeads.store') }}';
                     url = url.replace(':id', id);
                    //validation
                    if(current_location=="")
                     {
                        $("#current_loaction").addClass('is-invalid');
                        validation_status_to_submit=false;
                     }

                     if(first_name=="")
                     {
                        $("#firstName").addClass('is-invalid');
                        validation_status_to_submit=false;
                     }
                     if(phone_number==""||phone_number.length>10||phone_number.length<10||!$.isNumeric(phone_number))
                     {
                        $("#PhoneNumber").addClass('is-invalid');
                        $("#PhoneNumber").val("");
                        validation_status_to_submit=false;
                     }

                     if(type_of_loan_submit==0)
                     {
                        $("#type_of_Product").addClass('is-invalid');
                        validation_status_to_submit=false;
                     }
                     if(sub_type_of_loan==0)
                     {
                        $("#type_of_sub_product").addClass('is-invalid');
                        validation_status_to_submit=false;
                     }
                     if(loan_amount_required==""||!$.isNumeric(loan_amount_required))
                     {
                        $("#required_loan_amount").addClass('is-invalid');
                        validation_status_to_submit=false;
                     }
                     if(cus_over_all_status==0)
                     {
                        $("select#lead_status").addClass('is-invalid');
                        validation_status_to_submit=false;
                     }


                    //   console.log(validation_status_to_submit);

                     //section if all then field arr ok
                     if(validation_status_to_submit)
                     {
                        $.ajax({

                                url:url,

                                type:'POST',

                                data: {
                                    _token:"{{csrf_token()}}",
                                    firstname:first_name,
                                    lastname:last_name,
                                    phonenumber:phone_number,
                                    cusid:cus_id,
                                    email:email,
                                    companyname:companyname,
                                    takehomesalary:take_home_salary_submit,
                                    totalobligation:total_obligation_submit,
                                    no_of_credit_card:No_of_credit_card,
                                    no_of_credit_card_outstanding:No_of_credit_card_outstanding ,
                                    credit_card_obigation:credit_card_obligation_submit,
                                    sa_bank_account:sa_account_on_bank,
                                    type_of_loan:type_of_loan_submit,
                                    loan_sub_product:sub_type_of_loan,
                                    final_obligation:final_obligation_submit,
                                    existing_foir:existing_foir,
                                    loan_amount_required:loan_amount_required,
                                    current_location:current_location,
                                    additional_detail:additional_details,
                                    cus_over_all_status:cus_over_all_status


                                },

                                success: function(data) {

                                      if(data==1)
                                      {
                                        Swal.fire({
                                            title: 'Successfully Generated New Lead',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: `Ok`,
                                            }).then((result) => {
                                            /* Read more about isConfirmed, isDenied below */
                                                if (result.isConfirmed) {
                                                    var url = '{{ route('caller.dashboard', ':id') }}';
                                                      url = url.replace(':id', id);
                                                      window.location.href=url;
                                                } else if (result.isDenied) {
                                                    Swal.fire('Changes are not saved', '', 'info')
                                                }
                                            })
                                      }
                                      else if(data==2)
                                      {
                                        Swal.fire(
                                                'Already a Phone Number Exits',
                                                'Pls Try Different Number',
                                                'warning'
                                                )
                                                $("#PhoneNumber").addClass('is-invalid');
                                                $("#PhoneNumber").val("");

                                      }
                                      else
                                      {
                                        Swal.fire(
                                                'Something Went Wrong',
                                                'Pls Try Again',
                                                'warning'
                                                ).then(()=>{
                                                    var url = '{{ route('caller.dashboard', ':id') }}';
                                                      url = url.replace(':id', id);
                                                      window.location.href=url;
                                                })



                                      }

                                }

                                });

                     }

        })



    });
</script>
