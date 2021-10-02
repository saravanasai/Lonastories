@extends('layouts.FronendMaster')
@section('content')
<section>
    <div class="container mt-md-5 pt-md-5">
        <div class="row">
            <form action="{{route('quickEnquieryForm.store')}}" method="POST" class="col-md-4">
                @csrf
                <div id="slider" class="form">
                    <ul class="">
                        <li class="" data-id="slider_start">
                            <div class="text-center">
                                <h4 class="text-secondary font-weight-bold
                                    ">Best Time & Date To Call Me </h4>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" id="txtDate" class="form-control" name="enq_time" data-toggle="tooltip"
                                    data-placement="top" title="Enter valid email" placeholder="Select Your Day"
                                    onfocus="this.type='date'" onblur="this.type='text'" required>
                            </div>
                            <br>
                            <div class="form-group">
                                <input type="text" id="txttime" class="form-control" name="time" placeholder="Select Your Time"
                                    onfocus="this.type='time'" onblur="this.type='text'" required>
                            </div>
                            <br>
                        </li>
                        <li>
                            <div class="col-12 text-center">
                                <h4 class="text-secondary font-weight-bold">I Prefer</h4>
                            </div>
                            <br>
                            <div class="form-group">
                                <select class="form-control select" name="enq_pre_mode">
                                    <option value="" hidden>Call For</option>
                                    <option value="video">Video Call</option>
                                    <option value="audio">Audio Call</option>
                                    <option value="whatsapp">Whatsapp Chat</option>
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
                                        <select id="loa" class="form-control select" name="enq_pro_type">
                                            <option value="" hidden>Select Your Desired Loan !
                                            </option>
                                            @foreach ($products as $product)
                                            <option value="{{$product->id}}">{{$product->productname}}</option>
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
                                        <select class="form-control select" name="enq_sub_pro_type" >
                                            <option value="" hidden>Select Your Type</option>
                                            <option value="1">BL - New Loan</option>
                                            <option value="2">Transfer</option>
                                            <option value="3">Consolidation</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12" id="priority">
                                    <div class="text-center">
                                        <h6 class="text-secondary font-weight-bold">
                                            For Personal Loans My Priority Is
                                        </h6>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select" namr="priority">
                                            <option value="" hidden>What's Your Priority ?</option>
                                            <option value="hiel">Higher Eligibility</option>
                                            <option value="lroi">Lowest ROI</option>
                                            <option value="ppo">Part Payment Options</option>
                                            <option value="foreclose">Foreclosure within a short turnaround
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
                                    <input type="text" name="compName" class="form-control wizard-required" id=""
                                        placeholder="Company Name" />
                                </div>
                                <br>
                                <div class="form-group col-md-12">
                                    <br>
                                    <input type="text" name="income" class="form-control wizard-required" id=""
                                        placeholder="Net Monthly Income / salary" />
                                </div>
                                <!-- <div class="form-group col-md-6">
                                    <br>
                                    <input type="text" class="form-control wizard-required" id=""
                                        placeholder="Total Emi Obligation" />
                                </div>
                                <div class="form-group col-md-6">
                                    <br>
                                    <input type="text" class="form-control wizard-required" id=""
                                        placeholder="Total Credit Card Outstanding" />
                                </div> -->
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
                                    <input type="text" name="residence" class="form-control wizard-required" id="reslocation"
                                        placeholder="Residence" />
                                    <br>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="text" name="office" class="form-control wizard-required" id="offlocation"
                                        placeholder="Office" />
                                    <br>
                                </div>

                                <div class="text-center col-12">
                                    <h5 class="text-secondary font-weight-bold text-center">Are you
                                        working from
                                        home ? (For
                                        Salaried) </h5>
                                    <div class="form-group">
                                        <select class="form-control select" name="wfh">
                                            <option value="" hidden>What's Up ?</option>
                                            <option value="">Yes</option>
                                            <option value="">No</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </li>
                        <li>
                            <div class="col-12 text-center">
                                <h4 class="text-secondary font-weight-bold">How soon the loan is
                                    expected ? </h4>
                            </div>
                            <br>
                            <div class="form-group">
                                <select class="form-control select" name="whenNeed">
                                    <option value="" hidden>When You Need ?</option>
                                    <option value="">Immediate</option>
                                    <option value="">Within 1 Month</option>
                                    <option value="">2-3 Months</option>
                                    <option value="">After 3 Months</option>
                                </select>
                            </div>
                            <br>
                        </li>
                        <li>
                            <div class="col-12 text-center">
                                <h4 class="text-secondary font-weight-bold">My Cibil Score </h4><br>
                                <div class="form-group">
                                    <select class="form-control select" name="enq_cibil_score">
                                        <option value="" hidden>Choose What You Got ?</option>
                                        <option value="">
                                            < 800</option>
                                        <option value="">750 to 800</option>
                                        <option value="">700 to 750</option>
                                        <option value="">650 to 700</option>
                                        <option value="">
                                            > 650 </option>
                                        <option value="">I don't remember</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center mt-lg-5">
                                <button type="submit" name="submit" class="btn btn-secondary">Submit</button>
                            </div>
                            <br>
                        </li>
                    </ul>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
{{-- script section for this page  --}}
@section('js')
<script>
    $(document).ready(function() {

        var options = {
            width: 600, //width of slider
            height: 400, //height of slider
            next_prev: true, //will show next and prev links
            next_class: 'h1 text-secondary', //class for next link
            prev_class: 'h1 text-secondary', //class for prev link
            error_class: 'alert alert-danger', //class for validation errors
            texts: {
                next: "<i class='fas fa-caret-right'></i>", //verbiage for next link
                prev: "<i class='fas fa-caret-left'></i>" //verbiage for prev link
            },
            speed: 800, //slider speed
        };

        $('#slider').jFormslider(options);

            //section for loadig the subproducts section by products
            $('body').on('change','#type_of_Product',function()
            {
                let product_id=$(this).val();
                if(product_id!=0)
                {
                                    //request to get a sub products
                                $.ajax({

                    url:'{{route("caller.getsubproductsbyproduct")}}',

                    type:'POST',

                    data: {
                        _token:"{{csrf_token()}}",
                        productid:product_id,


                    },

                    success: function(data) {

                        console.log(data);
                        let response=JSON.parse(data);
                        var tr = '';
                        $.each(response, function(i,subproduct) {
                        tr += '<option value="'+subproduct.id+'">'+subproduct.subproductname+'</option>';
                        });
                        $('#type_of_sub_product').prop("disabled", false);
                        $('#type_of_sub_product').html(tr);




                        }
                    });
                    //end of ajax request

                }else
                {
                    $('#type_of_sub_product').prop("disabled", true);
                    $('#type_of_sub_product').html('<option value="0" selected>Sub product type</option>');
                }



            });
            //end section for loadig the subproducts section by products

    })

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

        (loanSelect === 'pl') ? $('#priority').show(): $('#priority').hide();

        $('#loan_typ')
            .find('option')
            .remove()
            .end()
            .append('<option value="whatever">text</option>')
            .val('whatever');

        if ((loanSelect === 'pl') || (loanSelect === 'bl')) {};
    })
    // Loan Priority ======================================
    </script>

{{-- end script section for this page  --}}
@endsection
