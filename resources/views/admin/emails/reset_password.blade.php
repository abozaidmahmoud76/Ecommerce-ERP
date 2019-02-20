@component('mail::message')
# Reset account

<p>Welcome {{$data['data']['name']}}</p>

@component('mail::button', ['url' => adminUrl('reset/password/'.$data['token'])])
Click here to reset password
@endcomponent

or copy this link
<a href="{{adminUrl('reset/password/'.$data['token'])}}">{{adminUrl('reset/password/'.$data['token'])}}</a>
{{ config('app.name') }}
@endcomponent
