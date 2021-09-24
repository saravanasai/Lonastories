<!DOCTYPE html>
<html lang="en">

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
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <form method="post">
                        <div class="form-group ">
                            <label class="control-label " for="Original_Name">
                                Name
                            </label>
                            <input class="form-control" id="Original_Name" name="Original_Name" placeholder="Full Name"
                                type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Education_Qualification">
                                Education Qualification
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Education_Qualification" name="Education_Qualification"
                                placeholder="Your Qualifications" type="text" />
                        </div>

                        <div class="form-group ">
                            <label class="control-label requiredField" for="Marital_Status">
                                Marital Status
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <select class="select form-control" id="Marital_Status" name="Marital_Status">
                                <option value="Married">
                                Married
                                </option>
                                <option value="unmarried">
                                unmarried
                                </option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label class="control-label requiredField" for="Spouse_name">
                                Spouse name
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Spouse_name" name="Spouse_name"
                                placeholder="Enter Your Spouse Name" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Spouse_DOB">
                                Spouse DOB
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Spouse_DOB" name="Spouse_DOB" placeholder="MM/DD/YYYY"
                                type="date" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Father_Name">
                                Father Name
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Father_Name" name="Father_Name"
                                placeholder="Your Father Name" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Mother_Name">
                                Mother Name
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Mother_Name" name="Mother_Name"
                                placeholder="Your Mother Name" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Current_Address">
                                Current Address with Pin code
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Current_Address" name="Current_Address"
                                placeholder="Address With Pincode" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Residence_Mobile_No">
                                Residence Telephone/Mobile No
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Residence_Mobile_No" name="Residence_Mobile_No"
                                placeholder="00000 00000" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Current_Address_Landmark">
                                Current Address Landmark
                            </label>
                            <input class="form-control" id="Current_Address_Landmark" name="Current_Address_Landmark"
                                placeholder="Land Mark" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Resi_type">
                                Residence Type
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <select class="select form-control" id="Resi_type" name="Resi_type">
                                <option value="Own House">
                                    Own House
                                </option>
                                <option value="Family Owned House">
                                    Family Owned House
                                </option>
                                <option value="Rented">
                                    Rented
                                </option>
                                <option value="Lease">
                                    Lease
                                </option>
                                <option value="Company Provided ">
                                    Company Provided
                                </option>
                            </select>
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="No_of_years_cur_resi">
                                No of years in current Residence
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="No_of_years_cur_resi" name="No_of_years_cur_resi"
                                placeholder="etc., 12 " type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="No_of_years_cur_city">
                                No of years in current City
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="No_of_years_cur_city" name="No_of_years_cur_city"
                                placeholder="etc., 12" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Pr_Address">
                                Permanent Address with Pin code
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Pr_Address" name="Pr_Address"
                                placeholder="Address With Pincode" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Pr_Address_mobile_no">
                                Permanent Address Telephone/ Mobile No
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Pr_Address_mobile_no" name="Pr_Address_mobile_no"
                                placeholder="00000 00000" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Pr_Address_Landmark">
                                Permanent Address Landmark
                            </label>
                            <input class="form-control" id="Pr_Address_Landmark" name="Pr_Address_Landmark"
                                placeholder="Land Mark" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Of_Address">
                                Office Address with Pin code
                            </label>
                            <input class="form-control" id="Of_Address" name="Of_Address"
                                placeholder="Address With Pincode" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Of_Address_Landmark">
                                Office Address Landmark
                            </label>
                            <input class="form-control" id="Of_Address_Landmark" name="Of_Address_Landmark"
                                placeholder="Land Mark" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Of_Address_contact_no">
                                Office Address contact No.
                            </label>
                            <input class="form-control" id="Of_Address_contact_no" name="Of_Address_contact_no"
                                placeholder="00000 00000" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Per_mail">
                                Personal Mail ID
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Per_mail" name="Per_mail" placeholder="etc@gmail.com"
                                type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="Of_mail">
                                Official Mail ID
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="Of_mail" name="Of_mail" placeholder="etc@gmail.com"
                                type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Salary_account_bank_name">
                                Salary account Bank Name
                            </label>
                            <input class="form-control" id="Salary_account_bank_name" name="Salary_account_bank_name"
                                placeholder="Bank Name Of Your Salary Account" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Salary_account_bank_ac_no">
                                Salary account Bank Account Number
                            </label>
                            <input class="form-control" id="Salary_account_bank_ac_no" name="Salary_account_bank_ac_no"
                                placeholder="Salary Account Number" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label requiredField" for="DOJ_of_current_company">
                                DOJ of current company
                                <span class="asteriskField">
                                    *
                                </span>
                            </label>
                            <input class="form-control" id="DOJ_of_current_company" name="DOJ_of_current_company"
                                placeholder="Date of joining" type="date" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Total_work_expirence">
                                Total work expirence
                            </label>
                            <input class="form-control" id="Total_work_expirence" name="Total_work_expirence"
                                placeholder="Work Experience" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Reference_1_name">
                                Reference Name
                            </label>
                            <input class="form-control" id="Reference_1_name" name="Reference_1_name"
                                placeholder="Reference 1" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Reference_1_contact_no">
                                Reference Contact Number
                            </label>
                            <input class="form-control" id="Reference_1_contact_no" name="Reference_1_contact_no"
                                placeholder="Reference 1 contact no." type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Reference_1_complete_address">
                                Reference Complete Address with pincode
                            </label>
                            <input class="form-control" id="Reference_1_complete_address"
                                name="Reference_1_complete_address" placeholder="Reference 1 Address" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Relation_1_type">
                                Relation Type
                            </label>
                            <input class="form-control" id="Relation_1_type" name="Relation_1_type"
                                placeholder="Type Of Relation 1" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Reference_2_name">
                                Reference Name
                            </label>
                            <input class="form-control" id="Reference_2_name" name="Reference_2_name"
                                placeholder="Reference 2" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Reference_2_contact_no">
                                Reference Contact Number
                            </label>
                            <input class="form-control" id="Reference_2_contact_no" name="Reference_2_contact_no"
                                placeholder="Reference 2 contact no." type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Reference_2_complete_address">
                                Reference Complete Address with pincode
                            </label>
                            <input class="form-control" id="Reference_2_complete_address"
                                name="Reference_2_complete_address" placeholder="Reference 2 Address" type="text" />
                        </div>
                        <div class="form-group ">
                            <label class="control-label " for="Relation_2_type">
                                Relation Type
                            </label>
                            <input class="form-control" id="Relation_2_type" name="Relation_2_type"
                                placeholder="Type Of Relation 2" type="text" />
                        </div>
                        <div class="form-group">
                            <div>
                                <button class="btn btn-primary " name="submit" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


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
                                    <a class="dropdown-item" href="./personalLoanCalc.php">Personal Loan EMI
                                        Calculator</a>
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
                    <ul class="list-inline text-center">
                        <li class="list-inline-item text-light h4">
                            <a href="#" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" target="_blank" title="Twitter"><i
                                    class="fa fa-twitter"></i></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" target="_blank" title="Instagram"><i
                                    class="fa fa-instagram"></i></a>
                            &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" target="_blank" title="Pinterest"><i
                                    class="fa fa-pinterest"></i></a>
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
    <!--================================= Scripting=================================================== -->
</body>

</html>