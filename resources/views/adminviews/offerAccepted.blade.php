@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h5 class="mb-4">DOCUMENTS UPLOAD</h5>
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
                                @if($offer_accepted_customer->documents_collected_status==0 && $offer_accepted_customer->mandatory_doc!=0)
                                <a  href="{{route('offerAcceptedFileUpload.show',$offer_accepted_customer->enq_id)}}" class="btn  btn-sm btn-success"
                                   ><i class="fas fa-upload px-1"></i>Enquiery Docs</a>
                                   @else
                                   <a  href="{{route('offerAcceptedFileUpload.show',$offer_accepted_customer->enq_id)}}" class="btn btn-sm btn-success disabled"
                                    ><i class="fas fa-upload px-1"></i>Enquiery Docs</a>
                                    @endif
                            </td>
                            <td class="text-center">
                                <a  href="{{route('offerAcceptedFileUpload.edit',$offer_accepted_customer->cus_id)}}" class="btn btn-sm btn-danger"
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
