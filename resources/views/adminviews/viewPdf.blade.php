@extends('layouts.master')


@section('content')

    <!-- jQuery library -->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> --}}
    <!-- Main content -->
    <div class="content ">
        <div class="container mt-3">
            @if(session('admin'))
            <div class="float-right"><p><a class="btn btn-sm btn-success" href="{{route('offerAcOeDe.index') }}"><i class="fas fa-backward px-2"></i>BACK</a></p></div>
            @endif
    </div>
    <div class="container">
              {{-- <h6 class="card-title">DOWNLOAD PDF</h6>
              <div class="float-right">
                <a href="{{asset('storage/pdf/'.$pdf.'.pdf')}}" download="LoanStoriesFinalOffer" class="btn btn-success">Download</a>
              </div> --}}
              <div class="container">
                <iframe class="responsive-iframe" src="{{asset('storage/pdf/'.$pdf.'.pdf')}}" width="100%" height="650px"></iframe>

              </div>
              {{-- <p class="card-text">PDF HAS BEEN GENERATED</p> --}}

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
