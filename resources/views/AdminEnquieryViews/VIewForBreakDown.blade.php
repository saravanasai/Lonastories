@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0">VIEW BREAKDOWN</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('DirectLeadsAfterAssignMoreinfo.index') }}">Back</a></li>
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
                    <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="false">Basic Info</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="true">Obligation BeakUp</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Card BreakUp</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-el" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Eligibility</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Final Offer</a>
                  </li>
                  @if($data['enquiery_details']->loan_product_id==2 ||$data['enquiery_details']->loan_product_id==4)
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-ln-ad" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">HL More Info</a>
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
                              <h1 class="lead"><b>{{$data['basic_info']->name}}</b></h1>
                              <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                <li class="p-2"><span class="fa-li"><i class="fas fa-lg fa-calendar-week"></i></span> DOB : {{$data['basic_info']->dob}}</li>
                                <li class="p-2"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email :{{$data['basic_info']->email}}</li>
                                <li class="p-2"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{$data['basic_info']->cus_phonenumber}}</li>
                                <li class="p-2"><span class="fa-li"></span> <span class="badge bg-success">{{$data['enquiery_details']->status_code}}</span> </li>
                              </ul>
                              @if($data['enquiery_details']->profile_accepted_status==1 && $data['enquiery_details']->documents_collected_status==1)
                              <div class="d-flex">
                                <a href="{{asset('enquieryDoc/'.$data['enquiery_details']->enq_doc_name)}}" download="Enquiery Document" class="btn btn-sm btn-primary px-1 mx-2">
                                    <i class="fas fa-download px-1"></i>ENQUIERY DOCUMENTS
                                  </a>
                                <a href="{{route('AssignedToLeaderBreakDown.edit',$data['enq_id'])}}" class="btn btn-success px-1"><i class="fas fa-paper-plane px-1"></i> Details</a>
                              </div>
                              @else
                              <a href="#" class="btn btn-danger disabled">Waiting For Accept And File To Upload</a>
                              @endif
                            </div>
                            <div class="col-5 text-center">
                              <img src="https://image.freepik.com/free-vector/modern-people-avatar-casual-clothes-vector-cartoon-illustration-man-with-individual-face-hair-light-digital-frame-dark-blue-computer-picture-web-profile_107791-4258.jpg" alt="user-avatar" class="img-circle img-fluid">
                            </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col col-md-4">
                                <h1 class="lead"><b>Product Info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                  <li class="p-2"><span class="fa-li"></span> Product Name : {{$data['enquiery_details']->productname}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Product Type : {{$data['enquiery_details']->subproductname}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Net Salary : {{$data['enquiery_details']->take_home_salary}}</li>
                                </ul>
                              </div>
                              <div class="col col-md-4">
                                <h1 class="lead"><b>Personal Info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                  <li class="p-2"><span class="fa-li"></span> Current Location : {{$data['enquiery_details']->current_loation}}</li>
                                  <li class="p-2"><span class="fa-li"></span> salary Account Bank : {{$data['enquiery_details']->sa_ac_bank_id}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Company Name : {{$data['enquiery_details']->companyname}}</li>
                                </ul>
                              </div>
                              <div class="col col-md-4">
                                <h1 class="lead"><b>Additional Info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                  <li class="p-2"><span class="fa-li"></span> Total Obligation : {{$data['enquiery_details']->total_obligation}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Loan Amount Required : {{$data['enquiery_details']->loan_amount_required }}</li>
                                  <li class="p-2"><span class="fa-li"></span> Final Obligation : {{$data['enquiery_details']->final_obligation }}</li>
                                </ul>
                              </div>
                          </div>
                        </div>
                        <div class="card-footer ">
                          <div class="text-right">
                            <a href="{{asset('storage/pdf/'.$data['pdf']->pdf_name.'.pdf')}}" download="LoanStoriesOffer" class="btn btn-sm btn-primary px-1">
                                <i class="fas fa-download px-1"></i>OFFER PDF
                              </a>
                          </div>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade " id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 10px">S.no</th>
                                <th>Loan Type</th>
                                <th>Bank Name</th>
                                <th>Loan Amount</th>
                                <th>Roi</th>
                                <th>Tenure</th>
                                <th>Emi</th>
                                <th>Pos</th>
                                <th>BT Yes/Nos</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['ob_details'] as $obligation )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$obligation->ob_Loan_type}}</td>
                                    <td>{{$obligation->ob_Bank_name}}</td>
                                    <td>{{$obligation->ob_Loan_amount}}</td>
                                    <td>{{$obligation->ob_roi}}</td>
                                    <td>{{$obligation->ob_tennure}}</td>
                                    <td>{{$obligation->ob_emi}}</td>
                                    <td>{{$obligation->ob_pos}}</td>
                                    <td>
                                        @if($obligation->ob_bt==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>

                                  </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-messages" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 10px">S.no</th>
                                <th>Bank Name</th>
                                <th>Card Limit</th>
                                <th>Card OutStanding</th>
                                <th>Emi</th>
                                <th>BT Yes/Nos</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['cr_details'] as $obligation )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$obligation->cr_Bank_name}}</td>
                                    <td>{{$obligation->cr_card_limit }}</td>
                                    <td>{{$obligation->cr_card_outstanding}}</td>
                                    <td>{{$obligation->cr_emi}}</td>
                                    <td>
                                        @if($obligation->cr_bts==1)
                                            Yes
                                        @else
                                            No
                                        @endif
                                    </td>

                                  </tr>
                                @endforeach

                            </tbody>
                          </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-el" role="tabpanel" aria-labelledby="custom-tabs-one-messages-tab">
                    <div class="container">
                        <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th style="width: 10px">S.no</th>
                                <th>Bank Name</th>
                                <th>Employee Catgory</th>
                                <th>Multiplier</th>
                                <th>Foir</th>
                                <th>Multiplier Eligibility</th>
                                <th>Roi</th>
                                <th>Emi Per/lak</th>
                                <th>Foir Eligibility</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($data['el_details'] as $obligation )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$obligation->el_Bank_name}}</td>
                                    <td>{{$obligation->el_employee_category }}</td>
                                    <td>{{$obligation->el_multiplier}}</td>
                                    <td>{{$obligation->el_foir}}</td>
                                    <td>{{$obligation->el_mutiplier_eligibility}}</td>
                                    <td>{{$obligation->el_roi}}</td>
                                    <td>{{$obligation->el_emi_per_lak }}</td>
                                    <td>{{$obligation->el_foir_eligibility}}</td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-one-settings" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                        </div>
                        <div class="card-body pt-2">
                          <div class="row mt-3">
                              <div class="col col-md-4">
                                <h1 class="lead"><b>Loan Info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                  <li class="p-2"><span class="fa-li"></span> Loan Amount : {{$data['fn_details']->final_loan_amount}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Roi : {{$data['fn_details']->final_rate_of_interest}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Tenure : {{$data['fn_details']->final_tennure}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Emi : {{$data['fn_details']->final_emi}}</li>
                                </ul>
                              </div>
                              <div class="col col-md-4">
                                <h1 class="lead"><b>Final Info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                  <li class="p-2"><span class="fa-li"></span> Total Emi : {{$data['fn_details']->final_proposed_total_emi}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Current Foir : {{$data['fn_details']->final_current_foir}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Proposed Foir : {{$data['fn_details']->final_proposed_foir}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Income Considered : {{$data['fn_details']->final_salary_considered}}</li>
                                </ul>
                              </div>
                              <div class="col col-md-4">
                                {{-- <h1 class="lead"><b>Additional Info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                  <li class="p-2"><span class="fa-li"></span> Total Obligation : {{$data['enquiery_details']->total_obligation}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Loan Amount Required : {{$data['enquiery_details']->loan_amount_required }}</li>
                                  <li class="p-2"><span class="fa-li"></span> Final Obligation : {{$data['enquiery_details']->final_obligation }}</li>
                                </ul> --}}
                              </div>
                          </div>
                        </div>
                        <div class="card-footer ">
                          <div class="text-right">
                            <a href="{{asset('storage/pdf/'.$data['pdf']->pdf_name.'.pdf')}}" download="LoanStoriesOffer" class="btn btn-sm btn-primary px-1">
                                <i class="fas fa-download px-1"></i>OFFER PDF
                              </a>
                          </div>
                        </div>
                      </div>
                  </div>
                  @if($data['enquiery_details']->loan_product_id==2 ||$data['enquiery_details']->loan_product_id==4)
                  <div class="tab-pane fade" id="custom-tabs-one-ln-ad" role="tabpanel" aria-labelledby="custom-tabs-one-settings-tab">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                        </div>
                        <div class="card-body pt-2">
                          <div class="row mt-3">
                              <div class="col col-md-4">
                                <h1 class="lead"><b>Additional info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                  <li class="p-2"><span class="fa-li"></span> Age : {{$data['additional_details']->final_loan_amount}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Property Type : {{$data['additional_details']->hl_property_type}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Builder Name : {{$data['additional_details']->hl_builder_name}}</li>
                                  <li class="p-2"><span class="fa-li"></span> Property Value : {{$data['additional_details']->hl_property_value}}</li>
                                </ul>
                              </div>
                              <div class="col col-md-4">
                                <h1 class="lead"><b>Final Info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                    <li class="p-2"><span class="fa-li"></span> Property Area : {{$data['additional_details']->hl_property_area}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Property City : {{$data['additional_details']->hl_property_city}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Gross Salary : {{$data['additional_details']->hl_gross_salary}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Net Salary : {{$data['additional_details']->hl_net_salary}}</li>
                                    <li class="p-2"><span class="fa-li"></span> Co-Joint : {{$data['additional_details']->hl_co_joint}}</li>
                                </ul>
                              </div>
                              <div class="col col-md-4">
                                <h1 class="lead"><b>LTV Info</b></h1>
                                <ul class="ml-4 mb-0 mt-4 fa-ul text-muted">
                                    <li class="p-2"><span class="fa-li"></span> LTV-1 : {{$data['additional_details']->hl_fn_ltv_1}}</li>
                                    <li class="p-2"><span class="fa-li"></span> LTV-2 : {{$data['additional_details']->hl_fn_ltv_2}}</li>
                                    <li class="p-2"><span class="fa-li"></span> LTV-3 : {{$data['additional_details']->hl_fn_ltv_3}}</li>
                                </ul>
                              </div>
                          </div>
                          <div class="row mt-3">
                              <div class="col col-md-6">
                                <table class="table table-bordered">
                                        <thead>
                                            <th>Sno</th>
                                            <th>Existing Loan</th>
                                            <th>Value</th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td>Loan Amount</td>
                                            <td>{{$data['ln_comparison']->ex_ln_loan_amount}}</td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>Tenure</td>
                                            <td>{{$data['ln_comparison']->ex_ln_tennure}}</td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>Roi</td>
                                            <td>{{$data['ln_comparison']->ex_ln_roi}}</td>
                                        </tr>
                                        <tr>
                                            <td>4.</td>
                                            <td>Emi</td>
                                            <td>{{$data['ln_comparison']->ex_ln_emi }}</td>
                                        </tr>
                                        <tr>
                                            <td>5.</td>
                                            <td>Pos</td>
                                            <td>{{$data['ln_comparison']->ex_ln_pos }}</td>
                                        </tr>
                                        <tr>
                                            <td>6.</td>
                                            <td>Emi Paid</td>
                                            <td>{{$data['ln_comparison']->ex_ln_no_of_emi_paid }}</td>
                                        </tr>
                                        <tr>
                                            <td>7.</td>
                                            <td>Balance Emi</td>
                                            <td>{{$data['ln_comparison']->ex_ln_balance_emi}}</td>
                                        </tr>
                                        <tr>
                                            <td>8.</td>
                                            <td>Existing OutFlow</td>
                                            <td>{{$data['ln_comparison']->ex_ln_exsting_out_flow}}</td>
                                        </tr>
                                        </tbody>
                                </table>
                              </div>
                              <div class="col col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <th>Sno</th>
                                        <th>New Loan</th>
                                        <th>Value</th>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1.</td>
                                        <td>Loan Amount</td>
                                        <td>{{$data['ln_comparison']->ln_com_new_loan_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Tenure</td>
                                        <td>{{$data['ln_comparison']->ln_com_new_tennure}}</td>

                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Roi</td>
                                        <td>{{$data['ln_comparison']->ln_com_new_roi}}</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Emi</td>
                                        <td>{{$data['ln_comparison']->ln_com_new_emi}}</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Proposed Outflow</td>
                                        <td>{{$data['ln_comparison']->ln_com_new_proposed_outflow}}</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Net Savings</td>
                                        <td>{{$data['ln_comparison']->ln_com_new_gross_sav}}</td>
                                    </tr>
                                    </tbody>
                            </table>
                              </div>
                          </div>
                          <div class="row mt-2">
                              <div class="col col-md-12 d-flex justify-content-center">
                                <p class="px-4">MOTD: <span>{{$data['ln_comparison']->ln_com_motd  }}</span></p>
                                <p class="px-4">Processing Fee: <span>{{$data['ln_comparison']->ln_com_pro_fee  }}</span></p>
                                <p class="px-4">Other Charges: <span>{{$data['ln_comparison']->ln_com_ot_charges  }}</span></p>
                                <p class="px-4">Total Cost: <span>{{$data['ln_comparison']->ln_com_total_cost  }}</span></p>
                                <p class="px-4">Total Savings: <span>{{$data['ln_comparison']->ln_com_net_sav  }}</span></p>
                              </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  @endif
                </div>
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
