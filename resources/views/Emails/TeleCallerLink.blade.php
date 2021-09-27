@component('mail::message')

<h3>Dear Sir / Madam</h3>
<p>
   <b>Greetings for the day</b> , it was great talking to you today. Thank You for considering us, you are just a click away & requesting you to Sign Up to enable us to work on the discussed Loan requirement.
    As a member of <strong>Loanstories.com</strong>, you get Unlimited Loyalty Points for Sign Up, Loan Disbursements & Referrals.
</p>
<p>
    You get access to One View, EMI Meter, Eligibility calculators, EMI Calculators & Part Payment Calculators for a better financial planning.
    Get the Best Fit Option matching your priority from our Loan Assistant through <b>Video Call, Audio Call or a WhatsApp chat</b>  as per your choice. Claim your Super Reward Points as cashback every month
    To explore more details, Sign Up now!
</p>

@component('mail::button', ['url' => $link])
Sign Up
@endcomponent

Yours Sincerely<br>
{{ config('app.name') }}
@endcomponent
