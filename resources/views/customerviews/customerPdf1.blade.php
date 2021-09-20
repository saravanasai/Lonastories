<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>A simple, clean, and responsive HTML invoice template</title>

    <style>
        .invoice-box {
            max-width: 1200px;
            margin: auto;
            padding: 10px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: center;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }


        hr {

            background-color: #00183e;
            height: 2px;
        }

    </style>
</head>

<body>

    <div class="invoice-box">
        <header>
            <div class="container">
                <center><img src="{{ public_path('img/logo.jpg') }}" width="17%" alt=""></center>
            </div>
        </header>
        <hr>
        <table cellpadding="0" cellspacing="0" class="col-md-12">
            <tr class="information">
                <td colspan="4">
                    <table>
                        <tr>
                            <td>
                                <h5><b>Client Infromation</b></h5><br />
                                <b>Name : </b>
                                {{$basic_info->name}}<br />
                                Phone Number : {{$basic_info->cus_phonenumber }}<br />
                                Email : {{$basic_info->email }}
                            </td>
                            <td>
                                <h5><b>Product Infromation</b></h5><br />
                                <b>Product : </b>
                                {{$enquiery_details->productname}}<br />
                                Product Type : {{$enquiery_details->subproductname}}<br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
              <h4>EMI OBLIGATIONS</h4>
            <tr class="heading">
                <td>Loan Type</td>
                <td>Bank Name</td>
                <td>Loan Amount</td>
                <td>Roi</td>
                <td>Tennure</td>
                <td>Emi</td>
                <td>Pos</td>
                <td>Bank Transfer</td>
            </tr>
            @foreach ($ob_details as $obligation)
            <tr class="details">

                <td>{{$obligation->ob_Loan_type}}</td>
                <td>{{$obligation->ob_Bank_name}}</td>
                <td>{{$obligation->ob_Loan_amount}}</td>
                <td>{{$obligation->ob_roi}}</td>
                <td>{{$obligation->ob_tennure}}</td>
                <td>{{$obligation->ob_emi}}</td>
                <td>{{$obligation->ob_pos}}</td>
                <td>@if($obligation->ob_bt==0) No @else Yes @endif</td>

            </tr>
            @endforeach
            <tr class="heading">
                <td>Item</td>

                <td>Price</td>
            </tr>

            <tr class="item">
                <td>Website design</td>

                <td>$300.00</td>
            </tr>

            <tr class="item">
                <td>Hosting (3 months)</td>

                <td>$75.00</td>
            </tr>

            <tr class="item last">
                <td>Domain name (1 year)</td>

                <td>$10.00</td>
            </tr>

            <tr class="total">
                <td></td>

                <td>Total: $385.00</td>
            </tr>
        </table>
    </div>
</body>

</html>


{{-- <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF DEMO</title>
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

</style>
</head>
<body>

    <header>
        <div class="container">
            <center><img src="{{ public_path('img/logo.jpg')}}" width="17%" alt=""></center>
        </div>
    </header>
    <hr>
     <div class="container" id="info_container">
        <div id="info_section">
            <h4>Client Information</h4>
            <p><span>Name:</span>Saravana</p>
            <p><span>Phone:</span>7708454539 </p>
            <p><span>Email:</span>saravanasai@gmail.com</p>
        </div>
        <div id="p_info_section">
            <h4>Product Information</h4>
            <p><span>Product Name:</span>Home Loan</p>
            <p><span>Product Type:</span>BT-NEW</p>
        </div>
     </div>


</body>
</html> --}}
