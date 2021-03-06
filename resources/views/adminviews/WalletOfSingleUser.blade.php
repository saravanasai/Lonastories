@extends('layouts.master')
@section('content')
<!-- Main content -->
<div class="content ">
    <div class="container mt-1">
        <h2 class="mb-4">Wallet of single User</h2>
        <input type="hidden" id="waller_id" value="{{ $user_wallet->wallet_id }}">
        @if (session('admin'))
        <div class="float-right">
            <p class="breadcrumb-item"><a href="{{ route('customer.master') }}">back</a></p>
        </div>
        @endif
    </div>
    <div class="container py-5">
        <div id="add_chips_section">
            <div class="row">
                <div class="col-md-3">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-primary">
                                Stars
                            </div>
                        </div>
                        <div class="d-flex">
                            <h3>{{ $user_wallet->start_coins }}</h3> <br>
                            <input type="hidden" id="existing_star_coins" value="{{ $user_wallet->start_coins }}">
                        </div>
                        <div>
                            <i class="fas fa-star p-2 mt-4 fa-5x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-primary">
                                Chips
                            </div>
                        </div>
                        <div class="d-flex">
                            <h3>{{ $user_wallet->value_coins }}</h3> <br>
                            <input type="hidden" id="existing_chips_coins" value="{{ $user_wallet->value_coins }}">
                        </div>
                        <div>
                            <i class="fas fa-cookie p-2 mt-4 fa-5x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-primary">
                                Hearts
                            </div>
                        </div>
                        <div class="d-flex">
                            <h3>{{ $user_wallet->heart_coins }}</h3><br>
                            <input type="hidden" id="existing_heart_coins" value="{{ $user_wallet->heart_coins }}">
                        </div>
                        <div>
                            <i class="fas fa-heart p-2 mt-4 fa-5x"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="position-relative p-3 bg-gray" style="height: 180px">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-success">
                                Loyalty point
                            </div>
                        </div>
                        <div class="d-flex">
                            <h3>{{ $user_wallet->start_coins + $user_wallet->value_coins }}</h3><br>

                        </div>
                        <div>
                            <i class="fab fa-bitcoin p-2 mt-4 fa-5x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col col-md-12">
                <div class="card card-purple card-outline">
                    <div class="card-body box-profile">
                        <div class="row">
                            <div class="col col-md-3">
                                <div class="text-center">
                                    <h5>Name : <small>{{ $user_wallet->name }}</small></h5>
                                </div>
                                <h3 class="profile-username text-center">Phone :{{ $user_wallet->cus_phonenumber }}
                                </h3>
                                <p class="text-muted text-center">Email :{{ $user_wallet->email }}</p>
                                <p class="text-muted text-center">Promo Code :{{ $user_wallet->PromoCode }}</p>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-success" id="add_chips_btn" data-toggle="modal" data-target="#modal-add-chips">
                                    Add Chips
                                </button>
                                <button type="button" class="btn btn-primary" id="super_reward_point" data-toggle="modal" data-target="#modal-add-super-reward-points">
                                    Add Super Reward points
                                </button>
                                <button type="button" class="btn btn-info" id="super_reward_poin" data-toggle="modal" data-target="#modal-add-active-hearts-points">
                                    Add Active Hearts
                                </button>
                                {{-- <a href="{{route('wallteByAdmin.edit',$user_wallet->wallet_of_user)}}" class="btn btn-primary"><i class="fas fa-history px-1"></i>History</a> --}}
                            </div>
                        </div>
                        @if(Session::has('nohistory'))
                        <div class="row">
                            <div class="col">
                                <div class="alert alert-danger alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Error!</strong> No Transaction is Available.
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            {{-- Add More chips model start --}}
            <div class="modal fade" id="modal-add-chips" style="display: none;" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-white">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Chips</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">??</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div id="update_chips_error" class="text-danger"></div>
                                        <label for="update_chips">No Of Chips</label>
                                        <input type="number" class="form-control" id="update_chips" placeholder="Enter number of chips">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="updatecoins">Update Coins</button>
                            <input type="hidden" value="" id="update_id">
                        </div>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            {{-- Add More model end --}}
            {{-- Add Super Reward point model start --}}
            <div class="modal fade" id="modal-add-super-reward-points" style="display: none;" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-white">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Super Reward Points</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">??</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="super_reward_point_stars_avaiable">STARTS AVAIABLE</label>
                                        <input type="number" class="form-control" id="super_reward_point_stars_avaiable"  value="{{$user_wallet->start_coins}}" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="super_reward_point_chips_avaiable">CHIPS AVAIABLE</label>
                                        <input type="number" class="form-control" id="super_reward_point_chips_avaiable" value="{{$user_wallet->value_coins }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="super_reward_point_stars">No Of Stars</label>
                                        <input type="number" class="form-control" id="super_reward_point_stars" placeholder="Enter stars">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="super_reward_point_chips">No Of Chips</label>
                                        <input type="number" class="form-control" id="super_reward_point_chips" placeholder="Enter chips">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="super_reward_point_total">TOTAL SRP</label>
                                        <input type="number" class="form-control" id="super_reward_point_total" placeholder="Total Reward Points" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="view_promo_code">PROMO CODE</label>
                                        <input type="text" class="form-control" id="view_promo_code" placeholder="PROMO CODE" value="{{$user_wallet->PromoCode }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="">Redem Remark</label>
                                        <input type="text" class="form-control" id="super_reward_point_redem_text" placeholder="Enter Redem Remark">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="add_super_reward_btn">ADD SUPER REWARD POINTS</button>
                        </div>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            {{--  Add Super Reward point model  end --}}
             {{-- Add Active Heart model start --}}
             <div class="modal fade" id="modal-add-active-hearts-points" style="display: none;" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content bg-white">
                        <div class="modal-header">
                            <h4 class="modal-title">Add Active Hearts</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">??</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div id="update_chips_error" class="text-danger"></div>
                                        <label for="update_chips">HEARTS AVAIABLE</label>
                                        <input type="number" class="form-control" id="super_reward_point_hearts_available" placeholder="" value="{{$user_wallet->heart_coins }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div id="update_chips_error" class="text-danger"></div>
                                        <label for="update_chips">No Of Hearts</label>
                                        <input type="number" class="form-control" id="super_reward_point_hearts" placeholder="Enter hearts">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="add_active_point_btn">ADD ACTIVE HEARTS</button>
                            <input type="hidden" value="" id="update_id">
                        </div>
                    </div>

                </div>
                <!-- /.modal-content -->
            </div>
            {{--  Add Active Heart model  end --}}
        </div>
    </div>
