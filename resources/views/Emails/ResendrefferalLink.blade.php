@component('mail::message')
# Introduction

Sign Up On LoanStories And Earn Your Stars<br>
{{$name}}. Have been Reffered you.
@component('mail::button', ['url' =>$link])
Sign up
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
