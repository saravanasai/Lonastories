@extends('layouts.FronendMaster')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-7 p-0 d-none d-md-block">
                <img src="{{ asset('frontend/img/signup.png') }}" class="img-fluid" alt="">
            </div>

            <div class="col-md-5 pt-lg-5 p-0">
                <div class="mb-0">
                    <div class="text-center">
                        <div class="text-center mt-2 mb-4">Sign Up with</div>
                        <a href="{{ route('home') }}"><img src="{{ asset('frontend/img/logo.png') }}" alt=""
                                class="img-fluid text-center pb-lg-3" width="15%"></a>
                        <h5><strong>LOANSTORIES.COM</strong></h5>
                    </div>
                    <div class="card-body" style="">
                        <form action="{{ route('signup.store') }}" method="post">
                            @csrf
                            <div class="form-group mb-md-4">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input class="form-control" placeholder="Name" name="name" type="text" required>
                                </div>
                            </div>
                            <div class="form-group mb-md-4">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input class="form-control" placeholder="Date Of Birth" type="text"
                                        onfocus="this.type='date'" name="date" onblur="this.type='text'" required>
                                </div>
                            </div>
                            <div class="form-group mb-md-4">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input class="form-control" name="phonenumber" maxlength="10"
                                        oninput="this.value = this.value.replace(/[^0-9]/, '')" placeholder="Mobile Number"
                                        type="text" required>
                                </div>
                            </div>
                            <div class="form-group mb-md-4">
                                <div class="input-group input-group-merge input-group-alternative">
                                    <input class="form-control" placeholder="Email Id" type="text"
                                        onfocus="this.type='email'" name="email" onblur="this.type='text'" required>
                                </div>
                            </div>
                            <div class="form-group text-center mb-md-3 ">
                                <input class="form-check-inline" id="customCheckLogin" onclick="agree()" type="checkbox">
                                <span class="text-muted">I agree with the <strong><a
                                            href="{{ route('user.privacypolicy') }}">Privacy
                                            Policy</a></strong></span>
                            </div>
                            <div class="text-center pb-md-2">
                                <button type="submit" id="submit" class="btn btn-darkblue" disabled><strong>Sign
                                        Up</strong></button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="row col-12 mt-2 justify-content-between">
                    <div class="pl-5">
                        <a href="{{ route('home') }}" class="h4"><i class="fa fa-home"
                                aria-hidden="true"></i></a>
                    </div>
                    <div class="text-right">
                        <a href="{{ route('userLogin') }}" class="font-weight-bold">Already Have An Account
                                !</a>
                    </div>
                </div>
                <br>
            </div>
        </div>
    </div>
@endsection

<script type="text/javascript">
    function agree() {
        let agree = document.getElementById('customCheckLogin');
        let submit = document.getElementById('submit');

        if (agree.checked) {
            submit.disabled = false;;
        } else {
            submit.disabled = true;
        }
    }
</script>
