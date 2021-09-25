@extends('layouts.FronendMaster')
<style>
    /* @import url('../vendor/bootstrap/css/bootstrap.min.css');
    @import url('../vendor/font-awesome/css/font-awesome.min.css');
    @import url('../css/landy-iconfont.css');
    @import url('../vendor/owl.carousel/assets/owl.carousel.css');
    @import url('../vendor/owl.carousel/assets/owl.theme.default.css');
    @import url('../css/style.default.css');
    @import url('../css/custom.css');
    @import url('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css');
    @import url('https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800');
    @import url('https://unpkg.com/aos@next/dist/aos.css'); */

    .bg {
        background-image: url('{{asset('frontend/img/products/1.png')}}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        width: 100%;
        /* padding-bottom: 30%; */
    }

    .back {
        background-color: #6d70739a;
    }

    input[type="text"],
    [type="number"],
    select.form-control {
        background: transparent;
        border: none;
        border-bottom: 1.5px solid #041e43;
        -webkit-box-shadow: none;
        box-shadow: none;
        border-radius: 5px;
    }

    input[type="text"]:focus,
    select.form-control:focus {
        background: transparent;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    /* .btn-darkblue {
        background-color: #041e43;
        color: #9ea3a7;
    } */
</style>
@section('content')
<section class="bg-light">
    <div class="container pt-lg-3">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center pb-md-4">Personal Loan Eligibility</h2>
                <div class="align-content-center">
                    <div class="text-secondary text-center lead pb-md-3">
                        <b>Please input the following information to get the Personal Loan eligibility
                            instantly</b>
                    </div>
                    <form class="lead">
                        <div class="row justify-content-center">
                            <div class="col-md-7 card has-shadow">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h5 class=""><label for="fullname">Monthly Net Take Home
                                                Salary</label>
                                        </h5>
                                        <input type="number" id="salary" class="form-control bi-alarm"
                                            name="fullname" placeholder="e.g.,10000" required>
                                    </div>
                                    <div class="form-group pt-2">
                                        <h5 class=""><label for="username">Total EMI Obligations per
                                                month</label>
                                        </h5>
                                        <input type="number" id="obligate" name="" class="form-control"
                                            placeholder="e.g.,10000" required />
                                    </div>
                                    <div class="form-group pt-2">
                                        <h5 class=""><label for="username">Credit Card outstanding as
                                                per latest
                                                statement if any</label></h5>
                                        <input type="number" id="card_outstanding" name="" class="form-control"
                                            placeholder="e.g.,100000" required />
                                    </div>
                                    <div class="form-group pt-2">
                                        <h5 class=""><label for="username">Interest payable towards
                                                overdraft
                                                loans
                                                if any</label></h5>
                                        <input type="number" id="interest_overdraft" name="" class="form-control"
                                            placeholder="e.g.,1000" required />
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 card ml-3 has-shadow">
                                <div class="form-group text-center pt-md-5">
                                    <div class="form-group text-center pt-md-5">
                                        <h3 class="text-secondary"><label for="">Personal Loan
                                                Eligibility</label></h3>
                                        <h3 class=""><span id="result">₹ 0.00</span></h3>
                                    </div>

                                    <button type="button" class="btn btn-success p_loan"><b>Check</b></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="pb-md-3 text-center"> EMI Calculator</h3>
                <p class=""><b>Our Personal Loan EMI calculator helps you find out the equated monthly
                        installment (EMI). It is one of the quickest, accurate and hassle-free ways of
                        finding
                        out the amount that you need to repay each month, over a fixed period of time.
                        Calculate, download & save a copy for your reference.</b></p>

                <div class="card">
                    <div class="card-header text-center bg-gray">
                        <h4 class="text-light">EMI Calculator</h4>
                    </div>
                    <div class="card-body">
                        <form name="formval">
                            <div class="row">
                                <div class="col col-md-4">
                                    <div class="form-group">
                                        <h4><label for="name" class="control-label">I Want To Borrow</label>
                                        </h4>
                                        <input type="text" class="form-control" id="idLoanAmount" name="pr_amt"
                                            placeholder="Enter Loan Amount">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h4><label for="name" class="control-label">Tenure</label></h4>
                                        <input type="text" class="form-control" id="idLoanTenure"
                                            placeholder="in years" name="period">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h4><label for="name" class="control-label">Interest Rate %
                                                p.a</label>
                                        </h4>
                                        <input type="text" class="form-control" id="idROI" name="int_rate"
                                            placeholder="Enter Your ROI">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <h5 class="text-center pt-3">Here’s how your repayments might look:</h5>
                        <div class="row pt-3">
                            <div class="col-md-4 m-0 p-0 text-center">
                                <div class="card-header text-center bg-gray text-light">Monthly Repayment</div>
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fa fa-rupee"></i> <span
                                            id="repayment">0.00</span></h4>
                                </div>
                            </div>
                            <div class="col-md-4 p-0 m-0 text-center">
                                <div class="card-header bg-gray text-light">Interest Component</div>
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fa fa-rupee"></i> <span
                                            id="int_comp">0.00</span></h4>
                                </div>
                            </div>
                            <div class="col-md-4 p-0 m-0 text-center">
                                <div class="card-header bg-gray text-light">Total Outflow</div>
                                <div class="card-body">
                                    <h4 class="card-title"><i class="fa fa-rupee"></i> <span
                                            id="outflow">0.00</span></h4>
                                </div>
                            </div>
                        </div>
                        <div class="text-center"><button type="button"
                                class="btn btn-darkblue calc"><b>CALCULATE</b></button>
                            &nbsp;&nbsp;<button type="button" class="btn btn-success"><b>APPLY</b></button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<div id="scrollTop">
    <div class="d-flex align-items-center justify-content-end">
        <i class="fa fa-long-arrow-up"></i>To Top
    </div>
</div>
@endsection
<!--================================= Scripting=================================================== -->
<script>
    AOS.init();
    //=================================
    $(function () {
        $('#header').load('header.html');
        $('#footer').load('footer.html');
    });
    //=================================
    (function ($) {
        'use strict';
        $(window).on('load', function () {
            if ($(".pre-loader").length > 0) {
                $(".pre-loader").fadeOut("slow");
            }
        });
    })(jQuery);
    // ========================
    $(".calc").click(function () {

        var P = document.formval.pr_amt.value;
        var rate = document.formval.int_rate.value;
        var n = document.formval.period.value;
        var r = rate / (12 * 100);
        var prate = (P * r * Math.pow((1 + r), n * 12)) / (Math.pow((1 + r), n * 12) - 1);

        var emi = (Math.ceil(prate * 100) / 100).toFixed(0);
        var outflow = (n * 12) * (emi);
        var int_comp = outflow - P;

        document.getElementById('repayment').innerText = emi;
        document.getElementById('int_comp').innerText = int_comp.toFixed(0);
        document.getElementById('outflow').innerText = outflow.toFixed(0);
    });
</script>
<!--================================= Scripting=================================================== -->
