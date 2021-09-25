@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h4 class="mb-4">OVERALL ENQUIERY STATUS OF CUSTOMER</h4>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('customer.master') }}">Back</a></p></div>
            @endif
            @if(session('caller'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('caller.dashboard',session('caller')->id) }}">Back</a></p></div>
            @endif
        </div>

        <div class="container">
            <table class="table table-bordered table table-head-fixed text-nowrap  table-striped yajra-datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Enq ID</th>
                        <th>Product</th>
                        <th>Sub Product</th>
                        <th>Enq Status</th>
                        <th>Offer</th>
                        <th>ACT Status</th>
                        <th>Enq Doc</th>
                        <th>Process</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user_enquiery as $sno => $user_enq)
                        <tr>
                            <td>{{ ++$sno }}</td>
                            <td>{{ $user_enq->enq_id}}</td>
                            <td>{{ $user_enq->productname}}</td>
                            <td>{{ $user_enq->subproductname }}</td>
                            <td><span class="badge bg-success">{{ $user_enq->status_code}}</span></td>
                            <td>
                                @if($user_enq->profile_gen_status==1)
                                <a href="{{asset('storage/pdf/'.$user_enq->pdf_name.'.pdf')}}" download="LoanStoriesOffer" class="btn btn-sm btn-primary  px-1">
                                    <i class="fas fa-download px-1"></i>offer Pdf
                                  </a>
                                 @else
                                 <a  download="LoanStoriesOffer" class="btn btn-sm btn-danger px-1 disabled">
                                    <i class="fas fa-download px-1"></i>Not Created
                                  </a>
                                @endif
                            </td>
                            <td>
                                @if($user_enq->profile_accepted_status==1)
                                <span class="badge bg-success">Accepted</span>
                                 @elseif ($user_enq->profile_accepted_status==2)
                                 <span class="badge bg-danger">Denied</span>
                                 @else
                                 <span class="badge bg-info">Waiting</span>
                                @endif
                            </td>
                            <td>
                                @if($user_enq->documents_collected_status==1)
                                <a href="{{asset('enquieryDoc/'.$user_enq->enq_doc_name)}}" download="Enquiery Document" class="btn btn-sm btn-primary px-1">
                                    <i class="fas fa-download px-1"></i>Enq Docs
                                  </a>
                                 @else
                                 <a  download="Enquiery Document" class="btn btn-sm btn-primary disabled px-1">
                                    <i class="fas fa-download px-1"></i>Not Collected
                                  </a>
                                @endif
                            </td>
                            <td>
                                @if($user_enq->con_lead_before_info==1)
                                <a href="{{route('CustomerEnquierydetailview.show',$user_enq->id)}}" class="btn btn-sm btn-primary">
                                    <i class="far fa-eye px-1"></i>View
                                  </a>
                                 @else
                                 <a   class="btn btn-sm btn-danger disabled px-1">
                                    <i class="fas fa-eye-slash px-1"></i>Not Filled
                                  </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right">
                {{$user_enquiery->links()}}
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


        //SECTION FOR HANDLING THE OFFER ACEPTED REQUEST
        $('body').on('click', '.offerAccept', function(event) {
            event.preventDefault();
            var id = $(this).attr('id');
            var url = '{{ route('offerAcOeDe.update', ':id') }}';
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
                                            "{{ route('offerAcOeDe.index') }}";
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
            var url = '{{ route('offerAcOeDe.update', ':id') }}';
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
                                            "{{ route('offerAcOeDe.index') }}";
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
