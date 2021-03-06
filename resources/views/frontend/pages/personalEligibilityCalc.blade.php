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
        background-image: url('{{ asset('frontend/img/products/1.png') }}');
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
                                            <h5 class=""><label for=" fullname">Monthly Net Take Home
                                                    Salary</label>
                                            </h5>
                                            <input type="number" id="salary" class="form-control bi-alarm" name="fullname"
                                                placeholder="e.g.,10000" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                        </div>
                                        <div class="form-group pt-2">
                                            <h5 class=""><label for=" username">Total EMI Obligations per
                                                    month</label>
                                            </h5>
                                            <input type="number" id="obligate" name="" class="form-control"
                                                placeholder="e.g.,10000" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" />
                                        </div>
                                        <div class="form-group pt-2">
                                            <h5 class=""><label for=" username">Credit Card outstanding as
                                                    per latest
                                                    statement if any</label></h5>
                                            <input type="number" id="card_outstanding" name="" class="form-control"
                                                placeholder="e.g.,100000" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" />
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col">
                                                <div class="float-right">
                                                    <button type="button" class="btn btn-success"
                                                    onclick="eligibleCalc()"><b>Check</b></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 card md-ml-3 has-shadow">
                                    <div class="form-group text-center pt-md-5">
                                        <div class="form-group text-center pt-md-5">
                                            <h3 class="text-secondary"><label for="">Personal Loan
                                                    Eligibility</label></h3>
                                            <h3 class=""><span id="result">??? 0.00</span></h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-xs-12 col-sm-12 mt-2 xs-mt-2">
                                                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-darkblue"
                                            ><b>Apply</b></a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="pt-5">
                <span class="text-dark text-justify"><b>Note :</b> These calculators are provided only as general self-help
                    planning tools with the information of income and obligations provided. Results depend on many factors
                    like cibil reports, verification reports, internal scoring etc. you may also get a higher eligibility if
                    planned for a loan transfer or loan consolidation when your existing obligations are high. Talk to our
                    Loan Assistant to get your exact eligibility in a Video / Audio Call.</span>
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

                    <div class="
                        card">
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
                                                placeholder="Enter Loan Amount"
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4><label for="name" class="control-label">Tenure</label></h4>
                                            <input type="text" class="form-control" id="idLoanTenure"
                                                placeholder="in years" name="period"
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4><label for="name" class="control-label">Interest Rate %
                                                    p.a</label>
                                            </h4>
                                            <input type="text" class="form-control" id="idROI" name="int_rate"
                                                placeholder="Enter Your ROI" oninput="validateNumber(this);">
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <h5 class="text-center pt-3">Here???s how your repayments might look:</h5>
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
                                                id="outflow">0.00</span>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center"><button type="button" class="btn btn-darkblue"
                                    onclick="calc()"><b>CALCULATE</b></button>
                                &nbsp;&nbsp;<a href="{{route('quickEnquieryForm.index')}}" class="btn btn-success"><b>APPLY</b></a>
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
