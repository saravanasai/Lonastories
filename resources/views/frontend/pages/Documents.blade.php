@extends('layouts.FronendMaster')
<style>
    .tab-content>.active {
        display: block;
        min-height: 165px;
    }

    .nav-tabs .nav-link.active {
        color: #9fa4a7;
        background-color: #272727 !important;
        border-color: transparent !important;
    }

    .nav.nav-tabs {
        float: left;
        display: block;
        margin-right: 20px;
        border-bottom: 0;
        border-right: 2px solid transparent;
        padding-right: 15px;
    }

    section {
        padding: 20px 0;
        overflow: hidden;
    }
    .bg-black{
        background-color: #272727 !important;
    }
    </style>
@section('content')
<img src="{{asset('frontend/img/lod.png')}}" alt="" style="width: 100%;">
<div class="bg-light pb-lg-5">
    <h2 class="text-center bg-black p-lg-3 text-light">PERSONAL LOAN</h2>
    <div class="container">
        <h3 class="text-center pt-lg-4">Normal</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="a" role="tabpanel">
                            <ul class="" style="margin-left: 33.3%">
                                <li>Passport Size Photo</li>
                                <li>Pan Card</li>
                                <li>Aadhaar Card</li>
                                <li>Current Residence Address Proof</li>
                                <li>Latest 3 Payslips</li>
                                <li>Latest 6 months Bank Statement</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted
                    at the time of Loan Disbursement. Further documents may be requested
                    during the process basis the credit, legal & technical reports</p>
            </div>
        </div>

        <hr>
        <h3 class="text-center">Multiple Loan Consolidation</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body" Multiple Loan Consolidation>
                    <div class="tab-content">
                        <div class="tab-pane active" id="aa" role="tabpanel">
                            <ul class="" class="" style="margin-left: 33.3%">
                                <li>Passport Size Photo</li>
                                <li>Pan Card</li>
                                <li>Aadhaar Card</li>
                                <li>Current Residence Address Proof</li>
                                <li>Latest 3 Payslips</li>
                                <li>Latest 6 months Bank Statement</li>
                                <li>Latest Credit Card Statements of all cards to be transferred</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted
                    at the time of Loan Disbursement. Further documents may be requested
                    during the process basis the credit, legal & technical reports</p>
            </div>
        </div>
        <hr>
        <h3 class="text-center">Credit Card Transfer</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body" Multiple Loan Consolidation>
                    <div class="tab-content">
                        <div class="tab-pane active" id="aa" role="tabpanel">
                            <ul class="" class="" style="margin-left: 33.3%">
                                <li>Passport Size Photo</li>
                                <li>Pan Card</li>
                                <li>Aadhaar Card</li>
                                <li>Current Residence Address Proof</li>
                                <li>Latest 3 Payslips</li>
                                <li>Latest 6 months Bank Statement</li>
                                <li>Latest Credit Card Statements of all cards to be transferred</li>
                                <li>Repayment Schedule of all loan / loans to be transferred</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted
                    at the time of Loan Disbursement. Further documents may be requested
                    during the process basis the credit, legal & technical reports</p>
            </div>
        </div>
        <hr>
        <h3 class="text-center">Balance Transfer</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body" Multiple Loan Consolidation>
                    <div class="tab-content">
                        <div class="tab-pane active" id="aa" role="tabpanel">
                            <ul class="" class="" style="margin-left: 33.3%">
                                <li>Passport Size Photo</li>
                                <li>Pan Card</li>
                                <li>Aadhaar Card</li>
                                <li>Current Residence Address Proof</li>
                                <li>Latest 3 Payslips</li>
                                <li>Latest 6 months Bank Statement</li>
                                <li>Repayment Schedule of all loan / loans to be transferred</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted
                    at the time of Loan Disbursement. Further documents may be requested
                    during the process basis the credit, legal & technical reports</p>
            </div>
        </div>
    </div>
</div>

