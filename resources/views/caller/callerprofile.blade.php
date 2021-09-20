@extends('layouts.callermaster')


@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">My Profile Page</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('caller.dashboard',session('caller')->id) }}">Back</a></li>

                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
           <div class="conatiner">
               <div class="row">
                   <div class="col col-md-4">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                          <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="https://png.pngtree.com/png-clipart/20190516/original/pngtree-businessman-vector-icon-png-image_3710727.jpg" alt="User profile picture">
                          </div>

                          <h3 class="profile-username text-center">{{$my_info->firstname}}</h3>

                          <p class="text-muted text-center">{{$my_info->power}}</p>

                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>Phone Number</b> <a class="float-right">{{$my_info->phonenumber}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>AdharNumber</b> <a class="float-right">{{$my_info->adharnumber}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Status</b> <a class="float-right">{{$my_info->status}}</a>
                            </li>
                          </ul>
                              <input type="hidden" value="{{$my_info->phonenumber}}" id="referanceToken">
                          <a href="#" class="btn btn-primary btn-block link"><b>Generate Link</b></a>
                        </div>
                        <!-- /.card-body -->
                      </div>
                   </div>
                   <div class="col"></div>
               </div>
           </div>
</div>

<!-- /.content -->

@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

   $(function(){


       $('body').on('click','.link',function()
       {
           var token=$("#referanceToken").val();
           var caller_url="www.dummy.com/"+token;

           Swal.fire(caller_url);

       })


   })


</script>
