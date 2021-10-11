@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h5 class="m-0">Create Login For User</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if(session('admin'))
                        <li class="breadcrumb-item"><a href="{{route('Directrefferal.index') }}">Back</a></li>
                        @endif
                        @if(session('caller'))
                        <li class="breadcrumb-item"><a href="{{route('feildForConCase.index') }}">Back</a></li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="row mt-3">
            <div class="col col-md-9 offset-md-1">
                <div class="card card-purple">
                    <div class="card-header">
                      <h3 class="card-title">Login For User</h3>
                    </div>
                    <div class="card-body">
                     <form action="{{route('createAccountFormAdmin')}}" method="post">
                         @csrf
                         @if ($errors)
                         <div class="row">
                            <div class="col col-md-12">
                               @foreach ($errors->all() as $error)
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                   <p><strong>Caution!</strong>{{ $error }}</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                               @endforeach
                            </div>
                         </div>
                         @endif
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="inputName">User Name</label>
                                    <input type="text" id="inputName" value="{{$direct_ref_info->refered_cus_name}}" name="username" class="form-control">
                                    <input type="hidden" id="inputName" value="{{$direct_ref_info->direct_ref_of_user}}" name="ref_by_cus" class="form-control">
                                  </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="inputClientCompany">PhoneNumber</label>
                                    <input type="text" id="inputClientCompany" value="{{$direct_ref_info->refered_cus_phonenumber}}" name="phonenumber" class="form-control">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="inputProjectLeader">Email</label>
                                    <input type="text" id="inputProjectLeader"  name="email" class="form-control">
                                  </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="inputProjectLeader">DOB</label>
                                    <input type="date" id="inputProjectLeader" name="dob" class="form-control">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-6 offset-md-6">
                                <div class="float-right">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus px-1"></i>Create Account</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col col-md-12">
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <strong>Caution!</strong> You are creating a login For User.Intimate the user They can Directly Login without <b>Sign Up</b>
                                   <p>Ask Correct Email And Dob Birth Form User</p>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                    <!-- /.card-body -->
                  </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
{{-- section ajax --}}
@section('js')
 {{-- <script>
    $(function() {

            //section to hide on page load
             $('#before_info_btn_submit').prop('disabled',true);

            //section to handle if the update status is Disbursed
            $('body').on('change','#con_lead_status',function()
            {
                let update_status=$('select#con_lead_status').val();

                  //this logic is to if user select logged in
                   if(update_status==11)
                   {
                     $('#con_lead_login_ref_no').prop('disabled',false);
                     $('#before_info_btn_submit').prop('disabled',false);
                     $('#con_lead_lc_name').prop('disabled',false);
                     $('#con_lead_source_team').prop('disabled',false);
                     $('#con_lead_channel').prop('disabled',false);
                     $('#con_lead_bank_name').prop('disabled',false);
                     $('#con_lead_vendor_name').prop('disabled',false);
                     $('#con_lead_loan_amount_applied').prop('disabled',false);
                   }

            })
            //end section to handle if the update status logged in or fntp

            //section for submitting the form
            $('body').on('click','#before_info_btn_submit',function()
            {
                //reseting the validation indicator
                $('#con_lead_lc_name').removeClass('is-invalid');
                $('#con_lead_source_team').removeClass('is-invalid');
                $('#con_lead_channel').removeClass('is-invalid');
                $('#con_lead_bank_name').removeClass('is-invalid');
                $('#con_lead_vendor_name').removeClass('is-invalid');
                $('#con_lead_loan_amount_applied').removeClass('is-invalid');
                $('#con_lead_remarks').removeClass('is-invalid');
                $('#con_lead_status').removeClass('is-invalid');
                $('#con_lead_login_ref_no').removeClass('is-invalid');

                 let update_status=$('select#con_lead_status').val();
                 let lead_bussiness_name=$('#Con_lead_bussiness_name').val();
                 let lead_lg_name=$('#con_lead_lg_name').val();
                 let lead_lc_name=$('#con_lead_lc_name').val();
                 let lead_source_team=$('#con_lead_source_team').val();
                 let lead_channel=$('select#con_lead_channel').val();
                 let lead_bank_name=$('#con_lead_bank_name').val();
                 let lead_vendor_name=$('#con_lead_vendor_name').val();
                 let lead_loan_amount_applied=$('#con_lead_loan_amount_applied').val();
                 let lead_product_name=$('#con_lead_product_name').val();
                 let lead_sub_product_name=$('#con_lead_sub_product_name').val();
                 let lead_remarks=$('#con_lead_remarks').val();
                 let lead_status=$('#con_lead_status').val();
                 let lead_login_ref_no=$('#con_lead_login_ref_no').val();
                 let cus_id=$('#cus_id').val();
                 let enq_id=$('#enq_id').val();
                 let validation_status=true;

                       if(update_status==11)
                       {
                           if(lead_lc_name=="")
                           {
                            $('#con_lead_lc_name').addClass('is-invalid');
                            validation_status=false;
                           }
                           if(lead_source_team=="")
                           {
                            $('#con_lead_source_team').addClass('is-invalid');
                            validation_status=false;
                           }
                           if(lead_channel=="")
                           {
                            $('select#con_lead_channel').addClass('is-invalid');
                            validation_status=false;
                           }
                           if(lead_bank_name=="")
                           {
                            $('#con_lead_bank_name').addClass('is-invalid');
                            validation_status=false;
                           }
                           if(lead_vendor_name=="")
                           {
                            $('#con_lead_vendor_name').addClass('is-invalid');
                            validation_status=false;
                           }
                           if(lead_loan_amount_applied=="")
                           {
                            $('#con_lead_loan_amount_applied').addClass('is-invalid');
                            validation_status=false;
                           }
                           if(lead_loan_amount_applied=="")
                           {
                            $('#con_lead_loan_amount_applied').addClass('is-invalid');
                            validation_status=false;
                           }
                           if(lead_login_ref_no=="")
                           {
                            $('#con_lead_login_ref_no').addClass('is-invalid');
                            validation_status=false;
                           }
                       }
                    //    alert(validation_status);
                       //request section
                       if(validation_status)
                       {
                        $.ajax({

                                type: 'POST',

                                url: "{{ route('feildForConCase.store') }}",

                                data: {
                                    _token: "{{ csrf_token() }}",
                                    lead_bussiness_name:lead_bussiness_name,
                                    lead_lg_name:lead_lg_name,
                                    lead_lc_name:lead_lc_name,
                                    lead_source_team:lead_source_team,
                                    lead_channel:lead_channel,
                                    lead_bank_name:lead_bank_name,
                                    lead_vendor_name:lead_vendor_name,
                                    lead_loan_amount_applied:lead_loan_amount_applied,
                                    lead_product_name:lead_product_name,
                                    lead_sub_product_name:lead_sub_product_name,
                                    lead_remarks:lead_remarks,
                                    lead_status:lead_status,
                                    lead_login_ref_no:lead_login_ref_no,
                                    cusid: cus_id,
                                    enqid: enq_id,
                                    table: 0
                                },

                                success: function(data) {


                                        if(data==1)
                                        {
                                            Swal.fire({
                                            title: 'FILE LOG IN DEAILS ADDED',
                                            showDenyButton: false,  showCancelButton: false,
                                            confirmButtonText: `OK`,
                                            denyButtonText: `Don't save`,
                                            }).then((result) => {
                                                /* Read more about isConfirmed, isDenied below */
                                                if (result.isConfirmed) {
                                                    window.location.href="{{ route('feildForConCase.index') }}";
                                                } else if (result.isDenied) {
                                                    window.location.href="{{ route('feildForConCase.index') }}";
                                                }
                                            });
                                        }


                                }

                            });
                       }
            })
            //end section for submitting the form
    });
</script> --}}
@endsection
