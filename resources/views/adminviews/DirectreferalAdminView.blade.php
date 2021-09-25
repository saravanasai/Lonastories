@extends('layouts.master')
<style>
    .lds-facebook {
  display: inline-block;
  position: relative;
  width: 80px;
  height: 80px;
}
.lds-facebook div {
  display: inline-block;
  position: absolute;
  left: 8px;
  width: 16px;
  background: rgb(4, 57, 128);
  animation: lds-facebook 1.2s cubic-bezier(0, 0.5, 0.5, 1) infinite;
}
.lds-facebook div:nth-child(1) {
  left: 8px;
  animation-delay: -0.24s;
}
.lds-facebook div:nth-child(2) {
  left: 32px;
  animation-delay: -0.12s;
}
.lds-facebook div:nth-child(3) {
  left: 56px;
  animation-delay: 0;
}
@keyframes lds-facebook {
  0% {
    top: 8px;
    height: 64px;
  }
  50%, 100% {
    top: 24px;
    height: 32px;
  }
}
</style>
@section('content')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jq-3.6.0/jszip-2.5.0/dt-1.11.2/b-2.0.0/b-colvis-2.0.0/b-html5-2.0.0/b-print-2.0.0/datatables.min.css"/> --}}
<!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <h2 class="mb-4">DIRECT REFERRALS</h2>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('admindashboard') }}">Back</a></p></div>
            @endif
            <div class="container">
                <div class="lds-facebook" id="resend_loader"><div></div><div></div><div></div></div>
                <table class="table table-bordered table table-head-fixed text-nowrap  table-striped " id="yajra-datatable">
                    <div id="export"></div>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>By Customer</th>
                            <th>Name</th>
                            <th>Phonenumber</th>
                            <th>Email</th>
                            <th>Relationship</th>
                            <th>Status</th>
                            <th>Action</th>
                            <th>Send</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dir_ref_user as $sno => $reffered_user)
                            <tr>
                                <td>{{ ++$sno }}</td>
                                <td>{{ $reffered_user->name }}</td>
                                <td>{{ $reffered_user->refered_cus_name }}</td>
                                <td>{{ $reffered_user->refered_cus_phonenumber }}</td>
                                <td>{{ $reffered_user->refered_cus_email }}</td>
                                <td>{{ $reffered_user->refered_cus_relationship }}</td>
                                @if($reffered_user->refered_verification==1)
                                <td><span class="badge bg-success">Verified</span></td>
                                @else
                                <td><span class="badge bg-danger">Not Verified</span></td>
                                @endif
                                <td>
                                    <button type="button" class="btn btn-sm btn-danger update" id="{{ $reffered_user->id }}">DELETE</button>
                                </td>
                                <td>

                                        @if ($reffered_user->refered_verification==1)
                                        <button type="button" id="{{ $reffered_user->id }}"
                                            class="btn btn-sm btn-flat btn-success disabled" disabled>Resend Link</button>
                                        @else
                                        <button type="button" id="{{ $reffered_user->id }}"
                                            class="btn btn-sm btn-flat btn-success resend">Resend Link</button>
                                        @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>



@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


{{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script> --}}






<script>
    $(function() {

            $('#resend_loader').hide();

         $('#yajra-datatable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
            'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });


         //section to handle the resend link
         $('body').on('click', '.resend', function(event) {
            event.preventDefault();
            let id = $(this).attr('id');
            $(this).hide();
            let url = '{{route('Directrefferal.show',':id')}}';
            url = url.replace(':id', id);

            if (true) {
                $.ajax({

                    url: url,
                    type: "GET",
                    data: {
                        _token: "{{ csrf_token() }}",

                    },
                    beforeSend: function(  ) {
                        $('#resend_loader').show();
                        $('#resend_btn_div').hide();
                    },
                    complete: function() {
                        $('#resend_loader').hide();
                        $('#resend_btn_div').show();
                    },
                    success: function(data) {
                        if (data == 1) {
                            Swal.fire({
                                title: 'Mail Sent',
                                text: "Done",
                                icon: 'success',
                                confirmButtonColor: '#3085d6',
                                confirmButtonText: 'ok'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href =
                                        "{{ route('Directrefferal.index') }}";
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
            }

        })
         //end section to handle the resend link


        //section to handle the soft delete basically updating s_del_feild
        $('body').on('click', '.update', function(event) {
            event.preventDefault();
            let id = $(this).attr('id');
            let url = '{{route('Directrefferal.update',':id')}}';
            url = url.replace(':id', id);

            if (true) {
                $.ajax({

                    url: url,
                    type: "PUT",
                    data: {
                        _token: "{{ csrf_token() }}",


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
                                        "{{ route('Directrefferal.index') }}";
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

            }


        })
        //end section to handle the soft delete basically updating s_del_feild

    })
</script>
