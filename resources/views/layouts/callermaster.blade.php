<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Loan Stories | Leader DashBoard</title>
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
                            <h6>LOANSTORIES CALLER DASHBOARD</h6>
                        </a>
                    </li>
                </ul>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        {{-- <a class="nav-link" data-toggle="dropdown" href="#">
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

                        </div> --}}
                    </li>
                    <li class="nav-item">
                        {{-- <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                        </a> --}}
                    </li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <button type="submit" class="dropdown-item text-center"><i class="fas fa-sign-out-alt px-1"></i>Logout</button>

                        </form>

                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->
            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-purple elevation-4 " style="height: 100%">
                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            {{-- <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> --}}
                        </div>
                        <div class="info">
                            <a href="#" class="d-block ">
                                <h4>{{ session('caller')->firstname }}</h4>
                            </a>
                        </div>
                    </div>
                    <!-- Sidebar Menu -->
                    <nav class="mt-2" >

                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                            data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                   with font-awesome or any other icon font library -->

                             <!-- First Nav part-1  section  -->
                             <li class="nav-item {{ (request()->segment(1)=='telecaller') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ (request()->segment(1)=='telecaller') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-landmark"></i>
                                    <p>
                                        New Enquiery
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('caller.entry')}}" class="nav-link {{ (request()->is('telecaller/caller/customerEntry')) ? 'active' : '' }}">
                                            <i class="far fa-plus-square nav-icon"></i>
                                            <p>Add New Enquiery</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--End First Nav  part-1 section  -->
                            @if(session('caller')->power=='Leader')
                            <!-- First Nav section  -->
                            <li class="nav-item {{ (request()->segment(1)=='own') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ (request()->segment(1)=='own') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-caret-square-down"></i>
                                    <p>
                                        My Task
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('assignedNewLeads.index')}}" class="nav-link {{ (request()->is('own/Leader/assignedNewLeads')) ? 'active' : '' }}">
                                            <i class="fas fa-user-tie nav-icon"></i>
                                            <p>New Assiged Enquiery</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('assignedleads.index')}}" class="nav-link {{ (request()->is('own/Leader/assignedleads')) ? 'active' : '' }}">
                                            <i class="fas fa-user-tie nav-icon"></i>
                                            <p>Profiling</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('offerAcOeDeLeader.index')}}" class="nav-link {{ (request()->is('own/leads/acceptOrDeny/offerAcOeDeLeader')) ? 'active' : '' }}">
                                            <i class="fas fa-id-card-alt nav-icon"></i>
                                            <p>Proposal</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('offerAcceptedFileUploadLeader.index')}}" class="nav-link {{ (request()->is('own/leads/accepted/offerAcceptedFileUploadLeader')) ? 'active' : '' }}">
                                            <i class="fas fa-file-upload nav-icon"></i>
                                            <p>Documents Upload</p>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{route('feildForConCaseLeader.index')}}" class="nav-link {{ (request()->is('own/leads/DocumentCollected/feildForConCaseLeader')) ? 'active' : '' }}">
                                            <i class="fas fa-clipboard-check nav-icon"></i>
                                            <p>Logins</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--End First Nav section  -->
                            @endif
                             <!-- First Nav section  -->
                             <li class="nav-item {{ (request()->segment(1)=='caller') ? 'menu-open' : '' }}">
                                <a href="#" class="nav-link {{ (request()->segment(1)=='caller') ? 'active' : '' }}">
                                    <i class="nav-icon fas fa-running"></i>
                                    <p>
                                        My Leads
                                        <i class="right fas fa-angle-left"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('MyLeadsStatus.index')}}" class="nav-link {{ (request()->is('caller/EnquieryManagement/MyLeadsStatus')) ? 'active' : '' }}">
                                            <i class="fas fa-crown nav-icon"></i>
                                            <p>My Leads Status</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--End First Nav section  -->
                            <!-- (11th) Nav section  -->
                            {{-- <li class="nav-item">
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
                                            <p>Redeem Setting</p>
                                        </a>
                                    </li>
                                </ul>
                            </li> --}}
                            <!--End 11th Nav section  -->
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
