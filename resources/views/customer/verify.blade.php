@extends('layouts.FronendMaster')
<style>
    body {
        margin: 0 !important;
        padding: 0 !important;
        background: url('{{asset('frontend/img/bullseye-gradient.svg')}}');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>
@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="headerpy-4 py-lg-9 pt-lg-5 mt-md-5">
        <div class="container">
            <div class="header-body text-center ">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <h3 class="text-white">Enter Your OTP here !</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-md-3">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7">
                <div class="card border-0 mb-0 mt-5">
                    <div class="card-header text-center">
                        {{-- <div class="text-center mt-2 mb-4">Sign In with</div> --}}
                        <a href="{{route('home')}}"><img src="{{asset('frontend/img/logo.png')}}" alt="" class="img-fluid text-center pb-lg-3"
                                width="15%"></a>
                        <h5><strong>LOANSTORIES.COM</strong></h5>

                    </div>
                    <div class="card-body py-lg-4">
                        <form action="{{route('user.checkOtp')}}" method="post">
                            @csrf
                            <div class="form-group mb-md-4">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input class="form-control" placeholder="Enter Your OTP" name="otp" type="text" maxlength="4" oninput="this.value = this.value.replace(/[^0-9]/, '')" required>
                                    <input type="hidden" value="{{$user_info->id}}" name="id">
                                </div>
                            </div>
                            <div class="form-group text-center mb-md-1">
                            <strong>Check Your Mail For OTP</strong>
                            </div>
                            <div class="text-center pb-md-2">
                                <button type="submit" class="btn btn-darkblue"><strong>Verify</strong></button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row mt-lg-3">
                    <div class="col-2 text-right">
                        <a href="index.html" class="text-light h5"><i class="fa fa-home" aria-hidden="true"></i></a>
                    </div>
                    <div class="col-10 text-right">
                        <a href="signup.html" class="text-light">Create new account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
