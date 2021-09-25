@extends('layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h5 class="m-0">ADD SUB PRODUCTS</h5>
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
                    <h3 class="card-title">Add New Sub Product</h3>
                </div>
                <form method="POST" action="" id="sub_product_form">
                    @csrf
                    <div class="card-body">
                        {{-- form first row --}}
                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <label for="SubProductName">Sub Products Name</label>
                                    <input type="text" class="form-control" id="SubProductName" name="SubProductName"
                                        placeholder="Enter Sub Product Name">
                                </div>
                            </div>
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <label for="sub_product_of">Sub product Of</label>
                                    <select class="form-control" id="sub_product_of" name="sub_product_of">
                                        <option value=0 selected>Choose the Product</option>
                                        @foreach ($product as $single_product )
                                        <option value="{{$single_product->id}}">{{$single_product->productname}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col col-md-4 mt-4">
                                <button class="btn btn-success mt-2 ">ADD</button>
                            </div>
                        </div>
                        {{-- end of form first row --}}

                    </div>
                </form>
            </div>
            {{-- end of card --}}
        </div>
    </div>
    </div>
<!-- /.content -->
@endsection
{{-- section ajax --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(function() {
        $('.yajra-datatable').DataTable();
        //section to handle the form submission
        $("#sub_product_form").submit(function(event) {
        event.preventDefault();
         //section for revoke validation
        $("#SubProductName").removeClass('is-invalid');
        $("#sub_product_of").removeClass('is-invalid');
        var validation_status = true;
        var sub_product_name = $("#SubProductName").val();
        var sub_product_of = $("#sub_product_of").val();
        //validation
        if (sub_product_name === "") {
        $("#SubProductName").addClass('is-invalid');
        validation_status = false;
    } else {
        $("#SubProductName").addClass('is-valid');
        validation_status = true;
    }
    if (sub_product_of == "0") {
        $("#sub_product_of").addClass('is-invalid');
        validation_status = false;
    } else {
        $("#sub_product_of").addClass('is-valid');
        validation_status = true;
    }
   sub_product_name= sub_product_name.toUpperCase();
     //section if all then field are ok
    if (validation_status) {
        $.ajax({
            url: '{{ route('subproducts.store') }}',
            type: 'POST',
            data: {
                _token: "{{ csrf_token() }}",
                Subproductname:sub_product_name,
                Subproductof:sub_product_of
            },
            success: function(data) {
                if (data == 1) {
                    Swal.fire({
                        title: 'You Have Added Sub Product Sucessfully',
                        showDenyButton: false,
                        showCancelButton: false,
                        confirmButtonText: `Ok`,
                        denyButtonText: `Don't save`,
                    }).then(() => {
                        //section after added a product
                        $("#sub_product_of").val("0");
                        $("#SubProductName").val("");
                        $("#ProductName").removeClass('is-valid');
                        window.location.href =
                                            "{{ route('admindashboard') }}";
                    })
                } else {
                    Swal.fire(
                        'Product not added!',
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
        var url = '{{ route('products.edit', ':id') }}';
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
                $("#product_name_update").val(repsonse.productname);
                $("#update_id").val(repsonse.id);
            }
        });
    }) //end section to handle the edit button
    //SECTION FOR HANDLING THE DELETE REQUEST
     $('body').on('click', '.delete', function(event) {
    event.preventDefault();
    var id = $(this).attr('id');
    var url = '{{ route('products.destroy', ':id') }}';
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
            $("#product_name_update").removeClass('is-invalid');



            var id = $('#update_id').val();
            var product_name = $('#product_name_update').val();

            var validation_status = false;

            if (product_name == "") {
                $("#product_name_update").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#product_name_update").addClass('is-valid');
                validation_status = true;
            }

            product_name=product_name.toUpperCase();

            var url = '{{ route('products.update', ':id') }}';
            url = url.replace(':id', id);

            if (validation_status) {
                $.ajax({

                    url: url,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        productname:product_name,


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
                                        "{{ route('products.index') }}";
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