</div>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>







<script>
    $(function() {

         //section to disable the update buttons of model;
         $('#add_active_point_btn').prop('disabled', true);


        //section to handle update redeem status btn
        $('body').on('click', '#update_reedem_status_btn', function() {
            let wallet_id = $('#waller_id').val();
            let url = '{{ route('wallteByAdmin.store') }}';
            Swal.fire({
                title: 'Do you want to Update redeem status'
                , showDenyButton: true
                , showCancelButton: false
                , confirmButtonText: `sure`
                , denyButtonText: `cancel`
            , }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({

                        url: url
                        , type: "POST"
                        , data: {
                            _token: "{{ csrf_token() }}"
                            , wallet_id: wallet_id
                            , table: 3
                        }
                        , success: function(data) {
                            if (data == 1) {
                                Swal.fire({
                                    title: 'Success'
                                    , text: "You updated Redeem Status"
                                    , icon: 'success'
                                    , confirmButtonColor: '#3085d6'
                                    , confirmButtonText: 'ok'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href =
                                            "{{ route('customer.master') }}";
                                    }
                                })
                            } else {
                                Swal.fire(
                                    'Somthing Went Worng!'
                                    , 'You have not made any Changes.'
                                    , 'error'
                                )

                            }

                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('You cancelled', '', 'info')
                }
            })
        })
        //end section to handle update redeem status btn

        //section for updating the super reward point request
        $('body').on('click', '#add_super_reward_btn', function() {

            let super_reward_points = $('#super_reward_point_total').val();
            let balance_stars = $('#super_reward_point_stars_avaiable').val();
            let balance_chips = $('#super_reward_point_chips_avaiable').val();
            let redem_text = $('#super_reward_point_redem_text').val();
            let wallet_id = $('#waller_id').val();
            let url = '{{ route('wallteByAdmin.store') }}';

            let validation = true;

            if (validation) {
                Swal.fire({
                    title: 'Do you want to add Super Reward'
                    , showDenyButton: true
                    , showCancelButton: false
                    , confirmButtonText: `sure`
                    , denyButtonText: `cancel`
                , }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({

                            url: url
                            , type: "POST"
                            , data: {
                                _token: "{{ csrf_token() }}"
                                , wallet_id: wallet_id
                                , balance_stars: balance_stars
                                , balance_chips: balance_chips
                                , super_reward_points: super_reward_points
                                , redem_text: redem_text
                                , table: 2
                            }
                            , success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        title: 'Success'
                                        , text: "You Added Super Reward Point Successfully"
                                        , icon: 'success'
                                        , confirmButtonColor: '#3085d6'
                                        , confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ route('customer.master') }}";
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Somthing Went Worng!'
                                        , 'You have not made any Changes.'
                                        , 'error'
                                    )

                                }

                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('You cancelled', '', 'info')
                    }
                })
            }

        })
        //end section for updating the super reward point request

        //section to validate input for super reward starts
        $("#super_reward_point_stars").blur(function() {
            let stars = $(this).val();
            let chips = $('#super_reward_point_chips').val();
            let existing_stars = $('#super_reward_point_stars_avaiable').val();
            let balance = existing_stars - stars;
            if (balance < 0) {
                $(this).addClass('is-invalid');
                $('#add_super_reward_btn').prop('disabled', true);
            } else {
                $(this).removeClass('is-invalid');
                $(this).prop('disabled',true);
                $('#super_reward_point_stars_avaiable').val(balance);
                $('#super_reward_point_total').val(Number(stars)+Number(chips));
                $('#add_super_reward_btn').prop('disabled', false);
            }
        });
        //end section to validate input for super reward starts

        //section to validate input for super reward chips
        $("#super_reward_point_chips").blur(function() {

            let chips = $(this).val();
            let stars = $("#super_reward_point_stars").val();
            let existing_chips = $('#super_reward_point_chips_avaiable').val();
            let balance = existing_chips - chips;
            if (balance < 0) {
                $(this).addClass('is-invalid');
                $('#add_super_reward_btn').prop('disabled', true);
            } else {
                $(this).removeClass('is-invalid');
                $(this).prop('disabled',true);
                $('#super_reward_point_chips_avaiable').val(balance);
                $('#super_reward_point_total').val(Number(stars)+Number(chips));
                $('#add_super_reward_btn').prop('disabled', false);
            }
        });
        //end section to validate input for super reward chips

        //section to validate input for super reward hearts
        $("#super_reward_point_hearts").blur(function() {

            let hearts = $(this).val();
            let existing_hearts = $('#super_reward_point_hearts_available').val();
            let balance = existing_hearts - hearts;
            if (balance < 0) {
                $(this).addClass('is-invalid');
                $('#super_reward_point_total').val(0);
                $('#super_reward_point_total_view').html("0");
                $('#super_reward_point_hearts_view').html("0");
                $('#add_active_point_btn').prop('disabled', true);
            } else {
                $(this).removeClass('is-invalid');
                $('#super_reward_point_hearts_available').val(Number(balance));
                $('#add_active_point_btn').prop('disabled', false);
                $('#super_reward_point_hearts').prop('disabled', true);

            }
        });
        //end section to validate input for super reward hearts

        //section for updating the active hearts request
        $('body').on('click', '#add_active_point_btn', function() {

            let balance_hearts = $('#super_reward_point_hearts_available').val();
            let active_hearts = $('#super_reward_point_hearts').val();
            let wallet_id = $('#waller_id').val();
            let url = '{{ route('wallteByAdmin.store') }}';

            let validation = true;


            if (validation) {
                Swal.fire({
                    title: 'Do you want to add Active Hearts'
                    , showDenyButton: true
                    , showCancelButton: false
                    , confirmButtonText: `sure`
                    , denyButtonText: `cancel`
                , }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({

                            url: url
                            , type: "POST"
                            , data: {
                                _token: "{{ csrf_token() }}"
                                , wallet_id: wallet_id
                                , balance_hearts: balance_hearts
                                , active_hearts: active_hearts
                                , table: 2
                            }, success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        title: 'Success'
                                        , text: "You Added Active Hearts Successfully"
                                        , icon: 'success'
                                        , confirmButtonColor: '#3085d6'
                                        , confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ route('customer.master') }}";
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Somthing Went Worng!'
                                        , 'You have not made any Changes.'
                                        , 'error'
                                    )

                                }

                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('You cancelled', '', 'info')
                    }
                })
            }

        })
        //end section for updating the active hearts request





        //SECTION TO HANDLE THE ADD CHIPS BUTTON CLICK
        $('body').on('click', '#add_chips_btn', function() {
            $('#super_reward_points_section').hide();
            $('#add_chips_section').show();
        })
        //END SECTION TO HANDLE THE ADD CHIPS BUTTON CLICK

        //SECTION FOR HANDLING THE ADD CHIPS REQUEST
        $('body').on('click', '#updatecoins', function() {

            $('#update_chips').removeClass('is-invalid');
            $('#super_reward_points_section').hide();
            let chips_value = $('#update_chips').val();
            let wallet_id = $('#waller_id').val();
            let url = '{{ route('wallteByAdmin.store') }}';
            let validation = true;
            if (chips_value == "") {
                $('#update_chips').addClass('is-invalid');
                $('#update_chips_error').html('Enter Numeric value');
                validation = false;
            }

            if (validation) {
                Swal.fire({
                    title: 'Do you want to update'
                    , showDenyButton: true
                    , showCancelButton: false
                    , confirmButtonText: `sure`
                    , denyButtonText: `cancel`
                , }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({

                            url: url
                            , type: "POST"
                            , data: {
                                _token: "{{ csrf_token() }}"
                                , wallet_id: wallet_id
                                , chips_value: chips_value
                                , table: 1
                            }
                            , success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        title: 'Success'
                                        , text: "You Added Chips Successfully"
                                        , icon: 'success'
                                        , confirmButtonColor: '#3085d6'
                                        , confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ route('customer.master') }}";
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Somthing Went Worng!'
                                        , 'You have not made any Changes.'
                                        , 'error'
                                    )

                                }

                            }
                        });
                    } else if (result.isDenied) {
                        Swal.fire('You cancelled', '', 'info')
                    }
                })
            }






        })
        //END OF SECTION FOR HANDLING THE ADD CHIPS REQUEST

        //SECTION TO HANDLE ADD SUPER REWARD BTN
        $('body').on('click', '#super_reward_points', function() {
            $('#super_reward_points_section').show();
            $('#add_chips_section').hide();
        })
        //END SECTION TO HANDLE ADD SUPER REWARD BTN


    })

</script>
