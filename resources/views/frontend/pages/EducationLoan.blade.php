@extends('layouts.FronendMaster')
<style>
    .bg {
        background-image: url('{{ asset('frontend/img/products/5.png') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        width: 100%;
        /* padding-bottom: 30%; */
    }

    .back {
        background-color: #415342;
    }

</style>
@section('content')
    <div class="bg">
        <div class="container text-dark pt-5 pb-5">
            <div class="row pt-5">
                <div class="col-md-6">
                    <div class="rounded rounded p-3 text-light back">
                        <h1 class="pt-3 text-center text-light">Education Loan</h1>
                        <h4 class="pt-3 text-center text-light">Let’s make all your dreams come true</h4>
                        <p class="lead pt-3 text-center">
                            Avail Personal Loans as per your priority. Apply online & get instant approval
                        </p>
                    </div>
                    <div class="pt-5 pb-5 text-center text-sm-center">
                        @if (!session('customer'))
                            <a href="{{ route('signup.index') }}" class="btn btn-success btn-sm"><strong>APPLY</strong></a>
                            <a href="{{ route('signup.index') }}"
                                class="btn btn-darkblue ml-lg-3 mr-lg-3 btn-sm"><strong>REFER</strong></a>
                            <a href="{{ route('signup.index') }}" class="btn btn-darkblue btn-sm"><strong>SHARE</strong></a>
                        @else
                            <a href="{{ route('quickEnquieryForm.index') }}"
                                class="btn btn-success btn-sm"><strong>APPLY</strong></a>
                            <a href="{{ route('home') }}"
                                class="btn btn-darkblue ml-lg-3 mr-lg-3 btn-sm"><strong>REFER</strong></a>
                            <a href="{{ route('quickEnquieryForm.store', session('customer')->id) }}"
                                class="btn btn-darkblue btn-sm"><strong>SHARE</strong></a>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-light">
        <div class="container">
            <h3 class="text-center">
                Overview
            </h3>
            <div class="row text-justify pt-lg-3">
                <div class="card has-shadow">
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li>Loanstories.com directs you the Education Loan for studies both in India and
                                abroad
                                starting from Rs. 50,000 at attractive interest rates. Explore the wide range of
                                Education Loans, you can enjoy a host of benefits such as simple documentation,
                                quick
                                loan disbursal, tax benefit and higher tenures.</li>
                            <hr>
                            <li>We help you to avail high value loans, but the quantum of the education loan can
                                be
                                determined subject to eligibility and the cost.</li>
                            <hr>
                            <li>We help you to avail Education Loans without any margin money or with a margin
                                money of
                                5% for Indian coursed and with a margin money of 15% for abroad courses</li>
                            <hr>
                            <li>We assist you to avail Education Loans if you have obtained admission to
                                career-oriented
                                courses like medicine, management and engineering.</li>
                            <hr>
                            <li>We can get you the end-to-end fulfilment processed in 15 working days on
                                submission of
                                all required documents to the lender.</li>
                            <hr>
                            <li>We can take the parents or guardian as co-applicant. His / her role would be
                                that of the
                                primary debtor, third party guarantee and/ or additional collateral may be asked
                                for
                                appropriate cases.</li>
                            <hr>
                            <li>On Sanction of the Loan, the same will be disbursed in full or in suitable
                                instalments
                                directly to the educational institution and other vendors.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card has-shadow h-100">
                        <h4 class="card-header text-center bg-gray text-light">Benefits for Students</h4>
                        <div class="card-body text-justify">
                            <p class="card-text"><b>Be Independent :</b><br>Help your parents by funding and
                                managing
                                your cost of
                                education.</p>
                            <p class="card-text"><b>Approval Before Admission :</b><br>Uplift your Dreams & get
                                Education Loan
                                approval letter
                                before
                                admission from select lenders.</p>
                            <p class="card-text"><b>Loan up to 100% of Educational Expenses :</b><br>We can
                                assist in
                                funding
                                total cost of your
                                education,
                                including living expenses & all other expenses reducing your financial worries.
                            </p>
                            <p class="card-text"><b>Expert Assistance :</b><br>Your Loan Assistant is dedicated
                                in
                                providing only
                                education loans by
                                understanding your world & your complex requirements.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card has-shadow h-100">
                        <h3 class="card-header text-center bg-gray text-light">Benefits for Parents</h3>
                        <div class="card-body text-justify">
                            <p class="card-text"><b>Tax Benefits :</b><br>Education Loan from lenders provides
                                income
                                tax benefits under Section 80E of Income Tax Act of India.</p>
                            <p class="card-text"><b>Responsibility :</b><br>Education Loan makes students
                                financially
                                responsible.
                                Parents can keep family savings for retirement & other emergencies.</p>
                            <p class="card-text"><b>Convenience :</b><br>Education Loan at your door-step, no
                                visiting
                                bank
                                branches multiple times. We can get everything at your door step.</p>
                            <p class="card-text"><b>Flexibility :</b><br>Flexibility on collateral security.
                                Longer &
                                flexible
                                repayment options available.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                    <div class="text-justify">
                        <div class="card">
                            <div class="card-header bg-gray">
                                <h3 class="text-center text-light">
                                    Eligibility criteria for Education Loan with most of the lenders
                                </h3>
                            </div>
                            <div class="card-body">
                                <p>To be an Indian Citizen.</p>
                                <p>Should have Secured at least 50% marks during HSC & Graduation.</p>
                                <p>Who have obtained admission to career-oriented courses e.g., Medicine,
                                    Engineering,
                                    Management
                                    etc.,
                                    either at the graduate or post-graduate level.</p>
                                <p>Secured admission in India or Abroad through entrance test / merit-based
                                    selection
                                    process
                                    post
                                    completion of HSC (10+2).</p>
                                <p>Documents displaying regular income is mandatory for the
                                    co-applicant(parents/sibling/guarantor).
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <h5 class="text-center pb-md-4">It doesn't cost you anything to apply online to Loanstories.com.
                Check your
                EMI & It
                just takes 5
                minutes of your time. <br>
                Our Loan Assistant can visit you at your convenience to complete all the required
                loan related formalities.</h5>

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
                                    <input type="text" class="form-control" id="idLoanTenure" placeholder="in years"
                                        name="period">
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
                                <h4 class="card-title"><i class="fa fa-rupee"></i> <span id="repayment">0.00</span>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 p-0 m-0 text-center">
                            <div class="card-header bg-gray text-light">Interest Component</div>
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-rupee"></i> <span id="int_comp">0.00</span>
                                </h4>
                            </div>
                        </div>
                        <div class="col-md-4 p-0 m-0 text-center">
                            <div class="card-header bg-gray text-light">Total Outflow</div>
                            <div class="card-body">
                                <h4 class="card-title"><i class="fa fa-rupee"></i> <span id="outflow">0.00</span>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <div class="text-center text-sm-center"><button type="button" class="btn btn-darkblue btn-sm"
                            onclick="calc()"><b>Calculate</b></button>
                        &nbsp;&nbsp;
                        @if (!session('customer'))
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
    <!--================================= Scripting=================================================== -->
    <script type="text/javascript">
        function calc() {
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
        };
    </script>
    <!--================================= Scripting=================================================== -->

@endsection
