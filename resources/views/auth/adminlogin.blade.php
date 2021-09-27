<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Loanstories |Admin Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
      #login_page_bg{
          background:#041e43;
      }
      #admin_cal_lg_btn
      {
          background: #041e43;
      }
  </style>
</head>
<body class="hold-transition login-page" id="login_page_bg">
    <div class="container-fluid">
        <div class="row">
            <div class="col col-md-4 d-none d-lg-block">
                <a href="{{route('home')}}">
                <img src="{{asset('img/masterlogo.png')}}" alt="MasterLogo" height="450"  srcset="">
                </a>
            </div>
            <div class="col col-md-4 offset-md-4  mt-5">
                <div class="login-box">
                    <div class="login-logo">
                    </div>
                    <!-- /.login-logo -->
                    <div class="card">
                      <div class="card-body login-card-body">
                        <h4 class="login-box-msg"> <b class="display-6"> ADMIN LOGIN</b> </h4>
                        <form action="{{route('admin.login')}}" method="post">
                          @csrf
                          <div class="input-group mb-3">
                            <input type="text" class="form-control @error('username') is-invalid
                            @enderror" name="username" placeholder="username" value="{{old('username')}}">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-user-shield"></span>
                              </div>
                            </div>
                          </div>
                          <div class="input-group mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                            <div class="input-group-append">
                              <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-6">
                            </div>
                            <!-- /.col -->
                            <div class="col-6">
                              <button type="submit" class="btn btn-success btn-block">LOGIN<i class="fas fa-sign-in-alt px-1"></i></button>
                            </div>
                            <!-- /.col -->
                          </div>
                        </form>

                        <div class="social-auth-links text-center mb-3">
                          <p><hr></p>
                          <a href="{{route('caller.login')}}" id="admin_cal_lg_btn" class="btn btn-block  text-white">
                            <i class="fas fa-phone-alt mr-2"></i>CALLER LOGIN
                          </a>
                        </div>
                        <!-- /.social-auth-links -->
                      </div>
                      <!-- /.login-card-body -->
                    </div>
                  </div>
                  <!-- /.login-box -->
            </div>
        </div>
    </div>

<!-- jQuery -->
<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
