@extends('layouts.FronendMaster')
@section('content')
<section class="pt-md-5 mt-md-5 pt-sm-0 mt-sm-0">
    <div class="container">
        <div class="row">
            <div class="col-sm-5 order-sm-12">
                <img src="../img/connect/personal-loan.png" alt="" class="img-fluid">
            </div>
            <div class="col-sm-7 order-sm-1 text-center" data-aos="fade-up-left" data-aos-duration="3000">
                <h2 class="text-center" data-aos="zoom-out-right" data-aos-duration="3000">
                    A Simplified Personal
                    Loan In 72 Hours.
                </h2>
                <p class="lead pt-3 text-justify" data-aos="zoom-out-right" data-aos-duration="2000">
                    Join the club & make the day biggest of your life with our custom-fit
                    Personal Loans
                </p>
                <h6 class="pt-3 pb-4 text-center" data-aos="zoom-out-right" data-aos-duration="1000">
                    <b>Loan Amount up to 50 Lakhs | ROI starting from 9.9% | Repayment up to 72 months</b>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>
        </div>
    </div>
</section>
<!--  -->
<section class="pt-lg-5 mt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6" data-aos="fade-up-right" data-aos-duration="3000">
                <img src="../img/connect/h_loan.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-6 mt-4 text-center">
                <h2 class="text-center" data-aos="zoom-out-left" data-aos-duration="3000">Keep Calm & Let’s Find
                    You
                    a Home Loan</h2>
                <p class="lead pt-3 text-justify" data-aos="zoom-out-left" data-aos-duration="2000">
                    The one stop solution for owning your dream home. Whether you want to purchase a house
                    or construct a new one, we offer a wide range of products well suited to meet your
                    requirement.
                </p>
                <h6 class="pt-3 pb-3 text-center" data-aos="zoom-out-left" data-aos-duration="1000">
                    <b>Quick Sanction | ROI from 6.65% | Repayment up to 30 Years.</b>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>
        </div>
</section>
<!--  -->
<section class="pt-lg-5 mt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5 order-sm-12" data-aos="fade-up-left" data-aos-duration="3000">
                <img src="../img/connect/fast.png" alt="" class="img-fluid">
            </div>
            <div class="col-md-7 mt-4 text-center order-sm-1">
                <h2 class="text-center" data-aos="zoom-out-right" data-aos-duration="3000">A Super-Fast Hybrid
                    Flexi
                    Personal Loan In 24 Hours</h2>
                <p class="lead pt-3 text-justify" data-aos="zoom-out-right" data-aos-duration="2000">
                    If you’re in an urgent need for a personal loan but you’re worried about its repayment
                    option, then the Hybrid Flexi Personal Loan is the ideal option for you.
                </p>
                <h6 class="pt-3 pb-3 text-center" data-aos="zoom-out-right" data-aos-duration="1000">
                    <b>No Paperwork | Unlimited Part Payments | Pay Interest Only for The Utilized Amount.</b>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>

        </div>
    </div>
</section>
<!--  -->

<!--  -->
<section class="pt-lg-5 mt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 pt-5 pl-5 ">
                <img src="../img/connect/roi.png" alt="" class="img-fluid" data-aos="fade-up-left"
                    data-aos-duration="3000">
            </div>
            <div class="col-md-6 mt-4 text-center">
                <h2 class="text-center" data-aos="zoom-out-right" data-aos-duration="3000">It’s Never Too Late
                    to
                    Correct Your ROI</h2>
                <p class="lead pt-3 text-justify" data-aos="zoom-out-right" data-aos-duration="2000">
                    High rates & lock-in periods are very common with most of your existing lenders. Make
                    your clever move as soon as possible, Set-up a benchmark with the lowest ROI in the
                    industry.
                </p>
                <h6 class="pt-3 pb-3 text-center" data-aos="zoom-out-right" data-aos-duration="1000">
                    <b>Reduce Your EMI | Save BIG | Schedule It RIGHT.</b>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="pt-lg-5 mt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-sm-12">
                <img src="../img/connect/ccard.png" alt="" class="img-fluid" data-aos="fade-up-right"
                    data-aos-duration="3000">
            </div>

            <div class="col-md-6 mt-4 text-center order-sm-1">
                <h2 class="text-center" data-aos="zoom-out-left" data-aos-duration="3000">Attack Your Credit
                    Card
                    Debt with a Vengeance</h2>

                <p class="lead pt-3 text-justify" data-aos="zoom-out-left" data-aos-duration="2000">
                    Plastic Money is great, but sometimes you may be in trouble by paying only minimum dues.
                    Do you know the outstanding dues are charged at 36%? Convert it to smart EMI’s & say
                    goodbye to high interest rates.
                </p>
                <h6 class="pt-3 pb-3 text-center" data-aos="zoom-out-left" data-aos-duration="1000">
                    <b>No More Minimum Dues | Say Good Bye to 36% | Repair Your Credit Score.</b>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>

        </div>
    </div>
