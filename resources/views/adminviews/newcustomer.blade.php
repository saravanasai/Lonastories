@extends('layouts.master')

@section('content')
<!-- Main content -->
<div class="content">
    <div class="container p-2">
        <h4 class="mb-2">Direct Enquiries</h4>
        <div class="float-right">
            <p class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></p>
        </div>
        <table class="table  table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Customer Name</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Dob</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($new_user as $sno => $single_user)
                <tr>
                    <td>{{ ++$sno }}</td>
                    <td>{{ $single_user->name }}</td>
                    <td>{{ $single_user->cus_phonenumber }}</td>
                    <td>{{ $single_user->email }}</td>
                    <td>{{ $single_user->dob }}</td>
                    <td>
                        <a href="{{route('EnquieryAssign.show',$single_user->qu_enq_id)}}" class="btn btn-sm btn-success">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$new_user->links()}}
    </div>
</div>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>







<script>
    $(function() {

        $('.yajra-datatable').DataTable({
            dom: 'Bfrti'
            , buttons: [
                'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
            ]
        });

    })

</script>
