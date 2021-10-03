@extends('layouts.master')


@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-2">
            <h4 class="mb-4">Upload Mandatory Files</h4>
            @if (session('admin'))
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('offerAcceptedFileUpload.index') }}">Back</a></p>
                </div>
            @endif
            @if (session('caller'))
                <div class="float-right">
                    <p class="breadcrumb-item"><a href="{{ route('caller.dashboard', session('caller')->id) }}">Back</a></p>
                </div>
            @endif
        </div>
        <div class="container p-3">
            <div class="card card-purple mt-5">
                <div class="card-header">
                    <h3 class="card-title">UPLOAD CUSTOMER PAN AND ADHAR CARD</h3>
                </div>
                <!-- /.card-header -->
                @if($man_doc_status==1)
                    <div class="container p-5">
                        <center>
                            <h5>FILE UPLOADED</h5>
                            <a href="{{route('offerAcceptedFileUpload.index')}}" class="btn btn-success "> <i class="fas fa-backward px-2"></i>Go Back</a>
                        </center>
                    </div>
                @else
                    <!-- form start -->
                @if(session('success'))
                <div class="container p-5">
                    <center>
                        <h5>FILE UPLOADED</h5>
                        <a href="{{route('offerAcceptedFileUpload.index')}}" class="btn btn-success ">Upload Other Documents</a>
                    </center>
                </div>
                @else
                <form action="{{route('offerAcceptedFileUpload.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="file_pan_card">PAN CARD</label>
                                    @error('pancard')
                                    <div class="text-danger">

                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="pancard" class="custom-file-input" id="file_pan_card">
                                            <label class="custom-file-label lable_pan_card" for="file_pan_card">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append bg-success">
                                            <span class="input-group-text bg-danger pan-success"><i class="fas fa-upload px-1"></i>UPLOAD</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-md-6">
                                <div class="form-group">
                                    <label for="adhar-card">ADHAR CARD</label>
                                    @error('adharCard')
                                    <div class="text-danger">
                                        {{$message}}
                                    </div>
                                    @enderror
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="adharCard" class="custom-file-input" id="file_adhar">
                                            <label class="custom-file-label lable_adhar_card" for="adhar-card">Choose
                                                file</label>
                                        </div>
                                        <div class="input-group-append bg-success">
                                            <span class="input-group-text bg-danger adh-success"><i class="fas fa-upload px-1"></i>Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="container mt-5">
                                <input type="hidden" name="cus_mand_file" value="1">
                                <input type="hidden" name="cus_id" value="{{$cus_id}}">
                                <button type="submit" class="btn btn-success float-right"><i class="fas fa-upload px-1"></i>UPLOAD</button>
                            </div>
                </form>
                @endif

                @endif

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

        $('body').on('change', '#file_pan_card', function() {
            let file_name = $('#file_pan_card').val();
            file_name = file_name.replace('C:\\fakepath\\', "");
            $(".lable_pan_card").html(file_name);
            $(".pan-success").html('ADDED');
            $(".pan-success").removeClass('bg-danger');
            $(".pan-success").addClass('bg-success');

        });
        $('body').on('change', '#file_adhar', function() {
            let file_name = $('#file_adhar').val();
            file_name = file_name.replace('C:\\fakepath\\', "");
            $(".lable_adhar_card").html(file_name);
            $(".adh-success").html('ADDED');
            $(".adh-success").removeClass('bg-danger');
            $(".adh-success").addClass('bg-success');
        });




    })
</script>
