@extends('layouts.master')
<style>
    .scroll {
        max-height: 750px;
        overflow-y: auto;
    }

</style>
@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container mt-1">
            <div class="row">
                <div class="col mt-3">
                    @if (session('admin'))
                        <div class="float-right">
                            <p class="breadcrumb-item"><a href="{{ route('admindashboard') }}">Back</a></p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div>
          @if ($user_reviews->count()>0)
          <div class="container mt-2">
            <div class="col-md-12">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                <div class="row">
                                    @foreach ($user_reviews as $user_review)
                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                        <div class="card bg-dark d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0">

                                        </div>
                                        <div class="card-body pt-2">
                                            <div class="row">
                                                <div class="col-7">
                                                    <h2 class="lead"><b> {{ $user_review->reviewOfCustomer->name }}</b></h2>
                                                    <h6 class="lead"><b><i class="fas fa-phone-square-alt"></i> {{ $user_review->reviewOfCustomer->cus_phonenumber }}</b></h6>
                                                </div>
                                                <div class="col-5 text-center">
                                                    @if ($user_review->reviewOfCustomer->user_profile_img_status == 0)
                                                    <img class="img-circle img-fluid"
                                                        src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_960_720.png"
                                                        alt="user image">
                                                @else
                                                    <img class="img-circle img-fluid" height="15px"
                                                        src="{{ asset('profileimg/' . $user_review->reviewOfCustomer->user_profile_img) }}"
                                                        alt="user image">
                                                @endif
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col md-12">
                                                    <h6> <i class="far fa-clipboard px-1"></i>FeedBack</h6>
                                                    {{$user_review->comment}}
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col md-12 mt-2">
                                                    @if ($user_review->reply==null)

                                                    @else
                                                    <h6><i class="fas fa-reply px-1"></i>Reply </h6>
                                                    {{$user_review->reply->reply_message}}
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-right">
                                                @for ($i = 0; $i < $user_review->rating; $i++)
                                                <i class="fas fa-star  text-warning"></i>
                                            @endfor
                                            <form action="{{route('admin.deleteReviewView')}}" method="post" class="mt-3">
                                                @csrf
                                                <input type="hidden" name="del_review" value="{{$user_review->id}}">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash-alt px-2"></i>Delete
                                            </button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <!-- /.tab-pane -->
                            <div class="tab-pane" id="timeline">
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="settings">

                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->

                    <div class="float-right px-3">
                        {{ $user_reviews->links() }}
                    </div>
            </div>
        </div>
          @else
           <div class="container">
               <h3>NO FEEDBACKS ARE VIWED IN FRONTEND</h3>
           </div>
          @endif

        </div>
    </div>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
