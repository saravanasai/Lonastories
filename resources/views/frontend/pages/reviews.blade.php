@extends('layouts.FronendMaster')
@section('content')
    <style>
        .star-rating form {
            display: none;
        }

        .star-rating input {
            display: none;
        }

        .star-rating {
            /* margin: auto; */
            display: table;
            width: 350px;
        }

        .star-rating label {
            padding: 15px;
            float: right;
            font-size: 30px;
            color: rgb(0, 0, 0);
        }

        .star-rating input:not(:checked)~label:hover,
        .star-rating input:not(:checked)~label:hover~label {
            color: #ffc107;
        }

        .star-rating input:checked~label {
            color: #ffc107;
        }

        .star-rating form .rating-reaction:before {
            width: 100%;
            float: left;
            color: #ffc107;
        }

        .star-rating #rating-1:checked~form .rating-reaction:before {
            content: "I hate it";
        }

        .star-rating #rating-2:checked~form .rating-reaction:before {
            content: "I don't like it";
        }

        .star-rating #rating-3:checked~form .rating-reaction:before {
            content: "It is good";
        }

        .star-rating #rating-4:checked~form .rating-reaction:before {
            content: "I like it";
        }

        .star-rating #rating-5:checked~form .rating-reaction:before {
            content: "I love it";
        }

        .star-rating input:checked~form {
            border-top: 1px solid #ddd;
            width: 100%;
            padding-top: 15px;
            margin-top: 15px;
            display: inline-block;
        }

        .star-rating form .rating-reaction {
            font-size: 24px;
            float: left;
            text-transform: capitalize;
        }

        .star-rating form .submit-rating {
            border: none;
            outline: none;
            background: #795548;
            color: #ffc107;
            font-size: 18px;
            border-radius: 4px;
            padding: 5px 15px;
            cursor: pointer;
            float: right;
        }

        form .submit-rating:hover {
            background-color: #333;
        }

    </style>
    <div class="container-fluid pt-4 pb-4">
        <div class="row">
            <div class="col-md-10 col-sm-12 text-md-left text-center pl-md-5">
                <span class="display-4">Reviews</span>
            </div>
            @if (session('customer'))
                <div class="col-md-2 col-sm-12 text-md-left text-center pt-md-3">
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal"
                        data-whatever="@mdo">Write Review</button>
                </div>
            @endif
        </div>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-header bg-gray">
                        <span class="font-weight-bold text-light">
                            Title
                        </span>
                    </div>
                    <div class="card-body list-unstyled">
                        <h6 class="card-title font-weight-bold">Home Loan</h6>
                        <a href="javascript:void(0)" class="my_rating fa fa-star"></a>
                        <div class="" style="height: 150px; overflow-y: scroll;">
                            <p class="small">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eveniet qui
                                iusto quia pariatur provident animi aspernatur odio laborum tempora nihil veniam et aliquid
                                nisi, ex necessitatibus? Qui nisi fugit saepe aut eveniet inventore ut maxime nobis vel
                                earum
                                mollitia praesentium, quam ea quo accusantium hic rem ducimus! Possimus, voluptate
                                exercitationem?</p>
                        </div>
                    </div>
                    <div class="card-footer">
                        <span class="float-left mr-3"><i class="bi bi-person"></i></span>
                        <span class="small"><strong>Rupanjali Mishra</strong><br>Posted on: Sep 3, 2021</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title font-weight-bold text-center" id="exampleModalLabel">Write Your Review</h4>
                </div>
                <form action="{{ route('review') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="" class="font-weight-bold">Product : </label>
                            <select class="form-control" name="" id="">
                                <option></option>
                                <option></option>
                                <option></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label font-weight-bold">Comment :</label>
                            <textarea name="comment" class="form-control" id="message-text"></textarea>
                            <input type="text" class="form-control" value="" name="ratings" id="ratings" hidden>
                        </div>
                        <label for="message-text" class="col-form-label font-weight-bold">Give us to stars : </label>
                        <div class="star-rating embed-responsive">
                            <div id="stars">
                                <input type="radio" name="rating" id="rating-5" value="1">
                                <label for="rating-5" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-4" value="2">
                                <label for="rating-4" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-3" value="3">
                                <label for="rating-3" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-2" value="4">
                                <label for="rating-2" class="fa fa-star"></label>
                                <input type="radio" name="rating" id="rating-1" value="5">
                                <label for="rating-1" class="fa fa-star"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Post Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        // Stars=============================================
        var starContainer = document.getElementById('stars');
        var stars = elements = document.getElementById('stars').childNodes;
        var rated = document.getElementById('rated');
        let result = document.getElementById('ratings');
        var inputTypes = ['text'];
        let star = [];

        for (var i = 0; i < stars.length; i++) {
            var elm = stars[i];
            if (typeof elm.type !== 'undefined' && inputTypes.indexOf(elm.type)) {
                star.push(elm);
            }
        }

        var totalStars = star.length;

        starContainer.addEventListener('click', function(e) {
            var index = star.indexOf(e.target);
            var count = totalStars - index;
            result.value = count;
        })
        // Stars=============================================

        // Model=============================================
        document.querySelector('#exampleModal').addEventListener('show.bs.modal', function(event) {
            var button = document.querySelector(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = document.querySelector(this)
            modal.querySelector('.modal-title').text('New message to ' + recipient)
            modal.querySelector('.modal-body input').val(recipient)
        });
        // Model=============================================
    </script>

@endsection
