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
            @if (session('caller'))
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('caller.dashboard', session('caller')->id) }}">Back</a></p>
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
                            <h3>{{ $user_wallet->start_coins }}</h3> <i class="fas fa-star p-2 mt-4 fa-7x"></i><br>
                            <input type="hidden" id="existing_star_coins" value="{{ $user_wallet->start_coins }}">
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
                            <h3>{{ $user_wallet->value_coins }}</h3><i class="fas fa-cookie p-2 mt-4 fa-7x"></i> <br>
                            <input type="hidden" id="existing_chips_coins" value="{{ $user_wallet->value_coins }}">
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
                            <h3>{{ $user_wallet->heart_coins }}</h3><i class="fas fa-heart p-2 mt-4 fa-7x"></i><br>
                            <input type="hidden" id="existing_heart_coins" value="{{ $user_wallet->heart_coins }}">
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
                            <h3>{{ $user_wallet->start_coins + $user_wallet->value_coins + $user_wallet->heart_coins }}</h3><i class="fab fa-bitcoin p-2 mt-4 fa-7x"></i> <br>
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
                                <div class="col col-md-4">
                                    <div class="text-center">
                                        <h5>Name : <small>{{ $user_wallet->name }}</small></h5>
                                    </div>
                                    <h3 class="profile-username text-center">Phone :{{ $user_wallet->cus_phonenumber }}
                                    </h3>
                                    <p class="text-muted text-center">Email :{{ $user_wallet->email }}</p>
                                    <p class="text-muted text-center">Existing Super Reward Points :{{ $user_wallet->super_reward_point }}</p>
                                </div>
                                <div class="col-md-3">
                                    @if($user_wallet->redeem_request==0)
                                    <small class="badge badge-danger">Not Requested</small>
                                    @else
                                    <small class="badge badge-success">Requested</small>
                                    <button type="button" class="btn btn-success" id="update_reedem_status_btn">
                                        Update Redeem Status
                                    </button>
                                    @endif
                                </div>
                                <div class="col col-md-5">
                                    <button type="button" class="btn btn-success" id="add_chips_btn" data-toggle="modal"
                                        data-target="#modal-add-chips">
                                        Add Chips
                                    </button>
                                    <button type="button" class="btn btn-danger" id="super_reward_points">
                                        Add Super Reward points
                                    </button>
                                    <a href="{{route('wallteByAdmin.edit',$user_wallet->wallet_of_user)}}" class="btn btn-primary"><i class="fas fa-history px-1"></i>History</a>
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
                            <div id="super_reward_points_section">
                                <div class="row" >
                                    <div class="col-md-3">
                                        <div class="position-relative p-3 bg-gray" style="height: 180px">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-primary">
                                                    Stars
                                                </div>
                                            </div>
                                            <h3 id="super_reward_point_stars_view">{{ $user_wallet->start_coins }}</h3><br>
                                            <div class="container">
                                                <input type="number" class="form-control" id="super_reward_point_stars"
                                                    placeholder="Enter stars">
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
                                            <h3 id="super_reward_point_chips_view">{{ $user_wallet->value_coins }}</h3> <br>
                                            <div class="container">
                                                <input type="number" class="form-control" id="super_reward_point_chips"
                                                    placeholder="Enter chips">
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
                                            <h3 id="super_reward_point_hearts_view">{{ $user_wallet->heart_coins }}</h3> <br>
                                            <div class="container">
                                                <input type="number" class="form-control" id="super_reward_point_hearts"
                                                    placeholder="Enter hearts">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="position-relative p-3 bg-gray" style="height: 180px">
                                            <div class="ribbon-wrapper ribbon-lg">
                                                <div class="ribbon bg-success">
                                                    Super reward
                                                </div>
                                            </div>
                                            <h3 id="super_reward_point_total_view">0</h3> <br>
                                            <div class="container">
                                                <input type="number" class="form-control" id="super_reward_point_total"
                                                    placeholder="Total Points" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row d-flex justify-content-end">
                                    <div class="p-3">
                                        <input type="hidden" id="blance_of_stars">
                                        <input type="hidden" id="blance_of_chips">
                                        <input type="hidden" id="blance_of_hearts">
                                        <button type="button" class="btn btn-primary" id="add_super_reward_btn">Add To wallet</button>
                                    </div>
                                </div>
                            </div>
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
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <div id="update_chips_error" class="text-danger"></div>
                                            <label for="update_chips">No Of Chips</label>
                                            <input type="number" class="form-control" id="update_chips"
                                                placeholder="Enter number of chips">
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
            </div>
        </div>
    </div>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>







