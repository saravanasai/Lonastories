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
          <div class="container">
            <div class="col-md-12">
                <div class="card scroll">
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="activity">
                                @foreach ($user_reviews as $user_review)
                                    <!-- Post -->
                                    <div class="post">
                                        <div class="user-block">
                                            @if ($user_review->reviewOfCustomer->user_profile_img_status == 0)
                                                <img class="img-circle img-bordered-sm"
                                                    src="https://cdn.pixabay.com/photo/2019/08/11/18/59/icon-4399701_960_720.png"
                                                    alt="user image">
                                            @else
                                                <img class="img-circle img-bordered-sm"
                                                    src="{{ asset('profileimg/' . $user_review->reviewOfCustomer->user_profile_img) }}"
                                                    alt="user image">
                                            @endif
                                            <span class="username">
                                                <a href="#">{{ $user_review->reviewOfCustomer->name }}</a>
                                                {{-- <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a> --}}
                                            </span>
                                            <span class="description">Posted On -
                                                {{ $user_review->created_at->diffForHumans() }}</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            {{ $user_review->comment }}
                                        </p>

                                        <p>
                                        <div class="row d-flex justify-content-end">
                                            <div class="px-2">
                                                <form action="{{ route('admin.AcceptReview') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="review_id"
                                                        value="{{ $user_review->id }}">
                                                    <button type="submit" class="btn btn-sm btn-success"><i
                                                            class="fas fa-check-circle mr-1"></i>Accept</button>
                                                </form>

                                            </div>
                                            <div class="px-2">
                                                <form action="{{ route('admin.DenyReview') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="review_id"
                                                        value="{{ $user_review->id }}">
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="far fa-times-circle mr-1"></i>Deny</button>
                                                </form>
                                            </div>
                                        </div>


                                        <span class="float-right py-2">
                                            <a href="#" class="link-black ml-1 text-sm">
                                                Ratings :
                                                @for ($i = 0; $i < $user_review->rating; $i++)
                                                    <i class="fas fa-star  text-warning"></i>
                                                @endfor
                                            </a>
                                        </span>
                                        </p>
                                        <form action="{{route('admin.ReplyReview')}}" method="post">
                                            @csrf
                                            <div class="input-group input-group-sm mb-0">
                                                <input type="hidden" name="reply_to" value="{{ $user_review->id }}">
                                                <input class="form-control form-control-sm" name="reply" placeholder="Reply">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-dark"><i
                                                            class="fas fa-reply px-1"></i>Reply</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                    <!-- /.post -->
                                @endforeach
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
                    </div><!-- /.card-body -->
                    <div class="float-right px-3">
                        {{ $user_reviews->links() }}
                    </div>

                </div>
                <!-- /.card -->
            </div>
        </div>
          @else
           <div class="container">
               <h3>NO FEEDBACKS ARE AVAIABLE</h3>
           </div>
          @endif

        </div>
    </div>
@endsection
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
