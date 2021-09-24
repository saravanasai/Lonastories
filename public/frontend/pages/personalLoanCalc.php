<!DOCTYPE html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>LOANSTORIES.COM</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
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
            <h3 class="text-center">Personal Loan Emi Calculator</h3>
            <br>
            <form class="card">
                <div class="card-header">
                    <h5 class="text-center font-weight-bold">Fill Your Detials </h5>
                </div>
                <fieldset class="card-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group">
                                <h5><label for="name" class="control-label">I Want To Borrow</label>
                                </h5>
                                <input type="text" class="form-control" id="principal" name="pr_amt"
                                    placeholder="Enter Loan Amount">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5><label for="name" class="control-label">Interest Rate %
                                        p.a</label>
                                </h5>
                                <input type="text" class="form-control" id="interest" name="int_rate"
                                    placeholder="Enter Your ROI">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5><label for="name" class="control-label">Tenure</label></h5>
                                <input type="text" class="form-control" id="terms" placeholder="in months"
                                    name="period">
                            </div>
                        </div>
                    </div>

                    <!-- <label for="principal"><b>Principal:</b></label>
                    <input type="text" id="principal" />
                    <br />
                    <label for="interest"><b>Interest:</b></label>
                    <input type="text" id="interest" />
                    <br />
                    <label for="terms"><b>Terms:</b></label>
                    <select id="terms">
                        <option value="12">12 Months</option>
                        <option value="24">24 Months</option>
                        <option value="36">36 Months</option>
                        <option value="48">48 Months</option>
                        <option value="60">60 Months</option>
                        <option value="60">72 Months</option>
                    </select> -->
                    <div class="pull-right">
                        <input type="button" id="calculate" class="btn btn-darkblue" value="Calculate"
                            onclick="getValues()" />
                        <input type="button" id="getPdf" class="btn btn-secondary disabled" value="Get Pdf" />
                    </div>
                </fieldset>
            </form>

            <form>
                <fieldset>
                    <div id="Result"></div>
                </fieldset>
            </form>
        </div>
    </section>
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
                                    <a class="dropdown-item" href="./personalLoanCalc.php">Personal Loan EMI Calculator</a>
                                    <a class="dropdown-item" href="./homeLoanCalc.php">Home Loan EMI Calculator</a>
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
</body>

</html>


<script language="javascript">
var wwOpenInstalled;
if (wwOpenInstalled || parent.wwOpenInstalled) {
    if (window.Event) {
        document.captureEvents(Event.MOUSEUP);
    }
    document.onmouseup = (parent.wwOpenInstalled) ? parent.wwOnMouseUp : wwOnMouseUp;
};

function getValues() {

    $('#calculate').attr('disabled', 'disabled');
    $('#getPdf').removeClass('disabled');
    //button click gets values from inputs
    var balance = parseFloat(document.getElementById("principal").value);
    var interestRate =
        parseFloat(document.getElementById("interest").value / 100.0);
    var terms = parseInt(document.getElementById("terms").value);

    //set the div string
    var div = document.getElementById("Result");

    //in case of a re-calc, clear out the div!
    div.innerHTML = "";

    //validate inputs - display error if invalid, otherwise, display table
    var balVal = validateInputs(balance);
    var intrVal = validateInputs(interestRate);

    if (balVal && intrVal) {
        //Returns div string if inputs are valid
        div.innerHTML += amort(balance, interestRate, terms);
    } else {
        //returns error if inputs are invalid
        div.innerHTML += "Please Check your inputs and retry - invalid values.";
    }
}

function amort(balance, interestRate, terms) {
    //Calculate the per month interest rate
    var monthlyRate = interestRate / 12;

    //Calculate the payment
    var payment = balance * (monthlyRate / (1 - Math.pow(
        1 + monthlyRate, -terms)));

    //begin building the return string for the display of the amort table
    var result = "<hr>" +
        "<div class='card text-center'>" +
        "<div class='card-body'>" +
        "<strong>PRINCIPAL</strong> : ₹ " + balance.toFixed(0) + "   |   " +
        "<strong>ROI</strong> : " + (interestRate * 100).toFixed(0) + "%   |   " +
        "<strong>TENURE</strong> : " + terms + "   |   " +
        "<strong>EMI</strong> : ₹ " + payment.toFixed(0) + "   |   " +
        "<strong>TOTAL PAID</strong> : ₹ " + (payment * terms).toFixed(0) + "<br />" +
        "</div>" +
        "</div><br>";

    //add header row for table to return string
    result += "<div class='border text-center' id='personalTbl'>" +
        "<img src='../img/pdfLogo.png' class='img-fluid' width='20%'>" +
        "<h4 class='font-weight-bold'>Persoanal Loan Emi Calculations</h4>" +
        "<hr>" +
        "<table class='table table-bordered justify-content-center'>" +
        "<tr class='bg-gray text-light'>" +
        "<th>Month</th>" +
        "<th>Balance</th>" +
        "<th>Interest</th>" +
        "<th>Principal</th>" +
        "<th>Total Payment</th>";

    /**
     * Loop that calculates the monthly Loan amortization amounts then adds
     * them to the return string
     */
    for (var count = 0; count < terms; ++count) {
        //in-loop interest amount holder
        var interest = 0;

        //in-loop monthly principal amount holder
        var monthlyPrincipal = 0;

        //start a new table row on each loop iteration
        result += "<tr align=center class='text'>";

        //display the month number in col 1 using the loop count variable
        result += "<td>" + (count + 1) + "</td>";


        //code for displaying in loop balance
        result += "<td>" + Math.ceil(balance) + "</td>";

        //calc the in-loop interest amount and display
        interest = balance * monthlyRate;
        result += "<td>" + Math.ceil(interest) + "</td>";

        //calc the in-loop monthly principal and display
        monthlyPrincipal = payment - interest;
        result += "<td>" + Math.ceil(monthlyPrincipal) + "</td>";

        //----------------------------------
        totalPayment = monthlyPrincipal + interest;
        result += "<td>" + Math.ceil(totalPayment) + "</td>";

        //end the table row on each iteration of the loop
        result += "</tr>";

        //update the balance for each loop iteration
        balance = balance - monthlyPrincipal;
    }

    //Final piece added to return string before returning it - closes the table
    result += "</table></div>";

    //returns the concatenated string to the page
    return result;
}

// =================Get Pdf==========================
$('#getPdf').click(function() {
    const {
        jsPDF
    } = window.jspdf;

    var doc = new jsPDF('l', 'mm', [1200, 1200]);
    var pdfjs = document.querySelector('#personalTbl');

    doc.html(pdfjs, {
        callback: function(doc) {
            doc.save("Personal Loan Calculations.pdf");
        },
        x: 30,
        y: 10
    });
});
// =================Get Pdf==========================

function validateInputs(value) {
    //some code here to validate inputs
    if ((value == null) || (value == "")) {
        return false;
    } else {
        return true;
    }
}
</script>