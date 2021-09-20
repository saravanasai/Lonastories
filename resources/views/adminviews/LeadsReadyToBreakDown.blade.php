@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h5 class="mb-4">PROFILING</h5>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></p></div>
            @endif
        </div>

        <div class="container">
            <table class="table table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>PHONE NO</th>
                        <th>EMAIL ID</th>
                        <th>LOCATION</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($new_user as $sno => $new_single_user)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $new_single_user->id}}</td>
                            <td>{{ $new_single_user->name}}</td>
                            <td>{{ $new_single_user->cus_phonenumber }}</td>
                            <td>{{ $new_single_user->email }}</td>
                            <td>{{ $new_single_user->current_loation}}</td>
                            <td><span class="badge bg-success">{{$new_single_user->status_code}}</span></td>
                            <td>
                                <a  href="{{route('breakDown.show',$new_single_user->enq_id)}}" class="btn btn-success btn-sm"
                                   ><i class="fas fa-id-card px-2"></i>Profile</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
    $(function() {

        $('.yajra-datatable').DataTable({
            dom: 'Bfrti',
            buttons: [
            'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });

    })
</script>
