@extends('layouts.master')


@section('content')

    <div class="container p-3">
        <h4>More Deatils Of enquiery</h4>
    </div>
    <!-- Main content -->
    <div class="content ">
        <div class="container mt-1 p-3">
            <div class="card bg-light d-flex flex-fill">
                <div class="card-header bg-purple text-white border-bottom-0">
                  Infomation Of Enquiery
                </div>
                <div class="card-body pt-0">
                    <div class="p-3 mb-3">
                        <!-- title row -->
                        <div class="row p-2">
                          <div class="col-12">
                            <h4>
                              <i class="fas fa-globe px-1"></i>Loanstories
                            </h4>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                          <div class="col-sm-4 invoice-col">
                            To
                            <address>
                              <strong>{{$user_enquiery->name}}</strong><br>
                              Location:{{$user_enquiery->current_loation}}<br>
                              Phone: {{$user_enquiery->cus_phonenumber}}<br>
                              Email: {{$user_enquiery->email}}
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            Additional Details
                            <address>
                              salary:{{$user_enquiery->take_home_salary}}<br>
                              Amount Required: {{$con_lead_info->con_lead_loan_amount_applied}}<br>
                              Bank Name: {{$con_lead_info->con_lead_bank_name}}
                            </address>
                          </div>
                          <!-- /.col -->
                          <div class="col-sm-4 invoice-col">
                            <b>Login Refno:{{$con_lead_info->con_lead_login_ref_no}}</b><br>
                            <br>
                            <b>Current status : </b><span class="badge bg-success">{{$user_enquiery->status_code}}</span><br>
                          </div>
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!-- Table row -->
                        <div class="row">
                          <div class="col-6 table-responsive">
                            <table class="table table-striped">
                              <thead>
                              <tr>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                <td>1</td>
                                <td>Business Location</td>
                                <td>{{$con_lead_info->con_lead_bussiness_name }}</td>

                              </tr>
                              <tr>
                                <td>2</td>
                                <td>LG Name</td>
                                <td>{{$con_lead_info->con_lead_lg_name}}</td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>LC Name</td>
                                <td>{{$con_lead_info->con_lead_lc_name}}</td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td>Sourcing Team Location</td>
                                <td>{{$con_lead_info->con_lead_source_team}}</td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td>Channel</td>
                                <td>{{$con_lead_info->con_lead_channel}}</td>
                              </tr>
                              <tr>
                                <td>5</td>
                                <td>Bank Name</td>
                                <td>{{$con_lead_info->con_lead_bank_name}}</td>
                              </tr>
                              <tr>
                                <td>6</td>
                                <td>Vendor Name</td>
                                <td>{{$con_lead_info->con_lead_vendor_name}}</td>
                              </tr>
                              </tbody>
                            </table>
                          </div>
                          <!-- /.col -->
                            @if ($user_enquiery->overall_status_of_customer==18)
                            <div class="col-6 table-responsive">
                                <table class="table table-striped">
                                <thead>
                                <tr>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <td>1</td>
                                    <td>Loan Amount Approved</td>
                                    <td>{{$con_lead_info->con_lead_loan_amount_aproved}}</td>
                                    </tr>
                                    <tr>
                                    <td>2</td>
                                    <td>ROI</td>
                                    <td>{{$con_lead_info->con_lead_roi}}</td>
                                    </tr>
                                    <tr>
                                    <td>3</td>
                                    <td>Tennure</td>
                                    <td>{{$con_lead_info->con_lead_tennure}}</td>
                                    </tr>
                                    <tr>
                                    <td>4</td>
                                    <td>Emi</td>
                                    <td>{{$con_lead_info->con_lead_emi}}</td>
                                    </tr>
                                    <tr>
                                    <td>5</td>
                                    <td>Insurance</td>
                                    <td>{{$con_lead_info->con_lead_insurance_status}}</td>
                                    </tr>
                                </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                            @endif
                        </div>
                        <!-- /.row -->

                        <div class="row">
                          <!-- accepted payments column -->
                          <div class="col-6">
                            <p class="lead">Remarks of Last Update:</p>
                            <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                              {{$con_lead_info->con_lead_remarks}}
                            </p>
                          </div>
                          <!-- /.col -->
                          @if ($user_enquiery->overall_status_of_customer==19)
                          <div class="col-6">
                            <p class="lead">Processing Charges</p>
                            <div class="table-responsive">
                              <table class="table">
                                <tbody><tr>
                                  <th style="width:50%">PF Gst :</th>
                                  <td>{{$con_lead_info->con_lead_pf_gst }}</td>
                                </tr>
                                <tr>
                                  <th>Stamp Duty:</th>
                                  <td>{{$con_lead_info->con_lead_stamp_duty}}</td>
                                </tr>
                                <tr>
                                  <th>Gap Interest Emi:</th>
                                  <td>{{$con_lead_info->con_lead_gap_inter_emi}}</td>
                                </tr>
                                <tr>
                                  <th>Insurance Premium:</th>
                                  <td>{{$con_lead_info->con_lead_insurance_premium}}</td>
                                </tr>
                                <tr>
                                    <th>Others:</th>
                                    <td>{{$con_lead_info->con_lead_other_charges}}</td>
                                </tr>
                              </tbody>
                            </table>
                            </div>
                          </div>
                          @endif
                          <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        {{-- <div class="row no-print">
                          <div class="col-12">
                            <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                            <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                              Payment
                            </button>
                            <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                              <i class="fas fa-download"></i> Generate PDF
                            </button>
                          </div>
                        </div> --}}
                      </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="{{route('OverAllCusEnquiery.show',$con_lead_info->con_lead_of_cus) }}" class="btn btn-sm btn-primary">
                       Back
                    </a>
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
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>







<script>
    $(function() {

    })
</script>
