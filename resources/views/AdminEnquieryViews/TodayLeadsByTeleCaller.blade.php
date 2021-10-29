@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h6 class="mb-4">LEADS SPEAKED BY TELECALLERS   </h6>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></p></div>
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
                        <th>STATUS</th>
                        <th>TL NAME</th>
                        <th>VIEW</th>
                        <th>DELETE</th>
                        {{-- <th>VERIFY</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($leads_by_telecaller as $sno => $telecaller_lead)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $telecaller_lead->cus_first_name}}</td>
                            <td>{{ $telecaller_lead->cus_Phone_number }}</td>
                            <td>{{ $telecaller_lead->cus_email }}</td>
                            <td>
                                @if ( $telecaller_lead->cus_id==0)
                                <span class="badge bg-danger">Not Verified</span>
                                @else
                                <span class="badge bg-success">Verified</span>
                                @endif
                            </td>
                            <td>{{ $telecaller_lead->firstname}}</td>
                            <td>
                                <a  href="{{route('TodayCallerLeads.show',$telecaller_lead->cus_Phone_number)}}" class="btn btn-sm btn-success"
                                    > <i class="far fa-edit px-1"></i>More info</a>
                            </td>
                            <td>
                                <form action="{{route('TodayCallerLeads.destroy',$telecaller_lead->cus_Phone_number)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit"  class="btn btn-sm btn-danger"><i class="fas fa-trash px-1"></i>Delete</button>
                                </form>
                            </td>
                            {{-- <td>
                                <form action="{{route('TodayCallerLeads.update',$telecaller_lead->cus_Phone_number)}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if ( $telecaller_lead->cus_id==0)
                                <button type="submit"  class="btn btn-sm btn-info"><i class="fas fa-mask px-1"></i>Verify</button>
                                @else
                                <button type="button"  class="btn btn-sm btn-info disabled" disabled><i class="fas fa-mask px-1"></i>Verify</button>
                                @endif
                                </form>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{$leads_by_telecaller->links()}}
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

    })
</script>
