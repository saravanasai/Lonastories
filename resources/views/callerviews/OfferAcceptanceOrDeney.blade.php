@extends('layouts.callermaster')
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h5 class="mb-4">ACCEPT OR DENEY LEADER VIEW</h5>
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
                        <th>OFFER</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($offered_cus as $sno => $offer_for_cus)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $offer_for_cus->name}}</td>
                            <td>{{ $offer_for_cus->cus_phonenumber }}</td>
                            <td>{{ $offer_for_cus->email }}</td>
                            <td><span class="badge bg-success">{{ $offer_for_cus->status_code}}</span></td>
                            <td>
                                <a  href="{{route('offerAcOeDeLeader.show',$offer_for_cus->enq_id)}}" class="btn btn-sm btn-success"
                                   ><i class="fas fa-street-view px-1"></i>View Offer</a>
                            </td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" id="{{ $offer_for_cus->enq_id}}"
                                        class="btn btn-sm btn-success offerAccept"><i class="fas fa-check px-1"></i>ACCEPT</button>
                                    <button type="button" id="{{ $offer_for_cus->enq_id}}"
                                        class="btn btn-sm btn-danger offerDenied">
                                         DENIED<i class="fas fa-times px-1"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $offered_cus->links() }}
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


        //SECTION FOR HANDLING THE OFFER ACEPTED REQUEST

        $('body').on('click', '.offerAccept', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var url = '{{ route('offerAcOeDeLeader.update', ':id') }}';
            url = url.replace(':id', id);


            Swal.fire({
                title: 'Do you want to Accept Offer?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `Yes`,
                denyButtonText: `cancel`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({

                        url: url,
                        type: "PUT",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status:1
                        },
                        success: function(data) {
                            if (data == 1) {
                                Swal.fire({
                                    title: 'Success',
                                    text: "New Lead Has been Converted!",
                                    icon: 'success',
                                    confirmButtonColor: '#3085d6',
                                    confirmButtonText: 'ok'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href =
                                            "{{ route('offerAcOeDeLeader.index') }}";
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

        //END OF SECTION FOR HANDLING THE OFFER ACEPTED REQUEST


        //section to handle the offer denied reqest
        $('body').on('click', '.offerDenied', function(event) {
            event.preventDefault();

            var id = $(this).attr('id');
            var url = '{{ route('offerAcOeDeLeader.update', ':id') }}';
            url = url.replace(':id', id);

            Swal.fire({
                title: 'Do you want to Decline?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `yes`,
                denyButtonText: `cancel`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    $.ajax({

                        url: url,
                        type: "PUT",
                        data: {
                            _token: "{{ csrf_token() }}",
                            status:2

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
                                            "{{ route('offerAcOeDeLeader.index') }}";
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

        //end section to handle the offer denied reqest


    })
</script>
