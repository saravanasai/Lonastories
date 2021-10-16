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
        .hl_ln_com tr td{
            padding-left:10px ;
        }
        #new_logo{
            margin-top: 10px;
        }

    </style>
</head>
<body>
    <header>
        <div class="container" id="new_logo">
            <center><img src="{{ public_path('img/Logo_Latest.png') }}" width="95%" height="80"  alt=""></center>
        </div>
    </header>
    <hr>
    <div class="information" id="info_tb">
        <table width="100%" >
            <tr >
                <td align="left" style="width: 50%;">
                <h3>CLIENT INFORMATION</h3>
                <p> <strong>NAME :</strong> {{$basic_info->name}}</p>
                <p> <strong>PHONE :</strong> {{$basic_info->cus_phonenumber}}</p>
                <p> <strong>EMAIL :</strong> {{$basic_info->email}}</p>
                </td>
                <td align="center">
                    {{-- <img src="/path/to/logo.png" alt="Logo" width="64" class="logo" /> --}}
                </td>
                <td align="left" style="width: 40%;">
                    <h3>PRODUCT INFORMATION</h3>
                    <p><strong>PRODUCT :</strong> {{$enquiery_details->productname}}</p>
                    <p><strong>TYPE :</strong> {{$enquiery_details->subproductname}}</p>
                    <p><strong>NET SALARY :</strong> {{$fn_details->final_salary_considered}}</p>
                    {{-- <h3>Date :{{Date('Y-m-d')}}</h3> --}}
                </td>
            </tr>
        </table>
    </div>
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
   <div class="invoice" id="cr_tb">
        <h5>TENTATIVE OFFER</h5>
        <table width="100%" id="offer_table">
            <tr>
                <td align="left" style="width: 33.25%; text-align: center;">
                <strong>LOAN AMOUNT :</strong> {{$fn_details->final_loan_amount}}
                </td>
                <td align="left" style="width: 33.25%; text-align: center;">
                <strong>RATE OF INTEREST : </strong> {{$fn_details->final_rate_of_interest}}  </td>
                <td align="left" style="width: 33.25%; text-align: center;">
                <strong>TENURE :</strong>  {{$fn_details->final_tennure}}
                </td>
            </tr>
            <br>
            <tr>
                <td align="left" style="width: 33.25%;text-align: center;">
                <strong>EMI :</strong>  {{$fn_details->final_emi}}
                </td>
                <td align="left" style="width: 33.25%;text-align: center;">
                <strong>PROPOSED EMI :</strong>  {{$fn_details->final_proposed_total_emi}}
                </td>
                <td align="left" style="width: 33.25%;text-align: center;">
                <strong>CURRENT OBLIGATION RATIO :</strong>   {{$fn_details->final_current_foir}}
                </td>
            </tr>
            <br>
            <tr>
                <td align="left" style="width: 33.25%;text-align: center;">
                <strong>PROPOSED OBLIGATION RATIO :</strong>  {{$fn_details->final_proposed_foir}}

                </td>
                <td align="left" style="width: 33.25%;text-align: center;">
                <strong>SALARY CONSIDERED :</strong>  {{$fn_details->final_salary_considered}}

                </td>
                <td align="left" style="width: 33.25%;text-align: center;">
                <strong>OBLIGATION CONSIDERED :</strong>  {{$fn_details->final_obligation_considered}}
                </td>
            </tr>
            <br>
        </table>
  </div>
  <br>
  <div class="invoice">
    <h5>REMARKS</h5>
        <p style="margin-left: 45px">{{$fn_details->Final_page_remarks}}</p>
        <br>
    </div>
    <br>
    <br>
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
        <div class="container" id="new_logo">
            <center><img src="{{ public_path('img/Logo_Latest.png') }}" width="95%" height="80"  alt=""></center>
        </div>
    </header>
    <hr>
    <div class="invoice" id="cr_tb">
        <h5>ADITIONAL INFROMATION HOME LOAN</h5>
        <table width="100%" >
            <tr>
                <td align="left" style="width: 25%; text-align: center;">
                    <p><strong>AGE :</strong> {{$additional_details->hl_age}}</p>
                </td>
                <td align="left" style="width: 25%; text-align: center;">
                    <p><strong>PROPERTY TYPE : </strong>{{$additional_details->hl_property_type}}</p>
                </td>
                <td align="left" style="width: 25%; text-align: center;">
                    <p><strong>PROPERTY VALUE :</strong>  {{$additional_details->hl_property_value}}</p>
                </td>
                <td align="left" style="width: 25%; text-align: center;">
                    <p><strong>BUILDER NAME :</strong>  {{$additional_details->hl_builder_name}}</p>
                </td>
            </tr>
            <tr>
                <td align="left" style="width: 25%; text-align: center;">
                    <p><strong>PROPERTY AREA:</strong> {{$additional_details->hl_property_area }}</p>
                </td>
                <td align="left" style="width: 25%; text-align: center;">
                    <p><strong> PROPERTY CITY: </strong>{{$additional_details->hl_property_city }}</p>
                </td>
                <td align="left" style="width: 25%; text-align: center;">
                    <p><strong> G-SALARY:</strong>  {{$additional_details->hl_gross_salary}}</p>
                </td>
                <td align="left" style="width: 25%; text-align: center;">
                    <p><strong> CO-JOINT:</strong>  {{$additional_details->hl_co_joint}}</p>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <br>
    <br>
    <div class="invoice" id="cr_tb">
        <h5 style="margin-left: 25px">HOME LOAN COMPARISON</h5>
        <table width="100%"  >
            <thead>
                <tr>
                    <th>EXISTING LOAN</th>
                    <th>VALUE</th>
                    <th>NEW LOAN</th>
                    <th>VALUE</th>
                    <th>YOU SAVE</th>
                    <th>VALUE</th>
                </tr>
            </thead>
            <tbody class="hl_ln_com">
                <tr>
                    <td>LOAN AMOUNT </td>
                    <td><span>{{$ln_comparison->ex_ln_loan_amount}}</td>
                    <td>LOAN AMOUNT </td>
                    <td><span>{{$ln_comparison->ln_com_new_loan_amount}}</td>
                    <td>GROSS SAVINGS </td>
                    <td><span>{{$ln_comparison->ln_com_new_gross_sav}}</td>
                </tr>
                <tr>
                    <td>ROI</td>
                    <td>{{$ln_comparison->ex_ln_roi}}</td>
                    <td>NEW RATE</td>
                    <td>{{$ln_comparison->ln_com_new_roi}}</td>
                    <td>CHARGES</td>
                    <td>{{$ln_comparison->ln_com_ot_charges}}</td>
                </tr>
                <tr>
                    <td>TENURE</td>
                    <td>{{$ln_comparison->ex_ln_tennure}}</td>
                    <td>NEW TENURE</td>
                    <td>{{$ln_comparison->ln_com_new_tennure }}</td>
                    <td>MODT</td>
                    <td>{{$ln_comparison->ln_com_motd}}</td>
                </tr>
                <tr>
                    <td>CURRENT EMI</td>
                    <td>{{$ln_comparison->ex_ln_emi}}</td>
                    <td>NEW EMI</td>
                    <td>{{$ln_comparison->ln_com_new_emi}}</td>
                    <td>PF</td>
                    <td>{{$ln_comparison->ln_com_pro_fee}}</td>
                </tr>
                <tr>
                    <td>NO OF EMI'S PAID</td>
                    <td>{{$ln_comparison->ex_ln_no_of_emi_paid}}</td>
                    <td>PROPOSED OUTFLOW</td>
                    <td>{{$ln_comparison->ln_com_new_proposed_outflow}}</td>
                    <td>TOTAL COST</td>
                    <td>{{$ln_comparison->ln_com_total_cost}}</td>
                </tr>
                <tr>
                    <td>CURRENT OUTSTANDING</td>
                    <td>{{$ln_comparison->ln_com_new_loan_amount}}</td>
                    <td><span></span></td>
                    <td><span></span></td>
                    <td>NET SAVINGS</td>
                    <td>{{$ln_comparison->ln_com_net_sav}}</td>
                </tr>
                <tr>
                    <td>BALANCE NO OF MONTHS TO BE PAID</td>
                    <td>{{$ln_comparison->ex_ln_loan_amount}}</td>
                    <td><span></span></td>
                    <td><span></span></td>
                    <td> <span></span></td>
                    <td> <span></span></td>
                </tr>
                <tr>
                    <td>EXISTING OUTFLOW </td>
                    <td>{{$ln_comparison->ex_ln_exsting_out_flow}}</td>
                    <td><span></span></td>
                    <td><span></span></td>
                    <td> <span></span></td>
                    <td> <span></span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
   <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div class="invoice" id="">
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



@endif
</html>
