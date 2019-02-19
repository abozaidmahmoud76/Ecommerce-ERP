@component('mail::message')
# Introduction

The body of your message.

@component('mail::button', ['url' => adminUrl('reset/password/'.$data['token'])])
reset password
@endcomponent

Thanks {{$data['data']['name']}} ,<br>
{{ config('app.name') }}
@endcomponent
