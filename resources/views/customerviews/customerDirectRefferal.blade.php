<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
        <div class="col-md-6 mx-auto text-center">
           <div class="header-title">
              <h1 class="wv-heading--title">
                    Reffer a friend
              </h1>
           </div>
        </div>
        <div class="row mt-5">
           <div class="col-md-4 mx-auto">
              <div class="myform form ">
                    <form action="{{route('directReferal.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="hidden" name="refer_by_cus_id" value="{{session('customer')->id}}">
                            <input type="text" name="refer_to_cus_name"  class="form-control my-input"  placeholder="name">
                        </div>
                        <div class="form-group">
                        <input type="number" name="refer_to_cus_phonenumber"  class="form-control my-input"  placeholder="PhoneNumber">
                        </div>
                        <div class="form-group">
                            <input type="email" name="refer_to_cus_email"  class="form-control my-input"  placeholder="email">
                        </div>
                        <div class="form-group">
                            <div class="form-group">
                                <label>Select</label>
                                <select class="form-control"  name="refer_to_relationship">
                                  <option value="" selected>Choose the relationship</option>
                                  <option value="friend" >friend</option>
                                  <option value="Family" >Family</option>
                                  <option value="other" >other</option>
                                </select>
                              </div>
                        </div>
                        <button type="submit" class="btn btn-success">Reffer a friend</button>
                    </form>
              </div>
           </div>
        </div>
      </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
