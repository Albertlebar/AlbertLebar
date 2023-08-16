@component('mail::message')
# Hello, {{ $user->f_name }}

Please click the button below to verify your email address.

@component('mail::button', ['url' => $url])
Verify Email Address
@endcomponent

Thanks<br>

@endcomponent
