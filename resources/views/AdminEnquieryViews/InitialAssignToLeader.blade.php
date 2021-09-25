@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h6 class="mb-4">DIRECT LEADS ASSIGNED TO LEADERS</h6>
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
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($new_Quick_enquiery as $sno => $Quick_enquiery)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $Quick_enquiery->name}}</td>
                            <td>{{ $Quick_enquiery->cus_phonenumber }}</td>
                            <td>{{ $Quick_enquiery->email }}</td>
                            <td><span class="badge bg-primary">{{$Quick_enquiery->status_code}}</span></td>
                            <td>{{ $Quick_enquiery->firstname}}</td>
                            <td>
                                <a  href="{{route('DirectLeadsInitialAssign.show',$Quick_enquiery->q_enq_id)}}" class="btn btn-sm btn-success"
                                    > <i class="far fa-edit px-1"></i>More info</a>
                            </td>
                            <td>
                                <form action="{{route('DirectLeadsInitialAssign.destroy',$Quick_enquiery->q_enq_id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash px-1"></i>Soft Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{$new_Quick_enquiery->links()}}
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
