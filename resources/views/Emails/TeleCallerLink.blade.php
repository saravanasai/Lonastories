@component('mail::message')
# Introduction

Click And Sigup To Get

@component('mail::button', ['url' => $link])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