<script>
    $(function() {

        //hiding things while loading page
        $('#super_reward_points_section').hide();


         //section to handle update redeem status btn
         $('body').on('click','#update_reedem_status_btn',function()
         {
            let wallet_id = $('#waller_id').val();
            let url = '{{ route('wallteByAdmin.store') }}';
            Swal.fire({
                    title:'Do you want to Update redeem status',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: `sure`,
                    denyButtonText: `cancel`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({

                            url: url,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                wallet_id: wallet_id,
                                table: 3
                            },
                            success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        title: 'Success',
                                        text: "You updated Redeem Status",
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ route('customer.master') }}";
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Somthing Went Worng!',
                                        'You have not made any Changes.',
                                        'error'
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

            $('#update_chips').removeClass('is-invalid');

            let super_reward_points=$('#super_reward_point_total').val();
            let balance_stars=$('#blance_of_stars').val();
            let balance_chips=$('#blance_of_chips').val();
            let balance_hearts=$('#blance_of_hearts').val();
            let wallet_id = $('#waller_id').val();

            let url = '{{ route('wallteByAdmin.store') }}';
            let validation = true;

            if (validation) {
                Swal.fire({
                    title: 'Do you want to add Super Reward',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: `sure`,
                    denyButtonText: `cancel`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({

                            url: url,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                wallet_id: wallet_id,
                                balance_stars:balance_stars,
                                balance_chips:balance_chips,
                                balance_hearts:balance_hearts,
                                super_reward_points:super_reward_points,
                                table: 2
                            },
                            success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        title: 'Success',
                                        text: "You Added Chips Successfully",
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ route('customer.master') }}";
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Somthing Went Worng!',
                                        'You have not made any Changes.',
                                        'error'
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
            let hearts = $('#super_reward_point_hearts').val();
            let existing_stars = $('#existing_star_coins').val();
            let balance = existing_stars - stars;
            if(balance < 0) {
            $(this).addClass('is-invalid');
            $('#super_reward_point_total').val(0);
            $('#add_super_reward_btn').prop('disabled',true);
            $('#super_reward_point_total_view').html("0");
            $('#super_reward_point_stars_view').html("0");
             }
             else
            {
            $(this).removeClass('is-invalid');
            $('#super_reward_point_stars_view').html(balance.toString());
            $('#blance_of_stars').val(Number(balance));
            $('#super_reward_point_total_view').html((Number(stars)+Number(chips)+Number(hearts)).toString());
            $('#super_reward_point_total').val(Number(stars)+Number(chips)+Number(hearts));
            $('#add_super_reward_btn').prop('disabled',false);
            }
        });
        //end section to validate input for super reward starts

         //section to validate input for super reward chips
         $("#super_reward_point_chips").blur(function() {
            let stars = $('#super_reward_point_stars').val();
            let chips = $(this).val();
            let hearts = $('#super_reward_point_hearts').val();
            let existing_chips = $('#existing_chips_coins').val();
            let balance = existing_chips - chips;
            if(balance < 0) {
            $(this).addClass('is-invalid');
            $('#super_reward_point_total').val(0);
            $('#super_reward_point_total_view').html("0");
            $('#super_reward_point_chips_view').html("0");
            $('#add_super_reward_btn').prop('disabled',true);
             }
             else
            {
            $(this).removeClass('is-invalid');
            $('#super_reward_point_chips_view').html(balance.toString());
            $('#blance_of_chips').val(Number(balance));
            $('#super_reward_point_total_view').html((Number(stars)+Number(chips)+Number(hearts)).toString());
            $('#super_reward_point_total').val(Number(stars)+Number(chips)+Number(hearts));
            $('#add_super_reward_btn').prop('disabled',false);
            }
        });
        //end section to validate input for super reward chips

        //section to validate input for super reward hearts
        $("#super_reward_point_hearts").blur(function() {
            let stars = $('#super_reward_point_stars').val();
            let chips = $('#super_reward_point_chips').val();
            let hearts = $(this).val();
            let existing_hearts = $('#existing_heart_coins').val();
            let balance = existing_hearts - hearts;
            if(balance < 0) {
            $(this).addClass('is-invalid');
            $('#super_reward_point_total').val(0);
            $('#super_reward_point_total_view').html("0");
            $('#super_reward_point_hearts_view').html("0");
            $('#add_super_reward_btn').prop('disabled',true);
            } else
            {
            $(this).removeClass('is-invalid');
            $('#super_reward_point_hearts_view').html(balance.toString());
            $('#blance_of_hearts').val(Number(balance));
            $('#super_reward_point_total_view').html((Number(stars)+Number(chips)+Number(hearts)).toString());
            $('#super_reward_point_total').val(Number(stars)+Number(chips)+Number(hearts));
            $('#add_super_reward_btn').prop('disabled',false);
            }
        });
        //end section to validate input for super reward hearts

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
                    title: 'Do you want to update',
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: `sure`,
                    denyButtonText: `cancel`,
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $.ajax({

                            url: url,
                            type: "POST",
                            data: {
                                _token: "{{ csrf_token() }}",
                                wallet_id: wallet_id,
                                chips_value: chips_value,
                                table: 1
                            },
                            success: function(data) {
                                if (data == 1) {
                                    Swal.fire({
                                        title: 'Success',
                                        text: "You Added Chips Successfully",
                                        icon: 'success',
                                        confirmButtonColor: '#3085d6',
                                        confirmButtonText: 'ok'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.href =
                                                "{{ route('customer.master') }}";
                                        }
                                    })
                                } else {
                                    Swal.fire(
                                        'Somthing Went Worng!',
                                        'You have not made any Changes.',
                                        'error'
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
