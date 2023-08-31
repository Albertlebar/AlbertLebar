@component('mail::message')
# Hello, {{ $mailInfo['details']->first_name }}

<p><strong> Your Enquirey Message: </strong>{{ $mailInfo['details']->message }}</p>

<p>Waiting for Response from our side.</p>

Thanks<br>

@endcomponent