<div class="pb-lg-5">
<h2 class="text-center bg-black p-lg-3 text-light">HOME LOAN</h2>
    <div class="container">
        <h3 class="text-center pt-lg-4">Home Loan - Balance Transfer (Self-Employed)</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs text-center col-sm-6" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#a" role="tab"
                                aria-controls="home"><b>KYC
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#b" role="tab"
                                aria-controls="profile"><b>INCOME
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#c" role="tab"
                                aria-controls="messages"><b>EXISTING LOAN
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#d" role="tab"
                                aria-controls="messages"><b>PROPERTY
                                    DOCUMENTS</b></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="a" role="tabpanel">
                            <ul class="">
                                <li>Passport Size Photo of All Applicants</li>
                                <li>Pan Card of All Applicants</li>
                                <li>Aadhaar Card of All Applicants</li>
                                <li>Current Residence Address Proof of All Applicants</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="b" role="tabpanel">
                            <ul class="">
                                <li>Latest 3 Years ITR & Complete Financials of all Applicants</li>
                                <li>Latest 3 Years ITR & Complete Financials of the Entity</li>
                                <li>Latest 1 Year Bank Statement</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="c" role="tabpanel">
                            <ul class="">
                                <li>Sanction Letter</li>
                                <li>Sanction Letter</li>
                                <li>Sanction Letter</li>
                                <li>List Of Documents Letter</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="d" role="tabpanel">
                            <ul class="">
                                <li>Sale Deed / Mother Deed</li>
                                <li>Katha / Patta Papers</li>
                                <li>Encumbrance Certificate</li>
                                <li>Property Tax Paid Receipt</li>
                                <li>Plan Copy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted
                    at the time of Loan Disbursement. Further documents may be requested
                    during the process basis the credit, legal & technical reports</p>
            </div>
        </div>

        <hr>

        <h3 class="text-center">Home Loan - Balance Transfer (Salaried)</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs text-center col-sm-6" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#aa" role="tab"
                                aria-controls="home"><b>KYC
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#bb" role="tab"
                                aria-controls="profile"><b>INCOME
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cc" role="tab"
                                aria-controls="messages"><b>EXISTING LOAN
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dd" role="tab"
                                aria-controls="messages"><b>PROPERTY
                                    DOCUMENTS</b></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="aa" role="tabpanel">
                            <ul class="">
                                <li>Passport Size Photo of All Applicants</li>
                                <li>Pan Card of All Applicants</li>
                                <li>Aadhaar Card of All Applicants</li>
                                <li>Current Residence Address Proof of All Applicants</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="bb" role="tabpanel">
                            <ul class="">
                                <li>Latest 3 Months Pay Slips</li>
                                <li>Latest 6 Months Bank Statement</li>
                                <li>Latest 2 Years Form 16</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="cc" role="tabpanel">
                            <ul class="">
                                <li>Sanction Letter</li>
                                <li>Statement Of Accounts</li>
                                <li>Foreclosure Letter</li>
                                <li>List Of Documents Letter</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="dd" role="tabpanel">
                            <ul class="">
                                <li>Sale Deed / Mother Deed</li>
                                <li>Katha / Patta Papers</li>
                                <li>Encumbrance Certificate</li>
                                <li>Property Tax Paid Receipt</li>
                                <li>Plan Copy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted
                    at the time of Loan Disbursement. Further documents may be requested
                    during the process basis the credit, legal & technical reports</p>
            </div>
        </div>

        <hr>
        <h3 class="text-center pt-lg-4">Home Loan - Purchase (Self-Emp)</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs text-center col-sm-6" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#a2" role="tab"
                                aria-controls="home"><b>KYC
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#b2" role="tab"
                                aria-controls="profile"><b>INCOME
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#c2" role="tab"
                                aria-controls="messages"><b>PROPERTY
                                    DOCUMENTS</b></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="a2" role="tabpanel">
                            <ul class="">
                                <li>Passport Size Photo of All Applicants</li>
                                <li>Pan Card of All Applicants</li>
                                <li>Aadhaar Card of All Applicants</li>
                                <li>Current Residence Address Proof of All Applicants</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="b2" role="tabpanel">
                            <ul class="">
                                <li>Latest 3 Years ITR & Complete Financials of all Applicants</li>
                                <li>Latest 3 Years ITR & Complete Financials of the Entity</li>
                                <li>Latest 1 Year Bank Statement</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="c2" role="tabpanel">
                            <ul class="">
                                <li>Agreement for Sale / Agreement for Construction</li>
                                <li>Sale Deed / Title Deed</li>
                                <li>Margin Money paid receipt if any</li>
                                <li>Katha / Patta Papers</li>
                                <li>Encumbrance Certificate</li>
                                <li>Property Tax Paid Receipt</li>
                                <li>Plan Copy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submittedat the time
                    of Loan
                    Disbursement. Further documents may be requestedduring the process basis the credit,
                    legal &
                    technical reports</p>
            </div>
        </div>
        <hr>
        <h3 class="text-center pt-lg-4">Home Loan - Purchase (Salaried)</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs text-center col-sm-6" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#a3" role="tab"
                                aria-controls="home"><b>KYC
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#b3" role="tab"
                                aria-controls="profile"><b>INCOME
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#c3" role="tab"
                                aria-controls="messages"><b>PROPERTY
                                    DOCUMENTS</b></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="a3" role="tabpanel">
                            <ul class="">
                                <li>Passport Size Photo of All Applicants</li>
                                <li>Pan Card of All Applicants</li>
                                <li>Aadhaar Card of All Applicants</li>
                                <li>Current Residence Address Proof of All Applicants</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="b3" role="tabpanel">
                            <ul class="">
                                <li>Latest 3 Years ITR & Complete Financials of all Applicants</li>
                                <li>Latest 3 Years ITR & Complete Financials of the Entity</li>
                                <li>Latest 1 Year Bank Statement</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="c3" role="tabpanel">
                            <ul class="">
                                <li>Agreement for Sale / Agreement for Construction</li>
                                <li>Sale Deed & Title deed if its a Resale property</li>
                                <li>Copy of Allotment & Cost Break Up Letter</li>
                                <li>Margin Money paid receipt if any</li>
                                <li>Katha / Patta Papers</li>
                                <li>Encumbrance Certificate</li>
                                <li>Property Tax Paid Receipt</li>
                                <li>Plan Copy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submittedat the time
                    of Loan
                    Disbursement. Further documents may be requestedduring the process basis the credit,
                    legal &
                    technical reports</p>
            </div>
        </div>
    </div>
