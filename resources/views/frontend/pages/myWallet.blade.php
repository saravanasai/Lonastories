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

    <section class="pt-5">
        <div class="container">
            <h2 class="text-center font-weight-bold">My Wallet</h2>
            <br>
            <div class="row justify-content-between mt-lg-3">
                <div class="col-md-3 mb-3">
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
                <div class="col-md-3 mb-3">
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
                <div class="col-md-3 mb-3">
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

                <div class="col-md-3 mb-3">
                    <div class="card text-center border-0 bg-nav has-shadow">
                        <div class="justify-content-center pt-3">
                            <img src="{{ asset('frontend/img/loyalty.png') }}" class="img-fluid" width="40%" alt="">
                        </div>
                        <div class="card-body">
                            <h2 id="hearts" class="card-title font-weight-bold text-light">
                                {{  $wallet_info->start_coins + $wallet_info->value_coins }}
                            </h2>
                            <h5 class="card-text font-weight-bold text-secondary">LOYALTY POINTS</h5>
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="row justify-content-center mt-lg-5">
                <div class="col-md-5 text-center mb-5">
                    <h4 class="font-weight-bold">Total Super Reward Points Earned</h4>
                    <br>
                    {{-- <strong class="font-weight-bold">1 SRP = 0.5 INR</strong>
                    <br> --}}
                    <div class="card border-0 bg-img">
                        <div class="card-body">
                            <h2 id="lpt" class="card-text display-3 text-dark">
                                {{ ($points_given)?$points_given->points_given:0 }}
                            </h2>
                        </div>
                    </div>
                </div>

                <div class="col-md-5 text-center">
                    <h4 class="font-weight-bold">Total Super Reward Points Redeemed</h4>
                    <br>
                    <div class="card border-0 bg-img">
                        <div class="card-body">
                            <h4 id="srpt" class="card-text display-3 text-dark">{{ $points_Redemed }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p class="text text-justify"><strong>NOTE :</strong>  <b>₹. 1</b> is equal to <b>2</b> Super Reward Points. A maximum of
                <b>20000</b> Super Reward Points can be allocated for
                a transaction, subject to the availability of Loyalty Points. Being an active member of Loanstories.com, a
                member can earn up to <b>₹. 10000</b> every month. Please check for Redeem Option alerts in SMS & Email to complete
                the process of Cashback / Redemption. </p>

            @if (Session::has('redeemRequest'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Success!</strong> Requested successfully.
                </div>
            @endif
            <div class="text-center mt-md-5">
                @if ($wallet_info->enable_redeem_srp==1)
                <button type="button" data-toggle="modal"  data-target="#ChooseSuperRewardPointRedeemOption"  class="btn btn-outline-success btn-sm rounded-pill"><strong>REDEEM SUPER REWARD POINTS</strong></button>
                @endif
            </div>
            <div class="text-center mt-md-5">
                @if ($wallet_info->enable_redeem_hearts==1)
                <button type="button" data-toggle="modal"  data-target="#ChooseActiveHeartsRedeemOption"  class="btn btn-outline-success btn-sm rounded-pill"><strong>REDEEM ACTIVE HEARTS POINTS</strong></button>
                @endif
            </div>
        </div>
    </section>

@if ($wallet_info->enable_redeem_srp==1)
{{-- share model for only redem superRewardPoint Model  --}}
<div class="modal fade" id="ChooseSuperRewardPointRedeemOption" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
   aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Choose the Redem Option</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.RedeemRequest') }}" method="post">
                    @csrf
                    <input type="hidden" name="cus_id" value="{{ session('customer')->id }}">
                    <div class="form-group">
                        <p><b>NOTE </b>:{{$points_given->remark_of_super_reward_point}}</p>
                    </div>
                    <div class="form-group">
                        <select class="form-control select" name="redem_option" required>
                            <option value="Redeem 100% SRM as Vouchers" selected>Redeem 100% SRM as Vouchers</option>
                            <option value="Redeem only 75% as Vouchers & Donate 25% charity" >Redeem only 75% as Vouchers & Donate 25% charity</option>
                            <option value="Redeem only 50% as Vouchers & Donate 50% charity" >Redeem only 50% as Vouchers & Donate 50% charity</option>
                            <option value="Redeem only 25% as Vouchers & Donate 75% charity" >Redeem only 25% as Vouchers & Donate 75% charity</option>
                            <option value="Donate 100% SRP towards charity" >Donate 100% SRP towards charity</option>

                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary"
                    >Redeem</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{--share model for only redem superRewardPoint Model  --}}
@endif

@if ($wallet_info->enable_redeem_hearts==1)
{{-- share model for only redem active hearts Model  --}}
<div class="modal fade" id="ChooseActiveHeartsRedeemOption" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
   aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Choose the Redem Option For Active Hearts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('user.RedeemRequestToActiveHearts') }}" method="post">
                    @csrf
                    <input type="hidden" name="cus_id" value="{{ session('customer')->id }}">
                    <div class="form-group">
                        <select class="form-control select" name="redem_option" required>
                            <option value="Smartphone Vouchers" selected>Smartphone Vouchers</option>
                            <option value="Consumer Durable Product Vouchers" >Consumer Durable Product Vouchers</option>
                            <option value="Grocery Vouchers" >Grocery Vouchers</option>
                            <option value="Pharmacy Vouchers" >Pharmacy Vouchers</option>
                            <option value="Diagnostics" >Diagnostics</option>
                            <option value="Fuel Vouchers" >Fuel Vouchers</option>
                            <option value="Wellness Vouchers" >Wellness Vouchers</option>
                            <option value="Gym Vouchers" >Gym Vouchers</option>
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-secondary"
                    >Redeem</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{--share model for only redem active hearts Model  --}}
@endif


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
