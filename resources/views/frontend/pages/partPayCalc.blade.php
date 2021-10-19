@extends('layouts.FronendMaster')

@section('content')
    <style>
        th {
            text-align: center;
        }

    </style>
    <section class="p-0 pt-5">
        <div class="container">
            <div class="text-center">
                <h3>Part Payment calculator</h3>
            </div>
            <br>
            <div class="row">
                <div class="card has-shadow rounded">
                    <div class="card-header text-center bg-gray">
                        <h4 class="text-white">Checkout &amp; get instant eligibilty + benefits</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-justify">Getting a home loan from Bank is easy and quick. In our endeavor to
                            make
                            the process
                            convenient, we try to keep the paperwork and other formalities to a minimum.</p>

                        <div class="row">
                            <div class="col col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="outstandLoan"
                                        placeholder="Enter Outstanding Loan Amount" required
                                        oninput="this.value = this.value.replace(/[^0-9]/, '')"
                                        onkeyup="this.value = numberWithCommas(this.value)">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ongoingRoi"
                                        placeholder="Enter Ongoing Rate Of Interest" required
                                        oninput="validateNumber(this);">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="outstandTenure"
                                        placeholder="Tenure In Months" required
                                        oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="partPayAmt"
                                        placeholder="Enter Part Payment Amount"
                                        oninput="this.value = this.value.replace(/[^0-9]/, '')"
                                        onkeyup="this.value = numberWithCommas(this.value)">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <select class="form-control" id="frequency">
                                        <option value="0" hidden>Repayment Frequency</option>
                                        <option value="0">Once</option>
                                        <option value="1">Monthly</option>
                                        <option value="3">Quartrely</option>
                                        <option value="6">Halfyearly</option>
                                        <option value="12">Annually</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <button type="submit" id="partPayCalc" onclick="partPayCalc()"
                                        class="btn btn-darkblue"><strong>Calculate</strong></button>
                                    <button class="btn btn-info" id="getPdf" disabled>Get
                                        PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <p id="error" class="alert alert-danger font-weight-bold d-none" role="alert">Please Check your inputs and retry - invalid values.</p>
        </div>

    </section>
    <br>

    <!-- ===========Part Payment Table================= -->
    <div class="container border d-none" id="partPayTbl">
        <div class="text-center">
            <img src="{{ asset('frontend/img/pdfLogo.png') }}" class="img-fluid" alt="" width="100%"><br>
            <h3 class="font-weight-bold pt-3">Part Payment Calculations</h3>
            <hr>
        </div>

        <div class="row justify-content-center">
            <h5 class="font-weight-bold">Savings table</h5>
            <table class="table table-bordered text-center table-responsive" id="savings_tbl">
                <!-- ===========Savings Table================= -->
                <thead>
                    <tr class="bg-gray h6 text-light text-center">
                        <th class="" scope=" col">Loan will close in</th>
                        <th scope="col">Total Saving Amount</th>
                        <th scope="col">Total EMIs Saved</th>
                        <th scope="col">By Paying</th>
                        <th scope="col">Number of Part-Payments</th>
                        <th scope="col">Total Part-Payment Amount</th>
                    </tr>
                </thead>
            </table>
        </div>
        <hr>
        <div class="row justify-content-center">
            <h5 class="font-weight-bold">Amortization table</h5>
            <table class="table table-bordered text-center table-responsive" id="amortization_tbl">
                <!-- ===========Amortization Table================= -->
                <thead>
                    <tr class="bg-gray h6 text-light">
                        <th scope="col" style="text-align: center">Months</th>
                        <th scope="col">Outstanding Principal</th>
                        <th scope="col">EMI</th>
                        <th scope="col">Interest</th>
                        <th scope="col">Principle</th>
                        <th scope="col">Pre Payments</th>
                        <th scope="col">Closing Balance</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <!-- ===========Part Payment Table================= -->
