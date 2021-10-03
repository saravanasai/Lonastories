<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LoanStories.com</title>
    <style type="text/css">
        @page {
            margin: 0px;
        }

        body {
            margin: 0px;
        }

        * {
            font-family: Verdana, Arial, sans-serif;
        }
        hr{
            border: 2px solid #141215;
        }
        table {
            font-size: x-small;
            border: 1px solid white;
        }
        a {
            color: #fff;
            text-decoration: none;
        }


        tfoot tr td {
            font-weight: bold;
            font-size: x-small;

        }

        .invoice table {
            margin: 10px;
        }

        .invoice h5 {
            margin-left: 2rem;

        }

        .information {
            background-color: #FFF;
            color: #141215;
            padding: 0.5rem;
        }

        .information .logo {
            margin: 5px;
        }

        .information table {
            padding: 10px;
        }
        #copy_rights
        {
            z-index: -2 !important;
            background: transparent;
        }
        footer{
            color: #000;
        }
        #emi_tb  table,td,th {
        border: 1px solid #141213;
        border-collapse: collapse;
        }
        #cr_tb table,td,th {
        border: 1px solid #141213;
        border-collapse: collapse;
        }
        #of_tb table,td,th {
        border: 1px solid #141213;
        border-collapse: collapse;
        }
        #info_tb td{
            border: 0;
            width: 50%;
            margin: auto;
        }
        #info_tb table{
            border: 0;
            width: 95%;
            margin: auto;
        }
        #first_footer td{
            border: 0;
        }
        #second_footer td{
            border: 0;
        }
        #note{
            width: 90%;
            margin: auto;
        }
        #note_sec{
            margin-bottom: 1px;
            margin-top: 1px;
        }
        #info_ten{
             margin-bottom:1px;
        }
        small{
            font-size: 10px;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <center><img src="{{ public_path('img/logo.jpg') }}" width="17%" alt=""></center>
        </div>
    </header>
    <hr>
    <div class="information" id="info_tb">
        <table width="100%" >
            <tr >
                <td align="left" style="width: 50%;">
                    <h3>Client Information</h3>
                    <h3>Name : {{$basic_info->name}}</h3>
                    <h3>Phone : {{$basic_info->cus_phonenumber}}</h3>
                    <h3>Email : {{$basic_info->email}}</h3>
                    {{-- <h3>Location : {{$enquiery_details->current_loation}}</h3> --}}
                    {{-- <pre> --}}
                </td>
                <td align="center">
                    {{-- <img src="/path/to/logo.png" alt="Logo" width="64" class="logo" /> --}}
                </td>
                <td align="left" style="width: 40%;">
                    <h3>Product Information</h3>
                    <h3>Product :{{$enquiery_details->productname}}</h3>
                    <h3>Type :{{$enquiery_details->subproductname}}</h3>
                    <h3>Net Salary :{{$fn_details->final_salary_considered}}</h3>
                    {{-- <h3>Loan Amount :{{Date('Y-m-d')}}</h3> --}}
                </td>
            </tr>
        </table>
    </div>
    <br />
    <div class="invoice" id="emi_tb">
        <h5>EMI OBLIGATIONS</h5>
        <table width="100%" >
            <thead>
                <tr>
                    <th>LOAN TYPE</th>
                    <th>BANK NAME</th>
                    <th>LOAN AMOUNT</th>
                    <th>ROI</th>
                    <th>TENNURE</th>
                    <th>EMI</th>
                    <th>EMI PAID</th>
                    <th>POS</th>
                    <th>BANK TRANSFER</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($ob_details as $obligation)
                <tr style="text-align: center">
                    <td>{{$obligation->ob_Loan_type}}</td>
                    <td>{{$obligation->ob_Bank_name}}</td>
                    <td>{{$obligation->ob_Loan_amount}}</td>
                    <td>{{$obligation->ob_roi}}</td>
                    <td>{{$obligation->ob_tennure}}</td>
                    <td>{{$obligation->ob_emi}}</td>
                    <td>{{$obligation->ob_comp_emi}}</td>
                    <td>{{$obligation->ob_pos}}</td>
                    <td>@if($obligation->ob_bt==0) No @else Yes @endif</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   <br>
   <br>
   <br>
   <div class="invoice" id="cr_tb">
        <h5>CREDIT CARD OBLIGATIONS</h5>
        <table width="100%" >
            <thead style="margin-bottom: 10px;">
                <tr>
                    <th>BANK NAME</th>
                    <th>CARD LIMIT</th>
                    <th>CARD OUTSTANDING</th>
                    <th>EMI</th>
                    <th>BANK TRANSFER</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cr_details as $credit)
                <tr style="text-align: center">
                    <td>{{$credit->cr_Bank_name}}</td>
                    <td>{{$credit->cr_card_limit}}</td>
                    <td>{{$credit->cr_card_outstanding}}</td>
                    <td>{{$credit->cr_emi }}</td>
                    <td>@if($credit->cr_bt==0) No @else Yes @endif</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                {{-- <tr>
                    <td colspan="1"></td>
                    <td align="left">Total</td>
                    <td align="left" class="gray">€15,-</td>
                </tr> --}}
            </tfoot>
        </table>
   </div>
   <br>
   <div class="invoice" id="info_tb">
        <h5>TENTATIVE OFFER</h5>
        <table width="100%" >
            <tr >
                <td align="left" style="width: 33.25%; text-align: justify;">
                    <h3>Loan Amount : {{$fn_details->final_loan_amount}}</h3>
                    <h3>Rate Of Interest : {{$fn_details->final_rate_of_interest}}%</h3>
                    <h3>Tenure : {{$fn_details->final_tennure}}</h3>

                </td>
                <td align="left" style="width: 33.25%;">
                    <h3>Emi : {{$fn_details->final_emi}}</h3>
                    <h3>Proposed Emi : {{$fn_details->final_proposed_total_emi}}</h3>
                    <h3>Current Obligation Ratio :  {{$fn_details->final_current_foir}}</h3>


                </td>
                <td align="left" style="width: 33.25%;">
                    <h3>Proposed Obligation Ratio : {{$fn_details->final_proposed_foir}}</h3>
                    <h3>Salary Considered : {{$fn_details->final_salary_considered}}</h3>
                    <h3>Obligation Considered : {{$fn_details->final_obligation_considered}}</h3>
                </td>
            </tr>
        </table>
  </div>
  <br>
  <br>
  <div class="invoice">
    <h5>REMARKS</h5>
        <p style="margin-left: 45px">{{$fn_details->Final_page_remarks}}</p>
        <br>
    </div>
  <div class="invoice" >
    <h5 id="note_sec">NOTE:</h5>
    <div id="note">
        <p><small>Please note that this tentative offer is shared only based on the information shared about  income & obligations. Final offer may vary if any other obligations are observed during the verification process. The final approval shall be communicated only after the Application is processed subject to CIBIL & other verification parameters & as per the sole discretion of the respective lenders</small></p>
    </div>
 </div>
    <hr>
    <div class="information"  style="position: absolute; bottom: 0;">
        <table width="100%" id="first_footer">
            <tr>
                <td align="left" style="width: 50%;" id="copy_rights">
                    &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
                </td>
                {{-- <td align="left" style="width: 50%;" id="copy_rights">
                   <center>A NEW WAY OF FINANCIAL PLANNING</center>
                </td> --}}
                <td align="right" style="width: 50%;">
                   A NEW WAY OF FINANCIAL PLANNING
                </td>
            </tr>
        </table>
    </div>
