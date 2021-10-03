<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>LOANSTORIES.COM</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <link rel="icon" href="{{ asset('frontend/img/logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/landy-iconfont.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel/assets/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.default.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/emoji.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/button.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

</head>
<style>
    .hr {
        border-top: 1px solid rgba(172, 171, 171, 0.993);
    }

</style>

<body>

    {{-- header section --}}
    @include('layouts.partials.main_nav')

    @yield('content')


    <!-- <div id="footer" data-aos="fade-up" data-aos-duration="3000"></div> -->


    <!-- <footer class="main-footer bg-light pt-5" data-aos="fade-up" data-aos-duration="2000"> -->
    <footer class="main-footer bg-gray pt-lg-5 text-gray">
        <div class="container">
            <a href="./index.php">
                <h3><img src="{{ asset('frontend/img/logo.png') }}" alt="" width="50vw" />&nbsp;<span
                        class="text-light"><strong>LOANSTORIES.COM</strong></span></h3>
            </a>
            <div class="row pt-5">
                <div class="col-md-3">
                    <ul class="list-unstyled">
                        <li>
                            <p><a href="#">FAQ</a></p>
                        </li>
                        <li>
                            <p><a href="{{ route('user.Docs') }}">List Of Documents</a></p>
                        </li>

                        <li>
                            <p><a href="{{ route('user.privacypolicy') }}">Privacy Policy</a></p>
                        </li>

                        @if (session('customer'))
                            <li>
                                <p><a href="{{ route('user.OneView') }}">One View</a></p>
                            </li>
                            <li>
                                <p>
                                <div class="dropdown">
                                    <span class="dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Loan Calculators
                                    </span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                            href="{{ route('user.personalLoanEmiCalc') }}">Personal Loan EMI
                                            Calculator</a>
                                        <a class="dropdown-item" href="{{ route('user.homeLoanEmiCalc') }}">Home
                                            Loan
                                            EMI Calculator</a>
                                        <a class="dropdown-item" href="{{ route('user.partPayCalc') }}">Part Payment
                                            Calculator</a>
                                    </div>
                                </div>
                                </p>
                            </li>
                            <li>
                                <div class="dropdown">
                                    <span class="dropdown-toggle" type="button" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                        Eligibility Calculators
                                    </span>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item"
                                            href="{{ route('user.personalEligibilityCalc') }}">Personal
                                            Eligibility
                                            Calculator</a>
                                        <a class="dropdown-item" href="{{ route('user.homeEligibilityCalc') }}">Home
                                            Eligibility
                                            Calculator</a>

                                    </div>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

                <div class="col-md-5">
                    <ul class="list-unstyled text-secondary">
                        <li>
                            <h5 class="text-gray"><strong>Our Contact Points</strong></h5>
                        </li>
                        <li>
                            <p><i class="bi bi-telephone-outbound-fill"></i><a href="#">&nbsp;&nbsp;+0431 -
                                    3366622</a>&nbsp;&nbsp;|&nbsp;&nbsp;<i class="bi bi-whatsapp"></i><a
                                    href="#">&nbsp;&nbsp;+91 - 0123456789</a></p>
                        </li>
                        <!-- <li>
                        <p><i class="bi bi-whatsapp"></i><a href="#"></a>&nbsp;&nbsp;+91 - 0123456789</p>
                    </li> -->
                        <li>
                            <p><span class="text-gray"><strong>For Applications :</strong></span><a
                                    href="#">&nbsp;bookmyloans@loanstories.com</a></p>
                        </li>
                        <li>
                            <p><span class="text-gray"><strong>For Queries :</strong></span><a
                                    href="#">&nbsp;support@loanstories.com</a></p>
                        </li>
                        <li>
                            <p><span class="text-gray"><strong>For Complaints :</strong></span><a
                                    href="#">&nbsp;escalate@loanstories.com</a></p>
                        </li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <ul class="contact-info list-unstyled text-justify text-secondary">
                        <li>
                            <h5 class="text-gray"><strong>Our Locations</strong></h5>
                        </li>
                        <li>
                            <a href="mailto:sales@loanstories.com"><i class="bi bi-geo-alt-fill"></i> No.783, 12th Main,
                                1st
                                Cross, Indiranagar
                                Bangalore, Karnataka - 560008.</a>
                        </li>
                        <hr class="hr">
                        <li>
                            <a href="mailto:sales@loanstories.com"><i class="bi bi-geo-alt-fill"></i> No.20 B33, 2nd
                                Cross,
                                Thillai Nagar (East)
                                Tiruchirappalli, Tamilnadu – 620018.</a>
                        </li>
                        <!-- <hr id="hr">
                    <li>
                        <a href="mailto:sales@loanstories.com"><i class="bi bi-geo-alt-fill"></i> No.7, 3rd Floor, 80
                            Feet
                            Road, Anna Nagar
                            Madurai, Tamilnadu – 625020.</a>
                    </li> -->
                    </ul>
                    <ul class="social-icons list-inline text-center">
                        <li class="list-inline-item">
                            <a href="https://www.facebook.com/loanstories2021" target="_blank" title="Facebook"><i
                                    class="fa fa-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="Instagram"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="Pinterest"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12 text-center">
                    <hr class="hr">
                    <h5 class="text-light">
                        www.loanstories.com &copy; 2021. All rights reserved | Designed by
                        <strong><a href="https://exciteon.com">Exciteon</a></strong>
                    </h5>
                </div>
            </div>
        </div>
    </footer>
    <!--================================= Scripting=================================================== -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    {{-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script> --}}
    {{-- <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> --}}
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/vendor/jquery.cookie/jquery.cookie.js') }}"></script>
    <script src="{{ asset('frontend/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/front.js') }}"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <!--================================= Scripting=================================================== -->
    <script>
        AOS.init();
    </script>
    @yield('js')
    <!--================================= Scripting=================================================== -->
</body>
