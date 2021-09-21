@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0">CONVERTED CASE INFO</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('AssignedToLeaderBreakDown.show',$con_feilds->con_lead_of_enquiery) }}">Back</a></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="row">
        <div class="col-12 col-sm-6 col-md-12">
            <div class="card card-purple card-tabs">
              <div class="card-header p-0 pt-1">
                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Converted Case Info</a>
                  </li>
                  @if($con_feilds->con_lead_status==18)
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-more" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Disbrused Info</a>
                  </li>
                  @endif
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-one-tabContent">
                  <div class="tab-pane active fade show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">

                        </div>
                        <div class="card-body pt-2">
                          <div class="row">
                            <div class="col-7">
                              <h1 class="lead"><b>Converted Case Info</b></h1>
                              <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                <li class="p-2"><span class="fa-li"></span> Bussiness Name : {{$con_feilds->con_lead_bussiness_name}}</li>
                                <li class="p-2"><span class="fa-li"></span> LG Name : {{$con_feilds->con_lead_lg_name}}</li>
                                <li class="p-2"><span class="fa-li"></span> LC Name : {{$con_feilds->con_lead_lc_name}}</li>
                                <li class="p-2"><span class="fa-li"></span> Source Team : {{$con_feilds->con_lead_source_team}}</li>
                              </ul>
                            </div>
                            <div class="col-5 text-center">
                              <img src="https://image.freepik.com/free-vector/modern-people-avatar-casual-clothes-vector-cartoon-illustration-man-with-individual-face-hair-light-digital-frame-dark-blue-computer-picture-web-profile_107791-4258.jpg" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col col-md-6">
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                    <li class="p-2"><span class="fa-li"></span> Lead Channel : {{$con_feilds->con_lead_channel}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Bank Name : {{$con_feilds->con_lead_bank_name}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Vendor Name : {{$con_feilds->con_lead_vendor_name}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Loan Amount Applied : {{$con_feilds->con_lead_loan_amount_applied}}</li>
                                </ul>
                              </div>
                              <div class="col col-md-6">

                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                    <li class="p-2"><span class="fa-li"></span> Product Name : {{$con_feilds->con_lead_product_name}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Product Type : {{$con_feilds->con_lead_sub_product_name}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Login No : {{$con_feilds->con_lead_login_ref_no}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Remarks : {{$con_feilds->con_lead_remarks}}</li>
                                </ul>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  @if($con_feilds->con_lead_status==18)
                    <div class="tab-pane" id="custom-tabs-one-more" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                        <div class="card bg-light d-flex flex-fill">
                            <div class="card-header text-muted border-bottom-0">
                            </div>
                            <div class="card-body pt-2">
                                <div class="row">
                                    <div class="col col-md-6">
                                        <h1 class="lead"><b>Loan Disbrused Info</b></h1>
                                        <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                            <li class="p-2"><span class="fa-li"></span> Loan Amount Approved : {{$con_feilds->con_lead_loan_amount_aproved }}</li>
                                            <li class="p-2"><span class="fa-li"></span> Roi : {{$con_feilds->con_lead_roi}}</li>
                                            <li class="p-2"><span class="fa-li"></span> Tenure : {{$con_feilds->con_lead_tennure}}</li>
                                            <li class="p-2"><span class="fa-li"></span> Emi : {{$con_feilds->con_lead_emi}}</li>
                                            <li class="p-2"><span class="fa-li"></span> Insurance : {{$con_feilds->con_lead_insurance_status}}</li>
                                        </ul>
                                    </div>
                                    <div class="col col-md-6">
                                        <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                            <li class="p-2"><span class="fa-li"></span> Processing Fee Gst : {{$con_feilds->con_lead_pf_gst}}</li>
                                            <li class="p-2"><span class="fa-li"></span> Stamp Duty : {{$con_feilds->con_lead_stamp_duty}}</li>
                                            <li class="p-2"><span class="fa-li"></span> Gap Interest Emi : {{$con_feilds->con_lead_gap_inter_emi }}</li>
                                            <li class="p-2"><span class="fa-li"></span> Insurance Premium : {{$con_feilds->con_lead_insurance_premium }}</li>
                                            <li class="p-2"><span class="fa-li"></span> Other Charges : {{$con_feilds->con_lead_other_charges  }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     </div>
                   @endif
                </div>
              <!-- /.card -->
            </div>
          </div>
    </div>
</div>
<!-- /.content -->
@endsection
@if(session('error'))
<script>
    alert('Currently Unavialable Try After SomeTime');
</script>
@endif
