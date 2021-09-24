<!DOCTYPE php>


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
    <link rel="stylesheet" href="https://emoji-css.afeld.me/emoji.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">

    <style>
    th {
        text-align: center;
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
        <div class="container">
            <div class="text-center">
                <h3>Part Payment calculator</h3>
            </div>
            <div class="row">
                <div class="card has-shadow rounded">
                    <div class="card-header text-center bg-gray">
                        <h4 class="text-white">Checkout &amp; get instant eligibilty + benefits</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Getting a home loan from Bank is easy and quick. In our endeavor to
                            make
                            the process
                            convenient, we try to keep the paperwork and other formalities to a minimum.</p>

                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="outstandLoan"
                                        placeholder="Enter Outstanding Loan Amount" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ongoingRoi"
                                        placeholder="Enter Ongoing Rate Of Interest" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="outstandTenure"
                                        placeholder="Tenure In Months" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="partPayAmt"
                                        placeholder="Enter Part Payment Amount">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" id="frequency">
                                        <option value="0" hidden>Repayment Frequency</option>
                                        <option value="0">Once</option>
                                        <option value="1">Monthly</option>
                                        <option value="3">Quartrely</option>
                                        <option value="6">Halfyearly</option>
                                        <option value="12">Annually</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" id="partPayCalc"
                                        class="btn btn-darkblue"><strong>Calculate</strong></button>
                                    <button class="btn btn-secondary pull-right disabled" id="getPdf">Get
                                        PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========Part Payment Table================= -->

    <div class="container border d-none" id="partPayTbl">
        <div class="">
            <div class="text-center">
                <br>
                <img src="../img/pdfLogo.png" class="img-fluid" alt="" width="20%"><br>
                <h3 class="font-weight-bold">Part Payment Calculations</h3>
                <hr>
            </div>

            <div class="row justify-content-center">
                <h5 class="font-weight-bold">Savings table</h5>
                <table class="table table-bordered text-center" id="savings_tbl">
                    <!-- ===========Savings Table================= -->
                    <thead>
                        <tr class="bg-gray h6 text-light text-center">
                            <th class="" scope="col">Loan will close in</th>
                            <th scope="col">Total Saving Amount</th>
                            <th scope="col">Total EMIs Saved</th>
                            <th scope="col">By Paying</th>
                            <th scope="col">Number of Part-Payments</th>
                            <th scope="col">Total Part-Payment Amount</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <hr>
            <div class="row justify-content-center">
                <h5 class="font-weight-bold">Amortization table</h5>
                <table class="table table-bordered text-center" id="amortization_tbl">
                    <!-- ===========Amortization Table================= -->
                    <thead>
                        <tr class="bg-gray h6 text-light">
                            <th scope="col">Months</th>
                            <th scope="col">Outstanding Principal</th>
                            <th scope="col">EMI</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Principle</th>
                            <th scope="col">Pre Payments</th>
                            <th scope="col">Closing Balance</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- ===========Part Payment Table================= -->
    <footer class="main-footer bg-gray pt-lg-5 text-gray">
        <div class="container">
            <a href="index.php">
                <h3><img src="../img/logo.png" alt="" width="50vw" />&nbsp;<span
                        class="text-light"><strong>LOANSTORIES.COM</strong></span></h3>
            </a>
            <div class="row pt-5">
                <div class="col-md-3">
                    <ul class="list-unstyled">
                        <li>
                            <p><a href="./docs.php">FAQ</a></p>
                        </li>
                        <li>
                            <p><a href="./docs.php">List Of Documents</a></p>
                        </li>

                        <li>
                            <p><a href="./privacyPolicy.php">Privacy Policy</a></p>
                        </li>
                        <li>
                            <p><a href="./oneview.php">One View</a></p>
                        </li>
                        <li>
                            <p>
                            <div class="dropdown">
                                <span class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Loan Calculators
                                </span>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="./pLoanCalc.php">Personal Loan EMI Calculator</a>
                                    <a class="dropdown-item" href="./hLoanCalc.php">Home Loan EMI Calculator</a>
                                    <a class="dropdown-item" href="./partPayCalc.php">Part Payment Calculator</a>
                                </div>
                            </div>
                            </p>
                        </li>
                        <li>
                            <div class="dropdown">
                                <span class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    Eligibility Calculators
                                </span>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="./personalEligibleCalc.php">Personal Eligibility
                                        Calculator</a>
                                    <a class="dropdown-item" href="./homeEligibleCalc.php">Home Eligibility
                                        Calculator</a>
                                </div>
                            </div>
                        </li>

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
                            <a href="mailto:sales@loanstories.com"><i class="bi bi-geo-alt-fill"></i> No.783, 12th
                                Main,
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
                    </ul>
                    <ul class="social-icons list-inline text-center">
                        <li class="list-inline-item">
                            <a href="#" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
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
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"></script>
    <script src="../vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../js/front.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.umd.min.js"></script>
    <script src="../node_modules/jspdf/dist/jspdf.umd.min.js"></script>
    <script type="text/javascript" src="../node_modules/html2canvas/dist/html2canvas.js"></script>
    <!--================================= Scripting=================================================== -->
    <script>
    AOS.init();

    // =================Part Payment calculator===============
    $('#partPayCalc').click(function() {

        $('#partPayCalc').attr('disabled', 'disabled');
        $("#getPdf").removeClass('disabled');
        $('#partPayTbl').removeClass('d-none');

        let TotLoanAmt = parseInt($('#outstandLoan').val());
        let roi = parseInt($('#ongoingRoi').val());
        let tenure = parseInt($('#outstandTenure').val());
        let partPrePayAmt = parseInt($('#partPayAmt').val());
        var frequency = parseInt($('#frequency').val());
        let valid = true;

        $('#outstandLoan, #ongoingRoi, #outstandTenure, #partPayAmt, #frequency').each(function() {
            if ($(this).val() == '') {
                $(this).parent().effect('shake', {
                    times: 5
                }, 50).find('.verdiv').addClass('error');
                $(this).parent().css('border-bottom', '2px solid rgb(255 0 0)').css('border-radius',
                    '5px');
                valid = false;
            } else {
                $(this).parent().css('border', 'none');
            }
        });

        if (valid) {
            let r = roi / (12 * 100);
            let prate = (TotLoanAmt * r * Math.pow((1 + r), tenure)) / (Math.pow((1 + r), tenure) - 1);
            let emi = (Math.ceil(prate * 100) / 100).toFixed(0);
            let totalMnth = tenure;
            let clBal;
            let modulus;
            var nofpay = 0;

            // Amortization Table ========================================
            for (let i = 1; i <= totalMnth; i++) {

                if (frequency == 0) {
                    modulus = 0;
                    var frequency = null;
                } else {
                    modulus = i % frequency;
                }
                // let modulus = frequency % i;

                let outstand = (i == 1) ? TotLoanAmt : Math.ceil(clBal);

                let interest = Math.round((outstand * (roi / 100)) / 12);

                let principle = emi - interest;

                let prePayAmt = (modulus == 0) ? partPrePayAmt : 0;

                clBal = outstand - (principle + prePayAmt);

                clBal = (Math.sign(clBal) === 1) ? clBal : 0;

                amort_emi = (frequency == null) ? emi : ((outstand < emi) ? (outstand + interest) : emi);

                amort_prePay = (outstand < emi) ? 0 : prePayAmt;

                if (outstand !== 0) {
                    $("#amortization_tbl").append("<tr class='text'>" +
                        "<td>" + i + "</td>" +
                        "<td>" + outstand + "</td>" +
                        "<td>" + amort_emi + "</td>" +
                        "<td>" + interest + "</td>" +
                        "<td>" + principle + "</td>" +
                        "<td>" + amort_prePay + "</td>" +
                        "<td>" + clBal + "</td>" +
                        "</tr>");
                    var loanCls = i;

                    var nofpay = (amort_prePay == 0) ? nofpay + 0 : nofpay + 1;

                } else {

                    break;
                }

                TotLoanAmt = outstand;
                principle = principle;
            };

            var totSavMnth = isNaN(tenure - loanCls) ? 0 : (tenure - loanCls);
            // Amortization Table ========================================

            // Savings Table ========================================
            $("#savings_tbl").append("<tr class='text'>"
                // + "<td>" + totalMnth + "</td>"
                +
                "<td>" + loanCls + " months </td>" +
                "<td>" + (totSavMnth * emi) + "</td>" +
                "<td>" + totSavMnth + " months </td>" +
                "<td>" + partPrePayAmt + "/- each</td>" +
                "<td>" + nofpay + " months </td>" +
                "<td>" + (nofpay * partPrePayAmt) + "</td>" +
                "</tr>");
            // Savings Table ========================================


        }

        // =================Get Pdf==========================
        $('#getPdf').click(function() {
            const {
                jsPDF
            } = window.jspdf;

            var doc = new jsPDF('l', 'mm', [1200, 1200]);
            var pdfjs = document.querySelector('#partPayTbl');

            doc.html(pdfjs, {
                callback: function(doc) {
                    doc.save("Part_Pay_Ment_Caluculator.pdf");
                },
                x: 30,
                y: 10
            });
        });
        // =================Get Pdf==========================
    });
    // =================Part Payment calculator===============
    </script>
    <!--================================= Scripting=================================================== -->


</body>

</html>