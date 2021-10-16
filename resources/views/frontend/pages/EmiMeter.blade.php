@extends('layouts.FronendMaster');
<style>
    body::-webkit-scrollbar {
        display: none;
    }

    body {
        margin: 0 !important;
        padding: 0 !important;
        background-attachment: fixed;
        background-size: cover;
        background-blend-mode: screen;
    }

    @import url(https://fonts.googleapis.com/css?family=Lato:100,300,400,700);

    #el:before {

        background: #c50000;
        background: -webkit-linear-gradient(right, #bd0000, #7ABE2E);
        background: -moz-linear-gradient(right, #941212, #7ABE2E);
        background: linear-gradient(to left, #cc0000, #7ABE2E);
        border-radius: 200px 200px 0 0;
        box-shadow: 0px 1px 10px rgba(255, 255, 255, 0.15) inset;
        content: "";
        height: 200px;
        position: absolute;
        width: 400px;
    }

    #el {
        border-radius: 200px 200px 0 0;
        height: 300px;
        /* margin: 5px auto 0; */
        overflow: hidden;
        position: absolute;
        width: 400px;

    }

    #el:after {
        background: #041e43;
        border-radius: 200px 200px 0 0;
        bottom: 100px;
        /* box-shadow: 3px 1px 8px rgba(0, 0, 0, 0.15); */
        color: #ffffff;
        content: attr(data-value);
        font-family: Lato, Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 2.5em;
        font-weight: 300;
        height: 150px;
        left: 50px;
        line-height: 200px;
        position: absolute;
        text-align: center;
        width: 300px;
        z-index: 3;
    }

    #needle {
        background: #fff;
        border-radius: 10px;
        bottom: 100px;
        box-shadow: 2px -0px 10px #ffffff;
        display: block;
        height: 5px;
        left: 10px;
        position: absolute;
        width: 190px;
        transform-origin: 100% 5px;
        transform: rotate(0deg);
        transition: all 1s;
    }

</style>

@section('content')
    <section class="mt-md-4 pt-md-5">
        <h3 class="text-center pb-md-2 pt-md-2 font-weight-bold">EMI METER</h3>
        <div class="container">
            <div class="row align-items-center">
                <img src="{{ asset('frontend/img/meter.png') }}" class="rounded" alt="" style="width: 100%;"
                    loading="lazy">
            </div>

            <div class="row mt-md-5 bg-light p-3">
                <div class="col-md-4">
                    <br>
                    <input type="text" id="income" class="form-control bi-alarm" name="fullname"
                        placeholder="Net Monthly Income" required oninput="this.value = this.value.replace(/[^0-9]/, '')">
                    <br>
                    <input type="text" id="tot_emi" name="" class="form-control" placeholder="Total Emi Obligations"
                        required oninput="this.value = this.value.replace(/[^0-9]/, '')" /> <br>
                    <input type="text" id="outstand" name="" class="form-control" placeholder="Latest Credit Outstanding"
                        required oninput="this.value = this.value.replace(/[^0-9]/, '')" /> <br>
                    <div class="text-center">
                        <button type="button" class="btn btn-darkblue ribbon"
                            onclick="meterCalc()"><b>Calculate</b></button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div id="el" class="" data-value=" 0%">
                        <span id="needle"></span>
                    </div>
                </div>
                <div class="col-md-4"><br>
                    <div class="card-body text-center">
                        <p>Your Current Obligation Ratio is : <span class="font-weight-bold" id="ratio">0</span>
                        </p>
                        <hr>
                        <p>Personal Loan Eligibility : <span class="font-weight-bold" id="personalEligible">0.00</span>
                        </p>
                        <hr>
                        <p>Home Loan Eligibility : <span class="font-weight-bold" id="homeEligible">0.00</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script type="text/javascript">
    //Eligible Calculator================================
    function meterCalc() {

        let salary = isNaN(parseInt($('#income').val())) ? 0 : parseInt($('#income').val());
        let obligate = isNaN(parseInt($('#tot_emi').val())) ? 0 : parseInt($('#tot_emi').val());
        let card_outstanding = isNaN(parseInt($('#outstand').val())) ? 0 : parseInt($('#outstand').val());

        if ((salary == 0) || (obligate == 0)) {
            alert('Please Fill All The Values')
        } else {
            let Total_obligate = (0.05 * card_outstanding) + obligate;
            // Personal Loan Eligibility
            let value = (salary <= 5e4) ? ((salary * 0.5) - Total_obligate) : ((salary * 0.7) -
                Total_obligate);
            let result = (parseInt((value / 2175) * 1e5));
            result = isNaN(result) ? 0 : result;
            $('#personalEligible').text(result <= 0 ? 'not Eligible' : ': ₹ ' + result.toFixed(0));
            // Personal Loan Eligibility

            // Home Loan Eligiblity
            let h_value = (salary <= 5e4) ? ((salary * 0.5) - Total_obligate) : ((salary * 0.7) - Total_obligate);
            let h_result = (parseInt((h_value / 899) * 1e5));
            h_result = isNaN(h_result) ? 0 : h_result;

            $('#homeEligible').text(h_result <= 0 ? 'not Eligible' : ': ₹ ' + h_result.toFixed(0));
            // Home Loan Eligiblity

            // ========Emi Meter========
            if (result > 0) {
                let percent = ((((0.05 * card_outstanding) + obligate) / salary) * 100);
                let val = isNaN(percent) ? 0 : percent.toFixed(0);

                $({
                    Counter: 0
                }).animate({
                    Counter: val,
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function() {
                        $('#el').attr("data-value", Math.round(this.Counter) + ' %');
                        $('#ratio').text(Math.round(this.Counter) + ' %');
                    }
                });

                $("#el span").css({
                    "transform": "rotate(0deg)",
                    "transform": "rotate(" + val * 1.8 + "deg)"
                });
            }
        }
        // ========Emi Meter========
    };
    //Eligible Calculator================================
</script>
