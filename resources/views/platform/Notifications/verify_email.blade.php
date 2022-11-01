@component('mail::message')
<style>
.btn-success {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
}
.btn {
    display: inline-block;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    border: 1px solid transparent;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    line-height: 1.5;
    border-radius: 0.25rem;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
</style>
# Confirmare E-mail

{{$message}}.

<a href="{{$url}}" class="btn btn-success">Verificare</a>

<a href="{{$del}}" class="btn btn-success">Nu sunt Eu</a>

Multumim,<br>
{{ config('app.name') }}
@endcomponent
