@extends('layouts.FronendMaster')

@section('content')
    <style>
        html {
            visibility: hidden;
        }

        section {
            background-color: #041e43;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        input[type="text"] {
            background-color: aliceblue;
        }

        .alert-danger {
            color: #ffffff;
            font-weight: bold;
            background-color: #868e96;
            border-color: #041e4300;
        }

        .select {
            background-color: #ffffff !important;
        }

    </style>

    <section>
        <div class="container mt-md-5 pt-md-5">
            <div class="row">

                <div class="col-md-12">
                    <form action="{{ route('quickEnquieryForm.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="customer_id" value="{{Session('customer')->id}}">
                        <div class="card">
                            <div class="card-body font-weight-bold text-secondary">
                                <h2>Quick Enquiery</h2>
                                <p class="font-weight-bold text-center mb-5">@if ($errors->any())
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li class="text-danger">{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                @endif</p>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label" for="Original_Name">
                                                Proudct Interested
                                            </label>
                                            <select class="select form-control" id="Product_intrested" name="Product_intrested"
                                                >
                                                <option value="" hidden>Select Your Desired Loan !
                                                </option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->productname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Loan_Amount">
                                                 Loan Amount
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Loan_Amount" name="Loan_Amount"
                                                placeholder="Loan Amount" type="number" required />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="Preferred Bank Name">
                                                Preferred Bank Name
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="Preferred Bank Name"
                                                name="Preferred_Bank_Name" placeholder="Bank Name" type="text"
                                                required />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="City Name">
                                                City Name
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input class="form-control" id="City Name"
                                                name="City_Name" placeholder="Current City" type="text"
                                                required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="how_soon">
                                                How soon are you looking for the loan?
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <select class="select form-control" id="how_soon" name="how_soon"
                                            >
                                            <option value="" selected hidden>Please specify</option>
                                            <option  value="Immediate">Immediate</option>
                                            <option value="Within 1 Month">Within 1 Month</option>
                                            <option value="2-3 Months">2-3 Months</option>
                                            <option value="After 3 Months">After 3 Months</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="txtDate">
                                                Preferred Date
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input type="date" id="txtDate" class="form-control" name="enq_date"
                                            data-toggle="tooltip" data-placement="top" title="Date To Call"
                                            placeholder="Select Your Day" onfocus="this.type='date'" onblur="this.type='text'"
                                            required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="txtTime">
                                                Preferred  Time to call
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <input type="time" id="txtTime" class="form-control" name="enq_time"
                                            data-toggle="tooltip" data-placement="top" title="Enter Time To Call"
                                            required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group ">
                                            <label class="control-label requiredField" for="mode_to_connect">
                                                Preferred mode to connect
                                                <span class="asteriskField">
                                                    *
                                                </span>
                                            </label>
                                            <select class="select form-control" id="mode_to_connect" name="mode_to_connect"
                                            >
                                            <option value="" hidden>Mode of contact</option>
                                            <option value="video">Video Call</option>
                                            <option value="audio">Audio Call</option>
                                            <option value="whatsapp">WhatsApp Chat</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <button type="submit" name="submit" class="btn btn-success"
                                        value="">Submit Your Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- <div id="slider" class="form">
                            <ul class="">
                                <li class="" data-id=" slider_start">
                                    <div class="text-center">
                                        <h4 class="text-secondary font-weight-bold
                                        ">Best
                                            Time &
                                            Date To Call Me </h4>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="date" id="txtDate" class="form-control" name="enq_date"
                                            data-toggle="tooltip" data-placement="top" title="Enter valid email"
                                            placeholder="Select Your Day" onfocus="this.type='date'" onblur="this.type='text'"
                                            required>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="time" id="txttime" class="form-control" name="enq_time"
                                            placeholder="Select Your Time" onfocus="this.type='time'" onblur="this.type='text'"
                                            required>
                                    </div>
                                    <br>
                                </li>
                                <li>
                                    <div class="col-12 text-center">
                                        <h4 class="text-secondary font-weight-bold">I Prefer</h4>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <select class="form-control select" name="enq_pre_mode" required>
                                            <option value="" hidden>Mode of contact</option>
                                            <option value="video">Video Call</option>
                                            <option value="audio">Audio Call</option>
                                            <option value="whatsapp">WhatsApp Chat</option>
                                        </select>
                                    </div>
                                    <br>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 class="text-secondary font-weight-bold text-center">I'm
                                                Looking For</h4>
                                            <br>
                                            <div class="form-group">
                                                <select id="type_of_Product" class="form-control select" name="enq_pro_type"
                                                    required>
                                                    <option value="" hidden>Select Your Desired Loan !
                                                    </option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}">{{ $product->productname }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12">
                                            <div class="text-center">
                                                <h6 class="text-secondary font-weight-bold">Type Of Loan For
                                                </h6>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control select" name="enq_sub_pro_type"
                                                    id="type_of_sub_product" required>
                                                </select>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="col-md-12" id="priority">
                                            <div class="text-center">
                                                <h6 class="text-secondary font-weight-bold">
                                                My Priority
                                                </h6>
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control select" name="priority_for_personal_loan">
                                                    <option value="" hidden>What's Your Priority ?</option>
                                                    <option value="Higher Eligibility">Higher Eligibility</option>
                                                    <option value="Lowest ROI">Lowest ROI</option>
                                                    <option value="Part Payment Options">Part Payment Options</option>
                                                    <option value="Foreclosure within a short turnaround
                                                                                    time">Foreclosure within a short turnaround
                                                        time
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </li>

                                <li>
                                    <h4 class="text-secondary font-weight-bold text-center">
                                        My Income
                                    </h4>
                                    <br>
                                    <div class="row text-center">
                                        <div class="form-group col-md-12">
                                            <input type="text" name="company_name"
                                                class="form-control wizard-required typeahead" id="" placeholder="Company Name"
                                                required />
                                        </div>
                                        <br>
                                        <div class="form-group col-md-12">
                                            <br>

                                            <input type="text" name="monthly_income" class="form-control wizard-required" id=""
                                                placeholder="Net Monthly Income / salary" required
                                                oninput="this.value = this.value.replace(/[^0-9]/, '')" />
                                        </div>
                                    </div>
                                    <br>
                                </li>

                                <li>
                                    <h4 class="text-secondary text-center font-weight-bold">
                                        My Current Location
                                    </h4>
                                    <br>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <input type="text" name="residence" class="form-control wizard-required"
                                                id="reslocation" placeholder="City name you live now" required />
                                            <br>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="text" id="company_search" name="office"
                                                class="form-control wizard-required" id="offlocation"
                                                placeholder="City name as per your HR records" required />
                                            <br>
                                        </div>

                                        <div class="text-center col-12">
                                            <h5 class="text-secondary font-weight-bold text-center">Are you
                                                working from
                                                home ? (For
                                                Salaried) </h5>
                                            <div class="form-group">
                                                <select class="form-control select" name="working_from_home">
                                                    <option selected value="YES">Yes</option>
                                                    <option value="NO">No</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </li>
                                <li>
                                    <div class="col-12 text-center">
                                        <h4 class="text-secondary font-weight-bold">Loan Amount Required</h4>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <input type="text" name="loan_amount" class="form-control"
                                            placeholder="Please specify the Loan Amount" required
                                            oninput="this.value = this.value.replace(/[^0-9]/, '')">
                                    </div>
                                    <br>
                                    <div class="col-12 text-center">
                                        <h5 class="text-secondary font-weight-bold">How soon the loan is
                                            expected ? </h5>
                                    </div>
                                    <br>
                                    <div class="form-group">

                                        <select class="form-control select" name="loan_expected">
                                            <option value="" selected hidden>Please specify</option>
                                            <option  value="Immediate">Immediate</option>
                                            <option value="Within 1 Month">Within 1 Month</option>
                                            <option value="2-3 Months">2-3 Months</option>
                                            <option value="After 3 Months">After 3 Months</option>
                                        </select>
                                    </div>
                                    <br>
                                </li>
                                <li>
                                    <div class="col-12 text-center">
                                        <h4 class="text-secondary font-weight-bold">My Cibil Score </h4><br>
                                        <div class="form-group">
                                            <select class="form-control select" name="enq_cibil_score" required>
                                                <option value="" selected>Please specify</option>
                                                <option value=" > 800">
                                                    > 800</option>
                                                <option value="750 to 800">750 to 800</option>
                                                <option value="700 to 750">700 to 750</option>
                                                <option value="650 to 700">650 to 700</option>
                                                <option value="< 650">
                                                    < 650 </option>
                                                <option value="I don't remember">I don't remember</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="text-center mt-lg-5">
                                        @if ($user_info->enquiery_form_status == 0)
                                            <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
                                        @endif
                                    </div>
                                    <br>
                                </li>
                            </ul>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- script section for this page --}}
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script type="module" async>

        // let w = ($('body').innerWidth() >= 1000) ? ($('body').innerWidth() / 2.371) : $('body')
        //     .innerWidth() *
        //     3;
        // $(function() {
        //     console.log(w);
        //     // document.getElementsByTagName("html")[0].style.visibility = "hidden";
        //     //hideing priority select feild
        //     $('#priority').hide();
        //     var options = {
        //         width: w, //width of slider
        //         height: 500, //height of slider
        //         next_prev: true, //will show next and prev links
        //         next_class: 'h1 text-light', //class for next link
        //         prev_class: 'h1 text-light', //class for prev link
        //         error_class: 'alert alert-danger', //class for validation errors
        //         texts: {
        //             next: "<i class='fa fa-angle-right  display-3'></i>", //verbiage for next link
        //             prev: "<i class='fa fa-angle-left display-3'></i>" //verbiage for prev link
        //         },
        //         speed: 500, //slider speed
        //     };

        //     $('#slider').jFormslider(options);
        //     // Hide the  another submit button from DOM
        //     let submit = document.querySelector(
        //         '#slider > ul > li:nth-child(7) > div:nth-child(4) > button');
        //     submit.style.display = "none";

        //     //section for loadig the subproducts section by products
        //     $('body').on('change', '#type_of_Product', function() {

        //         let product_id = $(this).val();
        //         (product_id == '1') ? $('#priority').show(): $('#priority').hide();
        //         if (product_id != 0) {
        //             //request to get a sub products
        //             $.ajax({

        //                 url: '{{ route('caller.getsubproductsbyproduct') }}',

        //                 type: 'POST',

        //                 data: {
        //                     _token: "{{ csrf_token() }}",
        //                     productid: product_id,
        //                 },

        //                 success: function(data) {
        //                     console.log(data);
        //                     let response = JSON.parse(data);
        //                     var tr = '';
        //                     $.each(response, function(i, subproduct) {
        //                         tr += '<option value="' + subproduct.id +
        //                             '">' +
        //                             subproduct.subproductname + '</option>';
        //                     });
        //                     $('#type_of_sub_product').html(tr);
        //                 }
        //             });
        //             //end of ajax request

        //         } else {
        //             $('#type_of_sub_product').prop("disabled", true);
        //             $('#type_of_sub_product').html(
        //                 '<option value="0" selected>Sub product type</option>');
        //         }
        //     });
        //     //end section for loadig the subproducts section by products

        // })

        function last_slide() {
            alert("you are going to reach last slide if this function retuned true");
            return true;
        }
    </script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();


        // Previous Date Lock ==================================
        $(function() {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var minDate = year + '-' + month + '-' + day;

            $('#txtDate').attr('min', minDate);
        });
        // Previous Date Lock =================================


        //section to auto populate the company name
        var path = "{{ route('autocomplete') }}";

        $('input.typeahead').typeahead({

            source: function(keyword, process) {

                return $.get(path, {
                    keyword: keyword
                }, function(data) {

                    console.log(data);
                    return process(data);

                });

            }

        });
        //end section to auto populate the company name


        function last_slide() {
            alert("you are going to reach last slide if this function retuned true");
            return true;
        }
    </script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-36251023-1']);
        _gaq.push(['_setDomainName', 'jqueryscript.net']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') +
                '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();


        // Previous Date Lock ==================================
        $(function() {
            var dtToday = new Date();
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var minDate = year + '-' + month + '-' + day;

            $('#txtDate').attr('min', minDate);
        });
        // Previous Date Lock =================================

        // Loan Priority ======================================
        $('#priority').hide()

        $('#loan').change(function() {
            let loanSelect = $('#loan').find(":selected").val();
            (loanSelect === '1') ? $('#priority').show(): $('#priority').hide();

            $('#loan_typ')
                .find('option')
                .remove()
                .end()
                .append('<option value="whatever">text</option>')
                .val('whatever');

            // if ((loanSelect === 'pl') || (loanSelect === 'bl')) {};

        });
        document.getElementsByTagName("html")[0].style.visibility = "visible";
    </script>
    {{-- end script section for this page --}}
@endsection
