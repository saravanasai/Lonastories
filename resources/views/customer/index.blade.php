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

    <div class="container mt-5">
                <form action="{{route('user.store')}}" method="post">
                    @csrf
                <div class="row">
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="First name">
                        </div>
                    </div>
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label for="">Phone Number</label>
                            <input type="text" class="form-control" name="phonenumber" id="Phonenumber"
                                placeholder="Phone Number">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
                        </div>
                    </div>
                    <div class="col-xs-1-12 col-md-4">
                        <div class="form-group">
                            <label for="">Dob</label>
                            <input type="date" id="date"
                            name="date" data-date-format="DD-YYYY-MM">
                        </div>
                    </div>
                    <div class="col-xs-1-12">
                            <button type="submit" class="btn btn-primary">sign up</button>
                    </div>
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






    })
</script>

</html>
