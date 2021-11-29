@extends('layouts.master')
@section('content')
@if (session()->has('infoUpdated'))
<script>
    Swal.fire(
  'Good job!',
  'Information Upadated!',
  'success'
)
</script>
@endif
@if (session()->has('CannotDelete'))
<script>
    Swal.fire(
    'Oops!',
    'Cannot Done a Process!',
    'error'
  )
</script>
@endif
    <!-- Main content -->
    <div class="content">
        <div>
            <div class="container mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <!-- Profile Image -->
                        <div class="card card-success card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    @if ($customer_info->user_profile_img_status == 0)
                                        <img class="profile-user-img img-fluid img-circle bg-secondary"
                                            src="{{ asset('frontend/img/avatar.png') }}" alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{ asset('profileimg/' . $customer_info->user_profile_img) }}"
                                            alt="User profile picture">
                                    @endif

                                </div>

                                <h3 class="profile-username text-center">{{ $customer_info->name }}</h3>

                                <p class="text-muted text-center">{{ $customer_info->dob }}</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{ $customer_info->email }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Phone</b> <a class="float-right">{{ $customer_info->cus_phonenumber }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Referal Code</b> <a
                                            class="float-right">{{ $customer_info->cus_referal_code }}</a>
                                    </li>
                                    @if ($ref_on == 1)
                                        <li class="list-group-item">
                                            <b>Refered By</b> <a class="float-right">{{ $isRefByUser->name }}</a>
                                        </li>
                                    @elseif ($ref_on == 2)
                                        <li class="list-group-item">
                                            <b>Refered By </b> <a class="float-right">DIRECT</a>
                                        </li>
                                    @else
                                        <li class="list-group-item">
                                            <b>Refered By Caller</b> <a
                                                class="float-right">{{ $isRefByUser->firstname }}</a>
                                        </li>
                                    @endif
                                    <li class="list-group-item">
                                        <b>Promo Code</b> <a class="float-right">{{ $customer_info->PromoCode}}</a>
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col col-md-5 offset-md-6">
                                                <form action="{{route('AdminUserProfile.destroy',$customer_info->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn  btn-sm btn-danger btn-block"><b></b><i
                                                        class="fas fa-trash-alt px-2"></i>DELETE</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-8">
                        <div class="card card-purple">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active text-white" href="#activity"
                                            data-toggle="tab">REFERED BY</a></li>
                                    <li class="nav-item"><a class="nav-link text-white" href="#timeline"
                                            data-toggle="tab">UPDATE INFO</a></li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">
                                    @if ($ref_on == 1)
                                        <div class="active tab-pane" id="activity">
                                            <div class="col md-6">
                                                <div class="card">
                                                    <div class="card-body box-profile">
                                                        <div class="text-center">
                                                            @if ($isRefByUser->user_profile_img_status == 0)
                                                                <img class="profile-user-img img-fluid img-circle bg-secondary"
                                                                    src="{{ asset('frontend/img/avatar.png') }}"
                                                                    alt="User profile picture">
                                                            @else
                                                                <img class="profile-user-img img-fluid img-circle"
                                                                    src="{{ asset('profileimg/' . $isRefByUser->user_profile_img) }}"
                                                                    alt="User profile picture">
                                                            @endif

                                                        </div>

                                                        <h3 class="profile-username text-center">{{ $isRefByUser->name }}
                                                        </h3>

                                                        <p class="text-muted text-center">{{ $isRefByUser->dob }}</p>

                                                        <ul class="list-group list-group-unbordered mb-3">
                                                            <li class="list-group-item">
                                                                <b>Email</b> <a
                                                                    class="float-right">{{ $isRefByUser->email }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Phone</b> <a
                                                                    class="float-right">{{ $isRefByUser->cus_phonenumber }}</a>
                                                            </li>
                                                            <li class="list-group-item">
                                                                <b>Referal Code</b> <a
                                                                    class="float-right">{{ $isRefByUser->cus_referal_code }}</a>
                                                            </li>
                                                        </ul>
                                                        {{-- <div class="row">
                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="col col-md-4 offset-md-8">
                                                                        <a href="#"
                                                                            class="btn  btn-sm btn-success btn-block"><b></b><i
                                                                                class="fas fa-swatchbook px-2"></i>View</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> --}}

                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                            </div>
                                        </div>
                                    @elseif ($ref_on != 2)
                                    <div class="active tab-pane" id="activity">
                                        <div class="card">
                                            <h4 class="p-3">TELECALER REFERAL : {{ $isRefByUser->firstname }}
                                            </h4>
                                            <h6 class="p-3">PHONE NUMBER : {{ $isRefByUser->phonenumber }}</h6>
                                        </div>
                                    </div>
                                    @else
                                    <div class="active tab-pane" id="activity">
                                        <div class="card">
                                            <h2 class="p-3">DIRECT REFERAL</h2>
                                        </div>
                                    </div>
                                    @endif
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="timeline">
                                        <form class="form-horizontal" action="{{route('AdminUserProfile.update',$customer_info->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="name" value="{{$customer_info->name}}" class="form-control" id="inputName"
                                                        placeholder="Name">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="email" value="{{$customer_info->email}}" class="form-control" id="inputEmail"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Phone</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="phone" value="{{$customer_info->cus_phonenumber}}" class="form-control" id="inputName2"
                                                        placeholder="Phone Number">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">DOB</label>
                                                <div class="col-sm-10">
                                                    <input type="date" name="dob" value="{{$customer_info->dob}}" class="form-control" id="inputName2"
                                                        placeholder="Date Of Birth">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="offset-sm-2 col-sm-10 float-right">
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-paper-plane px-1"></i>Update</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                            <div class="card-footer">
                                <div class="float-right">
                                    <a class="btn btn-sm btn-primary" href="{{ route('customer.master') }}"><i
                                            class="fas fa-backward px-2"></i>Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>

            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
