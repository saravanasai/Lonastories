@component('mail::message')
Dear Member

Thank you for being with us. Please use the below given OTP for login

OTP : {{$otp}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
