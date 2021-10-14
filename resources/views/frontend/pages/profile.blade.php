@extends('layouts.FronendMaster')
<style>
    .bg-img {
        background: url('{{ asset('frontend/img/popper.gif') }}');
        background-size: cover;
    }

    .bg {
        background-color: #2dbae8;
    }

</style>
@section('content')
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <div class="profile-nav col-md-3">
                <div class="panel">
                    <div class="user-heading round rounded">
                        <a href="#" class="mb-3">
                            @if ($user_info->user_profile_img_status==0)
                            <img src="{{ asset('frontend/img/avatar.png') }}" class="img-fluid" alt="">
                            @else
                            <img src="{{ asset('profileimg/'.$user_info->user_profile_img)}}" class="img-fluid" alt="">
                            @endif
                        </a>
                        <h1 class="text-light">{{ session('customer')->name }}</h1>
                        <h6 class="text-secondary">{{ session('customer')->cus_phonenumber }}</h5>
                    </div>
                </div>
            </div>
            <div class="profile-info col-md-9">
                <div class="panel">
                    <div class="panel-body bio-graph-info pt-md-3 pl-md-5">
                        <h3 class="font-weight-bold">User Profile : </h3>
                        <br>
                        <div class="row">
                            <div class="bio-row">
                                <p><span class="font-weight-bold">First Name </span>: {{ session('customer')->name }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span class="font-weight-bold">Birthday</span>: {{ session('customer')->dob }} </p>
                            </div>
                            <div class="bio-row">
                                <p><span class="font-weight-bold">Email </span>: {{ session('customer')->email }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span class="font-weight-bold">Mobile </span>:
                                    {{ session('customer')->cus_phonenumber }}
                                </p>
                            </div>
                            <div class="bio-row">
                                <p><span class="font-weight-bold">SRP Earned</span> : {{ $points_given }}</p>
                            </div>
                            <div class="bio-row">
                                <p><span class="font-weight-bold d-inline">SRP Redeem</span> : {{ $points_Redemed }}</p>
                            </div>
                            @if ($user_info->user_profile_img_status==0)
                            <div class="bio-row">
                                <form action="{{ route('user.UploadUserImage') }}" enctype="multipart/form-data"
                                    method="post">
                                    @csrf
                                    <div class="row">
                                        <input type="file"
                                        class="form-control col-md-8 col-sm-12" name="profile_img" id="">
                                        <input type="submit" class="btn btn-primary ml-2" value="Upload">
                                        @error('profile_img')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </form>
                            </div>
                            @endif

                            @if (Session::has('profileimage'))
                                <div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Success!</strong> Profile Image Uploaded Successfully
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-md-5 mb-md-5 text-center">


                <div class="col-md-4 pb-3">
                    <a href="{{ route('user.personalInfoFill') }}" class="btn btn-success btn-block text-dark"><i
                            class="bi bi-person-plus display-4 pb-2"></i><br>Add Info</a>
                </div>

                <div class="col-md-4 pb-3">
                    <a href="{{ route('user.OneView') }}" class="btn btn-secondary btn-block text-dark"><i
                            class="bi bi-bullseye display-4 pb-2"></i><br>One View</a>
                </div>

                <div class="col-md-4 pb-3">
                    <a href="{{ route('user.myWallet') }}" class="btn btn-dark btn-block"><i
                            class="bi bi-wallet2 display-4 pb-2"></i><br>My Wallet</a>
                </div>

                <div class="col-md-4 pb-3">
                    <a href="{{ route('user.meter') }}" class="btn btn-light btn-block"><i
                            class="bi bi-speedometer2 display-4 pb-2"></i><br>EMI
                        Meter</a>
                </div>

                <div class="col-md-4 pb-3">
                    <div class="dropdown d-inline">
                        <button class="btn btn-secondary btn-block dropdown-toggle text-dark" type="button"
                            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-bookmark-check display-4 pb-2"></i><br>
                            Calculators
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{ route('user.personalLoanEmiCalc') }}" class="dropdown-item">Personal Loan
                                EMI
                                Calculator</a>
                            <a href="{{ route('user.homeLoanEmiCalc') }}" class="dropdown-item">Home Loan EMI
                                Calculator</a>
                            <a href="{{ route('user.partPayCalc') }}" class="dropdown-item">Part Payment
                                Calculator</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 pb-5">
                    <div class="dropdown d-inline">
                        <button class="btn btn-dark btn-block dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bi bi-ui-checks display-4 pb-2"></i><br>Check Eligibility
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a href="{{ route('user.personalEligibilityCalc') }}" class="dropdown-item">Personal
                                Eligibility
                                Calculator</a>
                            <a href="{{ route('user.homeEligibilityCalc') }}" class="dropdown-item">Home Eligibility
                                Calculator</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection
