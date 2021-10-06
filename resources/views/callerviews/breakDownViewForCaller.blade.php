@extends('layouts.callermaster')
<style>
    .scroll {
    max-height: 550px;
    overflow-y: auto;
}
</style>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h5 class="m-0">BREAK DOWN VIEW FOR ADMIN</h6>
                        <input type="hidden" name="" id="cus_id" value="{{ $cus_info->cus_id }}">
                        <input type="hidden" name="" id="enq_id" value="{{ $cus_info->enq_id }}">
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if (session('admin'))
                            <li class="breadcrumb-item"><a href="{{ route('breakDown.index') }}">Back</a></li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="col-md-12">
            {{-- <div class="card card-purple"> --}}
            <div class="card-body p-0">
                <div class="bs-stepper linear">
                    <div class="bs-stepper-header" role="tablist">
                        <!-- your steps here -->
                        <div class="step active" data-target="#Customer_verification">
                            <button type="button" class="step-trigger" role="tab" aria-controls="logins-part"
                                id="logins-part-trigger" aria-selected="true">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Basic Info</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#Break_down_obligation">
                            <button type="button" class="step-trigger" role="tab" aria-controls="information-part"
                                id="information-part-trigger" aria-selected="false" disabled="disabled">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Emi Obligations</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        <div class="step" data-target="#credit_card_break_down">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step3"
                                id="logins-part-trigger" aria-selected="true">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Credit Card Obligations</span>
                            </button>
                        </div>
                        <div class="line"></div>
                        @if ($cus_info->loan_product_id == 2 || $cus_info->loan_product_id == 4)
                            <div class="step" data-target="#Loan_Additional">
                                <button type="button" class="step-trigger" role="tab"
                                    id="logins-part-trigger">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Eligibity Calculation</span>
                                </button>
                            </div>
                        @else
                        <div class="step" data-target="#credit_card_break_down_eg">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step3"
                                id="logins-part-trigger" aria-selected="true">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">Eligibity Calculation</span>
                            </button>
                        </div>
                        @endif
                        @if ($cus_info->loan_product_id == 2 || $cus_info->loan_product_id == 4)
                            <div class="line"></div>
                            <div class="step" data-target="#Loan_comparison">
                                <button type="button" class="step-trigger" role="tab" aria-controls="step3"
                                    id="logins-part-trigger" aria-selected="true">
                                    <span class="bs-stepper-circle">4</span>
                                    <span class="bs-stepper-label">Loan Comparison</span>
                                </button>
                            </div>
                        @endif
                        <div class="line"></div>
                        <div class="step" data-target="#Final_eligibility">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step3"
                                id="logins-part-trigger" aria-selected="true">
                                <span class="bs-stepper-circle">5</span>
                                <span class="bs-stepper-label">Final</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content">
                        <!-- your steps content here -->
                        <div id="Customer_verification" class="content active dstepper-block" role="tabpanel"
                            aria-labelledby="logins-part-trigger">
                            <div class="col col-md-12">
                                <div class="card card-primary card-outline">
                                    <div class="card-body box-profile">
                                        {{-- <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="https://www.kindpng.com/picc/m/78-785827_user-profile-avatar-login-account-male-user-icon.png"
                                                alt="User profile picture">
                                        </div> --}}
                                        {{-- start innner div --}}
                                        <div class="row">
                                            <div class="col col-md-6">
                                                <h3 class="profile-username text-center">{{ $cus_info->name }}
                                                </h3>

                                                <p class="text-muted text-center">Name</p>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Mobile Number</b> <a
                                                            class="float-right">{{ $cus_info->cus_phonenumber }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Email Id</b> <a
                                                            class="float-right">{{ $cus_info->email }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Lead Owner</b> <a class="float-right">{{ $refferd_by }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Take Home Salary</b> <a class="float-right">{{ $cus_info->take_home_salary }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Total Obligation</b> <a class="float-right">{{ $cus_info->total_obligation }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>No Of Credit Card</b> <a class="float-right">{{ $cus_info->no_of_credit_card }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Card Outstanding </b> <a class="float-right">{{ $cus_info->no_of_credit_card_outstanding  }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Credit Card Obligation</b> <a class="float-right">{{ $cus_info->credit_card_obligation  }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col col-md-6">
                                                <h3 class="profile-username text-center">
                                                    {{ $cus_info->companyname }}</h3>

                                                <p class="text-muted text-center">Company Name</p>

                                                <ul class="list-group list-group-unbordered mb-3">
                                                    <li class="list-group-item">
                                                        <b>Location</b> <a
                                                            class="float-right">{{ $cus_info->current_loation }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Product</b> <a
                                                            class="float-right">{{ $cus_info->productname }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Product Type</b> <a
                                                            class="float-right">{{ $cus_info->subproductname }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Salary AC Bank Name</b> <a
                                                            class="float-right">{{ $cus_info->sa_ac_bank_id  }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Final Obliagtion</b> <a
                                                            class="float-right">{{ $cus_info->final_obligation  }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Existing Foir</b> <a
                                                            class="float-right">{{ $cus_info->existing_foir  }}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Loan Amount Required</b> <a
                                                            class="float-right">{{ $cus_info->loan_amount_required}}</a>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <b>Additinal Info</b> <a
                                                            class="float-right">{{ $cus_info->additional_details}}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row float-right px-2">
                                            <div class="float-right">
                                                <button class="btn btn-primary  next">Next<i
                                                    class="fas fa-forward px-1"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div id="Break_down_obligation" class="content" role="tabpanel"
                            aria-labelledby="information-part-trigger">
                            <div class="card">
                                <div class="scroll">
                                    <div class="alert alert-danger" id="ob_alert" role="alert"></div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col col-md-12">
                                                <table class="table table-striped">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>LOAN TYPE</th>
                                                            <th>BANK NAME</th>
                                                            <th>LOAN AMOUNT</th>
                                                            <th>ROI</th>
                                                            <th>TENURE</th>
                                                            <th>EMI</th>
                                                            <th>EMI CP</th>
                                                            <th>POS</th>
                                                            <th>BT</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="inserted_ob">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="ob_loan_type">LOAN TYPE</label>
                                                    <input type="text" class="form-control" id="ob_loan_type"
                                                        placeholder="LOAN TYPE">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="ob_bank_name">BANK NAME</label>
                                                    <input type="text" class="form-control" id="ob_bank_name"
                                                        placeholder="BANK NAME">
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="ob_loan_amount">LOAN AMOUNT</label>
                                                    <input type="number" class="form-control" id="ob_loan_amount"
                                                        placeholder="LOAN AMOUNT">
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="ob_roi">ROI</label>
                                                    <input type="number" class="form-control" id="ob_roi" placeholder="ROI">
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="ob_original_emi">EMI-AS/CLIENT</label>
                                                    <input type="number" class="form-control" id="ob_original_emi" placeholder="EMI-AS/CLIENT">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="ob_tennure">TENURE</label>
                                                    <input type="number" class="form-control" id="ob_tennure"
                                                        placeholder="TENURE IN MONTHS">
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="ob_emi">EMI</label>
                                                    <input type="number" class="form-control" id="ob_emi" placeholder="EMI"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="ob_comp_emi">EMI CP</label>
                                                    <input type="number" class="form-control" id="ob_comp_emi" placeholder="EMI COMPLETED">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="ob_pos">POS</label>
                                                    <input type="number" class="form-control" id="ob_pos" placeholder="POS"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label>BT</label>
                                                    <select class="form-control" id="ob_bt" disabled>
                                                        <option selected value="0">NO</option>
                                                        <option value="1">YES</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="ob_sum_of_emi_bt_yes">OBLIGATIONS NOT APPLICABLE</label>
                                                    <input type="number" class="form-control" id="ob_sum_of_emi_bt_yes"
                                                        placeholder="OBLIGATIONS NOT APPLICABLE" disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="ob_sum_of_emi_bt_no">OBLIGATIONS APPLICABLE</label>
                                                    <input type="number" class="form-control" id="ob_sum_of_emi_bt_no"
                                                        placeholder="OBLIGATIONS APPLICABLE" disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="ob_sum_of_pos_bt_yes">BT POS-TOTAL</label>
                                                    <input type="number" class="form-control" id="ob_sum_of_pos_bt_yes"
                                                        placeholder="BT POS-TOTAL" disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="ob_sum_of_pos_bt_no">OTHER POS-TOTAL</label>
                                                    <input type="number" class="form-control" id="ob_sum_of_pos_bt_no"
                                                        placeholder="OTHER POS-TOTAL" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="float-right mb-2">
                                            <button type="button" class="btn btn-primary previous"><i
                                                    class="fas fa-backward px-2"></i>Previous</button>
                                            <button type="button" class="btn btn-danger calculate"><i
                                                    class="fas fa-calculator px-1"></i>Calcualte</button>
                                            <button type="button" class="btn btn-success add"><i
                                                    class="fas fa-paper-plane px-1"></i>Add</button>
                                            <button type="button" class="btn btn-primary next">Next<i
                                                    class="fas fa-forward px-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="credit_card_break_down" class="content" role="tabpanel" aria-labelledby="step3">
                            <div class="card">
                                <div class="scroll">
                                    <div class="alert alert-danger" id="cr_alert" role="alert"></div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col col-md-12">
                                                <table class="table table-striped">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>BANK NAME</th>
                                                            <th>CARD LIMIT</th>
                                                            <th>CARD O/S</th>
                                                            <th>EMI</th>
                                                            <th>BT</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="inserted_cr">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="cr_bank_name">BANK NAME</label>
                                                    <input type="text" class="form-control" id="cr_bank_name"
                                                        placeholder="BANK NAME">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="cr_limit">CARD LIMIT</label>
                                                    <input type="number" class="form-control" id="cr_limit"
                                                        placeholder="CARD LIMIT">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="cr_card_outstanding">CARD OUTSTANDING</label>
                                                    <input type="number" class="form-control" id="cr_card_outstanding"
                                                        placeholder="CARD OUTSTANDING">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="cr_emi">CC OBLIGATION</label>
                                                    <input type="number" class="form-control" id="cr_emi" placeholder="EMI"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label>BT</label>
                                                    <select class="form-control" id="cr_bt" disabled>
                                                        <option selected value="0">NO</option>
                                                        <option value="1">YES</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="cr_emi_bt_yes">OBLIGATIONS NOT APPLICABLE</label>
                                                    <input type="number" class="form-control" id="cr_emi_bt_yes"
                                                        placeholder="OBLIGATIONS NOT APPLICABLE" disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="cr_emi_bt_no">OBLIGATIONS APPLICABLE</label>
                                                    <input type="number" class="form-control" id="cr_emi_bt_no"
                                                        placeholder="OBLIGATIONS APPLICABLE" disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="cr_tb_final_obligation">TOTAL OBLIGATIONS</label>
                                                    <input type="number" class="form-control" id="cr_tb_final_obligation"
                                                        placeholder="TOTAL OBLIGATIONS" disabled>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="float-right mb-2">
                                            <button type="button" class="btn btn-primary previous"><i
                                                    class="fas fa-backward px-2"></i>Previous</button>
                                            <button type="button" class="btn btn-danger cr_calculate"><i
                                                    class="fas fa-calculator px-1"></i>Calculate</button>
                                            <button type="button" class="btn btn-success cr_add"><i
                                                    class="fas fa-paper-plane px-1"></i>Add</button>
                                            <button type="button" class="btn btn-primary next">Next<i
                                                    class="fas fa-forward px-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if ($cus_info->loan_product_id == 2 || $cus_info->loan_product_id == 4)
                        <div id="Loan_Additional" class="content" role="tabpanel"
                            aria-labelledby="logins-part-trigger">
                            <div class="card">
                                <div class="scroll">
                                    <div class="alert alert-danger" id="el_alert" role="alert"></div>
                                    <div id="additional_info_home_loan_div1">
                                        <div class="col col-md-12">
                                            <div class="" id="">
                                                    <div class="container mt-2">
                                                        <div id="pl_section">
                                                            {{-- section if product is Home Loan --}}
                                                            <h5 class="py-2"><strong>ADDITIONAL FEILDS FOR HOME LOAN</strong>
                                                            </h5>
                                                            <div id="hl_alert" class="text-danger"></div>
                                                            <div class="row">
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hl_age">AGE</label>
                                                                        <input type="number" class="form-control" id="hl_age"
                                                                            placeholder="AGE">
                                                                    </div>
                                                                </div>
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label>PROPERTY TYPE</label>
                                                                        <select class="form-control" id="hl_property_type">
                                                                            <option selected value="0">CHOOSE THE PROPERTY TYPE</option>
                                                                            <option value="BUILDER APARTMENT [NEW]">BUILDER APARTMENT [NEW]</option>
                                                                            <option value="BUILDER APARTMENT [RESALE]">BUILDER APARTMENT [RESALE]</option>
                                                                            <option value="VILLA">VILLA</option>
                                                                            <option value="STAND ALONE RESI BUILDING">STAND ALONE RESI BUILDING</option>
                                                                            <option value="RESIDENT SALE PLOT">RESIDENT SALE PLOT
                                                                            </option>
                                                                            <option value="COMMERCIAL BUILDING">COMMERCIAL BUILDING
                                                                            </option>
                                                                            <option value="OTHERS">OTHERS</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hl_builder_name">BUILDER NAME</label>
                                                                        <input type="text" class="form-control" id="hl_builder_name"
                                                                            placeholder="BUILDER NAME">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hl_property_value">PROPERTY VALUE</label>
                                                                        <input type="number" class="form-control"
                                                                            id="hl_property_value" placeholder="PROPERTY VALUE">
                                                                    </div>
                                                                </div>
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hl_property_area">PROPERTY AREA</label>
                                                                        <input type="text" class="form-control" id="hl_property_area"
                                                                            placeholder="PROPERTY AREA">
                                                                    </div>
                                                                </div>
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hl_property_city">PROPERTY CITY</label>
                                                                        <input type="text" class="form-control" id="hl_property_city"
                                                                            placeholder="PROPERTY CITY">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hl_gross_salary">GROSS SALARY</label>
                                                                        <input type="number" class="form-control"
                                                                            id="hl_gross_salary" placeholder="GROSS SALARY">
                                                                    </div>
                                                                </div>
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hl_net_salary">NET SALARY</label>
                                                                        <input type="number" class="form-control" id="hl_net_salary"
                                                                            placeholder="NET SALARY">
                                                                    </div>
                                                                </div>
                                                                <div class="col col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="hl_co_joint">CO-APPLICANT</label>
                                                                        <input type="text" class="form-control" id="hl_co_joint"
                                                                            placeholder="CO-APPLICANT">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row py-4">
                                                                <div class="col col-md-3 offset-md-9 text-center">
                                                                    <button class="btn btn-sm btn-success hl_profile_add"><i
                                                                            class="fas fa-paper-plane px-1"></i>ADD</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="additional_info_home_loan_div2">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col col-md-12">
                                                    <div class="alert alert-danger" id="hl_eg_alert" role="alert"></div>
                                                    <table class="table table-striped">
                                                        <thead class="thead-inverse">
                                                            <tr>
                                                                <th>BANK</th>
                                                                <th>LTV</th>
                                                                <th>LTV-EL</th>
                                                                <th>FOIR</th>
                                                                <th>FOIR ELG</th>
                                                                <th>ROI</th>
                                                                <th>TENURE</th>
                                                                <th>EMI / LAKH</th>
                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="inserted_hl_el">

                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container mt-3">
                                            <div class="row">
                                                <div class="col col-md-2">
                                                    <div class="form-group">
                                                        <label for="hl_sal_mon1">PROPERTY VALUE</label>
                                                        <input type="number" class="form-control" id="hl_el_property_value"
                                                            placeholder="PROPERTY VALUE" disabled>
                                                    </div>
                                                </div>
                                                <div class="col col-md-2">
                                                    <div class="form-group">
                                                        <label for="hl_el_gross_salary">GROSS SALARY</label>
                                                        <input type="number" class="form-control" id="hl_el_gross_salary"
                                                            placeholder="GROSS SALARY" disabled>
                                                    </div>
                                                </div>
                                                <div class="col col-md-2">
                                                    <div class="form-group">
                                                        <label for="hl_sal_mon1">MONTH 1</label>
                                                        <input type="number" class="form-control" id="hl_sal_mon1"
                                                            placeholder="MONTH 1">
                                                        <span id="hl_sal_mon1_error" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="col col-md-2">
                                                    <div class="form-group">
                                                        <label for="hl_sal_mon2">MONTH 2</label>
                                                        <input type="number" class="form-control" id="hl_sal_mon2"
                                                            placeholder="MONTH 2">
                                                        <span id="hl_sal_mon2_error" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="col col-md-2">
                                                    <div class="form-group">
                                                        <label for="hl_sal_mon3">MONTH 3</label>
                                                        <input type="number" class="form-control" id="hl_sal_mon3"
                                                            placeholder="MONTH 3">
                                                        <span id="hl_sal_mon3_error" class="error invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="col col-md-2 mt-4">
                                                    <button type="button" id="hl_cal_salary_btn" class="btn py-2 btn-danger"><i
                                                        class="fas fa-calculator px-1"></i>Income</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container">
                                            <div class="row my-3">
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label for="hl_tb_income_consi">INCOME CONSIDERED</label>
                                                        <input type="number" class="form-control" id="hl_tb_income_consi"
                                                            placeholder="INCOME CONSIDERED" disabled>
                                                    </div>
                                                </div>
                                                <div class="col col-md-4">
                                                    <div class="form-group">
                                                        <label for="hl_final_obligation">TOTAL OBLIGATION</label>
                                                        <input type="number" class="form-control"
                                                            id="hl_final_obligation" placeholder="TOTAL OBLIGATION" disabled>
                                                    </div>
                                                </div>
                                                <div class="col col-md-2 mt-4">
                                                    <button type="button" id="hl_cal_edit_btn" class="btn py-2 btn-info" disabled> <i class="fas fa-user-edit px-1"></i>EDIT</button>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label for="hl_bank_name">BANK NAME</label>
                                                        <input type="text" class="form-control" id="hl_bank_name"
                                                            placeholder="BANK NAME">
                                                    </div>
                                                </div>
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label for="hl_ltv">LTV</label>
                                                        <input type="number" class="form-control" id="hl_ltv"
                                                            placeholder="LTV IN %">
                                                    </div>
                                                </div>
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label for="hl_ltv_eligibility">LTV ELIGIBILITY</label>
                                                        <input type="number" class="form-control" id="hl_ltv_eligibility"
                                                            placeholder="LTV ELIGIBILITY" disabled>
                                                    </div>
                                                </div>
                                                <div class="col col-md-2">
                                                    <div class="form-group">
                                                        <label for="hl_foir">FOIR</label>
                                                        <input type="number" class="form-control" id="hl_foir"
                                                            placeholder="FOIR">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label for="hl_roi">ROI</label>
                                                        <input type="number" class="form-control" id="hl_roi" placeholder="ROI">
                                                    </div>
                                                </div>
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label>TENURE</label>
                                                        <select class="form-control" id="hl_tenure">
                                                          <option value="5">5 years</option>
                                                          <option value="10">10 years</option>
                                                          <option value="15">15 years</option>
                                                          <option value="20">20 years</option>
                                                          <option value="25">25 years</option>
                                                          <option value="30">30 years</option>
                                                        </select>
                                                      </div>
                                                </div>
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label for="hl_emi_per_lak">EMI PER LAKH</label>
                                                        <input type="number" class="form-control" id="hl_emi_per_lak"
                                                            placeholder="EMI PER LAKH" disabled>
                                                    </div>
                                                </div>
                                                <div class="col col-md-3">
                                                    <div class="form-group">
                                                        <label for="hl_emi_foir_eligibility">FOIR ELIGIBILITY</label>
                                                        <input type="number" class="form-control" id="hl_emi_foir_eligibility"
                                                            placeholder="FOIR ELIGIBILITY" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="float-right mb-1 p-2">
                                                <button type="button" class="btn btn-primary previous"> <i
                                                        class="fas fa-backward px-2"></i>Previous</button>
                                                <button type="button" id="hl_el_cal_btn" class="btn btn-danger"><i
                                                        class="fas fa-calculator px-1"></i>Calculate</button>
                                                <button type="button" id="hl_el_edit_btn" class="btn btn-success" disabled><i
                                                        class="far fa-edit"></i>Edit</button>
                                                <button type="button" id="hl_el_add_btn" class="btn btn-success"><i class="fas fa-paper-plane px-1"></i>Add</button>
                                                <button type="button" class="btn btn-primary next">Next<i
                                                        class="fas fa-forward px-2"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div id="credit_card_break_down_eg" class="content" role="tabpanel" aria-labelledby="step3">
                            <div class="card">
                                <div class="scroll">
                                    <div class="alert alert-danger" id="el_alert" role="alert"></div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col col-md-12">
                                                <table class="table table-striped">
                                                    <thead class="thead-inverse">
                                                        <tr>
                                                            <th>BANK</th>
                                                            <th>CAT</th>
                                                            <th>MULTIPLIER</th>
                                                            <th>FOIR</th>
                                                            <th>M-ELG [NTH]</th>
                                                            <th>M-ELG [SAO]</th>
                                                            <th>ROI</th>
                                                            <th>EMI / LAKH</th>
                                                            <th>FOIR ELG</th>
                                                            <th>ACTION</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="inserted_el">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_sal_mon1">MONTH 1</label>
                                                    <input type="number" class="form-control" id="el_sal_mon1"
                                                        placeholder="MONTH 1">
                                                    <span id="el_sal_mon1_error" class="error invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_sal_mon2">MONTH 2</label>
                                                    <input type="number" class="form-control" id="el_sal_mon2"
                                                        placeholder="MONTH 2">
                                                    <span id="el_sal_mon2_error" class="error invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_sal_mon3">MONTH 3</label>
                                                    <input type="number" class="form-control" id="el_sal_mon3"
                                                        placeholder="MONTH 3">
                                                    <span id="el_sal_mon3_error" class="error invalid-feedback"></span>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="cr_tb_final_salary">INCOME CONSIDERED</label>
                                                    <input type="number" class="form-control" id="cr_tb_final_salary"
                                                        placeholder="INCOME CONSIDERED" disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_tb_Total_obligation">TOTAL OBLIGATION</label>
                                                    <input type="number" class="form-control" id="el_tb_Total_obligation"
                                                        placeholder="TOTAL OBLIGATION" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col col-md-4 offset-md-8">
                                                <div class="float-right">
                                                    <button type="button" id="el_cal_salary_btn" class="btn btn-danger"><i
                                                        class="fas fa-calculator px-1"></i>Income</button>
                                                <button type="button" id="el_cal_edit_btn" class="btn btn-success"><i
                                                        class="far fa-edit"></i>Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="el_bank_name">BANK NAME</label>
                                                    <input type="text" class="form-control" id="el_bank_name"
                                                        placeholder="BANK NAME">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="el_em_cat">EMPLOYER CATEGORY</label>
                                                    <input type="text" class="form-control" id="el_em_cat"
                                                        placeholder="EMPLOYER CATEGORY">
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_multiplier">MULTIPLIER</label>
                                                    <input type="number" class="form-control" id="el_multiplier"
                                                        placeholder="MULTIPLIER">
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_foir">FOIR</label>
                                                    <input type="number" class="form-control" id="el_foir"
                                                        placeholder="FOIR-%">
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_mul_eligibility_nth">M-ELG [NTH]</label>
                                                    <input type="number" class="form-control" id="el_mul_eligibility_nth"
                                                        placeholder="M-ELG [NTH]" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_mul_eligibility_sao">M-ELG [SAO]</label>
                                                    <input type="number" class="form-control" id="el_mul_eligibility_sao"
                                                        placeholder="M-ELG [SAO]" disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-2">
                                                <div class="form-group">
                                                    <label for="el_roi">ROI</label>
                                                    <input type="number" class="form-control" id="el_roi" placeholder="ROI">
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="el_emi_per_lak">EMI PER LAKH</label>
                                                    <input type="number" class="form-control" id="el_emi_per_lak"
                                                        placeholder="EMI PER LAKH" disabled>
                                                </div>
                                            </div>
                                            <div class="col col-md-3">
                                                <div class="form-group">
                                                    <label for="el_emi_foir_eligibility">FOIR ELIGIBILITY</label>
                                                    <input type="number" class="form-control" id="el_emi_foir_eligibility"
                                                        placeholder="FOIR ELIGIBILITY" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-md-4 offset-md-8">
                                                <div class="float-right mb-1">
                                                    {{-- <button type="button" class="btn btn-primary previous">Previous</button> --}}
                                                    <button type="button" class="btn btn-danger  el_calculate"><i
                                                            class="fas fa-calculator px-1"></i>Calcualte</button>
                                                    <button type="button" class="btn btn-success el_add"><i
                                                            class="fas fa-paper-plane px-1"></i>Add</button>
                                                    {{-- <button type="button" class="btn btn-primary next">Next</button> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="float-right mb-1 p-2">
                                            <button type="button" class="btn btn-primary previous"> <i
                                                    class="fas fa-backward px-2"></i>Previous</button>
                                            <button type="button" class="btn btn-primary next">Next<i
                                                    class="fas fa-forward px-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if ($cus_info->loan_product_id == 2 || $cus_info->loan_product_id == 4)
                            <div id="Loan_comparison" class="content" role="tabpanel" aria-labelledby="step3">
                                <div class="card">
                                    <div class="alert alert-danger" id="ln_com_alert" role="alert"></div>
                                    <div class="scroll">
                                        <div class="container">
                                            <div class="container">
                                                <h5 class="font-weight-bold py-3">EXSTISTING LOAN</h5>
                                                <div class="row">
                                                    <div class="col col-md-3">
                                                        <div class="form-group">
                                                            <label for="ln_loan_amount">LOAN AMOUNT</label>
                                                            <input type="number" class="form-control" id="ex_ln_loan_amount"
                                                                placeholder="LOAN AMOUNT">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-3">
                                                        <div class="form-group">
                                                            <label for="ln_tennure">TENURE</label>
                                                            <input type="number" class="form-control" id="ex_ln_tennure"
                                                                placeholder="TENURE">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-3">
                                                        <div class="form-group">
                                                            <label for="ex_ln_roi">ROI</label>
                                                            <input type="number" class="form-control" id="ex_ln_roi"
                                                                placeholder="ROI">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-3">
                                                        <div class="form-group">
                                                            <label for="ex_ln_emi">EMI</label>
                                                            <input type="number" class="form-control" id="ex_ln_emi"
                                                                placeholder="EMI" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- second row --}}
                                                <div class="row">
                                                    <div class="col col-md-3">
                                                        <div class="form-group">
                                                            <label for="ex_ln_pos">POS</label>
                                                            <input type="number" class="form-control" id="ex_ln_pos"
                                                                placeholder="POS">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-3">
                                                        <div class="form-group">
                                                            <label for="ex_ln_no_of_emi_paid">NO OF EMI PAID (Months)</label>
                                                            <input type="number" class="form-control" id="ex_ln_no_of_emi_paid"
                                                                placeholder="NO OF EMI PAID">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-3">
                                                        <div class="form-group">
                                                            <label for="ex_ln_balance_emi">BALANCE EMI (Months)</label>
                                                            <input type="number" class="form-control" id="ex_ln_balance_emi"
                                                                placeholder="BALANCE EMI" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-3">
                                                        <div class="form-group">
                                                            <label for="ex_ln_exsting_out_flow">EXISTING OUTFLOW</label>
                                                            <input type="number" class="form-control" id="ex_ln_exsting_out_flow"
                                                                placeholder="EXISTING OUTFLOW" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="float-right">
                                                    <button type="button" id="ex_ln_calculate" class="btn btn-sm btn-success"><i
                                                            class="fas fa-calculator px-1"></i>Calcualte</button>
                                                    <button type="button" id="ex_ln_edit" class="btn btn-sm btn-primary "><i
                                                            class="far fa-edit"></i>Edit</button>
                                                </div>
                                                <h5 class="font-weight-bold my-3">NEW LOAN</h5>
                                                <div class="row">
                                                    <div class="col col-md-4">
                                                        <div class="form-group">
                                                            <label for="ln_com_new_loan_amount">LOAN AMOUNT</label>
                                                            <input type="number" class="form-control" id="ln_com_new_loan_amount"
                                                                placeholder="LOAN AMOUNT" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-4">
                                                        <div class="form-group">
                                                            <label for="ln_com_new_roi">ROI</label>
                                                            <input type="number" class="form-control" id="ln_com_new_roi"
                                                                placeholder="ROI">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-4">
                                                        <div class="form-group">
                                                            <label for="ln_com_new_tennure">TENURE</label>
                                                            <input type="number" class="form-control" id="ln_com_new_tennure"
                                                                placeholder="TENURE" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- second row --}}
                                                <div class="row">
                                                    <div class="col col-md-4">
                                                        <div class="form-group">
                                                            <label for="ln_com_new_emi">NEW EMI</label>
                                                            <input type="number" class="form-control" id="ln_com_new_emi"
                                                                placeholder="NEW LOAN" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-4">
                                                        <div class="form-group">
                                                            <label for="ln_com_new_proposed_outflow">PROPOSED OUTFLOW</label>
                                                            <input type="number" class="form-control"
                                                                id="ln_com_new_proposed_outflow" placeholder="PROPOSED OUTFLOW"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-4">
                                                        <div class="form-group">
                                                            <label for="ln_com_new_gross_sav">GROSS SAVEINGS</label>
                                                            <input type="number" class="form-control" id="ln_com_new_gross_sav"
                                                                placeholder="GROSS SAVEINGS" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="float-right">
                                                    <button type="button" id="ex_new_ln_calculate" class="btn btn-sm btn-success"><i
                                                            class="fas fa-calculator px-1"></i>Calcualte</button>
                                                    <button type="button" id="ex_new_ln_edit" class="btn btn-sm btn-primary "><i
                                                            class="far fa-edit"></i>Edit</button>
                                                </div>
                                                <h5 class="font-weight-bold my-3">CHARGES</h5>
                                                <div class="row">
                                                    <div class="col col-md-2">
                                                        <div class="form-group">
                                                            <label for="ln_com_motd">MOTD</label>
                                                            <input type="number" class="form-control" id="ln_com_motd"
                                                                placeholder="MOTD">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-2">
                                                        <div class="form-group">
                                                            <label for="ln_com_pro_fee">PROCESSING FEES</label>
                                                            <input type="number" class="form-control" id="ln_com_pro_fee"
                                                                placeholder="PROCESSING FEES">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-4">
                                                        <div class="form-group">
                                                            <label for="ln_com_ot_charges">OTHER CHARGES-(If-Any)</label>
                                                            <input type="number" class="form-control" id="ln_com_ot_charges"
                                                                placeholder="OTHER CHARGES" value="0">
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-2">
                                                        <div class="form-group">
                                                            <label for="ln_com_total_cost">TOTAL COST</label>
                                                            <input type="number" class="form-control" id="ln_com_total_cost"
                                                                placeholder="TOTAL COST" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col col-md-2">
                                                        <div class="form-group">
                                                            <label for="ln_com_net_sav">NET SAVINGS</label>
                                                            <input type="number" class="form-control" id="ln_com_net_sav"
                                                                placeholder="NET SAVINGS" disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col col-md-6 offset-md-6 float-right">
                                                    <button type="button" class="btn btn-primary previous"><i
                                                            class="fas fa-backward px-2"></i>Previous</button>
                                                    <button type="button" id="ln_com_final_cal" class="btn btn-danger"><i
                                                            class="fas fa-calculator px-1"></i>Calcualte</button>
                                                    <button type="button" id="ln_com_final_edit" class="btn btn-danger"><i
                                                            class="far fa-edit"></i>Edit</button>
                                                    <button type="button" id="ln_com_final_add" class="btn btn-success"><i
                                                            class="fas fa-paper-plane px-1"></i>Add</button>
                                                    <button type="button" class="btn btn-primary next">Next <i
                                                            class="fas fa-forward px-2"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div id="Final_eligibility" class="content" role="tabpanel" aria-labelledby="step3">
                            <div class="callout callout-success">
                                <h5><i class="fas fa-info px-2"></i>FINAL OFFER</h5>
                                <div class="text-danger" id="final_alert"></div>
                                <div class="row">
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="Final_page_obl_con">EXISTING OBLIGATIONS CONSIDERED</label>
                                            <input type="text" class="form-control" id="Final_page_obl_con"
                                                placeholder="EXISTING OBLIGATIONS CONSIDERED" value="0" disabled>
                                        </div>
                                    </div>
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="Final_page_sal_con">INCOME CONSIDERED</label>
                                            <input type="text" class="form-control" id="Final_page_sal_con"
                                                placeholder="INCOME CONSIDERED" disabled>
                                        </div>
                                    </div>
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="final_proposed_total_emi">PROPOSED TOTAL EMI</label>
                                            <input type="text" class="form-control" id="final_proposed_total_emi"
                                                placeholder="PROPOSED TOTAL EMI" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="Final_Loan_amount">LOAN AMOUNT</label>
                                            <input type="number" class="form-control" id="Final_Loan_amount"
                                                placeholder="LOAN AMOUNT">
                                        </div>

                                    </div>
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="final_roi">RATE OF INTEREST</label>
                                            <input type="number" class="form-control" id="final_roi"
                                                placeholder="RATE OF INTEREST">
                                        </div>
                                    </div>
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="final_tenure">TENURE</label>
                                            <input type="number" class="form-control" id="final_tenure"
                                                placeholder="TENURE">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="final_emi">EMI</label>
                                            <input type="text" class="form-control" id="final_emi" placeholder="EMI"
                                                disabled>
                                        </div>
                                    </div>

                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="final_current_foir">CURRENT FOIR</label>
                                            <input type="email" class="form-control" id="final_current_foir"
                                                placeholder="CURRENT FOIR" disabled>
                                        </div>
                                    </div>
                                    <div class="col col-md-4">
                                        <div class="form-group">
                                            <label for="final_proposed_foir">PROPOSED FOIR</label>
                                            <input type="text" class="form-control" id="final_proposed_foir"
                                                placeholder="PROPOSED FOIR" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="form-group">
                                            <label>Remarks</label>
                                            <textarea class="form-control" id="Final_page_remarks" rows="3" placeholder="Enter ..."></textarea>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-12">
                                        <div class="mt-5" id="loading">
                                           <img src="{{asset('img/loader.gif')}}" alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <div class="float-right mb-1 mt-1">
                                    <button type="button" class="btn btn-primary previous"><i class="fas fa-backward px-2"></i>Previous</button>
                                    <button type="button" class="btn btn-success" id="final_calculate"><i class="fas fa-calculator px-1"></i>Calculate</button>
                                    <button type="button" class="btn btn-info" id="final_edit"><i class="far fa-edit"></i>EDIT</button>
                                    <button type="button" class="btn btn-primary" id="final_submit"><i class="fas fa-paper-plane px-1"></i>Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- </div> --}}
        </div>
        <!-- /.content -->
    </div>
@endsection
@section('js')
<script>
    $(function() {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        //hide on load feild
            $('#ob_alert').hide();
            $('#cr_alert').hide();
            $('#el_alert').hide();
            $('#final_alert').hide();
            $('#final_edit').hide();
            $('#hl_alert').hide();
            $('#hl_eg_alert').hide();
            $('#ln_com_alert').hide();
            $('.hl_profile_edit').hide();
            $('#ln_com_final_edit').hide();
            $('#hl_el_add_btn').hide();
            $('.add').prop('disabled', true);
            $('.cr_add').prop('disabled', true);
            $('.el_add').prop('disabled', true);
            $('#final_submit').prop('disabled', true);
            $('#hl_profile_add').prop('disabled', true);
            $('#hl_next').prop('disabled', false); //change to true after devlepoment
            $('.hl_profile_add').prop('disabled', false);
            $('#ex_ln_edit').prop('disabled', true);
            $('#ln_com_final_add').prop('disabled', true);
            $('#ln_com_final_cal').prop('disabled', true);
            $('#el_cal_edit_btn').prop('disabled', true);
            $("#loading").hide();
            $('#additional_info_home_loan_div2').hide(); //chage to hide after developement
        //end on load feild

        //initialization for stepper
            var stepper = new Stepper($('.bs-stepper')[0]);
            //section to handle the next  step
            $('body').on('click', '.next', function() {
                stepper.next();
            });
            //section to handle the previous step
            $('body').on('click', '.previous', function() {
                stepper.previous();
            });
        //END INITIALIZATION FOR STEPPER


    // !================================ALL LOAN OBLIGATION ADD SECTION ===========!


        //PERONAL LOAN EMI OBLIGATION ADD TO DATABASE SECTION
        $('body').on('click', '.add', function(e) {
            e.preventDefault();
            $('#ob_alert').hide();

            let loan_type = $("#ob_loan_type").val();
            let bank_name = $("#ob_bank_name").val();
            let loan_amount = $("#ob_loan_amount").val();
            let roi = $("#ob_roi").val();
            let tennure = $("#ob_tennure").val();
            let original_emi = $("#ob_original_emi").val();
            let emi = $("#ob_emi").val();
            let ob_comp_emi = $("#ob_comp_emi").val();
            let pos = $("#ob_pos").val();
            let bt = $("#ob_bt").val();
            let cus_id = $('#cus_id').val();
            let enq_id = $('#enq_id').val();
            if (check_null(pos) || check_null(ob_comp_emi)) {
                $('#ob_alert').show();
                $('#ob_alert').html("FILL POS FEILD && EMI COMPLETED");
            } else {
                if (check_numeric(pos) || check_numeric(ob_comp_emi)) {
                    $('#ob_alert').show();
                    $('#ob_alert').html("POS & EMI COMPLETED FEILD SHOULD BE NUMBER");
                } else {
                    $.ajax({

                        type: 'POST',

                        url: "{{ route('assignedleads.store') }}",

                        data: {
                            _token: "{{ csrf_token() }}",
                            loanType: loan_type,
                            bankName: bank_name,
                            loanAmount: loan_amount,
                            rateOfInterest: roi,
                            tennure: tennure,
                            emi: original_emi,
                            ob_comp_emi:ob_comp_emi,
                            pos: pos,
                            bt: bt,
                            cusid: cus_id,
                            enqid: enq_id,
                            table: 1
                        },

                        success: function(data) {


                            let response = JSON.parse(data);
                            let sum_of_pos_bt_yes = 0;
                            let sum_of_pos_bt_no = 0;
                            let sum_of_emi_bt_yes = 0;
                            let sum_of_emi_bt_no = 0;
                            $('#inserted_ob').empty();
                            $.each(response, function(i, item) {


                                var bt_yes_no = "NO";
                                if (item.ob_bt == 1) {
                                    bt_yes_no = "YES";
                                }

                                //calcuation for bt-yes and bt-no
                                if (item.ob_bt == 1) {
                                    sum_of_pos_bt_yes = sum_of_pos_bt_yes + Number(
                                        item.ob_pos);
                                } else {
                                    sum_of_pos_bt_no = sum_of_pos_bt_no + Number(
                                        item.ob_pos);
                                }
                                //end calcuation for bt-yes and bt-no
                                //calcuation for emi bt-yes and bt-no
                                if (item.ob_bt == 1) {
                                    sum_of_emi_bt_yes = sum_of_emi_bt_yes + Number(
                                        item.ob_emi);
                                } else {
                                    sum_of_emi_bt_no = sum_of_emi_bt_no + Number(
                                        item.ob_emi);
                                }
                                //end calcuation for emi bt-yes and bt-no

                                var $tr = $('<tr>').append(
                                    $('<td>').text(item.ob_Loan_type),
                                    $('<td>').text(item.ob_Bank_name),
                                    $('<td>').text(item.ob_Loan_amount),
                                    $('<td>').text(item.ob_roi),
                                    $('<td>').text(item.ob_tennure),
                                    $('<td>').text(item.ob_emi),
                                    $('<td>').text(item.ob_comp_emi),
                                    $('<td>').text(item.ob_pos),
                                    $('<td>').text(bt_yes_no),
                                    $('<td>').html('<button type="button" id=' +
                                        item.id +
                                        ' class="btn btn-sm btn-danger delete"><i class="fas fa-trash-alt px-2"></i></button>'
                                    ),
                                );
                                $tr.appendTo('#inserted_ob');
                                $("#ob_sum_of_pos_bt_yes").val(sum_of_pos_bt_yes);
                                $("#ob_sum_of_pos_bt_no").val(sum_of_pos_bt_no);
                                $("#ob_sum_of_emi_bt_no").val(sum_of_emi_bt_no);
                                $("#ob_sum_of_emi_bt_yes").val(sum_of_emi_bt_yes);
                                $("#ob_bt").prop('disabled', true);
                                $("#ob_bt").prop('selectedIndex', 0);
                                $("#ob_pos").prop('disabled', true);
                                $("#ob_pos").val('');
                                $('.add').prop('disabled', true);
                                $('#ob_emi').val('');
                                $("#ob_loan_type").prop('disabled', false);
                                $("#ob_loan_type").val('');
                                $("#ob_bank_name").prop('disabled', false);
                                $("#ob_bank_name").val('');
                                $("#ob_loan_amount").prop('disabled', false);
                                $("#ob_loan_amount").val('');
                                $("#ob_roi").prop('disabled', false);
                                $("#ob_roi").val('');
                                $("#ob_tennure").prop('disabled', false);
                                $("#ob_tennure").val('');
                                $("#ob_original_emi").val('');
                                $("#ob_comp_emi").val('');

                            });

                        }

                    });
                }
            }

        });
        //END PERONAL LOAN EMI OBLIGATION ADD TO DATABASE SECTION

        // PERSONAL LOAN CREDIT CARD OBLIGATION ADD TO DATABASE SECTION
        $('body').on('click', '.cr_add', function(e) {
            e.preventDefault();

            let cr_bank_name = $("#cr_bank_name").val();
            let cr_limit = $("#cr_limit").val();
            let cr_card_outstanding = $("#cr_card_outstanding").val();
            let cr_emi = $("#cr_emi").val();
            let cr_bt = $("#cr_bt").val();
            let cus_id = $('#cus_id').val();
            let enq_id = $('#enq_id').val();
            if (check_numeric(cr_bt)) {
                $('#cr_alert').show();
                $('#cr_alert').html("BT FEILD SHOULD BE NUMBER");
            } else {
                $.ajax({

                    type: 'POST',

                    url: "{{ route('assignedleads.store') }}",

                    data: {
                        _token: "{{ csrf_token() }}",
                        crBankName: cr_bank_name,
                        cr_limit: cr_limit,
                        cr_card_outstanding: cr_card_outstanding,
                        cr_emi: cr_emi,
                        cr_bt: cr_bt,
                        cusid: cus_id,
                        enqid: enq_id,
                        table: 2
                    },

                    success: function(data) {


                        let response = JSON.parse(data);

                        let sum_of_emi_bt_yes_cr = 0;
                        let sum_of_emi_bt_no_cr = 0;
                        let final_obligation_cr = 0;

                        $('#inserted_cr').empty();
                        $.each(response, function(i, item) {

                            var bt_yes_no = "NO";
                            if (item.cr_bt == 1) {
                                bt_yes_no = "YES";
                            }
                            //calcuation for emi bt-yes and bt-no
                            if (item.cr_bt == 1) {
                                sum_of_emi_bt_yes_cr = sum_of_emi_bt_yes_cr +
                                    Number(item.cr_emi);
                            } else {
                                sum_of_emi_bt_no_cr = sum_of_emi_bt_no_cr + Number(
                                    item.cr_emi);
                            }
                            //end calcuation for emi bt-yes and bt-no

                            var $tr = $('<tr>').append(
                                $('<td>').text(item.cr_Bank_name),
                                $('<td>').text(item.cr_card_limit),
                                $('<td>').text(item.cr_card_outstanding),
                                $('<td>').text(item.cr_emi),
                                $('<td>').text(bt_yes_no),
                                $('<td>').html('<button type="button" id=' +
                                    item.id +
                                    ' class="btn btn-sm btn-danger cr_delete"><i class="fas fa-trash-alt px-2"></i></button>'
                                ),
                            );
                            $tr.appendTo('#inserted_cr');
                            $("#cr_bt").prop('disabled', true);
                            $("#cr_bt").prop('selectedIndex', 0);
                            $('.cr_add').prop('disabled', true);
                            $('#cr_emi').val('');
                            $("#cr_bank_name").prop('disabled', false);
                            $("#cr_bank_name").val('');
                            $("#cr_limit").prop('disabled', false);
                            $("#cr_limit").val('');
                            $("#cr_card_outstanding").prop('disabled', false);
                            $("#cr_card_outstanding").val('');
                        });
                        $("#cr_emi_bt_yes").val(sum_of_emi_bt_yes_cr);
                        $("#cr_emi_bt_no").val(sum_of_emi_bt_no_cr);
                        let final_cr_sum_of_emi_no = $("#cr_emi_bt_no").val();
                        let final_ob_sum_of_emi_no = $("#ob_sum_of_emi_bt_no").val();
                        let Total_obligation= $("#cr_tb_final_obligation").val(Math.round(Number(final_cr_sum_of_emi_no) +
                        Number(final_ob_sum_of_emi_no)));
                        $("#el_tb_Total_obligation").val(Math.round(Number(final_cr_sum_of_emi_no) +
                        Number(final_ob_sum_of_emi_no)));
                        $("#hl_final_obligation").val(Math.round(Number(final_cr_sum_of_emi_no) +
                            Number(final_ob_sum_of_emi_no)));
                        $("#Final_page_obl_con").val(Math.round(Number(final_cr_sum_of_emi_no) +
                        Number(final_ob_sum_of_emi_no)));
                    }

                });
            }
        });
        //END PERSONAL LOAN CREDIT CARD OBLIGATION ADD TO DATABASE SECTION

        //PERSONAL LOAN ELIGIBILITY ADD TO DATABASE SECTION
        $('body').on('click', '.el_add', function(e) {
            e.preventDefault();

            let elg_bank_name = $("#el_bank_name").val();
            let elg_emp_cat = $("#el_em_cat").val();
            let elg_multiplier = $("#el_multiplier").val();
            let elg_foir = $("#el_foir").val();
            let el_mul_eligibility_nth = $("#el_mul_eligibility_nth").val();
            let el_mul_eligibility_sao = $("#el_mul_eligibility_sao").val();
            let elg_roi = $("#el_roi").val();
            let elg_emi_per_lak = $("#el_emi_per_lak").val();
            let el_emi_foir_eligibility = $("#el_emi_foir_eligibility").val();
            let cus_id = $('#cus_id').val();
            let enq_id = $('#enq_id').val();

            $.ajax({

                type: 'POST',

                url: "{{ route('assignedleads.store') }}",

                data: {
                    _token: "{{ csrf_token() }}",
                    el_bank_name: elg_bank_name,
                    el_emp_cat: elg_emp_cat,
                    el_multiplier: elg_multiplier,
                    el_foir: elg_foir,
                    el_roi: elg_roi,
                    el_emi_per_lak: elg_emi_per_lak,
                    el_mul_eligibility_nth:el_mul_eligibility_nth,
                    el_mul_eligibility_sao:el_mul_eligibility_sao,
                    el_emi_foir_eligibility:el_emi_foir_eligibility,
                    cusid: cus_id,
                    enqid: enq_id,
                    table: 3
                },

                success: function(data) {


                    let response = JSON.parse(data);
                    $('#inserted_el').empty();
                    $.each(response, function(i, item) {


                        var $tr = $('<tr>').append(
                            $('<td>').text(item.el_Bank_name),
                            $('<td>').text(item.el_employee_category),
                            $('<td>').text(item.el_multiplier),
                            $('<td>').text(item.el_foir+'%'),
                            $('<td>').text(item.el_mutiplier_eligibility_nth),
                            $('<td>').text(item.el_mutiplier_eligibility_sao),
                            $('<td>').text(item.el_roi),
                            $('<td>').text(item.el_emi_per_lak),
                            $('<td>').text(item.el_foir_eligibility),
                            $('<td>').html('<button type="button" id=' +
                                item.id +
                                ' class="btn btn-sm btn-danger el_delete"><i class="fas fa-trash-alt px-2"></i></button>'
                            ),
                        );
                        $tr.appendTo('#inserted_el');
                        $(".el_add").prop('disabled', true);
                        $("#el_bank_name").prop('disabled', false);
                        $('#el_bank_name').val('');
                        $("#el_em_cat").prop('disabled', false);
                        $('#el_em_cat').val('');
                        $("#el_multiplier").prop('disabled', false);
                        $('#el_multiplier').val('');
                        $("#el_foir").prop('disabled', false);
                        $('#el_foir').val('');
                        $("#el_mul_eligibility").prop('disabled', false);
                        $('#el_mul_eligibility').val('');
                        $("#el_roi").prop('disabled', false);
                        $('#el_roi').val('');
                        $('#el_emi_per_lak').val('');
                        $('#el_emi_foir_eligibility').val('');
                        $("#el_add").prop('disabled', true);
                        $("#el_mul_eligibility_nth").val('');
                        $("#el_mul_eligibility_sao").val('');

                    });

                }

            });

        });
        //END PERSONAL LOAN ELIGIBILITY ADD TO DATABASE SECTION

        //HOME LOAN ADDITIONAL FEILD ADDING TO DATABASE
        $('body').on('click', '.hl_profile_add', function(e) {
            e.preventDefault();

            $('#hl_alert').hide();
            let hl_age = $("#hl_age").val();
            let hl_property_type = $("select#hl_property_type").val();
            let hl_builder_name = $("#hl_builder_name").val();
            let hl_property_value = $("#hl_property_value").val();
            let hl_property_area = $("#hl_property_area").val();
            let hl_property_city = $("#hl_property_city").val();
            let hl_gross_salary = $("#hl_gross_salary").val();
            let hl_net_salary = $("#hl_net_salary").val();
            let hl_co_joint = $("#hl_co_joint").val();
            let cus_id = $('#cus_id').val();
            let enq_id = $('#enq_id').val();


            if (check_null(hl_age) || check_null(hl_property_type) ||
                check_null(hl_builder_name) || check_null(hl_property_value) ||
                check_null(hl_property_area) || check_null(hl_gross_salary) ||
                check_null(hl_net_salary) || check_null(hl_co_joint) ||
                hl_property_type == 0) {
                $('#hl_alert').show();
                $('#hl_alert').html("CHOOSE PROPERTY TYPE & FILL ALL THE FEILDS");
            } else {
                if (check_numeric(hl_property_value) || check_numeric(hl_gross_salary) ||
                    check_numeric(hl_net_salary)) {
                    $('#hl_alert').show();
                    $('#hl_alert').html(
                        "PROPERTY VALUE & GROSS SALARY & NET SALARY SHOULD BE IN NUMERIC VALUE");

                } else {

                $.ajax({

                        type: 'POST',

                        url: "{{ route('assignedleads.store') }}",

                        data: {
                            _token: "{{ csrf_token() }}",
                            hl_age: hl_age,
                            hl_property_type: hl_property_type,
                            hl_builder_name: hl_builder_name,
                            hl_property_value: hl_property_value,
                            hl_property_area: hl_property_area,
                            hl_property_city: hl_property_city,
                            hl_gross_salary: hl_gross_salary,
                            hl_net_salary: hl_net_salary,
                            hl_co_joint: hl_co_joint,
                            cusid: cus_id,
                            enqid: enq_id,
                            table: 4
                        },

                        success: function(data) {

                            if (data == 1) {

                                $('#additional_info_home_loan_div1').hide();
                                $('#additional_info_home_loan_div2').show();
                                $('#hl_el_property_value').val(hl_property_value);
                                $('#hl_el_gross_salary').val(hl_gross_salary);

                                Swal.fire(
                                    'HOME LOAN INFO ADDED!',
                                    'FILL THE ELIGIBILITY!',
                                    'success'
                                )
                            }


                        }

                    });

                }
            }
        });
        //END HOME LOAN ADDITIONAL FEILD ADDING TO DATABASE

        //HOME LOAN ELIGIBILITY ADD TO DATABASE SECTION
         $('body').on('click', '#hl_el_add_btn', function(e) {
            e.preventDefault();

            let hl_bank_name = $("#hl_bank_name").val();
            let hl_ltv = $("#hl_ltv").val();
            let hl_ltv_eligibility = $("#hl_ltv_eligibility").val();
            let hl_foir = $("#hl_foir").val();
            let hl_roi = $("#hl_roi").val();
            let hl_tenure = $("#hl_tenure").val();
            let hl_emi_per_lak = $("#hl_emi_per_lak").val();
            let hl_emi_foir_eligibility = $("#hl_emi_foir_eligibility").val();
            let cus_id = $('#cus_id').val();
            let enq_id = $('#enq_id').val();

            $.ajax({

                type: 'POST',

                url: "{{ route('assignedleads.store') }}",

                data: {
                    _token: "{{ csrf_token() }}",
                    hl_bank_name: hl_bank_name,
                    hl_ltv: hl_ltv,
                    hl_ltv_eligibility: hl_ltv_eligibility,
                    hl_foir: hl_foir,
                    hl_roi: hl_roi,
                    hl_tenure: hl_tenure,
                    hl_emi_per_lak: hl_emi_per_lak,
                    hl_emi_foir_eligibility: hl_emi_foir_eligibility,
                    cusid: cus_id,
                    enqid: enq_id,
                    table: 6
                },

                success: function(data) {


                    let response = JSON.parse(data);
                    $('#inserted_hl_el').empty();
                    $.each(response, function(i, item) {


                        var $tr = $('<tr>').append(
                            $('<td>').text(item.hl_bank_name),
                            $('<td>').text(item.hl_ltv),
                            $('<td>').text(item.hl_ltv_eligibility),
                            $('<td>').text(item.hl_foir),
                            $('<td>').text(item.hl_roi),
                            $('<td>').text(item.hl_tenure),
                            $('<td>').text(item.hl_emi_per_lak),
                            $('<td>').text(item.hl_emi_foir_eligibility),
                            $('<td>').html('<button type="button" id=' +
                                item.id +
                                ' class="btn btn-sm btn-danger hl_el_delete"><i class="fas fa-trash-alt px-2"></i></button>'
                            ),
                        );
                        $tr.appendTo('#inserted_hl_el');
                        $('#hl_bank_name').val('');
                        $('#hl_ltv').val('');
                        $('#hl_foir').val('');
                        $('#hl_roi').val('');
                        $('#hl_emi_per_lak').val('');
                        $('#hl_emi_per_lak').val('');
                        $('#hl_ltv_eligibility').val('');
                        $('#hl_bank_name').prop('disabled', false);
                        $('#hl_ltv').prop('disabled', false);
                        $('#hl_foir').prop('disabled', false);
                        $('#hl_roi').prop('disabled', false);
                        $('#hl_tenure').prop('disabled', false);
                        $('#hl_el_edit_btn').hide();
                        $("#hl_el_cal_btn").show();
                        $("#hl_el_add_btn").prop('disabled', true);
                    });

                }

            });

        });
        //END HOME LOAN ELIGIBILITY ADD TO DATABASE SECTION

        //HL_PROFILE_FINAL_LOAN_COMPARISON_ADD_TO_DATABASE
        $('body').on('click', '#ln_com_final_add', function(e) {
            e.preventDefault();
            $('#ln_com_final_edit').prop('disabled', true);
            $('#ln_com_final_add').prop('disabled', true);

            let ex_ln_loan_amount = $('#ex_ln_loan_amount').val();
            let ex_ln_tennure = $('#ex_ln_tennure').val();
            let ex_ln_roi = $('#ex_ln_roi').val();
            let ex_ln_emi = $('#ex_ln_emi').val();
            let ex_ln_pos = $('#ex_ln_pos').val();
            let ex_ln_no_of_emi_paid = $('#ex_ln_no_of_emi_paid').val();
            let ex_ln_balance_emi = $('#ex_ln_balance_emi').val();
            let ex_ln_exsting_out_flow = $('#ex_ln_exsting_out_flow').val();
            let ln_com_new_loan_amount = $('#ln_com_new_loan_amount').val();
            let ln_com_new_roi = $('#ln_com_new_roi').val();
            let ln_com_new_tennure = $('#ln_com_new_tennure').val();
            let ln_com_new_emi = $('#ln_com_new_emi').val();
            let ln_com_new_proposed_outflow = $('#ln_com_new_proposed_outflow').val();
            let ln_com_new_gross_sav = $('#ln_com_new_gross_sav').val();
            let ln_com_motd = $('#ln_com_motd').val();
            let ln_com_pro_fee = $('#ln_com_pro_fee').val();
            let ln_com_ot_charges = $('#ln_com_ot_charges').val();
            let ln_com_total_cost = $('#ln_com_total_cost').val();
            let ln_com_net_sav = $('#ln_com_net_sav').val();
            let cus_id = $('#cus_id').val();
            let enq_id = $('#enq_id').val();

            $.ajax({

                type: 'POST',

                url: "{{ route('assignedleads.store') }}",

                data: {
                    _token: "{{ csrf_token() }}",
                    ex_ln_loan_amount: ex_ln_loan_amount,
                    ex_ln_tennure: ex_ln_tennure,
                    ex_ln_roi: ex_ln_roi,
                    ex_ln_emi: ex_ln_emi,
                    ex_ln_pos: ex_ln_pos,
                    ex_ln_no_of_emi_paid: ex_ln_no_of_emi_paid,
                    ex_ln_balance_emi: ex_ln_balance_emi,
                    ex_ln_exsting_out_flow: ex_ln_exsting_out_flow,
                    ln_com_new_loan_amount: ln_com_new_loan_amount,
                    ln_com_new_roi: ln_com_new_roi,
                    ln_com_new_tennure: ln_com_new_tennure,
                    ln_com_new_emi: ln_com_new_emi,
                    ln_com_new_proposed_outflow: ln_com_new_proposed_outflow,
                    ln_com_new_gross_sav: ln_com_new_gross_sav,
                    ln_com_motd: ln_com_motd,
                    ln_com_pro_fee: ln_com_pro_fee,
                    ln_com_ot_charges: ln_com_ot_charges,
                    ln_com_total_cost: ln_com_total_cost,
                    ln_com_net_sav: ln_com_net_sav,
                    cusid: cus_id,
                    enqid: enq_id,
                    table: 5
                },

                success: function(data) {

                    if (data == 1) {
                        Swal.fire('Successfully Submited');
                    }


                },
                error: function(data) {
                    console.log("fail");
                }

            });

        })
        //END HL_PROFILE_FINAL_LOAN_COMPARISON_ADD_TO_DATABASE

        //FINAL SUBMIT FOR ALL TO DATABASE SECTION
        $('body').on('click', '#final_submit', function(e) {
            e.preventDefault();
            let final_loan_amount = $('#Final_Loan_amount').val();
            let final_rate_of_interest = $('#final_roi').val();
            let final_tennure = $('#final_tenure').val();
            let final_emi = $('#final_emi').val();
            let final_proposed_total_emi = $('#final_proposed_total_emi').val();
            let final_current_foir = $('#final_current_foir').val();
            let final_proposed_foir = $('#final_proposed_foir').val();
            let Final_page_remarks = $('#Final_page_remarks').val();
            let el_sal_mon1 = $('#el_sal_mon1').val();
            let el_sal_mon2 = $('#el_sal_mon2').val();
            let el_sal_mon3 = $('#el_sal_mon3').val();
            let hl_sal_mon1 = $('#hl_sal_mon1').val();
            let hl_sal_mon2 = $('#hl_sal_mon2').val();
            let hl_sal_mon3 = $('#hl_sal_mon3').val();
            let final_sal_mon1 = Number(el_sal_mon1)+Number(hl_sal_mon1);
            let final_sal_mon2 = Number(el_sal_mon2)+Number(hl_sal_mon2);
            let final_sal_mon3 = Number(el_sal_mon3)+Number(hl_sal_mon3);
            let final_salary_considered = $('#Final_page_sal_con').val();
            let final_obligation_considered = $('#Final_page_obl_con').val();
            let final_ob_pos_sum_of_bt_yes = $('#ob_sum_of_pos_bt_yes').val();
            let final_ob_pos_sum_of_bt_no = $('#ob_sum_of_pos_bt_no').val();
            let final_ob_emi_sum_of_bt_yes = $('#ob_sum_of_emi_bt_yes').val();
            let final_ob_emi_sum_of_bt_no = $('#ob_sum_of_emi_bt_no').val();
            let final_cr_emi_sum_of_bt_yes = $('#cr_emi_bt_yes').val();
            let final_cr_emi_sum_of_bt_no = $('#cr_emi_bt_no').val();
            let cus_id = $('#cus_id').val();
            let enq_id = $('#enq_id').val();

            $.ajax({

                type: 'POST',

                url: "{{ route('assignedleads.store') }}",

                data: {
                    _token: "{{ csrf_token() }}",
                    final_loan_amount: final_loan_amount,
                    final_rate_of_interest: final_rate_of_interest,
                    final_tennure: final_tennure,
                    final_emi: final_emi,
                    final_proposed_total_emi: final_proposed_total_emi,
                    final_current_foir: final_current_foir,
                    final_proposed_foir: final_proposed_foir,
                    Final_page_remarks: Final_page_remarks,
                    final_sal_mon1: final_sal_mon1,
                    final_sal_mon2: final_sal_mon2,
                    final_sal_mon3: final_sal_mon3,
                    final_salary_considered: final_salary_considered,
                    final_obligation_considered: final_obligation_considered,
                    final_ob_pos_sum_of_bt_yes: final_ob_pos_sum_of_bt_yes,
                    final_ob_pos_sum_of_bt_no: final_ob_pos_sum_of_bt_no,
                    final_ob_emi_sum_of_bt_yes: final_ob_emi_sum_of_bt_yes,
                    final_ob_emi_sum_of_bt_no: final_ob_emi_sum_of_bt_no,
                    final_cr_emi_sum_of_bt_yes: final_cr_emi_sum_of_bt_yes,
                    final_cr_emi_sum_of_bt_no: final_cr_emi_sum_of_bt_no,
                    cusid: cus_id,
                    enqid: enq_id,

                },
                beforeSend: function(){
                    $("#loading").show();
                },
                complete: function(){
                    $("#loading").hide();
                },
                success: function(data) {

                    let response = JSON.parse(data);

                    swal.fire({
                        title: 'Offer Generated',
                        text: "Successfully",
                        type: 'success',
                    }).then(function(result) {
                        if (result.value) {

                            let url =
                                "{{ route('pdfcreate.caller', ['cusid' => 'cuid', 'enqid' => 'enid']) }}";
                            url = url.replace('cuid', response.cus_id);
                            url = url.replace('enid', response.enq_id);
                            window.location.href = url;
                        }
                    })





                }

            });
        });
        //FINAL SUBMIT FOR ALL TO DATABASE SECTION



    // !================================ END ALL LOAN OBLIGATION ADD SECTION ===========!

    // !==============SECTION FOR ALL CALCUALTION BUTTON IN PAGE ================!

        // LOAN EMI OBLIGATION CALCULATE SECTION
        $('body').on('click', '.calculate', function(e) {
            e.preventDefault();
            let loan_type = $("#ob_loan_type").val();
            let bank_name = $("#ob_bank_name").val();
            let loan_amount = $("#ob_loan_amount").val();
            let roi = $("#ob_roi").val();
            let tennure = $("#ob_tennure").val();
            let original_emi = $("#ob_original_emi").val();



            if (check_null(loan_type) || check_null(bank_name) || check_null(loan_amount) || check_null(
                    roi) || check_null(tennure) || check_null(original_emi)) {
                $('#ob_alert').show();
                $('#ob_alert').html("FILL ALL THE FEILDS");
            } else {
                if (check_numeric(loan_amount) || check_numeric(roi) || check_numeric(tennure) || check_numeric(original_emi)) {
                    $('#ob_alert').show();
                    $('#ob_alert').html("ROI & LOAN AMOUNT & TENURE SHOULD BE IN NUMERIC VALUE");

                } else {
                    $('#ob_alert').hide();
                    $("#ob_bt").prop('disabled', false);
                    $("#ob_pos").prop('disabled', false);
                    $('.add').prop('disabled', false);
                    $('#ob_emi').val(calculate_emi(loan_amount, roi, tennure));
                    $("#ob_loan_type").prop('disabled', false   );
                    $("#ob_bank_name").prop('disabled', false);
                    $("#ob_loan_amount").prop('disabled', false);
                    $("#ob_roi").prop('disabled', false);
                    $("#ob_tennure").prop('disabled', true);
                }
            }

        });
        //END LOAN EMI OBLIGATION CALCULATE SECTION

        //LOAN CREDIT OBLIGATION CALCULATE
        $('body').on('click', '.cr_calculate', function(e) {
            e.preventDefault();
            let cr_bank_name = $("#cr_bank_name").val();
            let cr_limit = $("#cr_limit").val();
            let cr_card_outstanding = $("#cr_card_outstanding").val();

            if (check_null(cr_bank_name) || check_null(cr_limit || check_null(cr_card_outstanding))) {
                $('#cr_alert').show();
                $('#cr_alert').html("FILL ALL THE FEILDS");
            } else {
                if (check_numeric(cr_limit) || check_numeric(cr_card_outstanding)) {
                    $('#cr_alert').show();
                    $('#cr_alert').html("CARD OUSTANDING AND CARD LIMIT SHOULD BE NUMBERIC VALUE");

                } else {
                    $('#cr_alert').hide();
                    $("#cr_bt").prop('disabled', false);
                    $('.cr_add').prop('disabled', false);
                    $('#cr_emi').val(card_emi(cr_card_outstanding));
                    $("#cr_bank_name").prop('disabled', true);
                    $("#cr_limit").prop('disabled', true);
                    $("#cr_card_outstanding").prop('disabled', true);

                }
            }

        });
        //END LOAN CREDIT OBLIGATION CALCULATE

        //SALARY AVREAGE CALCULATION FOR PL LOAN && BS LOAN
        $('body').on('click', '#el_cal_salary_btn', function(e) {
            e.preventDefault();
            //validation reset
            $('#el_sal_mon1').removeClass('is-invalid');
            $('#el_sal_mon2').removeClass('is-invalid');
            $('#el_sal_mon3').removeClass('is-invalid');

            let mon1 = $('#el_sal_mon1').val();
            let mon2 = $('#el_sal_mon2').val();
            let mon3 = $('#el_sal_mon3').val();
            let validation_check = true;

            if (check_null(mon1)) {
                $('#el_sal_mon1').addClass('is-invalid');
                $('#el_sal_mon1_error').html('Not a Valid Input');
                validation_check = false;
            } else {
                $('#el_sal_mon1').removeClass('is-invalid');
                $('#el_sal_mon1_error').html('');
            }
            if (check_null(mon2)) {
                $('#el_sal_mon2').addClass('is-invalid');
                $('#el_sal_mon2_error').html('Not a Valid Input');
                validation_check = false;

            } else {
                $('#el_sal_mon2').removeClass('is-invalid');
                $('#el_sal_mon2_error').html('');
            }
            if (check_null(mon3)) {
                $('#el_sal_mon3').addClass('is-invalid');
                $('#el_sal_mon3_error').html('Not a Valid Input');
                validation_check = false;
            } else {
                $('#el_sal_mon3').removeClass('is-invalid');
                $('#el_sal_mon3_error').html('');
            }

            if (validation_check) {
                $('#cr_tb_final_salary').val(Math.round(average_income(mon1, mon2, mon3)));
                $('#Final_page_sal_con').val(Math.round(average_income(mon1, mon2, mon3)));
                $('#el_cal_edit_btn').prop('disabled', false);
                $('#el_cal_salary_btn').prop('disabled', true);
                $('#el_sal_mon1').prop('disabled', true);
                $('#el_sal_mon2').prop('disabled', true);
                $('#el_sal_mon3').prop('disabled', true);
            }

        })
        //END SALARY AVREAGE CALCULATION FOR PL LOAN && BS LOAN

        //SALARY AVREAGE CALCULATION FOR HL LOAN && MORTAGES LOAN
        $('body').on('click', '#hl_cal_salary_btn', function(e) {
            e.preventDefault();
            //validation reset
            $('#hl_sal_mon1').removeClass('is-invalid');
            $('#hl_sal_mon2').removeClass('is-invalid');
            $('#hl_sal_mon3').removeClass('is-invalid');

            let mon1 = $('#hl_sal_mon1').val();
            let mon2 = $('#hl_sal_mon2').val();
            let mon3 = $('#hl_sal_mon3').val();
            let validation_check = true;

            if (check_null(mon1)) {
                $('#hl_sal_mon1').addClass('is-invalid');
                $('#hl_sal_mon1_error').html('Not a Valid Input');
                validation_check = false;
            } else {
                $('#hl_sal_mon1').removeClass('is-invalid');
                $('#hl_sal_mon1_error').html('');
            }
            if (check_null(mon2)) {
                $('#hl_sal_mon2').addClass('is-invalid');
                $('#hl_sal_mon2_error').html('Not a Valid Input');
                validation_check = false;

            } else {
                $('#hl_sal_mon2').removeClass('is-invalid');
                $('#hl_sal_mon2_error').html('');
            }
            if (check_null(mon3)) {
                $('#hl_sal_mon3').addClass('is-invalid');
                $('#hl_sal_mon3_error').html('Not a Valid Input');
                validation_check = false;
            } else {
                $('#hl_sal_mon3').removeClass('is-invalid');
                $('#hl_sal_mon3_error').html('');
            }

            if (validation_check) {
                $('#hl_tb_income_consi').val(Math.round(average_income(mon1, mon2, mon3)));
                $('#Final_page_sal_con').val(Math.round(average_income(mon1, mon2, mon3)));
                $('#hl_cal_edit_btn').prop('disabled', false);
                $('#hl_cal_salary_btn').prop('disabled', true);
                $('#hl_sal_mon1').prop('disabled', true);
                $('#hl_sal_mon2').prop('disabled', true);
                $('#hl_sal_mon3').prop('disabled', true);
            }

        })
        //END SALARY AVREAGE CALCULATION FOR HL LOAN && MORTAGES LOAN

        //PERSONAL LOAN EL_OBLIGATION CALCULATE
        $('body').on('click', '.el_calculate', function(e) {
            e.preventDefault();
            let income_considered=$('#cr_tb_final_salary').val();
            let Total_obligation=$('#el_tb_Total_obligation').val();
            let el_bank_name = $("#el_bank_name").val();
            let el_em_cat = $("#el_em_cat").val();
            let el_multiplier = $("#el_multiplier").val();
            let el_foir = $("#el_foir").val();
            let el_roi = $("#el_roi").val();

            if (check_null(el_bank_name) || check_null(el_em_cat) || check_null(el_multiplier) ||
                check_null(el_foir) || check_null(el_roi)) {
                $('#el_alert').show();
                $('#el_alert').html("FILL ALL THE FEILDS");
            } else {
                if (check_numeric(el_multiplier) || check_numeric(el_foir) || check_numeric(el_roi)) {
                    $('#el_alert').show();
                    $('#el_alert').html("ELG-MUL & FOIR & MUL-ELG & ROI SHOULD BE NUMBERIC VALUE");

                } else {
                    $('#el_alert').hide();
                    $("#el_bank_name").prop('disabled', true);
                    $("#el_em_cat").prop('disabled', true);
                    $("#el_multiplier").prop('disabled', true);
                    $("#el_foir").prop('disabled', true);
                    $("#el_mul_eligibility").prop('disabled', true);
                    $("#el_roi").prop('disabled', true);
                    $('.el_add').prop('disabled', false);
                    $('#el_mul_eligibility_nth').val(Number(income_considered)*Number(el_multiplier));
                    $('#el_mul_eligibility_sao').val([Number(income_considered)-Number(Total_obligation)]*Number(el_multiplier));
                    $('#el_emi_per_lak').val(per_lak_emi(el_roi));
                    let emi_per_lak = $("#el_emi_per_lak").val();
                    let ob_sub_income=Number(income_considered)-Number(Total_obligation);
                    $('#el_emi_foir_eligibility').val(foir_eligibility(Number(el_foir),Number(income_considered),Number(Total_obligation),Number(emi_per_lak)));

                }
            }

        });
        //END PERSONAL LOAN EL_OBLIGATION CALCULATE

         //HOME LOAN && MORTAGELOAN EL_OBLIGATION CALCULATE
        $('body').on('click', '#hl_el_cal_btn', function(e) {
            e.preventDefault();
            let hl_bank_name = $("#hl_bank_name").val();
            let hl_ltv = $("#hl_ltv").val();
            let hl_foir = $("#hl_foir").val();
            let hl_roi = $("#hl_roi").val();
            let hl_tenure = $("select#hl_tenure").val();
            let property_value = $("#hl_el_property_value").val();
            let Total_obligation= $("#hl_final_obligation").val();
            let Income_considered= $("#hl_tb_income_consi").val();


            if (check_null(hl_bank_name) || check_null(hl_ltv) || check_null(hl_foir) ||
                check_null(hl_roi) || check_null(hl_tenure)) {
                $('#hl_eg_alert').show();
                $('#hl_eg_alert').html("FILL ALL THE FEILDS");
            } else {
                if (check_numeric(hl_ltv) || check_numeric(hl_foir) || check_numeric(
                    hl_roi) ) {
                    $('#hl_eg_alert').show();
                    $('#hl_eg_alert').html("ELG-MUL & FOIR & MUL-ELG & ROI SHOULD BE NUMBERIC VALUE");

                } else {
                    $('#hl_eg_alert').hide();
                    $("#hl_bank_name").prop('disabled', true);
                    $("#hl_ltv").prop('disabled', true);
                    $("#hl_foir").prop('disabled', true);
                    $("#hl_roi").prop('disabled', true);
                    $("select#hl_tenure").prop('disabled', true);
                    $("#hl_el_cal_btn").hide();
                    $("#hl_el_add_btn").show();
                    $("#hl_el_add_btn").prop('disabled', false);
                    $('#hl_el_edit_btn').prop('disabled', false);
                    $("#hl_ltv_eligibility").val(Number(property_value)*(Number(hl_ltv)/100));
                    $('#hl_emi_per_lak').val(per_lak_emi_hl(hl_roi,hl_tenure));
                    let emi_per_lak = $("#hl_emi_per_lak").val();
                    $('#hl_emi_foir_eligibility').val(foir_eligibility(hl_foir,Number(Income_considered),Number(Total_obligation),emi_per_lak));


                }
            }

        });
        //END HOME LOAN && MORTAGELOAN EL_OBLIGATION CALCULATE

        //EX_LN_COMPARISON CALCULATE BUTTON
        $('body').on('click', '#ex_ln_calculate', function(e) {
            e.preventDefault();
            let ln_loan_amount = $('#ex_ln_loan_amount').val();
            let ln_tennure = $('#ex_ln_tennure').val();
            let ln_roi = $('#ex_ln_roi').val();
            let ln_pos = $('#ex_ln_pos').val();
            let ln_no_of_emi_paid = $('#ex_ln_no_of_emi_paid').val();

            if (check_null(ln_loan_amount) || check_null(ln_tennure) || check_null(ln_roi) ||
                check_null(ln_pos) || check_null(ln_no_of_emi_paid)) {
                $('#ln_com_alert').show();
                $('#ln_com_alert').html("FILL ALL THE FEILDS & SHOULD BE NUMERIC");
            } else {
                $('#ln_com_alert').hide();
                let emi = calculate_emi(ln_loan_amount, ln_roi, ln_tennure);
                $('#ex_ln_emi').val(Number(emi));
                $('#ln_com_new_loan_amount').val(Number(ln_pos));
                let ex_ln_emi_cal = $('#ex_ln_emi').val();
                $('#ex_ln_balance_emi').val(Number(ln_tennure) - Number(ln_no_of_emi_paid));
                let balance_emi = $('#ex_ln_balance_emi').val();
                $('#ln_com_new_tennure').val(Number(balance_emi));
                $('#ex_ln_exsting_out_flow').val(Number(balance_emi) * Number(emi));
                $('#ex_ln_loan_amount').prop('disabled', true);
                $('#ex_ln_tennure').prop('disabled', true);
                $('#ex_ln_roi').prop('disabled', true);
                $('#ex_ln_pos').prop('disabled', true);
                $('#ex_ln_balance_emi').prop('disabled', true);
                $('#ex_ln_calculate').prop('disabled', true);
                $('#ex_ln_no_of_emi_paid').prop('disabled', true);
                $('#ex_ln_edit').prop('disabled', false);
            }



        })
        //END EX_LN_COMPARISON CALCULATE BUTTON

        //EX_LN_NEW COMPARISON CALCULATE BUTTON
        $('body').on('click', '#ex_new_ln_calculate', function(e) {
            e.preventDefault();
            $('#ln_com_new_roi').removeClass('is-invalid');
            let new_loan_amount = $('#ln_com_new_loan_amount').val();
            let new_roi = $('#ln_com_new_roi').val();
            let new_tennure = $('#ln_com_new_tennure').val();
            let exiting_outflow = $('#ex_ln_exsting_out_flow').val();
            let new_gross_sav = $('#ln_com_new_gross_sav').val();

            if (check_null(new_roi)) {
                $('#ln_com_new_roi').addClass('is-invalid');
            } else {

                $('#ln_com_new_emi').val(calculate_emi(new_loan_amount, new_roi, new_tennure));
                let new_emi = $('#ln_com_new_emi').val();
                $('#ex_new_ln_calculate').prop('disabled', true);
                $('#ln_com_new_roi').prop('disabled', true);
                $('#ex_new_ln_edit').prop('disabled', false);
                $('#ln_com_new_proposed_outflow').val(Number(new_emi) * Number(new_tennure));
                let new_proposed_outflow = $('#ln_com_new_proposed_outflow').val();
                $('#ln_com_new_gross_sav').val(Number(exiting_outflow) - Number(new_proposed_outflow));
                $('#ln_com_final_cal').prop('disabled', false);
            }



        })
        //END EX_LN_NEW_COMPARISON CALCULATE BUTTON

        //HL_PROFILE LOAN_COMPARISON_FINAL_CALCUATION_FOR_CHARAGES
        $('body').on('click', '#ln_com_final_cal', function(e) {
            $('#ln_com_motd').removeClass('is-invalid');
            $('#ln_com_pro_fee').removeClass('is-invalid');
            e.preventDefault();
            let com_motd = $('#ln_com_motd').val();
            let com_pro_fee = $('#ln_com_pro_fee').val();
            let com_ot_charges = $('#ln_com_ot_charges').val();
            let com_net_sav = $('#ln_com_net_sav').val();
            let com_gross_sav = $('#ln_com_new_gross_sav').val();

            if (check_null(com_motd) || check_null(com_pro_fee)) {
                $('#ln_com_motd').addClass('is-invalid');
                $('#ln_com_pro_fee').addClass('is-invalid');
            } else {
                $('#ln_com_total_cost').val(Number(com_motd) + Number(com_pro_fee) + Number(
                    com_ot_charges));
                let com_total_cost = $('#ln_com_total_cost').val();
                $('#ln_com_net_sav').val(Number(com_gross_sav) - Number(com_total_cost));
                $('#ln_com_motd').prop('disabled', true);
                $('#ln_com_pro_fee').prop('disabled', true);
                $('#ln_com_ot_charges').prop('disabled', true);
                $('#ln_com_final_cal').prop('disabled', true);
                $('#ln_com_final_edit').show();
                $('#ln_com_final_add').prop('disabled', false);

            }


        })
        //END HL_PROFILE LOAN_COMPARISON_FINAL_CALCUATION_FOR_CHARAGES

        //FINAL CALCUATION SECTION
        $('body').on('click', '#final_calculate', function() {
            let f_loan_amount = $('#Final_Loan_amount').val();
            let f_roi = $('#final_roi').val();
            let f_tennure = $('#final_tenure').val();

                if (check_null(f_loan_amount) || check_null(f_roi) || check_null(f_tennure)) {
                    $('#final_alert').show();
                    $('#final_alert').html("ENTER ALL THE FEILDS");
                } else {
                    if (check_numeric(f_loan_amount) || check_numeric(f_roi) || check_numeric(f_tennure)) {
                        $('#final_alert').show();
                        $('#final_alert').html("ALL THE FEILDS SHOULD BE NUMERIC");
                    } else {
                        $('#final_alert').hide();
                        $('#final_calculate').hide();
                        $('#final_edit').show();
                        $('#Final_Loan_amount').prop('disabled', true);
                        $('#final_roi').prop('disabled', true);
                        $('#final_tenure').prop('disabled', true);
                        $('#final_emi').val(calculate_emi(f_loan_amount, f_roi, f_tennure));
                        let f_emi = $('#final_emi').val();
                        let f_obligation = $('#Final_page_obl_con').val();
                        $('#final_proposed_total_emi').val(Math.round(Number(f_emi) + Number(
                        f_obligation)));
                        let f_ob_con = $('#final_proposed_total_emi').val();
                        let f_salary_con = $('#Final_page_sal_con').val();
                        $('#final_current_foir').val(current_foir(f_ob_con, f_salary_con) + "%");
                        $('#final_proposed_foir').val(proposed_foir(f_ob_con, f_salary_con, f_emi) + "%");
                        $('#final_submit').prop('disabled', false);
                    }
                }
        })
        //END FINAL CALCUATION SECTION


    // !==============END SECTION FOR ALL CALCUALTION BUTTON IN PAGE ================!


    // !===============ALL LOAN EDIT SECTION ==================================!

        //EX_LN_COMPARISON EDIT BUTTON
        $('body').on('click', '#ex_ln_edit', function(e) {
            $('#ex_ln_calculate').prop('disabled', false);
            $('#ex_new_ln_calculate').prop('disabled', false);
            $('#ex_ln_edit').prop('disabled', true);
            $('#ex_new_ln_edit').prop('disabled', true);
            $('#ex_ln_loan_amount').val('');
            $('#ex_ln_tennure').val('');
            $('#ex_ln_roi').val('');
            $('#ex_ln_emi').val('');
            $('#ex_ln_pos').val('');
            $('#ex_ln_no_of_emi_paid').val('');
            $('#ex_ln_balance_emi').val('');
            $('#ex_ln_exsting_out_flow').val('');
            $('#ln_com_new_roi').val('');
            $('#ex_ln_loan_amount').prop('disabled', false);
            $('#ln_com_new_roi').prop('disabled', false);
            $('#ex_ln_no_of_emi_paid').prop('disabled', false);
            $('#ex_ln_tennure').prop('disabled', false);
            $('#ex_ln_roi').prop('disabled', false);
            $('#ex_ln_pos').prop('disabled', false);
            $('#ln_com_new_loan_amount').val("");
            $('#ln_com_new_tennure').val("");

        })
        //END EX_LN_COMPARISON EDIT BUTTON

        //EX_LN_NEW EDIT BUTTON
        $('body').on('click', '#ex_new_ln_edit', function(e) {
            $('#ln_com_new_roi').prop('disabled', false);
            $('#ln_com_new_roi').val('');
            $('#ex_new_ln_calculate').prop('disabled', false);
            $('#ex_new_ln_edit').prop('disabled', true);
            $('#ln_com_final_cal').prop('disabled', true);
        })
        //END EX_LN_NEW EDIT BUTTON

        //HL_PROFILE LOAN_COMPARISON_FINAL_EDIT
        $('body').on('click', '#ln_com_final_edit', function(e) {
            e.preventDefault();
            $('#ln_com_final_edit').hide();
            $('#ln_com_final_cal').prop('disabled', false);
            $('#ln_com_motd').prop('disabled', false);
            $('#ln_com_pro_fee').prop('disabled', false);
            $('#ln_com_ot_charges').prop('disabled', false);
            $('#ln_com_motd').val('');
            $('#ln_com_pro_fee').val('');
            $('#ln_com_ot_charges').val('');
            $('#ln_com_total_cost').val('');
            $('#ln_com_net_sav').val('');

        })
        //END OF HL_PROFILE LOAN_COMPARISON_FINAL_EDIT

        //SALARY AVERAGE_EDIT FOR PL LOAN && BUSSINESS LOAN
        $('body').on('click', '#el_cal_edit_btn', function(e) {
            e.preventDefault();

            $('#el_sal_mon1').val('');
            $('#el_sal_mon2').val('');
            $('#el_sal_mon3').val('');
            $('#el_sal_mon1').prop('disabled', false);
            $('#el_sal_mon2').prop('disabled', false);
            $('#el_sal_mon3').prop('disabled', false);
            $('#cr_tb_final_salary').val('');
            $('#el_cal_edit_btn').prop('disabled', true);
            $('#el_cal_salary_btn').prop('disabled', false);

        })
        //END SALARY AVERAGE_EDIT FOR PL LOAN && BUSSINESS LOAN

        //SALARY AVERAGE_EDIT FOR PL LOAN && BUSSINESS LOAN
         $('body').on('click', '#hl_cal_edit_btn', function(e) {
            e.preventDefault();

            $('#hl_sal_mon1').val('');
            $('#hl_sal_mon2').val('');
            $('#hl_sal_mon3').val('');
            $('#hl_sal_mon1').prop('disabled', false);
            $('#hl_sal_mon2').prop('disabled', false);
            $('#hl_sal_mon3').prop('disabled', false);
            $('#hl_tb_income_consi').val('');
            $('#hl_cal_edit_btn').prop('disabled', true);
            $('#hl_cal_salary_btn').prop('disabled', false);

        })
        //END SALARY AVERAGE_EDIT FOR PL LOAN && BUSSINESS LOAN

        //EDIT BUTTON FOR HL && MT LOAN EDIT BUTTON
        $('body').on('click', '#hl_el_edit_btn', function(e) {
            e.preventDefault();

            $('#hl_bank_name').val('');
            $('#hl_ltv').val('');
            $('#hl_foir').val('');
            $('#hl_roi').val('');
            $('#hl_emi_per_lak').val('');
            $('#hl_emi_per_lak').val('');
            $('#hl_ltv_eligibility').val('');
            $('#hl_bank_name').prop('disabled', false);
            $('#hl_ltv').prop('disabled', false);
            $('#hl_foir').prop('disabled', false);
            $('#hl_roi').prop('disabled', false);
            $('#hl_tenure').prop('disabled', false);
            $('#hl_el_edit_btn').hide();
            $("#hl_el_cal_btn").show();
            $("#hl_el_add_btn").prop('disabled', true);

        })
        //END EDIT BUTTON FOR HL && MT LOAN EDIT BUTTON

        //FINAL EDIT BUTTON
        $('body').on('click', '#final_edit', function() {
            $('#final_edit').hide();
            $('#final_calculate').show();
            $('#final_submit').prop('disabled', true);
            $('#Final_Loan_amount').prop('disabled', false);
            $('#Final_Loan_amount').val('');
            $('#final_roi').prop('disabled', false);
            $('#final_roi').val('');
            $('#final_tenure').prop('disabled', false);
            $('#final_tenure').val('');
            $('#final_emi').val('');
            $('#final_proposed_total_emi').val('');
            $('#final_current_foir').val('');
            $('#final_proposed_foir').val('');
            $('#Final_page_sal_con').val('');
            $('#Final_page_obl_con').val('');

        })
        //END FINAL EDIT BUTTON

    // !===============END SECTION ALL LOAN EDIT SECTION ==================================!


    // !========================DELETE SECTION TO ALL LOANS ==========================!

        //SECTION TO DELETE TABLE OB RECORD
        $('body').on('click', '.delete', function() {
            var del_id = $(this).attr('id');
            // console.log(id);
            let cus_id = $('#cus_id').val();
            let enq_id = $('#enq_id').val();
            delete_tb_row(del_id, 1, cus_id, enq_id);
        });
        //END SECTION TO DELETE TABLE OB RECORD

        //SECTION TO DELETE TABLE CR_RECORD
        $('body').on('click', '.cr_delete', function() {
            var del_id_cr = $(this).attr('id');
            let cus_id_cr = $('#cus_id').val();
            let enq_id_cr = $('#enq_id').val();
            delete_tb_row(del_id_cr, 2, cus_id_cr, enq_id_cr);
        });
        //END SECTION TO DELETE TABLE  CR_RECORD

        //SECTION TO DELETE TABLE EL_RECORD FOR PL AND BL LOAN
        $('body').on('click', '.el_delete', function() {
            var del_id_cr = $(this).attr('id');
            let cus_id_cr = $('#cus_id').val();
            let enq_id_cr = $('#enq_id').val();
            delete_tb_row(del_id_cr, 3, cus_id_cr, enq_id_cr);
        });
        //END SECTION TO DELETE TABLE EL_RECORD FOR PL AND BL LOAN

        //SECTION TO DELETE TABLE EL_RECORD FOR PL AND BL LOAN
        $('body').on('click', '.hl_el_delete', function() {
            var del_id_cr = $(this).attr('id');
            let cus_id_cr = $('#cus_id').val();
            let enq_id_cr = $('#enq_id').val();
            delete_tb_row(del_id_cr, 6, cus_id_cr, enq_id_cr);
        });
        //END SECTION TO DELETE TABLE EL_RECORD FOR PL AND BL LOAN

    // !========================END DELETE SECTION TO ALL LOANS ==========================!

    //!==============================SECTION FOR THIS PAGE UTILITY FUNCTIOND ======================!
            function calculate_emi(Ln_amount, Roi, Tennure) {
                var r = Number(Roi) / 12 / 100;
                var n = Tennure;
                var p = Ln_amount;
                var TotalEmi = Math.round(p * r * Math.pow((1 + r), n) / (Math.pow((1 + r), n) -
                    1));
                return TotalEmi;
            }

            function per_lak_emi(Roi) {
                var r = Number(Roi) / 12 / 100;
                var n = 60;
                var p = 100000;
                var TotalEmi = Math.floor(p * r * Math.pow((1 + r), n) / (Math.pow((1 + r), n) -
                    1));
                return TotalEmi;
            }

            function per_lak_emi_hl(Roi,Tennure) {
                var r = Number(Roi) / 12 / 100;
                var n = Tennure*12;
                var p = 100000;
                var TotalEmi = Math.floor(p * r * Math.pow((1 + r), n) / (Math.pow((1 + r), n) -
                    1));
                return TotalEmi;
            }

            function check_null(text) {
                if (text == "") {
                    return true;
                } else {
                    return false;
                }
            }

            function check_numeric(value) {
                if ($.isNumeric(value)) {
                    return false;
                } else {
                    return true;
                }
            }

            function delete_tb_row(id, ontable, cus_id, enq_id) {
                var del_to_table = ontable;
                var del_rec_id = id;
                var url = '{{ route('assignedleads.update', ':id') }}';
                url = url.replace(':id', del_rec_id);
                $.ajax({

                    type: 'PUT',

                    url: url,

                    data: {
                        _token: "{{ csrf_token() }}",
                        table: ontable,
                        cusid: cus_id,
                        enqid: enq_id
                    },

                    success: function(data) {

                        let response = JSON.parse(data);
                        // console.log(response.data);
                        if (ontable == 1) {

                            let sum_of_pos_bt_yes = 0;
                            let sum_of_pos_bt_no = 0;
                            let sum_of_emi_bt_yes = 0;
                            let sum_of_emi_bt_no = 0;
                            $('#inserted_ob').empty();
                            $.each(response, function(i, item) {

                                var bt_yes_no = "NO";
                                if (item.ob_bt == 1) {
                                    bt_yes_no = "YES";
                                }
                                //calcuation for bt-yes and bt-no
                                if (item.ob_bt == 1) {
                                    sum_of_pos_bt_yes = sum_of_pos_bt_yes + Number(item.ob_pos);
                                } else {
                                    sum_of_pos_bt_no = sum_of_pos_bt_no + Number(item.ob_pos);
                                }
                                //end calcuation for bt-yes and bt-no
                                //calcuation for emi bt-yes and bt-no
                                if (item.ob_bt == 1) {
                                    sum_of_emi_bt_yes = sum_of_emi_bt_yes + Number(item.ob_emi);
                                } else {
                                    sum_of_emi_bt_no = sum_of_emi_bt_no + Number(item.ob_emi);
                                }
                                //end calcuation for emi bt-yes and bt-no
                                var $tr = $('<tr>').append(
                                    $('<td>').text(item.ob_Loan_type),
                                    $('<td>').text(item.ob_Bank_name),
                                    $('<td>').text(item.ob_Loan_amount),
                                    $('<td>').text(item.ob_roi),
                                    $('<td>').text(item.ob_tennure),
                                    $('<td>').text(item.ob_emi),
                                    $('<td>').text(item.ob_comp_emi),
                                    $('<td>').text(item.ob_pos),
                                    $('<td>').text(bt_yes_no),
                                    $('<td>').html('<button type="button" id=' + item.id +
                                        ' class="btn btn-danger delete"><i class="fas fa-trash-alt px-2"></i></button>'),
                                );
                                $tr.appendTo('#inserted_ob');
                            });
                            $("#ob_sum_of_pos_bt_yes").val(sum_of_pos_bt_yes);
                            $("#ob_sum_of_pos_bt_no").val(sum_of_pos_bt_no);
                            $("#ob_sum_of_emi_bt_no").val(sum_of_emi_bt_no);
                            $("#ob_sum_of_emi_bt_yes").val(sum_of_emi_bt_yes);

                        } else if (ontable == 2) {


                            let sum_of_emi_bt_yes_cr = 0;
                            let sum_of_emi_bt_no_cr = 0;
                            let final_obligation_cr = 0;
                            $('#inserted_cr').empty();
                            $.each(response, function(i, item) {

                                var bt_yes_no = "NO";
                                if (item.ob_bt == 1) {
                                    bt_yes_no = "YES";
                                }
                                //calcuation for emi bt-yes and bt-no
                                if (item.cr_bt == 1) {
                                    sum_of_emi_bt_yes_cr = sum_of_emi_bt_yes_cr + Number(item
                                        .cr_emi);
                                } else {
                                    sum_of_emi_bt_no_cr = sum_of_emi_bt_no_cr + Number(item
                                        .cr_emi);
                                }
                                //end calcuation for emi bt-yes and bt-no
                                var $tr = $('<tr>').append(
                                    $('<td>').text(item.cr_Bank_name),
                                    $('<td>').text(item.cr_card_limit),
                                    $('<td>').text(item.cr_card_outstanding),
                                    $('<td>').text(item.cr_emi),
                                    $('<td>').text(bt_yes_no),
                                    $('<td>').html('<button type="button" id=' + item.id +
                                        ' class="btn btn-danger btn-sm cr_delete"><i class="fas fa-trash-alt px-2"></i></button>'
                                    ),
                                );
                                $tr.appendTo('#inserted_cr');


                            });
                            $("#cr_emi_bt_yes").val(sum_of_emi_bt_yes_cr);
                            $("#cr_emi_bt_no").val(sum_of_emi_bt_no_cr);
                            let final_cr_sum_of_emi_no = $("#cr_emi_bt_no").val();
                            let final_ob_sum_of_emi_no = $("#ob_sum_of_emi_bt_no").val();
                            $("#cr_tb_final_obligation").val(Number(final_cr_sum_of_emi_no) + Number(
                                final_ob_sum_of_emi_no));
                                $("#el_tb_Total_obligation").val(Math.round(Number(final_cr_sum_of_emi_no) +
                           Number(final_ob_sum_of_emi_no)));
                           $("#hl_final_obligation").val(Math.round(Number(final_cr_sum_of_emi_no) +
                            Number(final_ob_sum_of_emi_no)));
                            $("#Final_page_obl_con").val(Math.round(Number(final_cr_sum_of_emi_no) +
                            Number(final_ob_sum_of_emi_no)));
                        } else if (ontable == 3) {


                            $('#inserted_el').empty();
                            $.each(response, function(i, item) {

                                var $tr = $('<tr>').append(
                                    $('<td>').text(item.el_Bank_name),
                                    $('<td>').text(item.el_employee_category),
                                    $('<td>').text(item.el_multiplier),
                                    $('<td>').text(item.el_foir+'%'),
                                    $('<td>').text(item.el_mutiplier_eligibility_nth),
                                    $('<td>').text(item.el_mutiplier_eligibility_sao),
                                    $('<td>').text(item.el_roi),
                                    $('<td>').text(item.el_emi_per_lak),
                                    $('<td>').text(item.el_foir_eligibility),
                                    $('<td>').html('<button type="button" id=' +
                                        item.id +
                                        ' class="btn btn-sm btn-danger el_delete"><i class="fas fa-trash-alt px-2"></i></button>'
                                    ),
                                );
                                $tr.appendTo('#inserted_el');


                            });

                        } else if (ontable == 6) {

                            $('#inserted_hl_el').empty();
                            $.each(response, function(i, item) {

                                var $tr = $('<tr>').append(
                                    $('<td>').text(item.hl_bank_name),
                                    $('<td>').text(item.hl_ltv),
                                    $('<td>').text(item.hl_ltv_eligibility),
                                    $('<td>').text(item.hl_foir),
                                    $('<td>').text(item.hl_roi),
                                    $('<td>').text(item.hl_tenure),
                                    $('<td>').text(item.hl_emi_per_lak),
                                    $('<td>').text(item.hl_emi_foir_eligibility),
                                    $('<td>').html('<button type="button" id=' +
                                        item.id +
                                        ' class="btn btn-sm btn-danger hl_el_delete"><i class="fas fa-trash-alt px-2"></i></button>'
                                    ),
                                );
                                $tr.appendTo('#inserted_hl_el');

                            });

                        }

                    }

                });
            }

            function card_emi(outstanding) {
                var card_emi = (outstanding * 5) / 100;
                return card_emi;
            }

            function foir_eligibility(foir_per,obligation,total_income,emi_per_lak) {

                let foir_per_salary=(total_income*(foir_per/100))-Number(obligation);
                let total = (Number(foir_per_salary) / Number(emi_per_lak)) * 100000;
                return Math.round(total);

            }

            function foir_eligibility_home_loan(foir_per, emi_per_lak) {

                let foir = foir_per;
                let per_lak_emi = emi_per_lak;
                let final_salary = $('#hl_tb_income_consi').val();
                let total_obligation = $('#cr_tb_final_obligation').val();
                let foir_per_of_salary = (final_salary * foir)/ 100;
                console.log("foir percentage of salary\t" + foir_per_of_salary);
                let fo_per_sal_sub_obligation = foir_per_of_salary - total_obligation;
                console.log("salary - obligation\t" + fo_per_sal_sub_obligation);
                let total = (fo_per_sal_sub_obligation / per_lak_emi) * 100000;
                return Math.round(total);
            }

            function current_foir(final_ob_con, net_take_home_salary) {
                let current_foir = (Number(final_ob_con) / Number(net_take_home_salary)) * 100;
                return Math.round(current_foir);
            }

            function proposed_foir(f_ob_con, net_take_home_salary, f_emi) {
                let proposed_foir = ((Number(f_ob_con) + Number(f_emi)) / Number(net_take_home_salary)) * 100;
                return Math.round(proposed_foir);
            }

            function average_income(mon1, mon2, mon3) {
                let total = Number(mon1) + Number(mon2) + Number(mon3);
                let average = total / 3;
                return average;
            }

            function loan_ltv(propertyValue, propertyPercentage) {
                let ltvPercentage = (propertyValue * propertyPercentage / 100);
                return Math.round(ltvPercentage);
            }

    //!==============================END SECTION FOR THIS PAGE UTILITY FUNCTIOND ======================!
    });
</script>
@endsection
