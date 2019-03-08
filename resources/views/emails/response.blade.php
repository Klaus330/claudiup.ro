@component('mail::message')
# Hello, {{$userMessage->name}}

{!!$reply!!}


Take care,<br>
{{ config('app.name') }}
@endcomponent
