@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h5 class="m-0">FEILDS FOR CONVERTED CASE AFTER LOGED IN </h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if(session('admin'))
                        <li class="breadcrumb-item"><a href="{{route('feildForConCase.index') }}">Back</a></li>
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
        <div class="container">
            <div class="col-12 col-sm-6 col-md-12 d-flex align-items-stretch flex-column">
                <div class="card card-purple  d-flex flex-fill">
                  <div class="card-header  text-white border-bottom-0">
                   LEAD INFO EDIT VIEW
                  </div>
                  <div class="card-body pt-3">
                    <div class="row">
                      <div class="col-3">
                            <h2 class="lead"><b>{{$customer_info->name}}</b></h2>
                            <p class="text-muted text-sm"><b>COMPANY NAME:</b> {{$customer_info->companyname}} </p>
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small p-1"><span class="fa-li "><i class="fas fa-lg fa-building"></i></span> Loaction:  {{$customer_info->current_loation}}</li>
                            <li class="small p-1"><span class="fa-li "><i class="fas fa-lg fa-phone"></i></span> Phone : {{$customer_info->enquiery_cus_ph}} </li>
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
                                        <input type="text" class="form-control" id="con_lead_lg_name" name="con_lead_lg_name" value="{{$converted_feilds_info->con_lead_lg_name}}" placeholder="" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="con_lead_lc_name">LC NAME</label>
                                        <input type="text" class="form-control" id="con_lead_lc_name"  name="con_lead_lc_name" value="{{$converted_feilds_info->con_lead_lc_name}}" placeholder="LC Name" disabled>
                                    </div>
                                </div>
                            </div>
                                {{-- end of form first row --}}
                            {{-- form Second row --}}
                            <div class="row">
                                <div class="col col-md-4">
                                    <div class="form-group">
                                        <label for="con_lead_source_team">SOURCE TEAM</label>
                                        <input type="text" class="form-control" id="con_lead_source_team"  name="con_lead_source_team" value="{{$converted_feilds_info->con_lead_source_team}}"  placeholder="Source Team" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">CHANNEL</label>
                                        <select class="form-control" id="con_lead_channel" name="con_lead_channel" disabled>
                                            <option value="{{$converted_feilds_info->con_lead_source_team}}" selected>{{$converted_feilds_info->con_lead_source_team}}</option>
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
                                        <input type="text" class="form-control" id="con_lead_bank_name"  name="con_lead_bank_name" value="{{$converted_feilds_info->con_lead_bank_name}}" placeholder="Bank Name" disabled>
                                    </div>
                                </div>
                            </div>
                            {{-- end of form Second row --}}
                        </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-3">
                                <div class="form-group">
                                    @error('con_lead_vendor_name')
                                    <div class="text-danger"><Strong>{{$message}}</Strong></div>
                                    @enderror
                                    <label for="con_lead_vendor_name">VENDOR NAME</label>
                                    <input type="text" class="form-control" id="con_lead_vendor_name"  name="con_lead_vendor_name" value="{{$converted_feilds_info->con_lead_vendor_name}}" placeholder="vendor_name" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">

                                    <div class="text-danger" id="con_lead_loan_amount_applied_error"></div>

                                    <label for="con_lead_loan_amount_applied">LOAN AMOUNT APPLIED</label>
                                    <input type="number" class="form-control" id="con_lead_loan_amount_applied" name="con_lead_loan_amount_applied" value="{{$converted_feilds_info->con_lead_loan_amount_applied}}"  placeholder="Loan Amount Applied" disabled>
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
                            <div class="col-md-3">
                                <div class="form-group">
                                    @error('con_lead_remarks')
                                    <div class="text-danger"><Strong>{{$message}}</Strong></div>
                                    @enderror
                                    <label>ADDTIONAL DETAILS</label>
                                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="con_lead_remarks" name="con_lead_remarks">{{$converted_feilds_info->con_lead_remarks}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="">STATUS</label>
                                    <select class="form-control" id="con_lead_status" name="con_lead_status">
                                        <option value="">Choose the status</option>
                                    @foreach ($status_code as $status)
                                        <option value="{{$status->id}}">{{$status->status_code}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="last_status">LAST STATUS</label>
                                    <input type="text" class="btn btn-success" id="last_status" value="{{$converted_feilds_info->status_code}}" name="last_status"  disabled>
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_login_ref_no">LOGIN REF NO</label>
                                    <input type="text" class="form-control" id="con_lead_login_ref_no" value="{{$converted_feilds_info->con_lead_login_ref_no}}" name="con_lead_login_ref_no"  placeholder="Login Ref No" disabled>
                                </div>
                            </div>
                        </div>
                    {{-- section displayed only if the status slection is disbrusement --}}
                    <div id="disbrusement_section">
                        <div id="disbrusement_alert" class="text-danger"><Strong>ALL HIGHLIGHTED FEILDS SHOULD BE FILLED AND SHOULD BE IN NUMERIC </Strong></div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_loan_amount_aproved">LOAN AMOUNT APPROVED</label>
                                    <input type="number" class="form-control" id="con_lead_loan_amount_aproved" name="con_lead_loan_amount_aproved"   placeholder="Loan Amount Approved" >
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_roi">ROI</label>
                                    <input type="number" class="form-control" id="con_lead_roi"  name="con_lead_roi"  placeholder="Roi">
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_tennure">TENNURE</label>
                                    <input type="number" class="form-control" id="con_lead_tennure"  name="con_lead_tennure"  placeholder="Tennure">
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_emi">EMI</label>
                                    <input type="text" class="form-control" id="con_lead_emi"  name="con_lead_emi"  placeholder="EMI" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_insurance_status">INSURANCE</label>
                                    <select class="form-control" id="con_lead_insurance_status" name="con_lead_insurance_status">
                                        <option value="0">Choose the Insurance</option>
                                        <option value="Yes" >Yes</option>
                                        <option value="No" >No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_pf_gst">PF GST</label>
                                    <input type="number" class="form-control" id="con_lead_pf_gst" name="con_lead_pf_gst"   placeholder="PF Gst">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_stamp_duty">STAMP DUTY</label>
                                    <input type="number" class="form-control" id="con_lead_stamp_duty"  name="con_lead_stamp_duty"  placeholder="Stamp Duty">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_gap_inter_emi">GAP INTEREST EMI</label>
                                    <input type="number" class="form-control" id="con_lead_gap_inter_emi"  name="con_lead_gap_inter_emi"  placeholder="Gap Interest Emi">
                                </div>
                            </div>
                            <div class="col col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_insurance_premium">INSURANCE PREMIUM</label>
                                    <input type="number" class="form-control" id="con_lead_insurance_premium"  name="con_lead_insurance_premium"  placeholder="Insurance Premium">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="con_lead_other_charges">OTHER CHARGES</label>
                                    <input type="number" class="form-control" id="con_lead_other_charges" name="con_lead_other_charges" value="0" placeholder="Other Charges">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group p-4">
                                    <button type="button" class="btn btn-info" id="con_lead_cal_btn"> <i class="fas fa-calculator px-1"></i>Calculate</button>
                                    <button type="button" class="btn btn-danger" id="con_lead_edit_btn"><i class="far fa-edit"></i>Edit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                     {{--end section displayed only if the status slection is disbrusement --}}
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
                            <button type="submit" id="con_lead_update_btn" class="btn btn-success float-right"><i class="fas fa-paper-plane px-1"></i>Update</button>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>
    <!-- /.content -->
@endsection
{{-- section ajax --}}
@section('js')
 <script>
    $(function() {

            //section to hide on page load
             $('#disbrusement_section').hide();
             $('#disbrusement_alert').hide();
             $('#con_lead_edit_btn').hide();
             $('#con_lead_update_btn').prop('disabled',true);

            //section to handle if the update status is Disbursed
            $('body').on('change','#con_lead_status',function()
            {
                let update_status=$('select#con_lead_status').val();

                  //this logic is to if user select disbrused option
                   if(update_status==18)
                   {
                    $('#disbrusement_section').show();
                    $('#con_lead_bank_name').prop('disabled',true);
                     $('#con_lead_vendor_name').prop('disabled',true);
                     $('#con_lead_loan_amount_applied').prop('disabled',true);
                     $('#con_lead_update_btn').prop('disabled',true);
                   }
                   else if(update_status==16)
                   {
                     $('#disbrusement_section').hide();
                     $('#con_lead_bank_name').prop('disabled',false);
                     $('#con_lead_vendor_name').prop('disabled',false);
                     $('#con_lead_loan_amount_applied').prop('disabled',false);
                     $('#con_lead_update_btn').prop('disabled',false);
                     $('#con_lead_login_ref_no').prop('disabled',false);
                   }
                   else
                   {
                    $('#disbrusement_section').hide();
                    $('#con_lead_bank_name').prop('disabled',true);
                     $('#con_lead_vendor_name').prop('disabled',true);
                     $('#con_lead_login_ref_no').prop('disabled',true);
                     $('#con_lead_loan_amount_applied').prop('disabled',true);
                     $('#con_lead_update_btn').prop('disabled',false);
                   }
            })
            //end section to handle if the update status is Disbursed

            //section to handle to calculate emi and all validation
             $('body').on('click','#con_lead_cal_btn',function()
             {
                    //reseting the validation indicator
                    $('#con_lead_loan_amount_aproved').removeClass('is-invalid');
                    $('#con_lead_roi').removeClass('is-invalid');
                    $('#con_lead_tennure').removeClass('is-invalid');
                    $('#con_lead_insurance_status').removeClass('is-invalid');
                    $('#con_lead_pf_gst').removeClass('is-invalid');
                    $('#con_lead_stamp_duty').removeClass('is-invalid');
                    $('#con_lead_gap_inter_emi').removeClass('is-invalid');
                    $('#con_lead_insurance_premium').removeClass('is-invalid');
                    $('#con_lead_other_charges').removeClass('is-invalid');
                    $('#disbrusement_alert').hide();


                    let loan_amount_aproved =$('#con_lead_loan_amount_aproved').val();
                    let roi =$('#con_lead_roi').val();
                    let tennure =$('#con_lead_tennure').val();
                    let insurance_status =$('select#con_lead_insurance_status').val();
                    let pf_gst =$('#con_lead_pf_gst').val();
                    let stamp_duty =$('#con_lead_stamp_duty').val();
                    let gap_inter_emi =$('#con_lead_gap_inter_emi').val();
                    let insurance_premium =$('#con_lead_insurance_premium').val();
                    let other_charges =$('#con_lead_other_charges').val();
                    let validation_status=true;
                              //validation section
                                if(loan_amount_aproved=="")
                                {
                                    $('#con_lead_loan_amount_aproved').addClass('is-invalid');
                                    validation_status=false;
                                }
                                if(roi=="")
                                {
                                    $('#con_lead_roi').addClass('is-invalid');
                                    validation_status=false;
                                }
                                if(tennure=="")
                                {
                                    $('#con_lead_tennure').addClass('is-invalid');
                                    validation_status=false;
                                }
                                if(insurance_status=="0")
                                {
                                    $('#con_lead_insurance_status').addClass('is-invalid');
                                    validation_status=false;
                                }
                                if(pf_gst=="")
                                {
                                    $('#con_lead_pf_gst').addClass('is-invalid');
                                    validation_status=false;
                                }
                                if(stamp_duty=="")
                                {
                                    $('#con_lead_stamp_duty').addClass('is-invalid');
                                    validation_status=false;
                                }
                                if(gap_inter_emi=="")
                                {
                                    $('#con_lead_gap_inter_emi').addClass('is-invalid');
                                    validation_status=false;
                                }
                                if(insurance_premium=="")
                                {
                                    $('#con_lead_insurance_premium').addClass('is-invalid');
                                    validation_status=false;
                                }
                                if(other_charges=="")
                                {
                                    $('#con_lead_other_charges').addClass('is-invalid');
                                    validation_status=false;
                                }
                              //end of validation section

                            if(validation_status)
                            {
                                $('#con_lead_emi').val(calculate_emi(loan_amount_aproved,roi,tennure));
                                $('#con_lead_loan_amount_aproved').prop('disabled',true);
                                $('#con_lead_roi').prop('disabled',true);
                                $('#con_lead_tennure').prop('disabled',true);
                                $('#con_lead_insurance_status').prop('disabled',true);
                                $('#con_lead_pf_gst').prop('disabled',true);
                                $('#con_lead_stamp_duty').prop('disabled',true);
                                $('#con_lead_gap_inter_emi').prop('disabled',true);
                                $('#con_lead_insurance_premium').prop('disabled',true);
                                $('#con_lead_other_charges').prop('disabled',true);
                                $('#con_lead_edit_btn').show();
                                $('#con_lead_cal_btn').hide();
                                $('#con_lead_update_btn').prop('disabled',false);
                            }
                            else
                            {
                                $('#disbrusement_alert').show();
                            }

             })
            //end section to handle to calculate emi and all validation

             //section to handle edit btn after cal
             $('body').on('click','#con_lead_edit_btn',function()
             {
                $('#con_lead_edit_btn').hide();
                $('#con_lead_cal_btn').show();
                $('#con_lead_update_btn').prop('disabled',true);
                     //changing disabled input feild to abled
                     $('#con_lead_emi').val(0);
                     $('#con_lead_login_ref_no').prop('disabled',false);
                     $('#con_lead_loan_amount_aproved').prop('disabled',false);
                     $('#con_lead_roi').prop('disabled',false);
                     $('#con_lead_tennure').prop('disabled',false);
                     $('#con_lead_insurance_status').prop('disabled',false);
                     $('#con_lead_pf_gst').prop('disabled',false);
                     $('#con_lead_stamp_duty').prop('disabled',false);
                     $('#con_lead_gap_inter_emi').prop('disabled',false);
                     $('#con_lead_insurance_premium').prop('disabled',false);
                     $('#con_lead_other_charges').prop('disabled',false);
             })
             //end section to handle edit btn after cal


            //section to update the info to con_lead_table
             $('body').on('click','#con_lead_update_btn',function()
             {
                    //resetting the value
                    $('#con_lead_bank_name').removeClass('is-invalid');
                    $('#con_lead_vendor_name').removeClass('is-invalid');
                    $('#con_lead_loan_amount_applied').removeClass('is-invalid');
                    $('#con_lead_loan_amount_applied_error').html('');

                    let update_status=$('#con_lead_status').val();

                      //its only for if the update status is Re-login
                      if(update_status==16)
                      {
                          let lead_bank_name=$('#con_lead_bank_name').val();
                          let lead_login_ref_no=$('#con_lead_login_ref_no').val();
                          let lead_vendor_name=$('#con_lead_vendor_name').val();
                          let lead_loan_amount_applied=$('#con_lead_loan_amount_applied').val();
                          let cus_id=$('#cus_id').val();
                          let enq_id=$('#enq_id').val();
                          let validation_status_re_login=true;

                                //validation section if the file is relogin
                                if(lead_login_ref_no=="")
                                {
                                    $('#con_lead_login_ref_no').addClass('is-invalid');
                                    validation_status_re_login=false;
                                }
                                if(lead_bank_name=="")
                                {
                                    $('#con_lead_bank_name').addClass('is-invalid');
                                    validation_status_re_login=false;
                                }
                                if(lead_vendor_name=="")
                                {
                                    $('#con_lead_vendor_name').addClass('is-invalid');
                                    validation_status_re_login=false;
                                }
                                if(lead_loan_amount_applied==""||!$.isNumeric(lead_loan_amount_applied))
                                {
                                    $('#con_lead_loan_amount_applied').addClass('is-invalid');
                                    $('#con_lead_loan_amount_applied_error').html('Amount Should Be in Numeric and Not Empty');
                                    validation_status_re_login=false;
                                }

                                     //request to the feildForConCase.store To is sperated by table no
                                        if(validation_status_re_login)
                                        {
                                            $.ajax({

                                                type: 'POST',

                                                url: "{{ route('feildForConCase.store') }}",

                                                data: {
                                                    _token: "{{ csrf_token() }}",
                                                    lead_bank_name:lead_bank_name,
                                                    lead_vendor_name:lead_vendor_name,
                                                    lead_loan_amount_applied:lead_loan_amount_applied,
                                                    lead_login_ref_no:lead_login_ref_no,
                                                    update_status:update_status,
                                                    cusid: cus_id,
                                                    enqid: enq_id,
                                                    table: 1
                                                },

                                                success: function(data) {


                                                        if(data==1)
                                                        {
                                                            Swal.fire({
                                                            title: 'Information Updated Sucessfully',
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
                                     //end request to the feildForConCase.store To is sperated by table no

                      }  // end its only for if the update status is Re-login
                      else if(update_status==18) //start its only for loan is stuats is disbruced
                      {

                        let login_ref_no=$('#con_lead_login_ref_no').val();
                        let loan_amount_aproved =$('#con_lead_loan_amount_aproved').val();
                        let roi =$('#con_lead_roi').val();
                        let emi =$('#con_lead_emi').val();
                        let tennure =$('#con_lead_tennure').val();
                        let insurance_status =$('select#con_lead_insurance_status').val();
                        let pf_gst =$('#con_lead_pf_gst').val();
                        let stamp_duty =$('#con_lead_stamp_duty').val();
                        let gap_inter_emi =$('#con_lead_gap_inter_emi').val();
                        let insurance_premium =$('#con_lead_insurance_premium').val();
                        let other_charges =$('#con_lead_other_charges').val();
                        let cus_id=$('#cus_id').val();
                        let enq_id=$('#enq_id').val();

                                //request to store more infomation after loan disbrucemnet
                                $.ajax({

                                    type: 'POST',

                                    url: "{{ route('feildForConCase.store') }}",

                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        login_ref_no:login_ref_no,
                                        loan_amount_aproved:loan_amount_aproved,
                                        roi:roi,
                                        emi:emi,
                                        tennure:tennure,
                                        insurance_status:insurance_status,
                                        pf_gst:pf_gst,
                                        stamp_duty:stamp_duty,
                                        gap_inter_emi:gap_inter_emi,
                                        insurance_premium:insurance_premium,
                                        other_charges:other_charges,
                                        update_status:update_status,
                                        cusid:cus_id,
                                        enqid:enq_id,
                                        table:2
                                    },

                                    success: function(data)
                                        {
                                            if(data==1)
                                            {
                                                Swal.fire({
                                                title: 'Loan Have Been Disbrused For This Enquiery',
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
                                //end request to store more infomation after loan disbrucemnet

                      }//end its only for loan is stuats is disbruced
                      else
                      {
                        let cus_id=$('#cus_id').val();
                        let enq_id=$('#enq_id').val();

                             //request to update the enquiery status
                             $.ajax({

                                    type: 'POST',

                                    url: "{{ route('feildForConCase.store') }}",

                                    data: {
                                        _token: "{{ csrf_token() }}",
                                        update_status:update_status,
                                        cusid: cus_id,
                                        enqid: enq_id,
                                        table: 3
                                    },

                                    success: function(data)
                                        {
                                            if(data==1)
                                            {
                                                Swal.fire({
                                                title: 'Status for This Enquiery is updated',
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
                                    //end request to update the enquiery status
                      }
             })
            //end section to update the info to con_lead_table






             //uility function
             function calculate_emi(Ln_amount, Roi, Tennure)
                {
                    var r = Number(Roi) / 12 / 100;
                    var n = Tennure;
                    var p = Ln_amount;
                    var TotalEmi = Math.round(p * r * Math.pow((1 + r), n) / (Math.pow((1 + r), n) -
                        1));
                    return TotalEmi;
                }


    });
</script>
@endsection
