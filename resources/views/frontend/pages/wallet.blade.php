@extends('layouts.FronendMaster')
<style>
    .bg-img {
        background: url('{{asset('frontend/img/popper.gif')}}');
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
                <div class="user-heading round">
                    <a href="#" class="mb-3">
                        <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="img-fluid" alt="">
                    </a>
                    <h1 class="text-light">{{session('customer')->name}}</h1>
                    <h6 class="text-secondary">{{session('customer')->cus_phonenumber}}</h5>
                </div>
            </div>
        </div>
        <div class="profile-info col-md-9">
            <div class="panel">
                <div class="panel-body bio-graph-info pt-md-3 pl-md-5">
                    <h3 class="font-weight-bold">Bio Graph : </h3>
                    <br>
                    <div class="row">
                        <div class="bio-row">
                            <p><span class="font-weight-bold">First Name </span>: {{session('customer')->name}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span class="font-weight-bold">Birthday</span>: {{session('customer')->dob}} </p>
                        </div>
                        <div class="bio-row">
                            <p><span class="font-weight-bold">Email </span>: {{session('customer')->email}}</p>
                        </div>
                        <div class="bio-row">
                            <p><span class="font-weight-bold">Mobile </span>: {{session('customer')->cus_phonenumber}}</p>
                        </div>
                        @if(session('customer')->customer_one_view_status=='0')
                        <div class="bio-row">
                            <p><a href="{{route('user.personalInfoFill')}}" class="btn btn-success">Fill Info Form</a></p>
                        </div>
                        <div class="bio-row">
                            <p><a href="{{route('user.OneView')}}" class="btn bg-nav text-white">One View</a></p>
                        </div>
                        @endif
                        <form action="{{route('user.UploadUserImage')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <input type="file" name="profile_img" id="">
                            <label for="">The file Size should be max 500kb</label>
                            @error('profile_img')
                            <div class="text-danger">{{$message}}</div>
                            @enderror
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                        @if(Session::has('profileimage'))
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
    <hr>
</div>
<section>
    <div class="container">
        <h2 class="text-center font-weight-bold">My Wallet</h2>
        <br>
        <div class="row justify-content-between mt-lg-3">
            <div class="col-md-4">
                <div class="card text-center border-0 bg-nav has-shadow">
                    <div class="justify-content-center pt-3">
                        <img src="{{asset('frontend/img/star.png')}}" class="img-fluid" width="50%" alt="">
                    </div>

                    <div class="card-body">
                        <h2 id="stars" class="card-title font-weight-bold text-light">{{$wallet_info->start_coins}}</h2>
                        <h4 class="card-text font-weight-bold text-secondary">STARS</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-0 bg-nav has-shadow">
                    <div class="justify-content-center pt-3">
                        <img src="{{asset('frontend/img/coin.png')}}" class="img-fluid" width="50%" alt="">
                    </div>
                    <div class="card-body">
                        <h2 id="chips" class="card-title font-weight-bold text-light">{{$wallet_info->value_coins}}</h2>
                        <h4 class="card-text font-weight-bold text-secondary">CHIPS</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-center border-0 bg-nav has-shadow">
                    <div class="justify-content-center pt-3">
                        <img src="{{asset('frontend/img/heart.png')}}" class="img-fluid" width="50%" alt="">
                    </div>
                    <div class="card-body">
                        <h2 id="hearts" class="card-title font-weight-bold text-light">{{$wallet_info->heart_coins}}</h2>
                        <h4 class="card-text font-weight-bold text-secondary">HEARTS</h4>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row justify-content-center mt-lg-5">
            <div class="col-md-5 text-center">
                <h3 class="font-weight-bold">Loyalty Points</h3>
                <br>
                <div class="card border-0 bg-img">
                    <div class="card-body">
                        <h2 id="lpt" class="card-text display-3 text-dark">{{$wallet_info->heart_coins+$wallet_info->value_coins+$wallet_info->start_coins}}</h2>
                    </div>
                </div>
            </div>

            <div class="col-md-5 text-center">
                <h3 class="font-weight-bold">Super Reward Points</h3>
                <br>
                <div class="card border-0 bg-img">
                    <div class="card-body">
                        <h4 id="srpt" class="card-text display-3 text-dark">{{$wallet_info->super_reward_point}}</h4>
                    </div>
                </div>
            </div>
        </div>
         @if (Session::has('redeemRequest'))
         <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong> Requested successfully.
          </div>
         @endif
        <div class="text-center mt-md-5">
            @if($wallet_info->enable_redeem==1 && $wallet_info->redeem_request==0 )
             <form action="{{route('user.RedeemRequest')}}" method="post">
                 @csrf
                 <input type="hidden" name="cus_id" value="{{session('customer')->id}}">
            <h4><button type="submit" class="btn btn-outline-success btn-lg rounded-pill"><strong>REDEEM</strong></button></h4>
            </form>
            @endif
        </div>
    </div>

</section>
@endsection
<!--================================= Scripting=================================================== -->

<script>
    function animateValue(id, start, end, duration) {
        if (start === end) return;
        var range = end - start;
        var current = start;
        var increment = end > start ? 1 : -1;
        var stepTime = Math.abs(Math.floor(duration / range));
        var obj = document.getElementById(id);
        var timer = setInterval(function() {
            current += increment;
            obj.innerHTML = current;
            if (current == end) {
                clearInterval(timer);
            }
        }, stepTime);
    }
    animateValue("stars", 200, parseInt($('#stars').text()), 500);
    animateValue("chips", 200, parseInt($('#chips').text()), 1500);
    animateValue("hearts", 200, parseInt($('#hearts').text()), 2500);
    animateValue("lpt", 200, parseInt($('#lpt').text()), 3500);
    animateValue("srpt", 200, parseInt($('#srpt').text()), 4500);
    </script>
