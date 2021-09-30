@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <div class="row">
                <div class="col">
                    <h5 class="mb-4 mt-5">CHANGE PASSWORD</h5>
                </div>
                <div class="col mt-1">
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Back</a></p>
                        </div>
                </div>
            </div>
        </div>
        <div>
            <div class="lockscreen-wrapper">
                <div class="lockscreen-logo">
                  <a href="{{route('home')}}"><b>Loanstoires.</b>com</a>
                </div>
                <!-- User name -->
                <div class="lockscreen-name">{{session('admin')->USERNAME}}</div>
                <!-- START LOCK SCREEN ITEM -->
                <div class="lockscreen-item">
                  <!-- lockscreen image -->
                  <div class="lockscreen-image">
                    <img src="{{asset('img/logo.jpg')}}" alt="User Image">
                  </div>
                  <!-- /.lockscreen-image -->
                  <!-- lockscreen credentials (contains the form) -->
                  <form class="lockscreen-credentials">
                    <div class="input-group">
                      <input type="password" class="form-control" placeholder="password">

                      <div class="input-group-append">
                        <button type="button" class="btn">
                          <i class="fas fa-arrow-right text-muted"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                  <!-- /.lockscreen credentials -->
                </div>
                <!-- /.lockscreen-item -->
                <div class="help-block text-center">
                  Enter New your password to Change Old Password
                </div>
                <div class="text-center">
                    <div class="container">
                        <strong class="text-danger"> This Process Cannot be Revereted Once Process is Completed</strong>
                    </div>
                </div>
              </div>
        </div>
    </div>
    @endsection
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
