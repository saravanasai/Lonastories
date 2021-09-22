@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h5 class="mb-4">ASSIGNED LEADS TO LEADER FOR BREAKDOWN</h5>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></p></div>
            @endif
            @if(session('caller'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('caller.dashboard') }}">Back</a></p></div>
            @endif
        </div>
        <div class="container">
            <table class="table table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ID</th>
                        <th>HANDLING BY</th>
                        <th>NAME</th>
                        <th>PHONE NO</th>
                        <th>MORE INFO</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                        <th>AC STATUS</th>
                        <th>DELETE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($new_user as $sno => $new_single_user)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $new_single_user->cus_id}}</td>
                            <td>{{ $new_single_user->firstname}}</td>
                            <td>{{ $new_single_user->name}}</td>
                            <td>{{ $new_single_user->cus_phonenumber }}</td>
                            <td>
                                <a href="{{route('DirectLeadsAfterAssignMoreinfo.show',$new_single_user->enq_id)}}" class="btn btn-primary btn-sm"><i class="fas fa-id-card px-2"></i>More Info</a>
                            </td>
                            <td><span class="badge bg-success">{{$new_single_user->status_code}}</span></td>
                            <td>
                                @if($new_single_user->profile_gen_status=="1")
                                <a href="{{route('AssignedToLeaderBreakDown.show',$new_single_user->enq_id)}}" class="btn btn-success btn-sm"
                                   ><i class="fas fa-id-card px-2"></i>Profile</a>
                                   @else
                                   <a class="btn btn-danger btn-sm disabled"
                                    ><i class="fas fa-id-card px-2"></i>Pending</a>
                                @endif
                            </td>
                            <td>
                                @if($new_single_user->profile_accepted_status=="0")
                                <span class="badge bg-primary">Waiting</span>
                                @elseif($new_single_user->profile_accepted_status=="1")
                                <span class="badge bg-success">Accepted</span>
                                @else
                                {
                                    <span class="badge bg-danger">Denied</span>
                                }
                                @endif
                            </td>
                            <td>
                                <form action="{{route('DirectLeadsAfterAssignMoreinfo.destroy',$new_single_user->enq_id)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash px-1"></i>Delete</button>
                                </form>
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
