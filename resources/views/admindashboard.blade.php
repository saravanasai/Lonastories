@extends('layouts.master')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        {{-- first row --}}
        <div class="row">
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$new_enq}}</h3>
                  <p>Direct Enquiries</p>
                </div>
                <div class="icon">
                  <i class="fas fa-plus"></i>
                </div>
                <a href="{{route('admin.NewLeadsbyown')}}" class="small-box-footer">View<i class="fas fa-arrow-circle-right px-2"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-success">
                <div class="inner">
                  <h3>{{$new_tel_enq}}<sup style="font-size: 20px"></sup></h3>
                  <p>TeleCaller Leads</p>
                </div>
                <div class="icon">
                  <i class="fas fa-headset"></i>
                </div>
                <a href="{{route('TodayCallerLeads.index')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-warning">
                <div class="inner">
                  <h3>{{$all_cus}}</h3>
                  <p>Total Sign Up</p>
                </div>
                <div class="icon">
                  <i class="fas fa-chart-line"></i>
                </div>
                <a href="{{route('customer.master')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
              <!-- small box -->
              <div class="small-box bg-danger">
                <div class="inner">
                  <h3>{{$all_ref}}</h3>
                  <p>Customer Referal</p>
                </div>
                <div class="icon">
                  <i class="ion ion-pie-graph"></i>
                </div>
                <a href="{{route('admin.NewLeadsbyCustomerReferal')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <!-- ./col -->
        </div>
         {{--end of  first row --}}
         {{-- dummy section --}}

         {{-- end of dummy section --}}
           {{-- Second row --}}
        {{-- <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="far fa-plus-square"></i></span>
                  <a href="{{route('admin.NewLeadsbyCustomerReferal')}}" class="text-gray">
                    <div class="info-box-content">
                        <span class="info-box-text">Leads By Cus Referal</span>
                        <span class="info-box-number">
                            <small>Assignent place</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                  </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tasks"></i></span>
                     <a href="{{route('breakDown.index')}}">
                    <div class="info-box-content">
                        <span class="info-box-text">Leads Ready To Break Down</span>
                        <span class="info-box-number">View ready to breakDown</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-headset"></i></span>
                    <a href="{{route('offerAcOeDe.index')}}" class="text-gray">
                    <div class="info-box-content">
                        <span class="info-box-text ">ACCEPT OR DENY OFFER</span>
                        <span class="info-box-number">PLACE TO ACCEPT OR DENEY </span>
                    </div>
                    <!-- /.info-box-content -->
                </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <a href="{{route('offerAcceptedFileUpload.index')}}" class="text-gray">
                        <div class="info-box-content">
                            <span class="info-box-text">PROFILE GENERATED UPLOAD FILE</span>
                            <span class="info-box-number">UPLOAD FILE HERE</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div> --}}
         {{--end of  Second row --}}
          {{-- third row --}}
        {{-- <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box">
                    <span class="info-box-icon bg-danger elevation-1"><i class="far fa-plus-square"></i></span>
                  <a href="{{route('feildForConCase.index')}}" class="text-gray">
                    <div class="info-box-content">
                        <span class="info-box-text">After Document Collected</span>
                        <span class="info-box-number">
                            <small>More Feilds for Documents Collected</small>
                        </span>
                    </div>
                    <!-- /.info-box-content -->
                  </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tasks"></i></span>
                     <a href="{{route('Directrefferal.index')}}">
                    <div class="info-box-content">
                        <span class="info-box-text">Direct 2x Refferal</span>
                        <span class="info-box-number">View</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </a>
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-headset"></i></span>
                    <a href="{{route('offerAcOeDe.index')}}" class="text-gray">
                    <div class="info-box-content">
                        <span class="info-box-text ">ACCEPT OR DENY OFFER</span>
                        <span class="info-box-number">PLACE TO ACCEPT OR DENEY </span>
                    </div>
                    <!-- /.info-box-content -->
                </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                    <a href="{{route('offerAcceptedFileUpload.index')}}" class="text-gray">
                        <div class="info-box-content">
                            <span class="info-box-text">PROFILE GENERATED UPLOAD FILE</span>
                            <span class="info-box-number">UPLOAD FILE HERE</span>
                        </div>
                        <!-- /.info-box-content -->
                    </a>
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div> --}}
         {{--end of  third row --}}
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
</div>
<!-- /.content -->

@endsection
