@extends('layouts.FronendMaster')
<style>
    .bg {
        background-image: url('{{ asset('frontend/img/products/3.png') }}');
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        width: 100%;
        /* padding-bottom: 30%; */
    }

    .back {
        background-color: #83a4b8;
    }

</style>
@section('content')
    <div class="bg">
        <div class="container text-dark pt-5 pb-5">
            <div class="row pt-5">
                <div class="col-md-6">
                    <div class="rounded rounded p-3 back">
                        <h1 class="pt-3 text-center text-dark">Mortages</h1>
                        <h4 class="pt-3 text-center text-dark">Fuel your passion with Mortgage Loans at
                            attractive
                            interest rates.</h4>
                        <p class=" pt-3 text-center text-dark">
                            Avail Mortgage Loan against your Residential, Commercial Properties.
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

    <div class="bg-light pt-md-5 pb-md-3">
        <div class="container">
            <div class="row">
                <p class="text-justify">
                    Mortgage Loan is an easy & quick solution for all your financial needs for any Personal Use,
                    Business Expansion or Working Capital. Mortgage Loan is availed against your residential,
                    commercial
                    or specialised property for a longer tenure.
                </p>
                <p class="text-justify">
                    A maximum of 20 years, at a low rate of interest, resulting in lower obligations can be
                    offered for
                    our customers. Salaried, Self-Employed Professionals and Self-Employed Non-Professional
                    borrowers
                    can apply for Mortgage Loan with an option to avail the facility in combination of a Term
                    Loan and a
                    Overdraft facility.
                </p>
            </div>
        </div>
    </div>

    <section>
        <div class="container-fluid">
            <h3 class="text-center pb-md-5">Eligibility Criteria For Loan Against Property</h3>
            <div class="row">
                <div class="col-md-5">
                    <img src="{{ asset('frontend/img/Mortgage-Page.png') }}" class="img-fluid rounded has-shadow" alt="">
                </div>
                <div class="col-md-7">
                    <p class="text-justify pb-md-4"><b>The eligibility for LAP is assessed based on the
                            financials of
                            the customer and the value
                            of the property being offered as a collateral : </b></p>
                    <table class="table table-bordered has-shadow rounded">
                        <thead>
                            <tr>
                                <th class="text-center">Loan Amount</th>
                                <td class="text-center">₹ 10 Lakhs - ₹ 5 Cr.*</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center align-items-center">Age</th>
                                <td class="text-center">
                                    <b>Minimum.</b> 25 Yrs. <br>
                                    <b>Maximum.</b> 65 Yrs. or retirement age whichever is earlier.
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center">Eligible Profiles</th>
                                <td class="text-center">Salaried & Self-Employed</td>
                            </tr>
                            <tr>
                                <th class="text-center">Tenure</th>
                                <td class="text-center">Up to 15 Yrs.</td>
                            </tr>
                            <tr>
                                <th class="text-center">End Use</th>
                                <td class="text-justify">Business expansion, Long Term Working Capital, Debt.
                                    Consolidation, Equipment Purchase, Medical Exigency, Education / Marriage of
                                    children, Holiday. Etc.,</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <div class="bg-light pt-md-5 pb-md-5">
        <div class="container">
            <div class="row">
                <!-- <div class="card"> -->
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h5><b>Affordable High Value Loans</b></h5>
                        </div>
                        <p class="text-justify">We can get you an access to avail a higher loan amount at
                            affordable
                            Mortgage Loan
                            rates.
                            Check
                            your eligibility and we help you in taking an in-principal approval before
                            submitting the
                            application form.</p>
                        <hr>
                        <div class="card-title">
                            <h5><b>Quick Disbursement</b></h5>
                        </div>
                        <p class="text-justify">Simple & minimal documentation with a doorstep service makes the
                            entire
                            process to
                            complete
                            in
                            less than a week.</p>
                        <hr>
                        <div class="card-title">
                            <h5><b>Higher Tenure</b></h5>
                        </div>
                        <p class="">We can help you in taking higher tenures up to 20 years for salaried & 18
                            years for
                            self-employed
                            members.</p>
                        <hr>
                        <div class="
                            card-title">
                            <h5><b>Dropline OD Benefits</b></h5>
                        </div>
                        <p class="text-justify">Manage your outflow effectively with an option of paying only
                            interest
                            on the amount
                            utilised.
                        </p>
                        <hr>
                        <div class="card-title">
                            <h5><b>Balance Transfer</b></h5>
                        </div>
                        <p class="text-justify">Apply online for all Balance Transfer proposals, We assure you a
                            quick
                            processing
                            along with
                            a
                            high value Top-Up loans.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="">
        <h3 class=" text-center">Check Eligibility</h3>
        <div class="container pt-4">
            <form class="">
                <div class=" row justify-content-center pt-md-3">
                    <div class="col-md-7 card">
                        <div class="card-body">
                            <div class="form-group">
                                <h5><label for="fullname">Monthly Income:</label>
                                </h5>
                                <input type="number" id="salary" class="form-control" placeholder="How much amount ?"
                                    required>
                            </div>
                            <div class="form-group">
                                <h5><label for="username">Other EMI’s (Existing) </label>
                                </h5>
                                <input type="number" name="apr" id="other_emi" class="form-control" placeholder=""
                                    required>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- <h5><label for="">Property Type :</label></h5>
                                    <input type="radio" id="resident" name="apr" placeholder="" required>
                                    <label for="">Residential </label>
                                    &nbsp;&nbsp;<input type="radio" id="commer" name="apr" placeholder="" required>
                                    <label for="">Commercial</label> --}}
                                        <h5><label for="username">Preferred Tenure: </label></h5>
                                        <select name="" id="tenure" class="form-control">
                                            <option value="" hidden>Select Years</option>
                                            <option value="5">5 years</option>
                                            <option value="10">10 years</option>
                                            <option value="15">15 years</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <h5><label for="">Property Value :</label></h5>
                                        <input type="number" id="propVal" name="apr" placeholder="Property Amount" required
                                            class="form-control">
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
                            <button type="button" class="btn btn-success" onclick="mortage()">Calculate</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="pt-5">
                <span class="text-dark text-justify"><b>Note :</b> These calculators are provided only as general
                    self-help planning tools with the information of income and obligations provided. Results
                    depend on many factors like cibil reports, verification reports, internal scoring etc. you
                    may also get a higher eligibility if planned for a loan transfer or loan consolidation when
                    your existing obligations are high. Talk to our Loan Assistant to get your exact eligibility
                    in a Video / Audio Call.</span>
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
    // Mortage Eligibility Calculator========================================================
    function mortage() {
        let salary = parseInt(document.querySelector('#salary').value) * 0.7;
        let other_emi = parseInt(document.querySelector('#other_emi').value);
        let tenure = parseInt(document.querySelector("#tenure").value);
        let propVal = parseInt(document.querySelector("#propVal").value);

        let income, property;

        switch (true) {
            case (tenure == 5):
                income = ((salary - other_emi) / 2027) * 1e5;
                break;
            case (tenure == 10):
                income = ((salary - other_emi) / 1213) * 1e5;
                break;
            case (tenure == 15):
                income = ((salary - other_emi) / 956) * 1e5;
                break;
            default:
                alert("Fields are Incorrect");
        }

        // if (document.querySelector('#resident').is(":checked")) {
        //     property = propVal * 0.65;

        // } else if (document.querySelector('#commer').is(":checked")) {
        //     property = propVal * 0.55;
        // }

        property = propVal * 0.65;

        document.getElementById('income').innerText = (income <= 0) ? "0.00" : income.toFixed(0);
        document.getElementById('property').innerText = (property <= 0) ? "0.00" : property.toFixed(0);
    };
    // Mortage Eligibility Calculator========================================================
</script>
<!--================================= Scripting=================================================== -->
