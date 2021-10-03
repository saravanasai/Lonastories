@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <div class="content">
            <div class="container">
                <h5 class="p-2">OTHER DOCUMENTS</h5>
            </div>
            <div class="container px-2">
                <div class="card card-purple">
                    <div class="card-header">
                        <h3 class="card-title">UPLOAD DOCUMENTS FOR ENQUIERY</h3>
                        <div class="card-tools">
                            <div class="float-right">
                                <p class="breadcrumb-item"><a href="{{ route('offerAcceptedFileUpload.index') }}" class="btn btn-primary">Back</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    @if(session('success'))
                        <div class="container p-5">
                            <center>
                                <h5>File Uploaded Successfully</h5>
                                <a href="{{route('offerAcceptedFileUpload.index')}}" class="btn btn-success ">Click to Continue</a>
                            </center>
                        </div>
                    @else
                        <div class="card-body">
                            <div class="row">
                                <div class="col col-md-6">
                                    <blockquote class="quote-secondary">
                                        <h4 class="text-dark p-1"><span>PRODUCT TYPE :</span> {{$user_info->productname}}</h4>
                                        <h6 class="text-dark p-1"><span>SUB PRODUCT TYPE :</span> {{$user_info->productname}}</h6>
                                        <strong class="text-danger p-1">* CONVERT ALL THE REQUIRED DOCUMENTS TO PDF AND UPLOAD *</strong>

                                </blockquote>
                                </div>
                                <div class="col col-md-6">
                                    <blockquote class="quote-secondary">
                                        <h4 class="text-dark p-1"><span>NAME :</span> {{$user_info->name}}</h4>
                                        <h6 class="text-dark p-1"><span>PHONE NO :</span> {{$user_info->cus_phonenumber}}</h6>
                                        <strong class="text-dark p-1"><span>EMAIL :</span> {{$user_info->email}}</strong>
                                    </blockquote>
                                </div>
                            </div>
                            <form action="{{route('offerAcceptedFileUpload.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col col-md-6 offset-md-3">
                                            <strong class="text-danger p-1">* CHECK IF THE CORRECT DOCUMENT IS UPLOADED THIS ACTION CANNOT BE REVERSED </strong>
                                            <div class="form-group">
                                                <label for="file_pan_card">OTHER DOCUMENTS</label>
                                                @error('OtherDoc')
                                                <div class="text-danger">
                                                    {{$message}}
                                                </div>
                                                @enderror
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" name="OtherDoc" class="custom-file-input" id="otherDoc">
                                                        <label class="custom-file-label lable_other_doc" for="otherDoc">Choose
                                                            file</label>
                                                    </div>
                                                    <div class="input-group-append bg-success">
                                                        <span class="input-group-text bg-danger other-success"><i class="fas fa-upload px-1"></i>UPLOAD</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container mt-5">
                                            <input type="hidden" name="cus_mand_file" value="2">
                                            <input type="hidden" name="enq_id" value="{{$user_info->enq_id}}">
                                            <button type="submit" class="btn btn-success float-right"> <i class="fas fa-upload px-1"></i>UPLOAD</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
     </div>
@endsection
@section('js')
<script>
    $(function() {

        $('body').on('change', '#otherDoc', function() {
            let file_name = $('#otherDoc').val();
            file_name = file_name.replace('C:\\fakepath\\', "");
            $(".lable_other_doc").html(file_name);
            $(".other-success").html('ADDED');
            $(".other-success").removeClass('bg-danger');
            $(".other-success").addClass('bg-success');

        });

    })
</script>
@endsection