</div>

<div class="pb-lg-2">
    <h2 class="text-center bg-black text-light p-lg-3">MORTAGES</h2>
    <div class="container">
        <h3 class="text-center pt-lg-4">Mortgage Loan - New Loan (Self-Emp)</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs text-center col-sm-6" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#a1" role="tab"
                                aria-controls="home"><b>KYC
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#b1" role="tab"
                                aria-controls="profile"><b>INCOME
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#c1" role="tab"
                                aria-controls="messages"><b>PROPERTY
                                    DOCUMENTS</b></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="a1" role="tabpanel">
                            <ul class="">
                                <li>Passport Size Photo of All Applicants</li>
                                <li>Pan Card of All Applicants</li>
                                <li>Aadhaar Card of All Applicants</li>
                                <li>Current Residence Address Proof of All Applicants</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="b1" role="tabpanel">
                            <ul class="">
                                <li>Latest 3 Years ITR & Complete Financials of all Applicants</li>
                                <li>Latest 3 Years ITR & Complete Financials of the Entity</li>
                                <li>Latest 1 Year Bank Statement</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="c1" role="tabpanel">
                            <ul class="">
                                <li>Agreement for Sale / Agreement for Construction</li>
                                <li>Sale Deed / Title Deed</li>
                                <li>Margin Money paid receipt if any</li>
                                <li>Katha / Patta Papers</li>
                                <li>Encumbrance Certificate</li>
                                <li>Property Tax Paid Receipt</li>
                                <li>Plan Copy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted
                    at the time of Loan Disbursement. Further documents may be requested
                    during the process basis the credit, legal & technical reports</p>
            </div>
        </div>
        <hr>
        <h3 class="text-center">Mortgage Loan - Balance Transfer (Self-Emp)</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs text-center col-sm-6" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#aa1" role="tab"
                                aria-controls="home"><b>KYC
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#bb1" role="tab"
                                aria-controls="profile"><b>INCOME
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cc1" role="tab"
                                aria-controls="messages"><b>EXISTING LOAN
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dd1" role="tab"
                                aria-controls="messages"><b>PROPERTY
                                    DOCUMENTS</b></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="aa1" role="tabpanel">
                            <ul class="">
                                <li>Passport Size Photo of All Applicants</li>
                                <li>Pan Card of All Applicants</li>
                                <li>Aadhaar Card of All Applicants</li>
                                <li>Current Residence Address Proof of All Applicants</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="bb1" role="tabpanel">
                            <ul class="">
                                <li>Latest 3 Months Pay Slips</li>
                                <li>Latest 6 Months Bank Statement</li>
                                <li>Latest 2 Years Form 16</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="cc1" role="tabpanel">
                            <ul class="">
                                <li>Sanction Letter</li>
                                <li>Statement Of Accounts</li>
                                <li>Foreclosure Letter</li>
                                <li>List Of Documents Letter</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="dd1" role="tabpanel">
                            <ul class="">
                                <li>Sale Deed / Mother Deed</li>
                                <li>Katha / Patta Papers</li>
                                <li>Encumbrance Certificate</li>
                                <li>Property Tax Paid Receipt</li>
                                <li>Plan Copy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted at the time
                    of Loan
                    Disbursement. Further documents may be requestedduring the process basis the credit,
                    legal &
                    technical reports</p>
            </div>
        </div>
        <hr>
        <h3 class="text-center pt-lg-4">Mortgage Loan - New Loan (Salaried)</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs text-center col-sm-6" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#a3" role="tab"
                                aria-controls="home"><b>KYC
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#b3" role="tab"
                                aria-controls="profile"><b>INCOME
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#c3" role="tab"
                                aria-controls="messages"><b>PROPERTY
                                    DOCUMENTS</b></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="a3" role="tabpanel">
                            <ul class="">
                                <li>Passport Size Photo of All Applicants</li>
                                <li>Pan Card of All Applicants</li>
                                <li>Aadhaar Card of All Applicants</li>
                                <li>Current Residence Address Proof of All Applicants</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="b3" role="tabpanel">
                            <ul class="">
                                <li>Latest 3 Years ITR & Complete Financials of all Applicants</li>
                                <li>Latest 3 Years ITR & Complete Financials of the Entity</li>
                                <li>Latest 1 Year Bank Statement</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="c3" role="tabpanel">
                            <ul class="">
                                <li>Agreement for Sale / Agreement for Construction</li>
                                <li>Sale Deed / Title Deed</li>
                                <li>Margin Money paid receipt if any</li>
                                <li>Katha / Patta Papers</li>
                                <li>Encumbrance Certificate</li>
                                <li>Property Tax Paid Receipt</li>
                                <li>Plan Copy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submittedat the time
                    of Loan
                    Disbursement. Further documents may be requestedduring the process basis the credit,
                    legal &
                    technical reports</p>
            </div>
        </div>
        <hr>
        <h3 class="text-center">Mortgage Loan - Balance Transfer (Salaried)</h3>
        <div class="container pt-lg-4">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs text-center col-sm-6" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#aa2" role="tab"
                                aria-controls="home"><b>KYC
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#bb2" role="tab"
                                aria-controls="profile"><b>INCOME
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#cc2" role="tab"
                                aria-controls="messages"><b>EXISTING LOAN
                                    DOCUMENTS</b></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#dd2" role="tab"
                                aria-controls="messages"><b>PROPERTY
                                    DOCUMENTS</b></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="aa2" role="tabpanel">
                            <ul class="">
                                <li>Passport Size Photo of All Applicants</li>
                                <li>Pan Card of All Applicants</li>
                                <li>Aadhaar Card of All Applicants</li>
                                <li>Current Residence Address Proof of All Applicants</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="bb2" role="tabpanel">
                            <ul class="">
                                <li>Latest 3 Months Pay Slips</li>
                                <li>Latest 6 Months Bank Statement</li>
                                <li>Latest 2 Years Form 16</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="cc2" role="tabpanel">
                            <ul class="">
                                <li>Sanction Letter</li>
                                <li>Statement Of Accounts</li>
                                <li>Foreclosure Letter</li>
                                <li>List Of Documents Letter</li>
                            </ul>
                        </div>
                        <div class="tab-pane" id="dd2" role="tabpanel">
                            <ul class="">
                                <li>Sale Deed / Mother Deed</li>
                                <li>Katha / Patta Papers</li>
                                <li>Encumbrance Certificate</li>
                                <li>Property Tax Paid Receipt</li>
                                <li>Plan Copy</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-3">
                <p><b>Note :</b> Foreclosure Letter & List Of Documents Letter can be submitted at the time
                    of Loan
                    Disbursement. Further documents may be requestedduring the process basis the credit,
                    legal &
                    technical reports</p>
            </div>
        </div>
    </div>
</div>
@endsection
<style>
    .hr {
        border-top: 1px solid rgba(172, 171, 171, 0.993);
    }
</style>
