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

    <section>
        <div class="container">
            <h2 class="text-center font-weight-bold">My Wallet</h2>
            <br>
            <div class="row justify-content-between mt-lg-3">
                <div class="col-md-3">
                    <div class="card text-center border-0 bg-nav has-shadow">
                        <div class="justify-content-center pt-3">
                            <img src="{{ asset('frontend/img/star.png') }}" class="img-fluid" width="40%" alt="">
                        </div>

                        <div class="card-body">
                            <h2 id="stars" class="card-title font-weight-bold text-light">{{ $wallet_info->start_coins }}
                            </h2>
                            <h5 class="card-text font-weight-bold text-secondary">STARS</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center border-0 bg-nav has-shadow">
                        <div class="justify-content-center pt-3">
                            <img src="{{ asset('frontend/img/coin.png') }}" class="img-fluid" width="40%" alt="">
                        </div>
                        <div class="card-body">
                            <h2 id="chips" class="card-title font-weight-bold text-light">{{ $wallet_info->value_coins }}
                            </h2>
                            <h5 class="card-text font-weight-bold text-secondary">CHIPS</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center border-0 bg-nav has-shadow">
                        <div class="justify-content-center pt-3">
                            <img src="{{ asset('frontend/img/heart.png') }}" class="img-fluid" width="40%" alt="">
                        </div>
                        <div class="card-body">
                            <h2 id="hearts" class="card-title font-weight-bold text-light">{{ $wallet_info->heart_coins }}
                            </h2>
                            <h5 class="card-text font-weight-bold text-secondary">HEARTS</h5>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="card text-center border-0 bg-nav has-shadow">
                        <div class="justify-content-center pt-3">
                            <img src="{{ asset('frontend/img/loyalty.png') }}" class="img-fluid" width="40%" alt="">
                        </div>
                        <div class="card-body">
                            <h2 id="hearts" class="card-title font-weight-bold text-light">{{ $wallet_info->heart_coins+$wallet_info->start_coins+
                                $wallet_info->value_coins }}
                            </h2>
                            <h5 class="card-text font-weight-bold text-secondary">LOYALTY POINTS</h5>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="row justify-content-center mt-lg-5">
                <div class="col-md-5 text-center">
                    <h3 class="font-weight-bold">Total SRP Earned</h3>
                    <br>
                    <strong class="font-weight-bold">1 SRP = 0.5 INR</strong>
                    <br>
                    <strong class="font-weight-bold">{{$wallet_info->super_reward_point}} SRP = {{$wallet_info->super_reward_point/0.5}} - INR</strong>
                    <div class="card border-0 bg-img">
                        <div class="card-body">
                            <h2 id="lpt" class="card-text display-3 text-dark">
                                {{ $points_given }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 text-center">
                    <h3 class="font-weight-bold">Total SRP Redeemed</h3>
                    <br>
                    <div class="card border-0 bg-img">
                        <div class="card-body">
                            <h4 id="srpt" class="card-text display-3 text-dark">{{ $points_Redemed }}
                            </h4>
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
                @if ($wallet_info->enable_redeem == 1 && $wallet_info->redeem_request == 0)
                    <form action="{{ route('user.RedeemRequest') }}" method="post">
                        @csrf
                        <input type="hidden" name="cus_id" value="{{ session('customer')->id }}">
                        <h4><button type="submit"
                                class="btn btn-outline-success btn-lg rounded-pill"><strong>REDEEM</strong></button></h4>
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
