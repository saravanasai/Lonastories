@extends('layouts.FronendMaster')
@section('content')
    <style>
        .indent {
            text-indent: 40px;
        }

    </style>
    <img src="{{ asset('frontend/img/FAQ.png') }}" alt="" style="width: 100%;">
    <section class="p-0 p-4">
        <div class="container">
            <div class="text-center">
                <h2 class="font-weight-bold">Frequently Asked Questions</h2>
            </div>
            <br>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-center bg-gray">
                            <h3 class="text-light">About Loanstories.com</h3>
                        </div>
                        <div class="card-body text-justify text">
                            <h5 class="font-weight-bold">What is unique in Loanstories.com ?</h5>
                            <p class="indent">We are client specific, and you get customized offers matching
                                your
                                priority. Please click & read About Us page to know more.</p>
                            <hr>

                            <h5 class="font-weight-bold">Do I need to pay for your services ?</h5>
                            <p class="indent">No, we do not charge our clients for any of our fulfilment services.</p>
                            <hr>

                            <h5 class="font-weight-bold">How are Loyalty Points are calculated ?</h5>
                            <p class="indent">Loyalty points are the sum of your Stars, Chips & Hearts earned from us. Stars are added
                                after you sign up, Chips are added after your Loan disbursement & Hearts are added after the
                                successful sign up of all your referrals.</p>
                            <hr>

                            <h5 class="font-weight-bold">What’s special in Direct Referrals ?</h5>
                            <p class="indent">You get 2X Hearts for all your Direct Referrals.</p>
                            <hr>

                            <h5 class="font-weight-bold">What are Super Reward Points ?</h5>
                            <p class="indent">Super Reward Points are derived from the total Loyalty Points available in your profile page.
                                You get your Super Reward Points added to your profile page before 10th of every month basis
                                the Loan fulfilment opportunity given by you & your referrals for the month.</p>
                            <hr>

                            <h5 class="font-weight-bold">How do I redeem my Super Reward Points ?</h5>
                            <p class="indent">You will be notified once the redemption option is activated in your profile page. You can
                                redeem your points just in a click from your profile page.</p>
                            <hr>

                            <h5 class="font-weight-bold">How many Super Reward Points am I eligible ?</h5>
                            <p class="indent">We can offer up to 20000 SRP every month which is equivalent to a value of Rs.10000 every
                                month.</p>
                            <hr>

                            <h5 class="font-weight-bold">How can I approach you ?</h5>
                            <p class="indent">You can schedule a call with us as per your convenience by using our Enquiry link available
                                in the home page. You can get in touch with us through Audio Call, Video Call or a WhatsApp
                                chat.</p>
                            <hr>

                            <h5 class="font-weight-bold">How can I refer my contacts ?</h5>
                            <p class="indent">You can refer your contacts by clicking our Refer link available in almost all the pages.
                                Alternatively, you can also copy and paste the referral link available in our web pages in
                                to WhatsApp groups & other social media pages. Hearts are loaded to your profile for all the
                                sign ups received using your referral link. Hearts are converted in to SRP only after
                                availing our fulfilment services by your referrals.</p>
                            <hr>

                            <h5 class="font-weight-bold">How is your Service after Sales ?</h5>
                            <p class="indent">We believe in long term relationship and we are very much available post sales. Dedicated
                                team are available for Enquiries, Fulfilment, Support & Complaints management. You can find
                                our contact points available in the foot menu.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
