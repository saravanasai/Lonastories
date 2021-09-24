<!DOCTYPE html>
<html>

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
    body {
        margin: 0 !important;
        padding: 0 !important;
        background: #ffff;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box
    }

    .container-login100 {
        width: 100%;
        min-height: 100vh;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        background: #f2f2f2
    }

    .wrap-login100 {
        width: 100%;
        background: #fff;
        overflow: hidden;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        align-items: stretch;
        flex-direction: row-reverse;
    }

    .login100-more {
        width: calc(100% - 560px);
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
        position: relative;
        z-index: 1
    }

    .login100-more::before {
        content: "";
        display: block;
        position: absolute;
        z-index: -1;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, .1)
    }

    .login100-form {
        width: 560px;
        min-height: 100vh;
        display: block;
        background-color: #f7f7f7;
        padding: 173px 55px 55px
    }

    @media(max-width:992px) {
        .login100-form {
            width: 50%;
            padding-left: 30px;
            padding-right: 30px
        }

        .login100-more {
            width: 50%
        }
    }

    @media(max-width:768px) {
        .login100-form {
            width: 100%
        }

        .login100-more {
            display: none
        }
    }

    @media(max-width:576px) {
        .login100-form {
            padding-left: 15px;
            padding-right: 15px;
            padding-top: 70px
        }
    }

    .validate-input {
        position: relative
    }



    @media(max-width:992px) {
        .alert-validate::before {
            visibility: visible;
            opacity: 1
        }
    }
    </style>
</head>

<body>
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
                <div class="text-center">
                    <h3 class="text-center pb-3">Login To Continue</h3>
                    <a href="../index.php"><img src="../img/logo.png" alt="" class="img-fluid text-center pb-4"
                            width="20%"></a>
                    <h4><strong>LOANSTORIES.COM</strong></h4>
                </div>

                <div class="py-lg-4">
                    <form role="form">
                        <div class="form-group">
                            <div class="input-group input-group-merge input-group-alternative">
                                <input class="form-control" placeholder="Enter Your Mobile Number" type="text">
                            </div>
                        </div>

                        <div class="form-group text-center">
                            <input class="form-check-inline" id=" customCheckLogin" type="checkbox">
                            <span class="text-muted">Remember me</span>
                        </div>

                        <div class="text-center">
                            <a href="../pages/otp.php" class="btn btn-darkblue"><strong>Get OTP</strong></a>
                        </div>
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-2 text-right">
                            <a href="../index.php" class="text-dark h5"><i class="fa fa-home"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="col-10 text-right">
                            <a href="../pages/signup.php" class="text-dark">Create new account</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="login100-more" style="background-image: url('../img/login.png');">
            </div>
        </div>
    </div>


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