
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Login form</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        @if(!session('otp'))
                        <form id="login-form" class="form" action="{{route('checkuser')}}" method="post">
                            @csrf

                            <h3 class="text-center text-info">Login</h3>
                            <div class="form-group">
                                <label for="username" class="text-info">PhoneNumber</label><br>
                                <input type="number" name="userphonenumber" id="userphonenumber" class="form-control">
                            </div>
                            <div id="register-link" class="text-right">
                                <button type="submit" class="btn btn-primary">Login</a>
                            </div>
                        </form>
                            @else
                            <form action="{{route('checkuserotp')}}" method="post">
                                @csrf
                                @if(session('no_valid_otp'))
                                <div class="text-danger">
                                    {{session('no_valid_otp')}}
                                </div>
                                @endif
                                <div class="form-group">
                                    <label for="username" class="text-info">Enter otp</label><br>
                                    <input type="number" name="otp" id="otp" class="form-control">
                                    <input type="hidden" name="cus_id" value="{{session('otp')->id}}" class="form-control">
                                </div>
                                <div id="register-link" class="text-right">
                                    <button type="submit" class="btn btn-primary">Enter Otp</a>
                                </div>
                            </form>
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

