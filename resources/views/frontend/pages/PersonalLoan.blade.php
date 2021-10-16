@extends('layouts.FronendMaster')
<style>
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

</style>
@section('content')
    <div class="bg">
        <div class="container pt-5 pb-5">
            <div class="row pt-5">
                <div class="col-md-6">
                    <div class="rounded rounded p-3 back">
                        <h1 class="pt-md-3 text-center text-light">Personal Loan</h1>
                        <h4 class="pt-md-3 text-center text-light">Let’s make all your dreams come true</h4>
                        <p class="lead pt-3 text-center text-light">
                            Avail Personal Loans as per your priority. Apply online & get instant approval
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

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12 ">
                    <h3 class="text-center pb-md-4">Over View</h3>
                    <ul class="text-justify rounded card list-unstyled has-shadow">
                        <div class="card-body">
                            <li>A Personal Loan helps you meet your diverse financial needs for a planned big
                                event
                                or any
                                unexpected expenses. So do not postpone things on your bucket list. Check your
                                eligibility
                                and the best loan offer matching your priority. Confirm your final choice and
                                leave
                                the rest
                                to us.</li>
                            <hr>
                            <li>The purpose of the loan can be used for any wedding in family, Dream Vocation,
                                Medical
                                Expenses, Educational Expenses or Home Renovation.</li>
                            <hr>
                            <li>Personal Loan offer varies between individuals, The offers are derived basis the
                                Employer
                                Category, Net Salary & the Loan Amount. The interest rates vary between 10.25%
                                and
                                24% with
                                a Processing Fee range from Rs.5000 to 3% of the loan amount. The repayment of
                                loan
                                is opted
                                between 12 months and 72 months considering the comfort of EMI payable every
                                month.
                                It is advisable to understand the terms & conditions of Part payment &
                                Foreclosure
                                before
                                applying for a Personal Loan.</li>
                            <hr>
                            <li>The other charges may include stamp duty & other statutory charges as per
                                applicable
                                law of
                                the state, Overdue EMI Interest, Amortization Schedule Charges, Cheque Swapping
                                Charges,
                                Cheque bounce charges, Loan cancellation & loan rebooking charges if applicable.
                            </li>
                            <hr>
                            <li>Loan Applications can be processed both online & offline basis the Bank you
                                finalise
                                and its
                                generally takes up to 72 hours for the loan sanction & disbursement.</li>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pb-md-4">Types of Personal Loans</h3>

                    <div class="text-justify">
                        <div class="card">
                            <h5 class="card-header font-weight-bold bg-gray text-gray">Normal Personal Loan</h5>
                            <div class="card-body">
                                <p class="card-text">A normal Personal Loan is a new loan availed for any of your
                                    personal
                                    requirement. On successful loan disbursement, the money gets credited to
                                    your salary account and can be utilised for the purpose.</p>
                            </div>
                        </div><br>
                        <div class="card">
                            <h5 class="card-header font-weight-bold bg-gray text-gray">Top Up Personal Loan</h5>
                            <div class="card-body">
                                <p class="card-text">A Top-Up Personal loan is availed as an additional loan amount
                                    from the same
                                    bank basis the eligibility. A minimum of 3 to 6 months EMS are to be cleared
                                    for applying a Top-Up Loan. <br> A new loan account is created by adjusting
                                    the
                                    outstanding principal amount and the remaining amount is credited to your
                                    salary account. This helps in reducing the EMI but at the same time the
                                    tenure applicable for the outstanding principal of the existing loan gets
                                    changed.</p>
                            </div>
                        </div><br>
                        <div class="card">
                            <h5 class="card-header font-weight-bold bg-gray text-gray">Balance Transfer</h5>
                            <div class="card-body">
                                <p class="card-text">A balance transfer loan is about transferring the outstanding
                                    principal from
                                    one bank to another bank for lower rates or lower EMIs. This loan can be
                                    performed only after serving the lock in period with the existing financier.
                                    Most of these transactions will have a Foreclosure charge levied by the
                                    existing financier which needs to be accounted and planned.</p>
                            </div>
                        </div><br>
                        <div class="card">
                            <h5 class="card-header font-weight-bold bg-gray text-gray">Credit Card Transfer</h5>
                            <div class="card-body">
                                <p class="card-text">Credit Card transfer loan is about transferring the outstanding
                                    principal of
                                    a Credit Card or multiple Credit Cards as a Personal Loan. This would
                                    definitely give a value addition in terms of interest outflow as the
                                    Personal Loan interest rates are very much cheaper than Credit Card rate of
                                    interest.</p>
                            </div>
                        </div><br>
                        <div class="card">
                            <h5 class="card-header font-weight-bold bg-gray text-gray">Loan Consolidation</h5>
                            <div class="card-body">
                                <p class="card-text">Loan consolidation is transferring or consolidating multiple
                                    Personal Loans,
                                    Credit Cards, Gold Loans, Car Loans in to one single EMI. This helps in
                                    reducing the monthly outflow, number of debts and maintaining a better credit
                                    rating.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="text-center pb-md-4">Check Eligibility</h3>
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
                                            <input type="text" id="salary" class="form-control bi-alarm" name="fullname"
                                                placeholder="e.g.,10000" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                        </div>
                                        <div class="form-group pt-2">
                                            <h5 class=""><label for=" username">Total EMI Obligations per
                                                    month</label>
                                            </h5>
                                            <input type="text" id="obligate" name="" class="form-control"
                                                placeholder="e.g.,10000" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" />
                                        </div>
                                        <div class="form-group pt-2">
                                            <h5 class=""><label for=" username">Credit Card outstanding as
                                                    per latest
                                                    statement if any</label></h5>
                                            <input type="text" id="card_outstanding" name="" class="form-control"
                                                placeholder="e.g.,100000" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" />
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

                                        <button type="button" class="btn btn-success"
                                            onclick="eligibleCalc()"><b>Check</b></button>
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
                            <div class="pt-5 pb-5 text-center text-sm-center"><button type="button" id=""
                                    class="btn btn-darkblue btn-sm" onclick="calc()"><b>CALCULATE</b></button>
                                &nbsp;&nbsp;
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
<script type="text/javascript">
    // Eligiblity Calculator ============================
    // function eligibleCalc() {
    //     var salary = parseInt(document.querySelector('#salary').value);
    //     var obligate = parseInt(document.querySelector('#obligate').value);
    //     var card_outstanding = parseInt(document.querySelector('#card_outstanding').value);

    //     var Total_obligate = (0.05 * card_outstanding) + obligate;

    //     var value = (salary <= 5e4) ? ((salary * 0.5) - Total_obligate) : ((salary * 0.7) - Total_obligate);

    //     var result = parseInt((value / 2175) * 1e5);

    //     console.log(result);

    //     if (isNaN(result)) {
    //         document.getElementById('result').innerText = "₹ 0.00";
    //     } else if (0 >= result) {
    //         document.getElementById('result').innerText = "You are not Eligible";
    //     } else {
    //         document.getElementById('result').innerText = result.toFixed(0);
    //     }
    // };
    // Eligiblity Calculator ============================
</script>
<!--================================= Scripting=================================================== -->
