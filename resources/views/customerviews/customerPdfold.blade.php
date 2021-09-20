<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF DEMO</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
     @font-face {
        font-family: 'Helvetica';
        font-weight: normal;
        font-style: normal;
        font-variant: normal;
        src: url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");
      }
    *{
        padding: 0px;
        margin:0px;
        display: block;
    }
    hr {

        background-color: #00183e;
        height:2px;
    }

    body {
        font-family: 'Open Sans', sans-serif;
        font-weight: 10;
     }
     .cus-info
     {
         line-height: 0.5rem;

     }
     #personal-info
     {
        display: flex;
        justify-content: center;
     }

</style>
</head>
<body>

    <header>
        <div class="container">
            <center><img src="{{ public_path('img/logo.jpg')}}" width="17%" alt=""></center>
        </div>
    </header>
    <hr>
     <div class="container">
        <div class="row" id="personal-info">
            <div class="col col-md-6 cus-info" >
                <h6 class="pb-2">Client Information</h6>
                <p> <span>Name</span> Saravana</p>
                <p> <span>Phone Number</span> 7708454539</p>
                <p> <span>E-mail</span> Saravanasai002@gamil.com</p>
            </div>
            <div class="col col-md-6 cus-info float-right text-right">
                <h6 class="pb-2">Products Detail</h6>
                <p><span>Product Name</span>{{$enquiery_details->productname}}</p>
                <p><span>Product Type</span>{{$enquiery_details->subproductname}}</p>
            </div>
        </div>
        @if($enquiery_details->loan_product_id==2)
        <div class="row mt-3" id="personal">
            <h6 class="my-2">ADDITIONAL DETAILS</h6>
            <div class="col col-md-6 cus-info mt-2">
                <p>{{$additional_details->hl_property_type}}</p>
                <p>{{$additional_details->hl_builder_name}}</p>
                <p>{{$additional_details->hl_property_value}}</p>
                <p>{{$additional_details->hl_property_city}}</p>
            </div>
            <div class="col col-md-6 cus-info float-right text-right">
                <p>{{$additional_details->hl_property_type}}</p>
                <p>{{$additional_details->hl_builder_name}}</p>
                <p>{{$additional_details->hl_property_value}}</p>
                <p>{{$additional_details->hl_property_city}}</p>
            </div>
        </div>
        @endif
     </div>


</body>
</html>
