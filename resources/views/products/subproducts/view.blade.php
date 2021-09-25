@extends('layouts.master')


@section('content')

    <!-- jQuery library -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <h4 class="mb-4">SUB PRODUCT LIST</h4>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></p></div>
            @endif
        </div>
            <div class="container">
            <table class="table table-bordered text-nowrap">
                <thead class="bg-purple">
                    <tr>
                        <th>No</th>
                        <th>Sub Product Name</th>
                        <th>Sub Product Of</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allproduct_with_sub as $sno => $single_product)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $single_product->subproductname }}</td>
                            <td>{{ $single_product->subproductof->productname}}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" id="{{ $single_product->id }}"
                                        class="btn btn-sm btn-danger delete"><i class="fa fa-dribbble" aria-hidden="true"></i> DELETE</button>
                                        <button type="button" id="{{ $single_product->id }}" class="btn btn-success edit"
                                            data-toggle="modal"> <i class="far fa-edit px-1"></i>EDIT</button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{$allproduct_with_sub->links()}}
            </div>
        </div>
     <div class="modal fade" id="modal-default" style="display: none;" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Sub Product Detail</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="sub_pro_name_update">Sub Product Name</label>
                                <input type="text" class="form-control" id="sub_pro_name_update"
                                    placeholder="Sub Product Name">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="sub_to_product_of">Sub Product Of</label>
                                <select class="form-control" id="sub_to_product_of" name="sub_to_product_of">
                                    <option value="0" selected>Choose the product</option>
                                @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->productname}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                </div>

                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="button"  class="btn btn-primary update">Save changes</button>
                        <input type="hidden" value="" id="update_id">
                    </div>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {

        $('.yajra-datatable').DataTable({
            dom: 'frt',
            buttons: [
            'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });


        //SECTION FOR HANDLING THE DELETE REQUEST

        $('body').on('click', '.delete', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var url = '{{ route('subproducts.destroy', ':id') }}';
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
                                    if (result.isConfirmed) {
                                        window.location.href =
                                            "{{ route('subproducts.create') }}";
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

        //END OF SECTION FOR HANDLING THE DELETE REQUEST




        //section to handle the edit button
        $('body').on('click', '.edit', function(event) {
               $('.modal').modal('show');

            event.preventDefault();

            var id = $(this).attr('id');
            var url = '{{ route('subproducts.edit', ':id') }}';
            url = url.replace(':id',id);

            $.ajax({

                url:url,
                type: "GET",
                data: {
                    _token: "{{ csrf_token() }}",
                    id:id
                },
                success: function(data) {
                    var repsonse = JSON.parse(data);
                   console.log(repsonse[0].subproductof.id);
                    $("#sub_pro_name_update").val(repsonse[0].subproductname);
                    $("#sub_to_product_of").val(repsonse[0].subproductof.id);
                    $("#update_id").val(repsonse[0].id);



                }

            });
         })

        //end section to handle the edit button

        //section to handle the update button
        $('body').on('click', '.update', function(event) {
            event.preventDefault();



            //section for revoke validation
            $("#sub_pro_name_update").removeClass('is-invalid');
            $("#sub_to_product_of").removeClass('is-invalid');



            var id = $('#update_id').val();
            var sub_pro_name_update = $('#sub_pro_name_update').val();
            var sub_to_product_of = $("#sub_to_product_of").val();
            var validation_status = false;

            if (sub_pro_name_update == "") {
                $("#sub_pro_name_update").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#sub_pro_name_update").addClass('is-valid');
                validation_status = true;
            }
            if (sub_to_product_of == "") {
                $("#sub_to_product_of").addClass('is-invalid');
                validation_status = false;
            } else {
                $("#sub_to_product_of").addClass('is-valid');
                validation_status = true;
            }


            var url = '{{ route('subproducts.update', ':id') }}';
            url = url.replace(':id',id);

            if (validation_status) {
                $.ajax({

                    url: url,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",
                        id:id,
                        subproductname:sub_pro_name_update,
                        subtoproductof:sub_to_product_of

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
                                        "{{ route('subproducts.create') }}";
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








    })
</script>
