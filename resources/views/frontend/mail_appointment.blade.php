<!DOCTYPE html>
<html>
<head>
    <title>{{ $mailInfo['title'] }}</title>
	<link href="https://fonts.cdnfonts.com/css/santral-blackitalic" rel="stylesheet">
    <style type="text/css">
    	body {
			color: #555555;
			line-height: 1.7;
			font-size: 14px;
			font-weight: 500;
			font-family: Santral-Medium;
    	}
    </style>
</head>
<body>
    <h1><strong> Name: </strong> {{ $mailInfo['details']->first_name }} {{ $mailInfo['details']->last_name }}</h1>
    <p><strong> Appointment Type: </strong>{{ config('params.appointment_type')[$mailInfo['details']->appointment_type] }}</p>
    <p><strong> Appintment Date: </strong>{{ Carbon\Carbon::parse($mailInfo['details']->appointment_date)->format('d/m/Y') }}
	<p><strong>Status: </strong> {{ config('params.appointment_status')[$mailInfo['details']->status] }}</p>
	
	@if($mailInfo['details']->status == 0)
	<p>Waiting for Confirmation Mail from our side.</p>   
	@endif
    <p>Thank you</p>
</body>
</html>