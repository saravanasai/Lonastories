@extends('layouts.FronendMaster')
<style>
    th {
        text-align: center;
    }

</style>
@section('content')
    <section>
        <div class="container">
            <div class="text-center">
                <h3>Part Payment calculator</h3>
            </div>
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
                                        placeholder="Enter Outstanding Loan Amount" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="ongoingRoi"
                                        placeholder="Enter Ongoing Rate Of Interest" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="outstandTenure"
                                        placeholder="Tenure In Months" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="partPayAmt"
                                        placeholder="Enter Part Payment Amount">
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
                                    <button type="submit" onclick="partPayCalc()"
                                        class="btn btn-darkblue"><strong>Calculate</strong></button>
                                    <button class="btn btn-warning pull-right disabled" id="getPdf" onclick="get_Pdf()">Get
                                        PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ===========Part Payment Table================= -->
    <div class="container border d-none" id="partPayTbl">
        <div class="">
        <div class=" text-center">
            <br>
            <img src="{{ asset('frontend/img/pdfLogo.png') }}" class="img-fluid" alt="" width="20%"><br>
            <h3 class="font-weight-bold">Part Payment Calculations</h3>
            <hr>
        </div>

        <div class="row justify-content-center">
            <h5 class="font-weight-bold">Savings table</h5>
            <table class="table table-bordered text-center" id="savings_tbl">
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
            <table class="table table-bordered text-center" id="amortization_tbl">
                <!-- ===========Amortization Table================= -->
                <thead>
                    <tr class="bg-gray h6 text-light">
                        <th scope="col">Months</th>
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
    </div>
    <!-- ===========Part Payment Table================= -->
@endsection
<script type="text/javascript">
    // =================Part Payment calculator===============
    function partPayCalc() {

        $('#partPayCalc').attr('disabled', 'disabled');
        $("#getPdf").removeClass('disabled');
        $('#partPayTbl').removeClass('d-none');

        let TotLoanAmt = parseInt($('#outstandLoan').val());
        let roi = parseInt($('#ongoingRoi').val());
        let tenure = parseInt($('#outstandTenure').val());
        let partPrePayAmt = parseInt($('#partPayAmt').val());
        var frequency = parseInt($('#frequency').val());
        let valid = true;

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

        if (valid) {
            let r = roi / (12 * 100);
            let prate = (TotLoanAmt * r * Math.pow((1 + r), tenure)) / (Math.pow((1 + r), tenure) - 1);
            let emi = (Math.ceil(prate * 100) / 100).toFixed(0);
            let totalMnth = tenure;
            let clBal;
            let modulus;
            var nofpay = 0;

            // Amortization Table ========================================
            for (let i = 1; i <= totalMnth; i++) {

                if (frequency == 0) {
                    modulus = 0;
                    var frequency = null;
                } else {
                    modulus = i % frequency;
                }
                // let modulus = frequency % i;

                let outstand = (i == 1) ? TotLoanAmt : Math.ceil(clBal);

                let interest = Math.round((outstand * (roi / 100)) / 12);

                let principle = emi - interest;

                let prePayAmt = (modulus == 0) ? partPrePayAmt : 0;

                clBal = outstand - (principle + prePayAmt);

                clBal = (Math.sign(clBal) === 1) ? clBal : 0;

                amort_emi = (frequency == null) ? emi : ((outstand < emi) ? (outstand + interest) : emi);

                amort_prePay = (outstand < emi) ? 0 : prePayAmt;

                if (outstand !== 0) {
                    $("#amortization_tbl").append("<tr class='text'>" +
                        "<td>" + i + "</td>" +
                        "<td>" + outstand + "</td>" +
                        "<td>" + amort_emi + "</td>" +
                        "<td>" + interest + "</td>" +
                        "<td>" + principle + "</td>" +
                        "<td>" + amort_prePay + "</td>" +
                        "<td>" + clBal + "</td>" +
                        "</tr>");
                    var loanCls = i;

                    var nofpay = (amort_prePay == 0) ? nofpay + 0 : nofpay + 1;

                } else {

                    break;
                }

                TotLoanAmt = outstand;
                principle = principle;
            };

            var totSavMnth = isNaN(tenure - loanCls) ? 0 : (tenure - loanCls);
            // Amortization Table ========================================

            // Savings Table ========================================
            $("#savings_tbl").append("<tr class='text'>"
                // + "<td>" + totalMnth + "</td>"
                +
                "<td>" + loanCls + " months </td>" +
                "<td>" + (totSavMnth * emi) + "</td>" +
                "<td>" + totSavMnth + " months </td>" +
                "<td>" + partPrePayAmt + "/- each</td>" +
                "<td>" + nofpay + " months </td>" +
                "<td>" + (nofpay * partPrePayAmt) + "</td>" +
                "</tr>");
            // Savings Table ========================================


        }

        // =================Get Pdf==========================
        function get_Pdf() {
            const {
                jsPDF
            } = window.jspdf;

            var doc = new jsPDF('l', 'mm', [1200, 1200]);
            var pdfjs = document.querySelector('#partPayTbl');

            doc.html(pdfjs, {
                callback: function(doc) {
                    doc.save("Part_Pay_Ment_Caluculator.pdf");
                },
                x: 30,
                y: 10
            });
        };
        // =================Get Pdf==========================
    };
    // =================Part Payment calculator===============
</script>
<!--================================= Scripting=================================================== -->
