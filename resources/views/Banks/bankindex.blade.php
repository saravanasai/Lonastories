@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">ADD PRODUCTS</h5>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        @if (session('admin'))
                            <li class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Back</a></li>
                        @endif
                        @if (session('caller'))
                            <li class="breadcrumb-item"><a
                                    href="{{ route('caller.dashboard', session('caller')->id) }}">Back</a></li>
                        @endif
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
        <div class="conatiner col-md-12">
            <div class="card card-purple">
                <div class="card-header">
                    <h3 class="card-title">Add New Bank</h3>
                </div>
                <form method="POST" action="" id="new_bank_form">
                    @csrf
                    <div class="card-body">
                        {{-- form first row --}}
                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <label for="bankname">Bank Name</label>
                                    <input type="text" class="form-control" id="bankname" name="bankname"
                                        placeholder="Enter Bank Name">
                                </div>
                            </div>
                            <div class="col col-md-4 mt-4">
                                <button class="btn btn-success mt-2 ">ADD NEW BANk</button>
                            </div>
                        </div>
                        {{-- end of form first row --}}
                        {{-- second row --}}
                        <div class="row">
                            <div class="col col-md-12">
                                <table
                                    class="table table-bordered  table-sm  table-striped yajra-datatable">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>BANK ID</th>
                                            <th>BANK NAME</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($banks as $sno => $single_bank)
                                            <tr class="text-center">
                                                <td>{{ ++$sno }}</td>
                                                <td>{{ $single_bank->id }}</td>
                                                <td>{{ $single_bank->bank_name }}</td>
                                                <td><button type="button" id="{{ $single_bank->id }}"
                                                        class="btn btn-success edit" data-toggle="modal">EDIT</button></td>
                                                <td> <button type="button" id="{{ $single_bank->id }}"
                                                        class="btn btn-danger delete">DELETE</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        {{-- end of second row --}}
                    </div>
                </form>
            </div>
            {{-- end of card --}}
        </div>
    </div> {{-- section for model --}}
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Bank Name</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="bank_name_update">Bank Name</label>
                                <input type="text" class="form-control" id="bank_name_update"
                                    placeholder="bank name">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success update">Save changes</button>
                    <input type="hidden" value="" id="update_id">
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog --> {{-- end  section for model --}}
    </div>
<!-- /.content -->@endsection
{{-- section ajax --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('.yajra-datatable').DataTable();
        //section to handle the form submission
        $("#new_bank_form").submit(function(event) {
        event.preventDefault();
         //section for revoke validation
        $("#bankname").removeClass('is-invalid');
        var validation_status = true;
        var bank_name = $("#bankname").val();
        //validation
        if (bank_name === "") {
        $("#bankname").addClass('is-invalid');
        validation_status = false;
    } else {
        $("#bankname").addClass('is-valid');
        validation_status = true;
    }
    bank_name = bank_name.toUpperCase();
     //section if all then field are ok
    if (validation_status) {
        $.ajax({
            url: '{{ route('banks.store') }}',
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                bankname: bank_name,
            },
            success: function(data) {
                if (data == 1) {
                    Swal.fire({
                        title: 'New bank Added ',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: `Ok`,
                        denyButtonText: `Don't save`,
                    }).then(() => {
                        //section after added a product
                        $("#bankname").val("");
                        $("#bankname").removeClass('is-valid');
                        location.reload();
                    })
                } else {
                    Swal.fire(
                        'bank not added!',
                        'Something went Wrong',
                        'warning'
                    )
                }
            }
        });
    }
    })
    //end section submission
    //section to handle the edit button
    $('body').on('click', '.edit', function(event) {
        event.preventDefault();
        $('.modal').modal('show');
        var id = $(this).attr('id');
        var url = '{{ route('banks.edit', ':id') }}';
        url = url.replace(':id', id);
        $.ajax({
            url: url,
            type: "GET",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            success: function(data) {
                var repsonse = JSON.parse(data);
                $("#bank_name_update").val(repsonse.bank_name);
                $("#update_id").val(repsonse.id);
            }
        });
    }) //end section to handle the edit button
    //SECTION FOR HANDLING THE DELETE REQUEST
     $('body').on('click', '.delete', function(event) {
    event.preventDefault();
    var id = $(this).attr('id');
    var url = '{{ route('banks.destroy', ':id') }}';
    url = url.replace(':id', id);
    Swal.fire({
    title: 'Do you want to Delete?',
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: `Delete`,
    denyButtonText: `cancel`,
    }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
    $.ajax({
        url: url,
        type: "DELETE",
        data: {
            _token: "{{ csrf_token() }}",
            id: id
        },
        success: function(data) {
            if (data == 1) {
                Swal.fire({
                    title: 'Success',
                    text: "You won't be able to revert this!",
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'ok'
                }).then((result) => {
                    location.reload();
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
    //END OF SECTION FOR HANDLING THE DELETE REQUEST
      //section to handle the update button
      $('body').on('click', '.update', function(event) {
            event.preventDefault();



            //section for revoke validation
            $("#bank_name_update").removeClass('is-invalid');



            var id = $('#update_id').val();
            var bank_name = $('#bank_name_update').val();

            var validation_status = false;

            if (bank_name == "") {
                $("#bank_name_update").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#bank_name_update").addClass('is-valid');
                validation_status = true;
            }

            bank_name=bank_name.toUpperCase();

            var url = '{{ route('banks.update', ':id') }}';
            url = url.replace(':id', id);

            if (validation_status) {
                $.ajax({

                    url: url,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        bankname:bank_name,


                    },
                    success: function(data) {

                        if (data == 1) {
                            Swal.fire({
                                title: 'Success',
                                text: "You process done!",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href =
                                        "{{ route('banks.index') }}";
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

            }


        })

        //end section to handle the update button

    });
</script>
