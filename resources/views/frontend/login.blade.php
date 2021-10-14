@extends('layouts.FronendMaster')
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
@section('content')

    <div class="container-fluid pt-lg-5">
        <div class="row">
            <div class="col-md-7 p-0 d-none d-md-block">
                <img src="{{ asset('frontend/img/login.png') }}" class="img-fluid" alt="">
            </div>
            <div class="col-md-5 d-flex align-content-center justify-content-center">
                <div class="mt-5 pt-5">
                    {{-- <a href="{{ route('home') }}">
                        <img src="{{ asset('frontend/img/logo.png') }}" alt="" class="img-fluid" width="15%">
                    </a> --}}
                    <h3 class="pt-5 ">Login To Continue</h3>
                    <form action="{{ route('userLoginPost') }}" method="POST">
                        @csrf
                        <div class="form-group pt-lg-5">
                            <div class="input-group input-group-merge input-group-alternative">
                                <input class="form-control" name="userphonenumber" placeholder="Enter Your Mobile Number"
                                    type="text">
                            </div>
                        </div>
                        <div class="form-group text-center pt-lg-3">
                            <input class="form-check-inline" id="customCheckLogin" type="checkbox">
                            <span class="text-muted">Remember me</span>
                        </div>
                        <div class="text-center pt-lg-3">
                            <button type="submit" class="btn btn-darkblue">Get OTP</button>
                        </div>
                    </form>
                    <br>
                    <div class="row pt-lg-5 pb-sm-3">
                        <div class="col-2 text-right">
                            <a href="{{ route('home') }}" class="text-dark h4"><i class="fa fa-home"
                                    aria-hidden="true"></i></a>
                        </div>
                        <div class="col-10 text-right">
                            <a href="{{ route('signup.index') }}" class="font-weight-bold text-dark">Create new account</a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>


    {{-- <div class="container-login100">
    <div class="wrap-login100">
            <div class="text-center">
                <h3 class="text-center pb-3">Login To Continue</h3>
                <a href="{{route('home')}}"><img src="{{asset('frontend/img/logo.png')}}" alt="" class="img-fluid text-center pb-4"
                        width="20%"></a>
                <h4><strong>LOANSTORIES.COM</strong></h4>
            </div>
            <div class="py-lg-4">
                <form action="{{route('userLoginPost')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group input-group-merge input-group-alternative">
                            <input class="form-control" name="userphonenumber" placeholder="Enter Your Mobile Number" type="text">
                        </div>
                    </div>
                    <div class="form-group text-center">
                        <input class="form-check-inline" id="customCheckLogin" type="checkbox">
                        <span class="text-muted">Remember me</span>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-darkblue">Get OTP</button>
                    </div>
                </form>
                <br>
                <div class="row">
                    <div class="col-2 text-right">
                        <a href="{{route('home')}}" class="text-dark h5"><i class="fa fa-home"
                                aria-hidden="true"></i></a>
                    </div>
                    <div class="col-10 text-right">
                        <a href="{{route('signup.index')}}" class="text-dark">Create new account</a>
                    </div>
                </div>
            </div>
        </form>
        <div class="login100-more" style="background-image: url('{{asset('frontend/img/login.png')}}');">
        </div>
    </div>
</div> --}}
@endsection
