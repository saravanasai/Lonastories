@extends('layouts.master')


@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h5 class="m-0">EDIT CALLER INFO AND STATUS</h5>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @if(session('admin'))
                    <div class="float-right"><p class="breadcrumb-item"><a href="{{route('caller.create') }}">Back</a></p></div>
                    @endif
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="card card-purple">
        <div class="card-header">
          <h3 class="card-title">CALLER INFO</h3>
        </div>
        <div class="card-body">
        <form action="{{route('caller.update',$caller_info->id)}}" method="post">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col col-md-4">
                    <div class="form-group">
                        <label for="caller_first_name">First Name</label>
                        @error('caller_first_name')
                          <div class="text-danger">{{$message}}</div>
                        @enderror
                        <input type="text" id="caller_first_name" name="caller_first_name" class="form-control" value="{{$caller_info->firstname}}" placeholder="First Name">
                      </div>
                </div>
                <div class="col col-md-4">
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        @error('caller_last_name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <input type="text" id="last_name" name="caller_last_name" class="form-control" value="{{$caller_info->lastname}}" placeholder="Last Name">
                      </div>
                </div>

                <div class="col col-md-4">
                    <div class="form-group">
                        <label for="caller_phone_number">Phone Number</label>
                        @error('caller_phone_number')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <input type="text" id="caller_phone_number" name="caller_phone_number" class="form-control" value="{{$caller_info->phonenumber}}" placeholder="Phone Number">
                      </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="adhar_number_update">Adhar Number</label>
                        @error('caller_adhar_number')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <input type="text" class="form-control" id="adhar_number_update" name="caller_adhar_number"
                          value="{{$caller_info->adharnumber}}"   placeholder="Enter adhar number">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="callerPower_update">Power</label>
                        @error('caller_power')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                        <select class="form-control" id="callerPower_update" name="caller_power">
                            <option value="" selected>Choose the power</option>
                            <option value="Leader">Leader</option>
                            <option value="Caller">Caller</option>
                        </select>

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="change_password">Change Password</label>
                        <input type="text" class="form-control" id="change_password" name="change_password"
                            placeholder="Enter New Password ">
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col col-md-2 offset-md-10">
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane px-1"></i>Update</button>
                </div>
            </div>
        </form>
        </div>
        <!-- /.card-body -->
      </div>
</div>
<!-- /.content -->

@endsection