</body>
@if($enquiery_details->loan_product_id==2 ||$enquiery_details->loan_product_id==4)
<body>
    <header>
        <div class="container">
            <center><img src="{{ public_path('img/logo.jpg') }}" width="17%" alt=""></center>
        </div>
    </header>
    <hr>
    <div class="information">
        <table width="100%">
            <thead>
                <tr>
                    <th><h3>Aditional Infromation Home Loan</h3></th>
                    <th></th>
                </tr>
            </thead>
            <tr style="padding: 1rem">
                <td align="left" style="width: 50%;">
                    <p> <b> Age :</b> {{$additional_details->hl_age}}</p>
                    <p> <b> Property Type : </b>{{$additional_details->hl_property_type}}</p>
                    <p> <b> Property Value : </b>{{$additional_details->hl_property_value}}</p>
                    <p> <b> Builder Name :</b> {{$additional_details->hl_builder_name}}</p>
                </td>
                <td align="center" style="width: 50%; text-align:justify; padding-left:2rem;" >
                    <p> <b> Property Area :</b>{{$additional_details->hl_property_area }}</p>
                    <p> <b> Property City :</b>{{$additional_details->hl_property_city }}</p>
                    <p> <b> G-salary :</b>{{$additional_details->hl_gross_salary}}</p>
                    <p> <b> Co-Joint :</b>{{$additional_details->hl_co_joint}}</p>
                </td>
            </tr>
        </table>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <div class="invoice">
        <table width="100%">
            <thead>
                <tr align="left" style="width: 40%; padding-left:1rem">
                    <th style="padding-left:1rem"><h3>Home Loan Comparison</h3></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tr style="padding: 1rem">
                <td align="left" style="width: 30%; padding-left:2rem">
                    <p> <b> Ex-Ln-Amount :</b> {{$ln_comparison->ex_ln_loan_amount}}</p>
                    <p> <b> Ex-Roi : </b>{{$ln_comparison->ex_ln_roi}}</p>
                    <p> <b> Ex-Ln-Tennure : </b>{{$ln_comparison->ex_ln_tennure}}</p>
                    <p> <b> Ex-Pos :</b> {{$ln_comparison->ex_ln_pos}}</p>
                    <p> <b> Paid Emi :</b> {{$ln_comparison->ex_ln_no_of_emi_paid}}</p>
                    <p> <b> Balance Emi :</b> {{$ln_comparison->ex_ln_balance_emi}}</p>
                    <p> <b>Existing OutFlow :</b> {{$ln_comparison->ex_ln_exsting_out_flow }}</p>
                </td>
                <td align="center" style="width: 25%; text-align:justify; padding-left:2rem;" >
                    <p> <b> &nbsp;</p>
                    <p> <b> New-Ln-Amount :</b>{{$ln_comparison->ln_com_new_loan_amount}}</p>
                    <p> <b> New-Ln-Roi :</b>{{$ln_comparison->ln_com_new_roi}}</p>
                    <p> <b> New-Ln-Tennure :</b>{{$ln_comparison->ln_com_new_tennure }}</p>
                    <p> <b> New-Emi :</b>{{$ln_comparison->ln_com_new_emi}}</p>
                    <p> <b> New-OutFlow :</b>{{$ln_comparison->ln_com_new_proposed_outflow}}</p>
                    <p> <b> Gross-Savings :</b>{{$ln_comparison->ln_com_new_gross_sav}}</p>
                </td>
                <td align="right" style="width: 20%;padding-right:1rem;text-align:justify;">
                    <p> <b> &nbsp;</p>
                    <p> <b> &nbsp;</p>
                    <p> <b> MOTD :</b> {{$ln_comparison->ln_com_motd}}</p>
                    <p> <b> PROCESSING FEE :</b> {{$ln_comparison->ex_ln_loan_amount}}</p>
                    <p> <b> OTHER CHARGES :</b> {{$ln_comparison->ex_ln_loan_amount}}</p>
                    <p> <b> TOTAL COST :</b> {{$ln_comparison->ex_ln_loan_amount}}</p>
                    <p> <b> NET SAVINGS :</b>{{$ln_comparison->ln_com_net_sav}}</p>
                </td>
            </tr>
        </table>
    </div>
   <br>
</div>
<br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div class="invoice" >
    <h5 id="note_sec">NOTE:</h5>
    <div id="note">
        <p><small>Please note that this tentative offer is shared only based on the information shared about  income & obligations. Final offer may vary if any other obligations are observed during the verification process. The final approval shall be communicated only after the Application is processed subject to CIBIL & other verification parameters & as per the sole discretion of the respective lenders</small></p>
    </div>
 </div>

    <hr>
    {{-- <footer>
    </footer> --}}
    <div class="information"  style="position: absolute; bottom: 0;"  >
        <table width="100%" id="second_footer">
            <tr>
                <td align="left" style="width: 50%;" id="copy_rights">
                    &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
                </td>
                {{-- <td align="left" style="width: 50%;" id="copy_rights">
                   <center>A NEW WAY OF FINANCIAL PLANNING</center>
                </td> --}}
                <td align="right" style="width: 50%;">
                   A NEW WAY OF FINANCIAL PLANNING
                </td>
            </tr>
        </table>
    </div>
</body>



@endif
</html>
