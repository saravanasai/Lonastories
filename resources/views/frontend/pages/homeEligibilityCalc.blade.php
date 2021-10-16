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
        background-color: #282b2c;
    }

</style>
@section('content')
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center pb-lg-4">Home Loan eligibility</h2>
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
                            <h3 class=" text-center"><strong>EMI Eligibility Calculator for Homeloans</strong></h3>
                            <form class="lead">
                                <div class="row justify-content-center pt-md-3">
                                    <div class="col-md-7 card">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <h5><label for="fullname">Monthly Income:</label>
                                                </h5>
                                                <input type="number" id="salary" class="form-control"
                                                    placeholder="How much amount ?" required
                                                    oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                            </div>
                                            <div class="form-group">
                                                <h5><label for="username">Other EMI’s (Existing) </label>
                                                </h5>
                                                <input type="number" name="apr" id="other_emi" class="form-control"
                                                    placeholder="" required
                                                    oninput="this.value = this.value.replace(/[^0-9]/, '')">
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
                                                            placeholder="Property Amount" required class="form-control"
                                                            oninput="this.value = this.value.replace(/[^0-9]/, '')">
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
                            <span class="text-dark text-justify"><b>Note :</b> These calculators are provided only as
                                general self-help
                                planning tools with the information of income and obligations provided. Results depend on
                                many factors
                                like cibil reports, verification reports, internal scoring etc. you may also get a higher
                                eligibility if
                                planned for a loan transfer or loan consolidation when your existing obligations are high.
                                Talk to our
                                Loan Assistant to get your exact eligibility in a Video / Audio Call.</span>
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
                                                placeholder="Enter Loan Amount">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <h4><label for="name" class="control-label">Tenure</label></h4>
                                            <input type="text" class="form-control" id="idLoanTenure"
                                                placeholder="(in years)" name="period">
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
                            <div class="text-center">
                                <button type="button" class="btn btn-darkblue" onclick="calc()"><b>CALCULATE</b></button>
                                <button type="button" class="btn btn-success"><b>APPLY</b></button>
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
