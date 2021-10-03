@extends('layouts.FronendMaster')

@section('content')

    <div id="hero abt" class="hero hero-head hero-home d-sm-none d-md-block">
        <img src="{{ asset('frontend/img/about/banner.png') }}" class="ab_img" alt="" srcset="" style="height: 650px;
            background-size: cover;
            width: 100%;">
    </div>
    <div class="col-md-12 mobban">
        <img src="{{ asset('frontend/img/about/banner 0.png') }}" alt="" class="img-fluid" data-aos="zoom-in"
            data-aos-duration="2000">
    </div>
    <section class="pt-0">
        <div class="container-fluid pt-md-5">
            <div class="card-group text-center">
                <div class="card m-3">
                    <img class="card-img-top" src="{{ asset('frontend/img/about/01.jpg') }}" alt="Card image cap">
                </div>
                <div class="card m-3">
                    <img class="" src=" {{ asset('frontend/img/about/02.jpg') }}" alt="Card image cap">
                </div>
                <div class="card m-3">
                    <img class="card-img-top" src="{{ asset('frontend/img/about/03.jpg') }}" alt="Card image cap">
                </div>
                <div class="card m-3">
                    <img class="card-img-top" src="{{ asset('frontend/img/about/04.jpg') }}" alt="Card image cap">
                </div>
                <div class="card m-3">
                    <img class="card-img-top" src="{{ asset('frontend/img/about/05.jpg') }}" alt="Card image cap">
                </div>
            </div>
        </div>
    </section>

    <section class="pt-3 mt-3">
        <h2 class="display-3 mt-4 pb-5 text-center autoType" data-aos="zoom-out-right" data-aos-duration="3000">Are We
            Funding ?</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pt-5 mt-4">
                    <h2 class="text-center" data-aos="fade-up-right" data-aos-duration="2000">No, We Aren’t.</h2>
                    <h4 class="text-justify pt-3" data-aos="fade-up-left" data-aos-duration="2000"> After understanding
                        your
                        requirement, we negotiate & do the fulfilment with
                        leading Banks &
                        Non-Banking Financial Institutions.</h4>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('frontend/img/about/b1.jpg') }}" alt="" class="img-fluid" data-aos="zoom-in"
                        data-aos-duration="2000">
                </div>
            </div>
        </div>
    </section>

    <section class="pt-5 mt-3">
        <h2 class="display-3 mt-3 pb-4 text-center" data-aos="zoom-out-right" data-aos-duration="3000">At What Cost ?
        </h2>
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="zoom-in" data-aos-duration="2000">
                    <img src="{{ asset('frontend/img/about/b3.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 pt-5 mt-5">
                    <h2 class="text-center" data-aos="fade-up-right" data-aos-duration="2000">Zero Fee For All Of Our
                        Services!
                    </h2>
                    <h4 class="text-justify pt-3" data-aos="fade-up-left" data-aos-duration="2000">We are professionals,
                        act
                        as a
                        channel partner of leading Banks, Non-Banking
                        Financial services and few Corporate Sales Associates</h4>
                    <h4 class="text-justify pt-3" data-aos="fade-up-left" data-aos-duration="1000">All our fulfilment
                        services are
                        of free of cost.</h4>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-md-5 mt-3 mb-5 pb-md-3 bg-gray">
        <h2 class="display-3 mt-2 pb-md-4 text-center text-secondary" data-aos="fade-up-right" data-aos-duration="2000">
            What’s so special?
        </h2>
        <div class="container pb-md-5" data-aos="fade-up-left" data-aos-duration="2000">
            <div class="row">
                <div class="col-md-6 pt-lg-5 text-center">
                    <h2 class="text-light">Our Approval Rates Are At 95%.</h2>
                    <h4 class="pt-3 text-justify text-secondary font-weight-bold">We do all the math right and
                        understand
                        your exact eligibility. <br> We do a
                        transparent discussion with both our Clients & Bankers. <br> We take an opportunity only based on
                        the
                        scope of
                        funding and so we maintain the best approval rate in the industry.</h4>
                </div>
                <div class="col-md-6 text-center"><img class="img-fluid"
                        src="{{ asset('frontend/img/about/b2.png') }}" alt="" data-aos="zoom-in-right"
                        data-aos-duration="2000"></div>
            </div>
        </div>
    </section>

    <section class="">
