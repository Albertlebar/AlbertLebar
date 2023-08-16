@component('mail::message')
# Hello, {{ $mailInfo['details']->first_name }}

<p><strong> Appointment Type: </strong>{{ config('params.appointment_type')[$mailInfo['details']->appointment_type] }}</p>
<p><strong> Appintment Date: </strong>{{ Carbon\Carbon::parse($mailInfo['details']->appointment_date)->format('d/m/Y') }}
<p><strong>Status: </strong> {{ config('params.appointment_status')[$mailInfo['details']->status] }}</p>

@if($mailInfo['details']->status == 0)
<p>Waiting for Confirmation Mail from our side.</p>
@endif

Thanks<br>

@endcomponent
