<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Loan Stories | DashBoard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bs-stepper/dist/css/bs-stepper.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.11.2/b-2.0.0/b-html5-2.0.0/datatables.min.css"/>

    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }


    </style>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- left Nav Links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars fa-lg"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link text-dark">
                        <h6>ADMIN DASHBOARD</h6>
                    </a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-cog fa-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header"> <i class="fas fa-cog fa-lg pr-2"></i><b>Setting</b></span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages

                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests

                        </a>
                        <div class="dropdown-divider"></div>

                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">

                        @csrf

                        <button type="submit" class="dropdown-item text-center">Logout</button>

                    </form>

                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-purple elevation-4 " style="height: 100vh;" >
            <!-- Sidebar -->
            <div class="sidebar" >
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                    </div>
                    <div class="info">
                        <a href="#" class="d-block ">
                            @if(session('admin'))
                            <h4>{{ session('admin')->USERNAME }}</h4>
                            @endif
                            @if(session('caller'))
                            <h4>{{ session('caller')->firstname }}</h4>
                            @endif
                        </a>
                    </div>
                </div>
                <!-- Sidebar Menu -->
                <nav class="mt-2" >
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <!-- First Nav section  -->
                        <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-landmark"></i>
                                <p>
                                    Lead Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.NewLeadsbyown')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Direct Enquiry</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.LeadsbyCaller')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Telecaller Leads</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('assignToAdmin.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Direct Leads</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('admin.NewLeadsbyCustomerReferal')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Indirect Referral Enquiry</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('Directrefferal.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Direct Referrals</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--End First Nav section  -->
                         <!-- First Nav part-1  section  -->
                         <li class="nav-item ">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-landmark"></i>
                                <p>
                                    My Leads
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('OwnLeadAssigntoadmin.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Admin</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('breakDown.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Profiling</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('offerAcOeDe.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Proposal</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('offerAcceptedFileUpload.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Documents Upload</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('feildForConCase.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Logins</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--End First Nav  part-1 section  -->
                        <!-- Second Nav section  -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-user-cog"></i>
                                <p>
                                    Members
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('customer.master')}}" class="nav-link ">
                                        <i class="fas fa-chalkboard-teacher nav-icon"></i>
                                        <p>Master Data</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--End Second Nav section  -->
                        <!-- Third Nav section  -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active ">
                                <i class="nav-icon fas fa-user-plus"></i>
                                <p>
                                    Enquiry Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('TodayCallerLeads.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>TD Leads TeleCaller</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('DirectLeadsInitialAssign.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>DL Assigned To Leader</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('DirectLeadsAfterAssignMoreinfo.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>DL Assign To TL TO BR</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!--End Third Nav section  -->
                        <!-- Fourth Nav section  -->
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <i class="nav-icon fas fa-users-cog"></i>
                                    <p>
                                        User Management
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{ route('caller.index') }}" class="nav-link">
                                            <i class="fas fa-plus-square nav-icon"></i>
                                            <p>Add IDs</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('caller.create') }}" class="nav-link">
                                            <i class="far fa-eye nav-icon"></i>
                                            <p>View IDs</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <!--End Fourth Nav section  -->
                        <!-- Fifth Nav section  -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Product List
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('products.index')}}" class="nav-link">
                                        <i class="fas fa-warehouse nav-icon"></i>
                                        <p>Products Master</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('subproducts.index')}}" class="nav-link">
                                        <i class="fas fa-boxes nav-icon"></i>
                                        <p>Add Sub Products</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('subproducts.create')}}" class="nav-link">
                                        <i class="fas fa-sitemap nav-icon"></i>
                                        <p>Sub Products Master</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                         <!--End Fifth Nav section  -->
                          <!-- (6th) Nav section  -->
                          <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('allCustomer.index')}}" class="nav-link ">
                                        <i class="fas fa-tools nav-icon"></i>
                                        <p>All Members</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('referalofCustomer.index')}}" class="nav-link ">
                                        <i class="fas fa-tools nav-icon"></i>
                                        <p>Member Referral</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('allEnquieryofCustomer.index')}}" class="nav-link ">
                                        <i class="fas fa-tools nav-icon"></i>
                                        <p>Lead Reports</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--End 6th Nav section  -->
                        <!-- (7th) Nav section  -->
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-cog"></i>
                                <p>
                                    Settings
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('redeemsetting.master')}}" class="nav-link ">
                                        <i class="fas fa-tools nav-icon"></i>
                                        <p>Redemption</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--End 7th Nav section  -->
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Excition Technology
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2021-2022 <a href="https://www.exciteon.com/">EXCITEON - TECH</a>.</strong> All
            rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->


</body>
<!-- REQUIRED SCRIPTS -->

<script src="{{ asset('js/app.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.11.2/b-2.0.0/b-html5-2.0.0/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bs-stepper/dist/js/bs-stepper.min.js"></script>

</html>
