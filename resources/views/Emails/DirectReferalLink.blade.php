@component('mail::message')
<b>Hi,</b>
<p>I would like to share you something!.
<b>Loanstories.com</b>-A New Way Of Financial Planning
Customized Loan Offers with <b>Super Reward Points every month
</b> Get Access to <b>One View, EMI Meter, EMI Calculators, Eligibility Calculators, Part Payment Calculator</b>  for free and Meet your Loan Assistant online for latest offers from leading lenders as i did
@component('mail::button', ['url' => $link])
Sign Up
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
