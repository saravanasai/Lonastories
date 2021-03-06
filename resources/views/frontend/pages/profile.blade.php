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
                            @if ($user_info->user_profile_img_status == 0)
                                <img src="{{ asset('frontend/img/avatar.png') }}" class="img-fluid" alt="">
                            @else
                                <img src="{{ asset('profileimg/' . $user_info->user_profile_img) }}" class="img-fluid"
                                    alt="">
                            @endif
                        </a>
                        <h1 class="text-light">{{ session('customer')->name }}</h1>
                        <h6 class="text-secondary">{{ session('customer')->cus_phonenumber }}</h5>
                    </div>
                </div>
            </div>
            <div class="profile-info col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3 class="font-weight-bold">User Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p><span class="font-weight-bold">First Name </span> :
                                    {{ session('customer')->name }}</p>
                                <p><span class="font-weight-bold">Email </span> :
                                    {{ session('customer')->email }}</p>
                                <p><span class="font-weight-bold">Mobile </span> :
                                    {{ session('customer')->cus_phonenumber }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p><span class="font-weight-bold">Birthday</span> :
                                    {{ session('customer')->dob }}</p>
                                <p><span class="font-weight-bold">SRP Earned</span> : {{ $points_given }}</p>
                                <p><span class="font-weight-bold d-inline">SRP Redeem</span> : {{ $points_Redemed }}</p>
                            </div>
                        </div>
                        <hr>
                        @if ($user_info->user_profile_img_status == 0)
                            <form action="{{ route('user.UploadUserImage') }}" enctype="multipart/form-data"
                                method="post" class="row mb-0">
                                <div class="form-group col-md-6 mb-md-0">

                                    <input type="file" class="form-control-file" name="profile_img"
                                        id="exampleFormControlFile1">
                                    <span class="small text-danger"> Upload Your Profile Image</span>
                                </div>
                                <div class="form-group col-md-6 mb-0">
                                    <input type="submit" class="btn btn-primary btn-block" value="Upload">
                                    @error('profile_img')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>


        <div class="row mt-md-5 mb-md-5 text-center pt-2">
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
                        <a href="{{ route('user.personalEligibilityCalc') }}" class="dropdown-item">Personal Loan
                            Eligibility
                            Calculator</a>
                        <a href="{{ route('user.homeEligibilityCalc') }}" class="dropdown-item">Home Loan Eligibility
                            Calculator</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