<h2 class=" display-4 text-center" data-aos="fade-down" data-aos-duration="3000">We Are the
        Happiest, As We
        Do More For Others!</h2>
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6">
                    <img src="{{ asset('frontend/img/happy.jpg') }}" alt="" class="img-fluid"
                        data-aos="fade-up-left" data-aos-duration="2000">
                </div>
                <div class="col-md-6 pt-5">
                    <h4 class="text-justify" data-aos="fade-down" data-aos-duration="2000">
                        Loyalty Points & Super Reward Points are added for everything you do with us. <br><br>
                        Every time while planning your finance, give us an opportunity & join us in bridging the gap of
                        quality
                        education to the under privileged children. <br><br>Yes! We donate Rs.300 per loan disbursement
                        towards Charity
                        {{-- Agaram
                Foundation --}}
                        for every opportunity received from our members.
                    </h4>
                    <img src="{{ asset('frontend/img/donate.png') }}" alt="" class="img-fluid col-4"
                        data-aos="fade-up-left" data-aos-duration="2000">
                    <h3 class="text-center">Together we can do
                        so much!</h3>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5" style="background-color: #c6cbce ;">
        <div class="container pb-5">
            <div class="text-center col-sm-12">
                <h2 class="d-inline"><span class="display-4 grnLte" data-aos="fade-down-right"
                        data-aos-duration="2000"><b>R</b></span><small>ewards</small></h2>
                <h2 class="d-inline"><span class="display-4 grnLte" data-aos="fade-down-right"
                        data-aos-duration="2000"><b>&nbsp;E</b></span><small>earned</small></h2>
                <h2 class="d-inline"><span class="display-4 grnLte" data-aos="fade-right"
                        data-aos-duration="2000"><b>&nbsp;F</b></span><small>or</small></h2>
                <h2 class="d-inline"><span class="display-4 grnLte" data-aos="fade-down-left"
                        data-aos-duration="2000"><b>&nbsp;E</b></span><small>very</small></h2>
                <h2 class="d-inline"><span class="display-4 grnLte" data-aos="fade-down-left"
                        data-aos-duration="2000"><b>&nbsp;R</b></span><small>eferral</small></h2>
            </div>
            <h3 class="text-center pt-3" data-aos="fade-up-left" data-aos-duration="3000">
                Get 2X <i class="bi bi-suit-heart text-danger"></i> Hearts for Direct Refferals
            </h3>
            <div class="row">
                <div class="col-md-6 mt-5" data-aos="fade-down-right" data-aos-duration="1500">
                    <img src="{{ asset('frontend/img/refer.png') }}" alt="" class="img-fluid">
                </div>
                <div class="col-md-6 mt-5 pl-5">
                    <form action="{{ route('directReferal.store') }}" method="POST">
                        @csrf
                        <div class="form-group" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1000">
                            <label class="text-dark font-weight-bold" for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="refer_to_cus_name"
                                placeholder="Enter Your Name">
                        </div>
                        <div class="form-group pt-3" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                            <label class="text-dark font-weight-bold" for="exampleInputPassword1">Mobile Number</label>
                            <input type="number" class="form-control" name="refer_to_cus_phonenumber"
                                placeholder="Enter Your Number" required>
                        </div>
                        <div class="form-group pt-3" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="1500">
                            <label class="text-dark font-weight-bold" for="exampleInputPassword1">Email</label>
                            <input type="text" class="form-control" name="refer_to_cus_email"
                                placeholder="Enter Email Address" onfocus="this.type='email'" onblur="this.type='text'"
                                required>
                        </div>
                        <div class="form-group pt-3" data-aos="fade-down" data-aos-easing="linear" data-aos-duration="2500">
                            <label class="text-dark font-weight-bold" for="exampleInputPassword1">Relationship</label>
                            <select name="relation" id="" class="form-control">
                                <option value="" hidden>Relation</option>
                                <option value="">Friend</option>
                                <option value="">Relation</option>
                                <option value="">Coleague</option>
                                <option value="">Neighbour</option>
                                <option value="">Others</option>
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
                <div class="col-md-6 col-sm-12 pt-5 pl-5 text-center pt-5" data-aos="fade-down" data-aos-duration="1500">
                    <h4 class="" data-aos=" fade-down" data-aos-duration="1000">Sharing is Good, It's easy too.<i
                            class="em em-smiley" aria-role="presentation" aria-label="SMILING FACE WITH OPEN MOUTH"></i>
                    </h4>

                    <h4 class="text-capitalize pt-3">Let your contacts know about <strong>Loanstories.com</strong> &
                        help
                        us
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
                    @if (session('customer'))
                        <h5 class="pt-5 pb-lg-3"><a
                                href="{{ route('quickEnquieryForm.edit', session('customer')->id) }}"
                                class="btn btn-warning mt-1"><strong>Share
                                    Now&nbsp;&nbsp;<i class="bi bi-share"></i></strong></a>
                        </h5>
                    @else
                        <h5 class="pt-5 pb-lg-3"><a href="{{ route('signup.index') }}"
                                class="btn btn-outline-dark mt-1"><strong>Share
                                    Now&nbsp;&nbsp;<i class="bi bi-share"></i></strong></a>
                        </h5>
                    @endif
                    <h3><a href="#" target="_blank" title="Facebook" class="p-lg-4"><i
                                class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank" title="instagram" class="p-lg-4"><i
                                class="fa fa-instagram"></i></a>
                        <a href="#" target="_blank" title="whatsapp" class="p-lg-4"><i
                                class="fa fa-whatsapp"></i></a>
                    </h3>
                    <br>
                </div>
                <div class="col-md-6 col-sm-12 pl-5 pt-5" data-aos="fade-down-left" data-aos-duration="1500">
                    <img src="{{ asset('frontend/img/share.png') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

@endsection
