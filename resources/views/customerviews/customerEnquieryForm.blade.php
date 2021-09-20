<!doctype html>
<html lang="en">
<head>
    <title>Customer sign Up Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <div class="container mt-5 mr-5">
        <h3>QUICK ENQUIERY FORM (add middleware)</h3>
              <a href="{{route('quickEnquieryForm.edit',session('customer')->id)}}" class="btn btn-info">REFFER A FRIEND</a>
          <p>Ms-{{$user_info->name}}</p>
                <form action="{{route('quickEnquieryForm.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="cus_id" value="{{$user_info->id}}">
                <div class="row">
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label>BEST TIME TO CALL</label>
                                <select class="form-control" name="enq_time">
                                <option value="7am">7am</option>
                                <option value="6am">6am</option>
                                <option value="5am">5am</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label>PREFERED MODE TO CONTACT</label>
                                <select class="form-control" name="enq_pre_mode">
                                <option selected value="voice-call">voice call</option>
                                <option value="video-call">video call</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label>I AM EMPLOYEE TYPE</label>
                                <select class="form-control" name="enq_emp_type">
                                    <option value="salaried">salaried</option>
                                    <option value="self-salaried">self-salaried</option>
                                    <option value="professional">professional</option>
                                </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label>I AM LOOKING FOR PRODUCT</label>
                                <select class="form-control" name="enq_pro_type">
                                    <option value="1">home Loan</option>
                                    <option value="2">personal Loan</option>
                                    <option value="3">education Loan</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label>I AM LOOKING FOR SUB PRODUCT</label>
                                <select class="form-control" name="enq_sub_pro_type">
                                    <option value="1">new loan</option>
                                    <option value="2">new loan bt</option>
                                    <option value="3">loan consolidation</option>
                                </select>
                        </div>
                    </div>
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label>MY CIBIL SCORE</label>
                                <select class="form-control" name="enq_cibil_score">
                                    <option value="600">600</option>
                                    <option value="700">700</option>
                                    <option value="1200">1200</option>
                                </select>
                        </div>
                    </div>
                    @if($user_info->enquiery_form_status==0)
                    <div class="col-xs-1-12">
                            <button type="submit" class="btn btn-primary">Submit Enquiery</button>
                    </div>
                    @endif
                </div>
            </form>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>
<script>
    $(function() {



   $('#datepicker').datepicker();





    })
</script>

</html>