@endsection
<script type="text/javascript">
    // =================Part Payment calculator===============
    function partPayCalc() {
        // $('#partPayCalc').prop('disabled', true);
        // $('#amortization_tbl tbody').detach();
        // $('#savings_tbl tbody').detach('');

        // $("#getPdf").removeAttr('disabled');
        // $('#partPayTbl').removeClass('d-none');

        let TotLoanAmt = parseInt($('#outstandLoan').val().replace(/,/g, ''));
        let roi = parseInt($('#ongoingRoi').val());
        let tenure = parseInt($('#outstandTenure').val());
        let partPrePayAmt = parseInt($('#partPayAmt').val().replace(/,/g, ''));
        var frequency = parseInt($('#frequency').val());
        let valid = true;

        console.log(TotLoanAmt, partPrePayAmt);

        // Validaion
        $('#outstandLoan, #ongoingRoi, #outstandTenure, #partPayAmt, #frequency').each(function() {
            if ($(this).val() == '') {
                $(this).parent().effect('shake', {
                    times: 5
                }, 50).find('.verdiv').addClass('error');
                $(this).parent().css('border-bottom', '2px solid rgb(255 0 0)').css('border-radius',
                    '5px');
                valid = false;
            } else {
                $(this).parent().css('border', 'none');
            }
        });
        // Validaion

        // Calculation
        if (valid) {
            $("#error").addClass('d-none');
            $('#amortization_tbl tbody').detach();
            $('#savings_tbl tbody').detach('');

            $("#getPdf").removeAttr('disabled');
            $('#partPayTbl').removeClass('d-none');

            // EMI Calculation
            let r = roi / (12 * 100);
            let prate = (TotLoanAmt * r * Math.pow((1 + r), tenure)) / (Math.pow((1 + r), tenure) - 1);
            let emi = (Math.ceil(prate * 100) / 100).toFixed(0);
            let totalMnth = tenure;
            var nofpay = 0;

            // Total Declaration
            let clBal, modulus, outstand, interest, principle, prepay;

            // Amortization Table ========================================
            for (let i = 1; i <= totalMnth; i++) {

                if (frequency == 0) {
                    modulus = 0;
                    var frequency = null;
                } else {
                    modulus = i % frequency;
                }

                outstand = (i == 1) ? TotLoanAmt : clBal; // Outstanding Principle

                interest = ((outstand * (roi / 100)) / 12); // Interest

                principle = Math.round(emi - interest); // Principle

                let prePayAmt = (modulus == 0) ? partPrePayAmt : 0;


                clBal = outstand - (principle + prePayAmt); // Closing Balance

                clBal = (Math.sign(clBal) === 1) ? ((clBal)) : 0; // Closing Balance


                amort_emi = (frequency == null) ? emi : ((outstand < emi) ? (outstand + interest) : emi); // EMI

                amort_prePay = (outstand < emi) ? 0 : prePayAmt;


                prepay = (clBal == 0) ? (outstand - principle) : amort_prePay; //  Pre Payements

                prepay = (Math.sign(prepay) === 1) ? prepay : 0;

                // Append into Amortization Table
                if (outstand !== 0) {
                    $("#amortization_tbl").append("<tr class='text font-weight-bold'>" +
                        "<td>" + i + "</td>" +
                        "<td>" + outstand + "</td>" +
                        "<td>" + (Math.round(amort_emi)) + "</td>" +
                        "<td>" + (Math.round(interest)) + "</td>" +
                        "<td>" + principle + "</td>" +
                        "<td>" + prepay + "</td>" +
                        "<td>" + clBal + "</td>" +
                        "</tr>");
                    var loanCls = i;

                    var nofpay = (prepay == partPrePayAmt) ? nofpay + 1 : nofpay + 0;

                } else {

                    break;
                }

                TotLoanAmt = outstand;
                principle = principle;
            };

            var totSavMnth = isNaN(tenure - loanCls) ? 0 : (tenure - loanCls);
            // Amortization Table ===================================

            // ======================================================

            // Savings Table ========================================
            $("#savings_tbl").append("<tr class='text font-weight-bold'>" +
                "<td>" + loanCls + " months </td>" +
                "<td>" + (totSavMnth * emi) + "</td>" +
                "<td>" + totSavMnth + " months </td>" +
                "<td>" + partPrePayAmt + "/- each</td>" +
                "<td>" + nofpay + " months </td>" +
                "<td>" + (nofpay * partPrePayAmt) + "</td>" +
                "</tr>");
            // Savings Table ========================================
        } else {
            //returns error if inputs are invalid
            $("#error").removeClass('d-none');
        }
    };

    // =================Get Pdf==========================
    window.onload = function() {
        document.getElementById("getPdf").addEventListener("click", () => {
            const doc = this.document.getElementById('partPayTbl');
            console.log(doc);
            console.log(window);

            var opt = {
                margin: 0.1,
                filename: 'myfile.pdf',
                image: {
                    type: 'jpeg',
                    quality: 1
                },
                html2canvas: {
                    scale: 1.5
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            html2pdf().from(doc).set(opt).save("Part Payment Calc.pdf");
        })
    };

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    // =================Get Pdf==========================
    // =================Part Payment calculator===============
</script>
<!--================================= Scripting=================================================== -->
