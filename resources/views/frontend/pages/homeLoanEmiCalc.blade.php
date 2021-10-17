@extends('layouts.FronendMaster')
@section('content')
    <style>
        th {
            text-align: center;
        }

    </style>
    <section class="p-0 pt-5">
        <div class="container">
            <h3 class="text-center">Home Loan Emi Calculator</h3>
            <br>
            <form class="card">
                <div class="card-header">
                    <h5 class="text-center font-weight-bold">Fill Your Detials </h5>
                </div>
                <fieldset class="card-body">
                    <div class="row">
                        <div class="col col-md-4">
                            <div class="form-group">
                                <h5><label for="name" class="control-label">I Want To Borrow</label>
                                </h5>
                                <input type="text" class="form-control" id="principal" name="pr_amt"
                                    placeholder="Enter Loan Amount" oninput="this.value = this.value.replace(/[^0-9]/, '')">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5><label for="name" class="control-label">Interest Rate %
                                        p.a</label>
                                </h5>
                                <input type="text" class="form-control" id="interest" name="int_rate"
                                    placeholder="Enter Your ROI" oninput="validateNumber(this);">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <h5><label for="name" class="control-label">Tenure</label></h5>
                                <input type="text" class="form-control" id="terms" placeholder="in months" name="period" oninput="this.value = this.value.replace(/[^0-9]/, '')">
                            </div>
                        </div>
                    </div>

                    <div class="pull-right">
                        <input type="button" id="calculate" class="btn btn-darkblue" value="Calculate"
                            onclick="getValues()" />
                        <input type="button" id="getPdf" class="btn btn-info" disabled value="Get Pdf" />
                    </div>
                </fieldset>
            </form>

            <form>
                <fieldset>
                    <div id="Result"></div>
                </fieldset>
            </form>
        </div>
    </section>
@endsection
<script language="javascript">
    var wwOpenInstalled;
    if (wwOpenInstalled || parent.wwOpenInstalled) {
        if (window.Event) {
            document.captureEvents(Event.MOUSEUP);
        }
        document.onmouseup = (parent.wwOpenInstalled) ? parent.wwOnMouseUp : wwOnMouseUp;
    };

    function getValues() {

        $('#calculate').prop('disabled', true);

        $('#getPdf').removeAttr('disabled');
        //button click gets values from inputs
        var balance = parseFloat(document.getElementById("principal").value);
        var interestRate =
            parseFloat(document.getElementById("interest").value / 100.0);
        var terms = parseInt(document.getElementById("terms").value);

        //set the div string
        var div = document.getElementById("Result");

        //in case of a re-calc, clear out the div!
        div.innerHTML = "";

        //validate inputs - display error if invalid, otherwise, display table
        var balVal = validateInputs(balance);
        var intrVal = validateInputs(interestRate);

        if (balVal && intrVal) {
            //Returns div string if inputs are valid
            div.innerHTML += amort(balance, interestRate, terms);
        } else {
            //returns error if inputs are invalid
            div.innerHTML += "Please Check your inputs and retry - invalid values.";
        }
    }

    function amort(balance, interestRate, terms) {
        //Calculate the per month interest rate
        var monthlyRate = interestRate / 12;

        //Calculate the payment
        var payment = balance * (monthlyRate / (1 - Math.pow(
            1 + monthlyRate, -terms)));

        //begin building the return string for the display of the amort table
        var result = "<hr>" +
            "<div class='card text-center'>" +
            "<div class='card-body'>" +
            "<strong>PRINCIPLE</strong> : ₹ " + balance.toFixed(2) + "   |   " +
            "<strong>ROI</strong> : " + (interestRate * 100).toFixed(2) + "%   |   " +
            "<strong>TENURE</strong> : " + terms + "   |   " +
            "<strong>EMI</strong> : ₹ " + payment.toFixed(2) + "   |   " +
            "<strong>TOTAL PAID</strong> : ₹ " + (payment * terms).toFixed(2) + "<br />" +
            "</div>" +
            "</div><br>";

        //add header row for table to return string
        result += "<div class='border text-center' id='homeTbl'>" +
            "<img src='{{ asset('frontend/img/pdfLogo.png') }}' class='img-fluid' width='100%'>" +
            "<h4 class='font-weight-bold pt-3'>Home Loan Emi Calculations</h4>" +
            "<hr>" +
            "<table class='table table-bordered justify-content-center table-responsive'>" +
            "<tr class='bg-gray text-light'>" +
            "<th>Month</th>" +
            "<th>Principle Outstanding</th>" +
            "<th>Interest</th>" +
            "<th>Principle</th>" +
            "<th>EMI</th>";

        /**
         * Loop that calculates the monthly Loan amortization amounts then adds
         * them to the return string
         */
        for (var count = 0; count < terms; ++count) {
            //in-loop interest amount holder
            var interest = 0;

            //in-loop monthly principal amount holder
            var monthlyPrincipal = 0;

            //start a new table row on each loop iteration
            result += "<tr align=center class='text font-weight-bold'>";

            //display the month number in col 1 using the loop count variable
            result += "<td>" + (count + 1) + "</td>";


            //code for displaying in loop balance
            result += "<td>" + balance.toFixed(2) + "</td>";

            //calc the in-loop interest amount and display
            interest = balance * monthlyRate;
            result += "<td>" + interest.toFixed(2) + "</td>";

            //calc the in-loop monthly principal and display
            monthlyPrincipal = payment - interest;
            result += "<td>" + monthlyPrincipal.toFixed(2) + "</td>";

            //----------------------------------
            totalPayment = monthlyPrincipal + interest;
            result += "<td>" + totalPayment.toFixed(0) + "</td>";

            //end the table row on each iteration of the loop
            result += "</tr>";

            //update the balance for each loop iteration
            balance = balance - monthlyPrincipal;
        }

        //Final piece added to return string before returning it - closes the table
        result += "</table></div>";

        //returns the concatenated string to the page
        return result;
    };

    // =================Get Pdf==========================
    window.onload = function() {
        document.getElementById("getPdf").addEventListener("click", () => {
            const doc = this.document.getElementById('homeTbl');
            console.log(doc);
            console.log(window);

            var opt = {
                margin: 0.2,
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

            html2pdf().from(doc).set(opt).save("Home Loan Calculations.pdf");
        })
    };

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
    // =================Get Pdf==========================

    function validateInputs(value) {
        //some code here to validate inputs
        if ((value == null) || (value == "")) {
            return false;
        } else {
            return true;
        }
    }
</script>
