@extends('layouts.FronendMaster')
@section('content')
<div class="main-content">
    <!-- Header -->
    <div class="headerpy-4 py-lg-8 pt-lg-4">
        <div class="container">
            <div class="header-body text-center mb-md-1">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <h3 class="text-white">Create an account</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-3">
        <div class="row justify-content-center">
            <!-- <img src="../img/signup.png" class="img-fluid col-md-5 p-0" alt=""> -->
            <div class="card mb-0 col-md-5">
                <div class="card-header text-center">
                    <div class="text-center mt-2 mb-4">Sign Up with</div>
                    <a href="{{route('home')}}"><img src="{{asset('frontend/img/logo.png')}}" alt="" class="img-fluid text-center pb-lg-3"
                            width="15%"></a>
                    <h5><strong>LOANSTORIES.COM</strong></h5>
                </div>
                <div class="card-body px-lg-4 py-lg-4 rounded-left" style="border-radius:1px;">
                    <form action="{{route('signup.store')}}" method="post">
                        @csrf
                        <div class="form-group mb-md-4">
                            <div class="input-group input-group-merge input-group-alternative">
                                <input class="form-control" placeholder="Name" name="name" type="text" required>
                            </div>
                        </div>
                        <div class="form-group mb-md-4">
                            <div class="input-group input-group-merge input-group-alternative">
                                <input class="form-control" placeholder="Date Of Birth" type="text"
                                    onfocus="this.type='date'" name="date"  onblur="this.type='text'" required>
                            </div>
                        </div>
                        <div class="form-group mb-md-4">
                            <div class="input-group input-group-merge input-group-alternative">
                                <input class="form-control" name="phonenumber" placeholder="Mobile Number" type="text" required>
                            </div>
                        </div>
                        <div class="form-group mb-md-4">
                            <div class="input-group input-group-merge input-group-alternative">
                                <input class="form-control" placeholder="Email Id" type="text"
                                    onfocus="this.type='email'" name="email" onblur="this.type='text'" required>
                            </div>
                        </div>
                        <div class="form-group text-center mb-md-3 ">
                            <input class="form-check-inline" id=" customCheckLogin" type="checkbox">
                            <span class="text-muted">I agree with the <strong><a href="{{route('user.privacypolicy')}}">Privacy
                                        Policy</a></strong></span>
                        </div>
                        <div class="text-center pb-md-2">
                            <button type="submit" class="btn btn-darkblue"><strong>Sign Up</strong></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4 text-right">
                <a href="{{route('home')}}" class="h4"><i class="fa fa-home" aria-hidden="true"></i></a>
            </div>
            <div class="col-5 text-right">
                <a href="{{route('userlogin')}}" class=""><small>Already Have An Account !</small></a>
            </div>
        </div>
    </div>
</div>
@endsection