</section>
<!--  -->
<section class="pt-lg-5 mt-lg-5">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 ">
                <img src="../img/connect/power.png" alt="" class="img-fluid" data-aos="fade-up-right"
                    data-aos-duration="3000">
            </div>
            <div class="col-md-6 mt-4 text-center">
                <h2 class="text-center" data-aos="zoom-out-left" data-aos-duration="3000">Streamline Your
                    Finance &
                    Believe in The Power Of ‘ONE’</h2>
                <p class="lead pt-3 text-justify" data-aos="zoom-out-left" data-aos-duration="2000">
                    Is that worrying about high EMI’s goanna help? Check out the EMI Meter & bring down the
                    numbers to a Single Loan. Consolidate your Home Loans, Car Loans, Personal Loans, Gold
                    Loans in to one Single EMI.
                </p>
                <h6 class="pt-3 pb-3 text-center" data-aos="zoom-out-left" data-aos-duration="1000">
                    <b>Single EMI | Avoid Default | Zero Stress</b>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>
        </div>
    </div>
</section>
<!--  -->
<section class="pt-lg-5 mt-lg-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-sm-12">
                <img src="../img/connect/hbuisness.png" alt="" class="img-fluid" data-aos="fade-up-left"
                    data-aos-duration="3000">
            </div>
            <div class="col-md-6 mt-4 text-center order-sm-1" data-aos="zoom-out-right" data-aos-duration="3000">
                <h2 class="text-center">Take Your Business in to New Heights</h2>
                <p class="lead pt-3 text-justify" data-aos="zoom-out-right" data-aos-duration="2000">
                    Adapt your business with changing customer needs or technological advancement or scale
                    up your operations, the list is endless and choice is yours to utilise the Business Loan
                    the way you like.
                </p>
                <h6 class="pt-3 pb-3 text-center" data-aos="zoom-out-right" data-aos-duration="1000">
                    <b>No Collateral | Working Capital | Instant Overdraft.</b>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>
        </div>
    </div>
</section>
<!--  -->
<section class="pt-lg-5 mt-lg-5">
    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 ">
                <img src="../img/connect/affordable.png" alt="" class="img-fluid" data-aos="fade-up-right"
                    data-aos-duration="3000">
            </div>
            <div class="col-md-6 mt-4 text-center">
                <h2 class="text-center" data-aos="zoom-out-left" data-aos-duration="3000">High Value Loans made
                    affordable</h2>
                <h6 class="pt-3 pb-3 text-justify">
                    <p class="lead pt-3 text-justify" data-aos="zoom-out-left" data-aos-duration="2000">
                        If you’re looking for funding and have a commercial or residential property which you
                        can offer as collateral, then Mortgage Loan is just what you need.
                    </p>
                    <h6 class="pt-3 pb-3 text-center" data-aos="zoom-out-left" data-aos-duration="1000">
                        <b>Longer Tenure | Online Application | Hassle Free process.</b>
                    </h6>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>
        </div>
    </div>
</section>
<!--  -->
<section class="pt-lg-5 mt-lg-5 ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 order-sm-12">
                <img src="../img/connect/kids.jpg" alt="" class="img-fluid" data-aos="fade-up-left"
                    data-aos-duration="3000">
            </div>
            <div class="col-md-6 mt-5 mb-5 pb-5 text-center order-sm-1">
                <h2 class="text-center" data-aos="zoom-out-right" data-aos-duration="3000">A Loan for your kids’
                    education & future</h2>
                <p class="lead pt-3 text-justify" data-aos="zoom-out-right" data-aos-duration="2000">
                    Take the first step towards fulfilling your kids ambitions with easy education loans
                </p>
                <h6 class="pt-3 pb-3 text-center" data-aos="zoom-out-right" data-aos-duration="1000">
                    <b>Preferential Rates | Tax Benefits | Pocket-Friendly EMI</b>
                </h6>
                @if(!session('customer'))
                <a href="{{route('signup.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                        CONNECT</b></a>
                @else
                <a href="{{route('quickEnquieryForm.index')}}" class="btn btn-info" data-aos="fade-up" data-aos-duration="2000"><b>QUICK
                    CONNECT</b></a>
                @endif
            </div>
        </div>
    </div>
</section>


@endsection
