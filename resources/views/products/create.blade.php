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
                    <h3 class="card-title">Add New Product</h3>
                </div>
                <form method="POST" action="" id="product_form">
                    @csrf
                    <div class="card-body">
                        {{-- form first row --}}
                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <label for="ProductName">Products Name</label>
                                    <input type="text" class="form-control" id="ProductName" name="Productname"
                                        placeholder="Enter Product Name">
                                </div>
                            </div>
                            <div class="col col-md-4 mt-4">
                                <button class="btn btn-success mt-2 ">ADD</button>
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
                                            <th>Product Id</th>
                                            <th>Product Name</th>
                                            <th>Action</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($all_products as $sno => $single_product)
                                            <tr class="text-center">
                                                <td>{{ ++$sno }}</td>
                                                <td>{{ $single_product->id }}</td>
                                                <td>{{ $single_product->productname }}</td>
                                                <td><button type="button" id="{{ $single_product->id }}"
                                                        class="btn btn-success edit" data-toggle="modal" data-target="#modal-default">EDIT</button></td>
                                                <td> <button type="button" id="{{ $single_product->id }}"
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
     {{-- section for model --}}
    <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product Detail</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="product_name_update">Product Name</label>
                                <input type="email" class="form-control" id="product_name_update"
                                    placeholder="product name">
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
<!-- /.content -->
@endsection
{{-- section ajax --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(function() {
                        $('.yajra-datatable').DataTable(
                            {
                            dom: 'Bfrt',
                            buttons: [
                            'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                                ]
                            }
                        );
                            //section to handle the form submission
                            $("#product_form").submit(function(event) {
                            event.preventDefault();
                            //section for revoke validation
                            $("#ProductName").removeClass('is-invalid');
                            var validation_status = true;
                            var product_name = $("#ProductName").val();
                            //validation
                            if (product_name === "") {
                            $("#ProductName").addClass('is-invalid');
                            validation_status = false;
                            } else {
                                $("#ProductName").addClass('is-valid');
                                validation_status = true;
                            }
                        product_name = product_name.toUpperCase();
                        //section if all then field are ok
                        if (validation_status)
                        {
                            $.ajax({
                                url: '{{ route('products.store') }}',
                                type: 'POST',
                                data: {
                                    _token: "{{ csrf_token() }}",
                                    productname: product_name,
                                },
                                success: function(data) {
                                    if (data == 1) {
                                        Swal.fire({
                                            title: 'you Have Added Product Sucessfully',
                                            showDenyButton: false,
                                            showCancelButton: false,
                                            confirmButtonText: `Ok`,
                                            denyButtonText: `Don't save`,
                                        }).then(() => {
                                            //section after added a product
                                            $("#ProductName").val("");
                                            $("#ProductName").removeClass('is-valid');
                                            location.reload();
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

         //section to handle the edit button
        $('body').on('click', '.edit', function(event) {
            event.preventDefault();

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

    });
</script>
