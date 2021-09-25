@extends('layouts.master')
@section('content')
        {{-- alert-section is from submited succssfully --}}
        @if(session()->has('done'))
        <script>
            Swal.fire({
                title: 'Succesfully Added',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: 'ok',
                denyButtonText: `Don't save`,
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    window.location.href="{{ route('feildForConCaseLeader.index') }}";
                } else if (result.isDenied) {
                    Swal.fire('Changes are not saved', '', 'info')
                }
                });
        </script>
        @endif

        @if (session()->has('wrong'))
        <script>
        Swal.fire('Any fool can use a computer');
        </script>
        @endif
     {{--end alert-section is from submited succssfully --}}

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h5 class="m-0">FIELDS FOR CONVERTED CASES LEADER VIEW</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if(session('admin'))
                        <li class="breadcrumb-item"><a href="{{route('feildForConCase.index') }}">Back</a></li>
                        @endif
                        @if(session('caller'))
                        <li class="breadcrumb-item"><a href="{{route('feildForConCaseLeader.index') }}">Back</a></li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">

        <div class="container">
            <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                  <div class="card-header bg-purple text-white border-bottom-0">
                   LEAD INFO
                  </div>
                  <div class="card-body pt-3">
                    <div class="row">
                      <div class="col-3">
                            <h2 class="lead"><b>{{$customer_info->name}}</b></h2>
                            <p class="text-muted text-sm"><b>COMPANY NAME:</b> {{$customer_info->companyname}} </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small p-1"><span class="fa-li "><i class="fas fa-lg fa-building"></i></span> LOACTION:  {{$customer_info->current_loation}}</li>
                            <li class="small p-1"><span class="fa-li "><i class="fas fa-lg fa-phone"></i></span> PHONE : {{$customer_info->enquiery_cus_ph}} </li>
                            </ul>
                      </div>
                      <div class="col-2 text-center">
                        <img src="https://image.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg" alt="user-avatar" class="img-circle img-fluid" width="100px" height="100px">
                      </div>
                      <div class="col-7">
                            {{-- form first row --}}
                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <label for="con_lead_bussiness_name">BUSSINESS LOCATION</label>
                                    <input type="text" class="form-control" id="Con_lead_bussiness_name" value="{{$customer_info->current_loation}}" name="Con_lead_bussiness_name" placeholder="" disabled>
                                    <input type="hidden" class="form-control" id="cus_id" name="cus_id" value="{{$customer_info->cus_id}}">
                                    <input type="hidden" class="form-control" id="enq_id" name="enq_id" value="{{$customer_info->enq_id}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="con_lead_lg_name">LG NAME</label>
                                    <input type="text" class="form-control" id="con_lead_lg_name" name="con_lead_lg_name" value="{{$reffered_by}}" placeholder="" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="con_lead_lc_name">LC NAME</label>
                                    <input type="text" class="form-control" id="con_lead_lc_name"  name="con_lead_lc_name" value="{{old('con_lead_lc_name')}}" placeholder="LC Name" disabled>
                                </div>
                            </div>
                        </div>
                            {{-- end of form first row --}}
                        {{-- form Second row --}}
                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <label for="con_lead_source_team">SOURCE TEAM</label>
                                    <input type="text" class="form-control" id="con_lead_source_team"  name="con_lead_source_team" value="{{old('con_lead_source_team')}}"  placeholder="Source Team" disabled>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">CHANNEL</label>
                                    <select class="form-control" id="con_lead_channel" name="con_lead_channel" disabled>
                                        <option value="">Choose the Channel</option>
                                        <option value="INTERNAL" >Internal</option>
                                        <option value="EXTERNAL" >External </option>
                                        <option value="OTHERS" >Others </option>

                                    </select>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="con_lead_bank_name">BANK NAME</label>
                                    <input type="text" class="form-control" id="con_lead_bank_name"  name="con_lead_bank_name" value="{{old('con_lead_bank_name')}}" placeholder="Bank Name" disabled>
                                </div>
                            </div>
                        </div>
                            {{-- end of form Second row --}}
                      </div>
                    </div>
                    <div class="row">
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="con_lead_vendor_name">VENDOR NAME</label>
                                <input type="text" class="form-control" id="con_lead_vendor_name"  name="con_lead_vendor_name"  placeholder="Vevendor_name" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="con_lead_loan_amount_applied">LOAN AMOUNT APPLIED</label>
                                <input type="number" class="form-control" id="con_lead_loan_amount_applied" name="con_lead_loan_amount_applied" value="{{old('con_lead_loan_amount_applied')}}"  placeholder="Loan Amount Applied" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="con_lead_product_name">PRODUCT NAME</label>
                                <input type="text" class="form-control" id="con_lead_product_name" value="{{$customer_info->productname}}" name="con_lead_product_name"  placeholder="Product Name" disabled>
                            </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="con_lead_sub_product_name">SUB PRODUCT NAME</label>
                                <input type="text" class="form-control" id="con_lead_sub_product_name" value="{{$customer_info->subproductname}}" name="con_lead_sub_product_name"  placeholder="Sub Product Namesub_" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>ADDTIONAL DETAILS</label>
                                <textarea class="form-control" rows="3" placeholder="Enter ..." id="con_lead_remarks"></textarea>
                              </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">STATUS</label>
                                <select class="form-control" id="con_lead_status" >
                                    <option value="">Choose the status</option>
                                   @foreach ($status_code as $status)
                                     <option value="{{$status->id}}">{{$status->status_code}}</option>
                                   @endforeach
                                </select>
                              </div>
                        </div>
                        <div class="col col-md-3">
                            <div class="form-group">
                                <label for="con_lead_login_ref_no">LOGIN REF NO</label>
                                <input type="text" class="form-control" id="con_lead_login_ref_no"  name="con_lead_login_ref_no"  placeholder="Login Ref No" disabled>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-end">
                    <div class="text-left">
                      <a href="{{asset('userDocuments/'.$pancard)}}" download="Pancard" class="btn btn-sm btn-primary px-1">
                        <i class="fas fa-download px-1"></i>PAN CARD
                      </a>
                      <a href="{{asset('userDocuments/'.$adharcard)}}" download="Adharcard" class="btn btn-sm btn-primary px-1" download>
                        <i class="fas fa-download px-1"></i>ADHAR CARD
                      </a>
                      <a href="{{asset('enquieryDoc/'.$enq)}}" download="Enquiery Document" class="btn btn-sm btn-primary px-1">
                        <i class="fas fa-download px-1"></i>ENQUIERY DOCUMENTS
                      </a>
                      <a href="{{asset('storage/pdf/'.$offerpdf.'.pdf')}}" download="LoanStoriesOffer" class="btn btn-sm btn-primary px-1">
                        <i class="fas fa-download px-1"></i>OFFER PDF
                      </a>
                    </div>
                    <div class="text-right px-3">
                            <button type="button" id="before_info_btn_submit" class="btn btn-success float-right"><i class="fas fa-paper-plane px-1"></i>SUBMIT</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    </div>

    <!-- /.content -->


@endsection



{{-- section ajax --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"> </script>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


 <script>
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

                                url: "{{ route('feildForConCaseLeader.store') }}",

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
                                                    window.location.href="{{ route('feildForConCaseLeader.index') }}";
                                                } else if (result.isDenied) {
                                                    window.location.href="{{ route('feildForConCaseLeader.index') }}";
                                                }
                                            });
                                        }


                                }

                            });
                       }
            })
            //end section for submitting the form
    });
</script>
