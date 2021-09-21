@component('mail::message')
# Introduction

Sign Up Earn Stars

@component('mail::button', ['url' => $link])
Sign Up
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
