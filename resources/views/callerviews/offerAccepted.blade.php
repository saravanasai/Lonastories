@extends('layouts.callermaster')


@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h4 class="mb-4">FILE UPLOAD LEADER VIEW</h4>
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
                        <th>STATUS</th>
                        <th>ENQ DOCS</th>
                        <th>MAIN DOCS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accepted_cus as $sno => $offer_accepted_customer)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $offer_accepted_customer->name}}</td>
                            <td>{{ $offer_accepted_customer->cus_phonenumber }}</td>
                            <td>{{ $offer_accepted_customer->email }}</td>
                            <td><span class="badge bg-success">{{ $offer_accepted_customer->status_code}}</span></td>
                            <td class="text-center">
                                @if($offer_accepted_customer->documents_collected_status==0)
                                <a  href="{{route('offerAcceptedFileUploadLeader.show',$offer_accepted_customer->enq_id)}}" class="btn  btn-sm btn-success"
                                   ><i class="fas fa-upload px-1"></i>Enquiery Docs</a>
                                   @else
                                   <a  href="{{route('offerAcceptedFileUploadLeader.show',$offer_accepted_customer->enq_id)}}" class="btn btn-sm btn-success disabled"
                                    ><i class="fas fa-upload px-1"></i>Enquiery Docs</a>
                                    @endif
                            </td>
                            <td class="text-center">
                                <a  href="{{route('offerAcceptedFileUploadLeader.edit',$offer_accepted_customer->cus_id)}}" class="btn btn-sm btn-danger"
                                    ><i class="fas fa-upload px-1"></i>Mandatory Files</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$accepted_cus->links()}}
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
