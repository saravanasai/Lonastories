<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>LOANSTORIES.COM</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="all,follow" />
    <link rel="icon" href="../img/logo.png" />
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/landy-iconfont.css">
    <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="../vendor/owl.carousel/assets/owl.theme.default.css">
    <link rel="stylesheet" href="../css/style.default.css">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    <link rel="stylesheet" href="https://emoji-css.afeld.me/emoji.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

    <style>
    body {
        background-color: #041e43;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }

    input[type="text"] {
        background-color: aliceblue;
    }

    .alert-danger {
        color: #ffffff;
        font-weight: bold;
        background-color: #868e96;
        border-color: #041e4300;
    }

    .select {
        background-color: #ffffff !important;
    }
    </style>

</head>

<body>
    <header class="header">
        <div class="container-lg">
            <nav class="navbar navbar-expand-lg d-flex align-content-lg-between fixed-top bg-nav">
                <a href="../index.php" class="navbar-brand title fw-bold textShineBlack ml-lg-5 mt-lg-1">
                    <img src="../img/logo.png" alt="" width="40px" height="40px"
                        class="rounded" />&nbsp;&nbsp;<b>LOANSTORIES.COM</b>
                </a>
                <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"
                    class="navbar-toggler m-sm-auto"><i class="bi bi-list text-light"></i>
                </button>
                <div id="navbarSupportedContent" class="collapse navbar-collapse ml-lg-5 pl-lg-5 text-nowrap">
                    <ul class="navbar-nav align-items-sm-end align-items-md-end text-center">
                        <li class="nav-item ">
                            <a href="../pages/about.php" class="text-gray nav-link link-scroll"><strong>ABOUT
                                    US</strong></a>
                        </li>
                        <li class="nav-item ml-lg-4">
                            <a href="../pages/connect.php" class="nav-link"><strong>CONNECT</strong></a>
                        </li>
                        <li class="nav-item dropdown ml-lg-4">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <strong>PRODUCTS</strong>
                            </a>
                            <div class="dropdown-menu bg-gray border-white rounded" aria-labelledby="navbarDropdown3">
                                <a class="dropdown-item text-secondary" href="../pages/personal.php"><strong>Personal
                                        Loan</strong></a>
                                <a class="dropdown-item text-secondary" href="../pages/homeLoan.php"><strong>Home
                                        Loan</strong></a>
                                <a class="dropdown-item text-secondary"
                                    href="mortages.php"><strong>Mortages</strong></a>
                                <a class="dropdown-item text-secondary" href="../pages/business.php"><strong>Business
                                        Loan</strong></a>
                                <a class="dropdown-item text-secondary" href="../pages/education.php"><strong>Education
                                        Loan</strong></a>
                            </div>
                        </li>
                        <li class="nav-item ml-lg-4">
                            <a href="../pages/story.php" class="nav-link link-scroll"><strong>CLIENT
                                    STORIES</strong></a>
                        </li>
                        <li class="nav-item text-center ml-lg-4">
                            <a href="../pages/login.php" class="btn btn-light text-dark pull-right"><strong>MY
                                    STORIES</strong></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section>
        <div class="container mt-md-5 pt-md-5">
            <div class="row">
                <form action="#" method="POST" class="col-md-4">
                    <div id="slider" class="form">
                        <ul class="">
                            <li class="" data-id="slider_start">
                                <div class="text-center">
                                    <h4 class="text-secondary font-weight-bold
										">Best Time & Date To Call Me </h4>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" id="txtDate" class="form-control" name="day" data-toggle="tooltip"
                                        data-placement="top" title="Enter valid email" placeholder="Select Your Day"
                                        onfocus="this.type='date'" onblur="this.type='text'" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <input type="text" id="txttime" class="form-control" name="time" placeholder="Select Your Time"
                                        onfocus="this.type='time'" onblur="this.type='text'" required>
                                </div>
                                <br>
                            </li>

                            <li>
                                <div class="col-12 text-center">
                                    <h4 class="text-secondary font-weight-bold">I Prefer</h4>
                                </div>
                                <br>
                                <div class="form-group">
                                    <select class="form-control select" name="callTyp">
                                        <option value="" hidden>Call For</option>
                                        <option value="video">Video Call</option>
                                        <option value="audio">Audio Call</option>
                                        <option value="whatsapp">Whatsapp Chat</option>
                                    </select>
                                </div>
                                <br>
                            </li>

                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-secondary font-weight-bold text-center">I'm
                                            Looking For</h4>
                                        <br>
                                        <div class="form-group">
                                            <select id="loan" class="form-control select">
                                                <option value="" hidden>Select Your Desired Loan !
                                                </option>
                                                <option value="1">Personal Loan</option>
                                                <option value="2">Home Loan</option>
                                                <option value="3">Mortgages</option>
                                                <option value="4">Business Loan</option>
                                                <option value="5">Education Loans</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="text-center">
                                            <h6 class="text-secondary font-weight-bold">Type Of Loan For
                                            </h6>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select" id="loan_typ">
                                                <option value="" hidden>Select Your Type</option>

                                                <option value="" hidden>PL</option>
                                                <option value="" hidden>BL - New Loan
                                                </option>
                                                <option value="">Transfer</option>
                                                <option value="">Consolidation</option>
                                            </select>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12" id="priority">
                                        <div class="text-center">
                                            <h6 class="text-secondary font-weight-bold">
                                                For Personal Loans My Priority Is
                                            </h6>
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control select" namr="priority">
                                                <option value="" hidden>What's Your Priority ?</option>
                                                <option value="hiel">Higher Eligibility</option>
                                                <option value="lroi">Lowest ROI</option>
                                                <option value="ppo">Part Payment Options</option>
                                                <option value="foreclose">Foreclosure within a short turnaround
                                                    time
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </li>

                            <li>
                                <h4 class="text-secondary font-weight-bold text-center">
                                    My Income
                                </h4>
                                <br>
                                <div class="row text-center">
                                    <div class="form-group col-md-12">
                                        <input type="text" name="compName" class="form-control wizard-required" id=""
                                            placeholder="Company Name" />
                                    </div>
                                    <br>
                                    <div class="form-group col-md-12">
                                        <br>
                                        <input type="text" name="income" class="form-control wizard-required" id=""
                                            placeholder="Net Monthly Income / salary" />
                                    </div>
                                    <!-- <div class="form-group col-md-6">
										<br>
										<input type="text" class="form-control wizard-required" id=""
											placeholder="Total Emi Obligation" />
									</div>
									<div class="form-group col-md-6">
										<br>
										<input type="text" class="form-control wizard-required" id=""
											placeholder="Total Credit Card Outstanding" />
									</div> -->
                                </div>
                                <br>
                            </li>

                            <li>
                                <h4 class="text-secondary text-center font-weight-bold">
                                    My Current Location
                                </h4>
                                <br>
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <input type="text" name="residence" class="form-control wizard-required" id="reslocation"
                                            placeholder="Residence" />
                                        <br>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <input type="text" name="office" class="form-control wizard-required" id="offlocation"
                                            placeholder="Office" />
                                        <br>
                                    </div>

                                    <div class="text-center col-12">
                                        <h5 class="text-secondary font-weight-bold text-center">Are you
                                            working from
                                            home ? (For
                                            Salaried) </h5>
                                        <div class="form-group">
                                            <select class="form-control select" name="wfh">
                                                <option value="" hidden>What's Up ?</option>
                                                <option value="">Yes</option>
                                                <option value="">No</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </li>

                            <li>
                                <div class="col-12 text-center">
                                    <h4 class="text-secondary font-weight-bold">How soon the loan is
                                        expected ? </h4>
                                </div>
                                <br>
                                <div class="form-group">
                                    <select class="form-control select" name="whenNeed">
                                        <option value="" hidden>When You Need ?</option>
                                        <option value="">Immediate</option>
                                        <option value="">Within 1 Month</option>
                                        <option value="">2-3 Months</option>
                                        <option value="">After 3 Months</option>
                                    </select>
                                </div>
                                <br>
                            </li>

                            <li>
                                <div class="col-12 text-center">
                                    <h4 class="text-secondary font-weight-bold">My Cibil Score </h4><br>
                                    <div class="form-group">
                                        <select class="form-control select" name="cibil">
                                            <option value="" hidden>Choose What You Got ?</option>
                                            <option value="">
                                                < 800</option>
                                            <option value="">750 to 800</option>
                                            <option value="">700 to 750</option>
                                            <option value="">650 to 700</option>
                                            <option value="">
                                                > 650 </option>
                                            <option value="">I don't remember</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="text-center mt-lg-5">
                                    <input type="button" name="submit" class="btn btn-secondary" value="Submit">
                                </div>
                                <br>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!--================================= Scripting=================================================== -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.0.4/popper.js"></script>
    <script src="../js/jFormslider.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="../vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../js/front.js"></script>
    <!--================================= Scripting=================================================== -->

    <script>
    $(document).ready(function() {
        var options = {
            width: 600, //width of slider
            height: 400, //height of slider
            next_prev: true, //will show next and prev links
            next_class: 'h1 text-secondary', //class for next link
            prev_class: 'h1 text-secondary', //class for prev link
            error_class: 'alert alert-danger', //class for validation errors
            texts: {
                next: "<i class='fas fa-caret-right'></i>", //verbiage for next link
                prev: "<i class='fas fa-caret-left'></i>" //verbiage for prev link
            },
            speed: 800, //slider speed
        };

        $('#slider').jFormslider(options);
    })

    function last_slide() {
        alert("you are going to reach last slide if this function retuned true");
        return true;
    }
    </script>

    <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
            '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();

    $(function() {
        $('#header').load('header.html');
        $('#footer').load('footer.html');
    });
    //============Load Header & Footer=====================
    // AOS.init();

    // Previous Date Lock ==================================
    $(function() {
        var dtToday = new Date();
        var month = dtToday.getMonth() + 1;
        var day = dtToday.getDate();
        var year = dtToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();

        var minDate = year + '-' + month + '-' + day;

        $('#txtDate').attr('min', minDate);
    });
    // Previous Date Lock =================================

    // Loan Priority ======================================
    $('#priority').hide()
    $('#loan').change(function() {

        let loanSelect = $('#loan').find(":selected").val();

        (loanSelect === 'pl') ? $('#priority').show(): $('#priority').hide();

        $('#loan_typ')
            .find('option')
            .remove()
            .end()
            .append('<option value="whatever">text</option>')
            .val('whatever');

        if ((loanSelect === 'pl') || (loanSelect === 'bl')) {};
    })
    // Loan Priority ======================================
    </script>

</body>

</html>