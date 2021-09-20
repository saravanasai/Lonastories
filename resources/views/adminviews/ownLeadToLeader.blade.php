@extends('layouts.master')


@section('content')

    <!-- jQuery library -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <h5 class="mb-4">ASSIGN TO LEADER</h5>
            @if (session('admin'))
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('admin.NewLeadsbyown') }}">Back</a></p>
                </div>
            @endif
            @if (session('caller'))
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('caller.dashboard', session('caller')->id) }}">Back</a></p>
                </div>
            @endif
            <table class="table table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>FIRST</th>
                        <th>PHONE</th>
                        <th>POWER</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($caller_info as $sno => $caller)
                        <tr class="text-center">
                            <td>{{ ++$sno }}</td>
                            <td>{{ $caller->firstname }}</td>
                            <td>{{ $caller->phonenumber }}</td>
                            <td>{{ $caller->power }}</td>
                            <td>{{ $caller->status }}</td>
                            <td><button type="button" id="{{ $caller->id }}"
                                    class="btn btn-sm btn-success Assign_to_leader" id=""><i class="fas fa-angle-double-right px-1"></i>ASSIGN</button>
                                <input type="hidden" id="user_id" value="{{ $cus_id }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$caller_info->links()}}
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

        $('.yajra-datatable').DataTable({
            dom: 'Bfrt',
            buttons: [
            'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });

        //section to handle the Assign ot leader  button
        $('body').on('click', '.Assign_to_leader', function(event) {
            event.preventDefault();


            let user_id=$('#user_id').val();
            let Leader_id=$(this).attr('id');

            var url = '{{ route('assigntoleader.store') }}';



            $.ajax({

                url: url,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                     userid:user_id,
                     leaderid:Leader_id
                },
                success: function(data) {

                    if (data == 1) {
                        Swal.fire({
                            title: 'Success',
                            text: "You Assigned to Leader!",
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'ok'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href =
                                    "{{ route('admindashboard') }}";
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




        })

        //end section to handle the assign to handle the button








    })
</script>
