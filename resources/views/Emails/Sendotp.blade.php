@component('mail::message')
Your OTP Dont share it With Any One

OTP : {{$otp}}

{{-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent --}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
