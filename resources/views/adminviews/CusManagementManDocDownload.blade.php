@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <div class="content ">
        <div class="container mt-1">
            <h2 class="mb-4">Download Mandatory Documents </h2>
            @if(session('admin'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('customer.master') }}">back</a></p></div>
            @endif
            @if(session('caller'))
            <div class="float-right"><p class="breadcrumb-item"><a href="{{route('caller.dashboard',session('caller')->id) }}">Back</a></p></div>
            @endif
    </div>
    <div class="container py-3 mt-5">
        <div class="card card-purple">
            <div class="card-header ">
              <h5 class="card-title m-0">Featured</h5>
            </div>
            <div class="card-body">
                <div class="container d-flex justify-content-center">
                    <div>
                    <a href="{{asset('userDocuments/'.$user_man_documents->Pan_card)}}" download="Pancard" class="btn btn-sm btn-primary px-5">
                        <i class="fas fa-download px-1"></i>Pan Card
                    </a>
                    </div>
                    <div>
                    <a href="{{asset('userDocuments/'.$user_man_documents->Adhar_card)}}" download="Adharcard" class="btn btn-sm btn-primary px-5" download>
                        <i class="fas fa-download px-1"></i>Adhar Card
                    </a>
                    </div>
                </div>
            </div>
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

    })
</script>
