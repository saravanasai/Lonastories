@extends('layouts.FronendMaster')
@section('content')
    <div id="hero" class="hero hero-head hero-home bg-gray pt-lg-5 pt-sm-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text pl-md-3 pr-md-5 pt-md-5 pt-sm-2 mt-lg-2 mt-sm-2 pb-5">
                    <h1 class="text-light display-4 text-lg-left text-md-center pb-md-0 pb-sm-3 pt-3" id="typed-text"
                        data-aos="zoom-out-right" data-aos-duration="1000">
                        A
                        New
                        Way Of Financial Planning
                    </h1>
                    <br>
                    <h4 class="text-md-left text-justify text-secondary pt-md-5" data-aos="zoom-out-right"
                        data-aos-duration="1000">
                        <b><span class="text-light" data-aos="zoom-out-right"
                                data-aos-duration="3000">LOANSTORIES.COM</span> is a
                            digital platform to connect with financial experts online & explore the latest offers in
                            Secured
                            Loan &
                            Unsecured loan.</b>
                    </h4>
                    @if (session()->has('enquierySubmited'))
                        <div class="row">
                            <div class="col col-md-12">
                                @if (session()->has('enquierySubmited'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <h4 class="alert-heading">Thank you for applying with us.</h4>
                                        <p><b>You Loan Assistant from Loanstories.com shall contact you shortly</b></p>
                                        </p>

                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif

                    <div class="pt-md-5 pt-sm-5" data-aos="zoom-in" data-aos-duration="3000">
                        @if (!session('customer'))
                            <a href="{{ route('signup.index') }}"
                                class="col-md-6 col-sm-6 btn btn-primary text-dark btn-light indbtn1"><strong>Become A
                                    Member</strong></a>
                        @else
                            <a href="{{ route('quickEnquieryForm.index') }}"
                                class="col-md-6 col-sm-6 btn btn-primary text-dark btn-light indbtn1"><strong>Become A
                                    Member</strong></a>
                        @endif
                        @if (!session('customer'))
                            <a href="{{ route('signup.index') }}"
                                class="col-md-5 col-sm-4 mt-md-0 mt-sm-5 btn btn-outline-secondary pull-right-lg indbtn2"><strong>Enquiry</strong></a>
                        @else
                            <a href="{{ route('quickEnquieryForm.index') }}"
                                class="col-md-5 col-sm-4 mt-md-0 mt-sm-5 btn btn-outline-secondary pull-right-lg indbtn2"><strong>Enquiry</strong></a>
                        @endif
                    </div>
                </div>

                <div class="col-md-6 pr-0" data-aos="fade-down-left" data-aos-duration="1500">
                    <video class="embed-responsive h-75" loop="true" autoplay="autoplay" muted>
                        <source src="{{ asset('frontend/img/tab.mp4') }}" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container pt-lg-5">
            <div class="row">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/img/MYLA.png') }}" class="img-fluid rounded has-shadow" alt="">
                </div>

                <div class="col-md-6 pl-lg-5" data-aos="fade-up-right" data-aos-duration="3000">
                    <h1 class="cust" data-aos="fade-up" data-aos-duration="1000">Get It Customized !</h1>
                    <h2 class="pt-lg-1" data-aos="fade-up" data-aos-duration="3000">Meet Your Loan Assistant Online</h2>
                    <h5 class="pt-lg-2" data-aos="fade-up" data-aos-duration="2000">Video Call | Audio Call | Chat
                    </h5>
                    <h4 class="pt-lg-2 trn" data-aos="fade-down" data-aos-duration="2000"><a
                            href="{{ route('user.connect') }}" class="btn btn-secondary mt-3"><strong>Try Now !</strong></a></h4>
                    <h5 class="pt-lg-5" data-aos="fade-up-left" data-aos-duration="3000">
                        <strong>Digital Offer | Value Addition | Client Specific</strong>
                    </h5>
                </div>
            </div>
        </div>
    </section>

    <section id="browser" class="browser mb-md-5 pb-5 mt-md-5">
        <div class="container-lg pl-5 pr-5">
            <h1 class="mb-5 pb-5 pt-5 text-center" data-aos="zoom-in" data-aos-duration="3000"><b>Feel Special with
                    Exclusive
                    Loyalty
                    Points</b></h1>
            <div class="row justify-content-center">
                <!-- STARS -->
                <div class="col-md-4 text-center p-2" data-aos="fade-up-right" data-aos-duration="3000">
                    <div class="browser-mockup">
                        <div id="nav-tabContent" class="tab-content pb-3 lead pl-3 pr-3">
                            <div id="nav-first" role="tabpanel" aria-labelledby="nav-first-tab"
                                class="tab-pane fade show active">
                                <h3 class="pt-5 font-weight-bold str">STARS</h3>
                                <img src="{{ asset('frontend/img/star.gif') }}" alt="..." width="250px" height="250px"
                                    class="img-fluid" data-aos="fade-up-left" data-aos-duration="1000" />
                                <p class="text-center">
                                    Sign-Up & add Stars as your loyalty points. Be an active member and get the auto
                                    refill
                                    of your stars
                                    on your Birthday every year.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- CHIPS -->
                <div class="col-md-4 text-center p-2" data-aos="" data-aos-duration="3000">
                    <div class="browser-mockup">
                        <div class="tab-content pb-3 lead pl-3 pr-3">
                            <div role="tabpanel" aria-labelledby="nav-first-tab" class="tab-pane fade show active">
                                <h3 class="pt-5 font-weight-bold str">CHIPS</h3>
                                <img src="{{ asset('frontend/img/chip.gif') }}" alt="..." width="250px" height="250px"
                                    class="img-fluid" data-aos="fade-up" data-aos-duration="3000" />
                                <p class="text-center">
                                    Avail our fulfillment services & add chips to your profile. Chips are activated
                                    after
                                    every successful
                                    loan disbursement.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- HEARTS -->
                <div class="col-md-4 text-center p-2" data-aos="fade-up-left" data-aos-duration="3000">
                    <div class="browser-mockup">
                        <div class="tab-content pb-3 lead pl-3 pr-3">
                            <div role="tabpanel" aria-labelledby="nav-first-tab" class="tab-pane fade show active">
                                <h3 class="pt-5 font-weight-bold str">HEARTS</h3>
                                <img src="{{ asset('frontend/img/hearts.gif') }}" alt="..." width="250px" height="250px"
                                    class="img-fluid" data-aos="fade-up-left" data-aos-duration="2000" />
                                <p class="text-center">
                                    Tell about us to your contacts, Share our web page in social
                                    media platforms & be ready to get surprised with the loads of Hearts.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="mt-5 pt-5 bg-gray">
        <div class="container text-center pt-5">
            <i class="bi bi-stars display-3 text-light pb-3" data-aos="fade-down-left" data-aos-duration="1500"></i>
            <header>
                <div class="row text-light text-center">
                    <div class="col-md-7">
                        <h3 class="display-4 text-secondary pt-5" data-aos="fade-right" data-aos-offset="300"
                            data-aos-easing="ease-in-sine" data-aos-duration="1500">Get More with Our Super Reward
                            Points
                        </h3>
                        <h4 class="pt-5 mx-auto text-white text-justify" data-aos="zoom-in-down" data-aos-duration="3000">
                            Few Loyalty Points are converted in to Super Reward Points every month. Check your wallet by
                            mid
                            of every
                            month & redeem it with our merchant partners.
                        </h4>
                        <h4 class="pt-3 pb-3 mx-auto text-white" data-aos="zoom-in-down" data-aos-duration="1000">or
                        </h4>
                        <h4 class="mx-auto text-white" data-aos="zoom-in-down" data-aos-duration="2000">Ask for a
                            Cashback!
                        </h4>
                    </div>
                    <div class="col-md-5">
                        <img src="{{ asset('frontend/img/award.gif') }}" alt="" class="img-fluid"
                            data-aos="fade-up-right" data-aos-duration="3000">
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-7">
                        @if (!session('customer'))
                        <a href="{{ route('signup.index') }}"
                            class="btn btn-primary text-dark btn-light"><strong>Become A
                                Member</strong></a>
                    @else
                        <a href="{{ route('quickEnquieryForm.index') }}"
                            class="btn btn-primary text-dark btn-light"><strong>Become A
                                Member</strong></a>
                    @endif
                    </div>
                </div>
            </header>
        </div>
    </section>

    <section id="about-us" class="about-us mt-3 mb-5" data-aos="fade-down" data-aos-easing="linear"
        data-aos-duration="1500">
        <br><br>
        <div class="container text-center">
            <img src="{{ asset('frontend/img/gears.gif') }}" alt="" class="img-circle" data-aos="fade-up-left"
                data-aos-duration="1000">
            <br><br>
            <h2 class="display-4">Few Facts About Us</h2>
            <div class="row ">
                <div class="col-md-12 pt-5">
                    <h3 class="text-secondary" data-aos="fade-down" data-aos-duration="1000">
                        We are Client Specific, Dynamic, Go-Getters & Incredibly Passionate.
                    </h3>
                </div>
                <div class="col-md-12 pt-5">
                    <h4><a href="{{ route('user.About') }}" class="btn btn-dark btn-shadow" data-aos="zoom-in-down"
                            data-aos-duration="1500"><strong>READ MORE</strong></a></h4>
                </div>
            </div>
        </div>
        <br><br>
    </section>

    <section class="mt-5 pb-5" id="directRefsection" style="background-color: #c6cbce ;">
        <div class="container pb-5">
            <div class="text-lg-center col-sm-12">
                <h2 class="d-lg-inline ml-lg-0 ml-5"><span class="display-4 grnLte" data-aos="fade-down-right"
                        data-aos-duration="2000"><b>R</b></span><small>ewards</small></h2>
                <h2 class="d-lg-inline ml-lg-0 ml-5 pl-lg-2"><span class="display-4 grnLte" data-aos="fade-down-right"
                        data-aos-duration="2000"><b>E</b></span><small>arned</small></h2>
                <h2 class="d-lg-inline ml-lg-0 ml-5 pl-lg-2"><span class="display-4 grnLte" data-aos="fade-right"
                        data-aos-duration="2000"><b>F</b></span><small>or</small></h2>
                <h2 class="d-lg-inline ml-lg-0 ml-5 pl-lg-2"><span class="display-4 grnLte" data-aos="fade-down-left"
                        data-aos-duration="2000"><b>E</b></span><small>very</small></h2>
                <h2 class="d-lg-inline ml-lg-0 ml-5 pl-lg-2"><span class="display-4 grnLte" data-aos="fade-down-left"
                        data-aos-duration="2000"><b>R</b></span><small>eferral</small></h2>
            </div>
            <h3 class="text-center pt-3" data-aos="fade-up-left" data-aos-duration="3000">
                Get 2X <i class="bi bi-suit-heart text-danger"></i> Hearts For Direct Refferals
            </h3>
            <div class="row">
                <div class="col-md-6 mt-5" data-aos="fade-down-right" data-aos-duration="1500">
                    <img src="{{ asset('frontend/img/refer.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 mt-5 pl-lg-5">
                    @if (session()->has('directReferalSubmited'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Well done!</h4>
                            <p><b>Thank you for sharing a Direct Referral with us.</b>
                                Hearts would be loaded to your profile after the successful sign up of your Referral.</p>
                            </p>
                        </div>
                    @endif
                    @if (session()->has('customerExist'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Oops!</h4>
                            <p><b>Thank you for sharing a Direct Referral with us.</b>
                                but This Referral is already refered</p>
                            </p>
                        </div>
                    @endif

                    <form action="{{ route('directReferal.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label class="text-dark font-weight-bold" for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="refer_to_cus_name" placeholder="Enter Your Name"
                                oninput="this.value = this.value.replace(/[^a-z]/, '')">
                        </div>
                        <div class="form-group pt-3">
                            <label class="text-dark font-weight-bold" for="exampleInputPassword1">Mobile Number</label>
                            <input type="text" class="form-control" name="refer_to_cus_phonenumber" maxlength="10"
                                placeholder="Enter Your Number" required
                                oninput="this.value = this.value.replace(/[^0-9]/, '')">
                        </div>
                        <div class="form-group pt-3">
                            <label class="text-dark font-weight-bold" for="exampleInputPassword1">Relationship</label>
                            <select name="refer_to_relationship" id="" class="form-control">
                                <option value="" hidden>Relationship</option>
                                <option value="Friend">Friend</option>
                                <option value="Relative">Relative</option>
                                <option value="Colleague">Colleague</option>
                                <option value="Neighbour">Neighbour</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <div class="text-center pt-3">
                            @if (session('customer'))
                                <p class="lead"><button type="submit"
                                        class="btn btn-block btn-darkblue"><strong>Submit</strong></a></button></p>
                            @else
                                <p class="lead"><a href="{{ route('signup.index') }}"
                                        class="btn btn-block btn-darkblue"><strong>Submit</strong></a></a></p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section style="background-color: #fff4d286;">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 pt-5 pl-lg-5 text-center pt-5" data-aos="fade-down"
                    data-aos-duration="1500">
                    <h4 class="" data-aos=" fade-down" data-aos-duration="1000">Sharing is Good, It's easy
                        too. <i class="em em-smiley" aria-role="presentation"
                            aria-label="SMILING FACE WITH OPEN MOUTH"></i>
                    </h4>

                    <h4 class="text-capitalize pt-3">Let your contacts know about <strong>Loanstories.com</strong> &
                        help us
                        to
                        grow. <i class="em em-pray" aria-role="presentation" aria-label="PERSON WITH FOLDED HANDS"></i>

                    </h4>
                    <h4 class="text-capitalize pt-3">
                        Hearts are loaded for every Signup of your contacts. <i class="em em---1"
                            aria-role="presentation" aria-label="THUMBS UP SIGN"></i>
                    </h4>
                    <br>
                    <h3 class="text-danger text-capitalize" data-aos="fade-down" data-aos-duration="2000"><strong>It's
                            Unlimited
                            !! <i class="em em-wink" aria-role="presentation" aria-label="WINKING FACE"></i></strong>
                    </h3>
                    @if (!session('customer'))
                        <h5 class="pt-5 pb-lg-3"><a href="{{ route('signup.index') }}"
                                class="btn btn-warning mt-1"><strong>Share
                                    Now&nbsp;&nbsp;<i class="bi bi-share"></i></strong></a>
                        </h5>
                    @else
                        <h5 class="pt-5 pb-lg-3"><a data-toggle="modal" data-target="#shareNow"
                                class="btn btn-warning mt-1"><strong>Share
                                    Now&nbsp;&nbsp;<i class="bi bi-share"></i></strong></a>
                        </h5>
                        <h3><a href="https://www.facebook.com/sharer/sharer.php"  target="_blank" title="Facebook" class="p-lg-4 fb-share"><i
                            class="fa fa-facebook"></i></a>
                    {{-- <a href="#" target="_blank" title="instagram" class="p-lg-4"><i
                            class="fa fa-instagram"></i></a> --}}
                    <a href="whatsapp://send?text={{ url('/') . '/user/signup/' . session('customer')->cus_referal_code . '/referal' }}" target="_blank" title="whatsapp" data-action="share/whatsapp/share" class="p-lg-4"><i
                            class="fa fa-whatsapp"></i></a>
                </h3>
                    @endif


                    <br>
                </div>
                <div class="col-md-6 col-sm-12 pl-5 pt-5" data-aos="fade-down-left" data-aos-duration="1500">
                    <img src="{{ asset('frontend/img/share.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    @if (session()->has('directReferalSubmited'))
        <script>
            window.location.hash = "directRefsection";
            $(document).ready(function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                        $(this).remove();
                    });
                }, 5000);
            });
        </script>
    @endif
    @if (session()->has('customerExist'))
        <script>
            window.location.hash = "directRefsection";
            $(document).ready(function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                        $(this).remove();
                    });
                }, 5000);
            });
        </script>
    @endif
    @if (session()->has('enquierySubmited'))
        <script>
            $(document).ready(function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
                        $(this).remove();
                    });
                }, 5000);
            });
        </script>
    @endif
@endsection
