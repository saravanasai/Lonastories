@extends('layouts.FronendMaster')
<style>
    .bg {
        background-image: url('{{ asset('frontend/img/products/2.png') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        width: 100%;
        /* padding-bottom: 30%; */
    }

    .back {
        background-color: #3f2955;
    }

</style>
@section('content')
    <div class="bg">
        <div class="container pt-5 pb-5">
            <div class="row pt-5">
                <div class="col-md-6">
                    <div class="rounded rounded p-3 back">
                        <h1 class="pt-3 text-center text-light">Home Loan</h1>
                        <h4 class="pt-3 text-center text-light">Your financial planning for a Home Loan ends here
                        </h4>
                        <p class="lead pt-3 text-center text-light">
                            Be it a New Loan or a Transfer, we make it as simple as possible.
                        </p>
                    </div>

                    <div class="pt-5 pb-5 text-center text-sm-center">
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
                                <a  data-toggle="modal" data-target="#shareNow"
                                class="btn btn-secondary btn-sm">
                                <strong>SHARE</strong>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pb-lg-4">Over View</h3>
                    <ul class="text-justify card rounded list-unstyled has-shadow">
                        <div class="card-body">
                            <li>Loanstories.com is your one stop solution for owning your home & we are here to
                                help
                                you build your dream nest. Whether you want to purchase a house or construct a
                                new
                                one, we offer a wide range of products well suited to meet your housing loan
                                requirement. </li>
                            <hr>
                            <li>We assist for affordable home loans at attractive rate of interest rates for
                                tenure
                                up to 30 years. It becomes easy for any housing loan borrower to go one step
                                closer
                                towards his/her dream home, without bearing a humungous expense at one go! </li>
                            <hr>
                            <li>The loan is usually paid back in equated monthly instalments and the amount
                                payable
                                per EMI usually depends on the tenure of the loan, the interest rate, the amount
                                of
                                the loan etc.</li>
                            <hr>
                            <li>Further, before you apply for Home Loans you can check your loan eligibility
                                with
                                our ‘Home Loan Eligibility Calculator” and also calculate your monthly EMI with
                                our
                                ‘EMI Calculator’.
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pb-lg-4">Home Loan eligibility calculator</h3>
                    <div class="container register-form">
                        <div class="form align-content-center rounded">
                            <div class="text-justify">
                                <p class="">Your dream home is now within your reach with Loanstories.com We
                                    assist higher loan amount on your income and the loan eligibility can be
                                    further enhanced by including income of the co-applicant(s).</p>
                                <p class="">Home Loan eligibility of the salaried customer is calculated
                                    based on the current age, type of company employed in, age of retirement.
                                    The eligibility depends on various factors, such as monthly income, current
                                    age, profile of the customer, monthly obligations, credit history,
                                    retirement age, etc.</p>
                            </div>
                            <hr>
                            <h3 class="     text-center"><b>EMI Eligibility Calculator for Homeloans</b>
                            </h3>
                            <form class="lead">
                                <div class="row justify-content-center pt-md-3">
                                    <div class="col-md-7 card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <h5><label for="fullname">Monthly Income:</label>
                                                </h5>
                                                <input type="number" id="salary" class="form-control"
                                                    placeholder="How much amount ?" required>
                                            </div>
                                            <div class="form-group">
                                                <h5><label for="username">Other EMI’s (Existing) </label>
                                                </h5>
                                                <input type="number" name="apr" id="other_emi" class="form-control"
                                                    placeholder="" required>
                                            </div>

                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <h5><label for="username">Preferred Tenure: </label></h5>
                                                        <select name="" id="tenure" class="form-control">
                                                            <option value="" hidden>Select Years</option>
                                                            <option value="5">5 years</option>
                                                            <option value="10">10 years</option>
                                                            <option value="15">15 years</option>
                                                            <option value="20">20 years</option>
                                                            <option value="25">25 years</option>
                                                            <option value="30">30 years</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <h5><label for="">Property Value :</label></h5>
                                                        <input type="number" id="propVal" name="apr"
                                                            placeholder="Property Amount" required class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pt-md-5 card ml-3">
                                        <div class="form-group text-center pt-md-5">
                                            <div class="form-group text-center">
                                                <h3><label for="">EMI Eligibility</label></h3>
                                                <h4>Income eligibility : ₹ <span id="income"> 0.00</span></h4>

                                                <h4>Property eligibility : ₹ <span id="property"> 0.00</span>
                                                </h4>
                                            </div>
                                            <button type="button" onclick="h_loan()"
                                                class="btn btn-success">Calculate</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="pt-5">
                            <span class="text-dark text-justify"><b>Note :</b> These calculators are provided only as general
                                self-help planning tools with the information of income and obligations provided. Results
                                depend on many factors like cibil reports, verification reports, internal scoring etc. you
                                may also get a higher eligibility if planned for a loan transfer or loan consolidation when
                                your existing obligations are high. Talk to our Loan Assistant to get your exact eligibility
                                in a Video / Audio Call.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center pb-lg-3">Calculate your Home Loan EMI instantly!</h4>
                    <p class="text-center">The process of availing for a home loan comes with common
                        questions like what
                        would be my EMI.A home loan EMI calculator is the simplest tool to understand what
                        is your EMI.</p>
                    <div class="card">
                        <div class="card-header bg-gray">
                            <h4 class="text-center text-light">EMI Calculator</h4>
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
                                                placeholder="(in years)" name="period"
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
                            <h5 class="text-center pt-3">Here’s how your repayments might look:</h5>
                            <div class="row pt-3">
                                <div class="col-md-4 m-0 p-0 text-center">
                                    <div class="card-header text-center bg-gray text-light">Monthly Repayment
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><i class="fa fa-rupee"></i> <span
                                                id="repayment">0.00</span>
                                        </h4>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0 m-0 text-center">
                                    <div class="card-header bg-gray text-light">Interest Component</div>
                                    <div class="card-body">
                                        <h4 class="card-title"><span id="int_comp">0.00</span></h4>
                                    </div>
                                </div>
                                <div class="col-md-4 p-0 m-0 text-center">
                                    <div class="card-header bg-gray text-light">Total Outflow</div>
                                    <div class="card-body">
                                        <h4 class="card-title"><span id="outflow">0.00</span></h4>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-sm-center">
                                <button type="button" onclick="calc()"
                                    class="btn btn-darkblue btn-sm"><b>CALCULATE</b></button>
                                @if (!session('customer'))
                                    <a href="{{ route('signup.index') }}" class="btn btn-success btn-sm"><b>Apply
                                            Now</b></a>
                                @else
                                    <a href="{{ route('quickEnquieryForm.index') }}"
                                        class="btn btn-success btn-sm"><b>Apply
                                            Now</b></a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <p class="text-center pt-lg-4">Remember, the longer the tenure is, the lesser would be the
                        EMI. Similarly,
                        if you choose a shorter tenure it helps to reduce the total interest outflow but
                        you
                        will have to pay considerably a larger EMI.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
