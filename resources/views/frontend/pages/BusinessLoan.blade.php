@extends('layouts.FronendMaster')
<style>
    .bg {
        background-image: url('{{ asset('frontend/img/products/4.png') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        width: 100%;
        /* padding-bottom: 30%; */
    }

    .back {
        background-color: #9a4437b0;
    }

</style>
@section('content')
    <div class="bg">
        <div class="container pt-5 pb-5">
            <div class="row pt-5">
                <div class="col-md-6 col-sm-12">
                    <div class="rounded rounded p-3 back">
                        <h1 class="pt-3 text-center text-light">Business Loan</h1>
                        <h4 class="pt-3 text-center text-light">
                            Innovative financing designed for your business
                        </h4>
                        <p class="lead pt-3 text-center text-light">
                            Save your time & money, Talk to your Loan Assistant for the
                            custom-fit Business Loan
                        </p>
                    </div>
                    <div class="pt-5 pb-5 text-center text-sm-center ">
                        @if (!session('customer'))
                            <a href="{{ route('signup.index') }}" class="btn btn-success btn-sm"><strong>APPLY</strong></a>
                            <a href="{{ route('signup.index') }}"
                                class="btn btn-darkblue ml-lg-3 mr-lg-3 btn-sm"><strong>REFER</strong></a>
                            <a href="{{ route('signup.index') }}"
                                class="btn btn-darkblue btn-sm"><strong>SHARE</strong></a>
                        @else
                            <a href="{{ route('quickEnquieryForm.index') }}"
                                class="btn btn-success btn-sm"><strong>APPLY</strong></a>
                            <a href="{{ route('home') }}"
                                class="btn btn-darkblue ml-lg-3 mr-lg-3 btn-sm"><strong>REFER</strong></a>
                            <a href="{{ route('quickEnquieryForm.store', session('customer')->id) }}"
                                class="btn btn-darkblue btn-sm">
                                <strong>SHARE</strong>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="">
    <div class=" container">
        <h3 class="text-center">Over View</h3>
        <ul class="text-justify rounded card list-unstyled has-shadow">
            <div class="card-body text-justify">
                <li>
                    Any Business need funds from time to time to manage the
                    operations. A substantial working capital is required to ensure
                    smooth operation of business activities and boost profitability.
                </li>
                <hr />
                <li>
                    Business loan eligibility criteria typically depends upon age
                    limit, income, business health, CIBIL score, balance sheet, and
                    more. Lenders define the conditions to evaluate the customer's
                    creditworthiness for availing and repaying the loan amount on
                    time.
                </li>
                <hr />
                <li>
                    The minimum and maximum business loan amounts depend on your
                    business returns and eligibility. We can help our members to avail
                    a maximum business loan amount up to Rs 75 lakhs.
                </li>
            </div>
        </ul>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <h3 class="text-center pb-lg-4">Types of Business Loans</h3>
            <div class="text-justify">
                <h5 class="font-weight-bold">Financials :</h5>
                <p>
                    Business Loan eligibility is calculated purely based on the Turnover
                    & Net profit declared in the last 2 years Financials. The expected
                    requirements are the Business vintage to be minimum 3 years to 5
                    years, Valid Business licence, Self-owned / family-owned residence,
                    a current account and GST filed returns.
                </p>
                <hr />
                <h5 class="font-weight-bold">GSTR :</h5>
                <p>
                    Business Loan eligibility is calculated based on the Average Balance
                    of last 3 to 6 months. In this product we do not need the company
                    financials or GSTR documents The expected requirements are same as
                    above like the Business vintage to be minimum 3 years to 5 years,
                    Valid Business licence, Self-owned / family-owned residence.
                </p>
                <hr />
                <h5 class="font-weight-bold">Average Bank Balance :</h5>
                <p>
                    Credit Card transfer loan is about transferring the outstanding
                    principal of a Credit Card or multiple Credit Cards as a Personal
                    Loan. This would definitely give a value addition in terms of
                    interest outflow as the Personal Loan interest rates are very much
                    cheaper than Credit Card rate of interest.
                </p>
                <hr />
                <h5 class="font-weight-bold">ROI :</h5>
                <p>
                    Business loan interest rates start at 16% However, depending on loan
                    eligibility, income, your business and other criteria, we determine
                    the best interest rates for your business loan requirement. When you
                    apply for a Business Loan with Loanstories.com, you do not have to
                    worry about any hidden charges. Whether it is related to processing
                    fees, foreclosure charges, or delayed EMI Payments, all information
                    is transparently-provided for smooth processing of your Business.
                    <br />Credit Card transfer loan is about transferring the
                    outstanding principal of a Credit Card or multiple Credit Cards as a
                    Personal Loan. This would definitely give a value addition in terms
                    of interest outflow as the Personal Loan interest rates are very
                    much cheaper than Credit Card rate of interest.
                </p>
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="container">
            <h3 class="text-center pb-lg-4">
                Business Loan Eligibility For Self - Employed
            </h3>
            <div class="text-justify">
                <h5 class="font-weight-bold">Eligibility :</h5>
                <ul class="text-justify rounded card list-unstyled has-shadow">
                    <div class="card-body text-justify">
                        <li>Your age should be between 25-65 yrs</li>
                        <hr />
                        <li>
                            Your business must be profitable for three consequent finanacial
                            years
                        </li>
                        <hr />
                        <li>Your turnover must show an upward trend</li>
                        <hr />
                        <li>
                            Your balance sheet should be audited by a registered chartered
                            accountant
                        </li>
                    </div>
                </ul>
            </div>
        </div>
    </section>
    <section class="bg-light">
        <div class="container">
            <h3 class="text-center pb-lg-4">
                Documents Required For Business Loans
            </h3>
            <ul class="contact-info list-unstyled text-justify row">
                <div class="col-md-6">
                    <li>
                        <h5 class="font-weight-bold"><i class="bi bi-person-badge"
                                style="font-size: 35px; color: midnightblue"></i>&nbsp;&nbsp;Photo Identity Proof</h5>
                        A duty filled business loan application with passport size
                        photographs affixed, and a copy of your driving licenses /
                        Passport / Aadhar card / Voter Id.
                    </li>
                    <br>
                    <li>

                        <h5 class="font-weight-bold"><i class="bi bi-file-earmark-medical"
                                style="font-size: 35px; color: midnightblue"></i>&nbsp;&nbsp;Business Proof</h5>
                        A copy of your ownership papers, Establishment / Trade License /
                        Sales Tax Certificate, and a certified copy of Partnership Deed
                        Agreement or Sale Proprietorship declaration.
                    </li>
                    <br>
                    <li>
                        <h5 class="font-weight-bold"><i class="bi bi-file-earmark-post"
                                style="font-size: 35px; color: midnightblue"></i>&nbsp;&nbsp;Income Proof</h5>
                        ITRs and computation for the last two years. balance sheet
                        (audited by a registered CA), and P/L Profit / Loss statement for
                        the past two years.
                    </li>
                    <br>
                </div>
                <div class="col-md-6">
                    <li>
                        <h5 class="font-weight-bold"><i class="bi bi-file-richtext"
                                style="font-size: 35px; color: midnightblue"></i>&nbsp;&nbsp;Bank Statements</h5>
                        A copy of company's certified bank statements for the past six
                        months.
                    </li>
                    <br>
                    <br>
                    <li>
                        <h5 class="font-weight-bold"><i class="bi bi-file-earmark-ruled"
                                style="font-size: 35px; color: midnightblue"></i>&nbsp;&nbsp;KYC Documents</h5>
                        A copy of your PAN Card, Registration of Incorporation, and
                        Memorandum & Articles of Association documents.
                    </li>
                    <br>
                    <hr>
                    <li class="text-center">
                        <h6 class="pt-3 pb-3" data-aos="zoom-out-left" data-aos-duration="1000">
                            <b>CHECK FEES AND CHARGES > </b>
                        </h6>
                        <a href="" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>APPLY NOW</b></a>
                    </li>


                </div>
            </ul>
        </div>
    </section>

    <section>
        <div class="container">
            <p class="text-center pb-lg-4">
                <b>Our Business Loan EMI calculator helps you find out the equated
                    monthly installment (EMI). <br />
                    It is one of the quickest, accurate and hassle-free ways of finding
                    out the amount that you need to repay each month, over a fixed
                    period of time. Calculate, download & save a copy for your
                    reference.</b>
            </p>

            <div class="card">
                <div class="card-header bg-gray">
                    <h4 class="text-center text-white">EMI Calculator</h4>
                </div>
                <div class="card-body">
                    <form name="formval">
                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <h4>
                                        <label for="name" class="control-label">I Want To Borrow</label>
                                    </h4>
                                    <input type="text" class="form-control" id="idLoanAmount" name="pr_amt"
                                        placeholder="Enter Loan Amount" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4>
                                        <label for="name" class="control-label">Tenure</label>
                                    </h4>
                                    <input type="text" class="form-control" id="idLoanTenure" placeholder="(in years)"
                                        name="period" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <h4>
                                        <label for="name" class="control-label">Interest Rate % p.a</label>
                                    </h4>
                                    <input type="text" class="form-control" id="idROI" name="int_rate"
                                        placeholder="Enter Your ROI" />
                                </div>
                            </div>
                        </div>
                    </form>
                    <h5 class="text-center pt-3">
                        Here’s how your repayments might look:
                    </h5>
                    <div class="row pt-3">
                        <div class="col-md-4 m-0 p-0 text-center">
                            <div class="card-header text-center bg-gray text-light">
                                Monthly Repayment
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fa fa-rupee"></i> <span id="repayment">0.00</span>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 p-0 m-0 text-center">
                            <div class="card-header bg-gray text-light">
                                Interest Component
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fa fa-rupee"></i> <span id="int_comp">0.00</span>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 p-0 m-0 text-center">
                            <div class="card-header bg-gray text-light">Total Outflow</div>
                            <div class="card-body">
                                <h4 class="card-title">
                                    <i class="fa fa-rupee"></i> <span id="outflow">0.00</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="text-center text-sm-center">
                        <button type="button" class="btn btn-darkblue btn-sm" onclick="calc()">
                            <b>CALCULATE</b>
                        </button>
                        &nbsp;&nbsp;@if (!session('customer'))
                            <a href="{{ route('signup.index') }}" class="btn btn-success btn-sm"><b>Apply Now</b></a>
                        @else
                            <a href="{{ route('quickEnquieryForm.index') }}" class="btn btn-success btn-sm"><b>Apply
                                    Now</b></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!--================================= Scripting=================================================== -->
<script type="text/javascript">
    // ============================
    function calc() {
        var P = document.formval.pr_amt.value;
        var rate = document.formval.int_rate.value;
        var n = document.formval.period.value;
        var r = rate / (12 * 100);
        var prate = (P * r * Math.pow(1 + r, n * 12)) / (Math.pow(1 + r, n * 12) - 1);

        var emi = (Math.ceil(prate * 100) / 100).toFixed(2);
        var outflow = n * 12 * emi;
        var int_comp = outflow - emi;

        document.getElementById("repayment").innerText = isNaN(emi) ? '0.00' : emi;
        document.getElementById("int_comp").innerText = isNaN(int_comp) ? '0.00' : int_comp;
        document.getElementById("outflow").innerText = isNaN(outflow) ? '0.00' : outflow;
    };
</script>
<!--================================= Scripting=================================================== -->
