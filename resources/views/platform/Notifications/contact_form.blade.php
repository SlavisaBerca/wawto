@component('mail::message')
# {{$title}}

{{$message}}.



Multumim,<br>
{{ config('app.name') }}
@endcomponent
