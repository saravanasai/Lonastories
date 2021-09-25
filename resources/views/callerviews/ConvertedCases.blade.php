@extends('layouts.callermaster')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h4 class="mb-4">CONVERTED CASES LEADER VIEW</h4>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></p></div>
            @endif
            @if(session('caller'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('caller.dashboard',session('caller')->id) }}">Back</a></p></div>
            @endif
        </div>

        <div class="container">
            <table class="table table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>NAME</th>
                        <th>PHONE</th>
                        <th>EMAIL</th>
                        <th>LOCATION</th>
                        <th>STATUS</th>
                        <th>UPDATE</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fill_converted_feilds as $sno => $converted_feilds_for_customer)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $converted_feilds_for_customer->name}}</td>
                            <td>{{ $converted_feilds_for_customer->cus_phonenumber }}</td>
                            <td>{{ $converted_feilds_for_customer->email }}</td>
                            <td>{{ $converted_feilds_for_customer->current_loation}}</td>
                            <td><span class="badge bg-success">{{ $converted_feilds_for_customer->status_code}}</span></td>
                            <td>
                                @if ($converted_feilds_for_customer->con_lead_before_info==1)
                                <a  href="{{route('feildForConCaseLeader.edit',$converted_feilds_for_customer->enq_id)}}" class="btn btn-sm btn-success"
                                    > <i class="far fa-edit px-1"></i>Edit info</a>
                                @else
                                <a  href="{{route('feildForConCaseLeader.show',$converted_feilds_for_customer->enq_id)}}" class="btn btn-sm btn-warning"
                                    ><i class="fas fa-user-edit px-1"></i>Update Info</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$fill_converted_feilds->links()}}
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

    })
</script>
