<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title> @yield('title') | {{ config('app.name') }}</title>
<meta name="viewport"
      content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no"/>
<meta name="description" content="laravel, laravel-boilerplate">
<meta name="author" content="Riyadh Ahmed">
<meta name="msapplication-tap-highlight" content="no">
<meta name="robots" content="index, follow">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicons -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{ asset('/assets/css/vendor/bootstrap.min.css') }}">
<!-- Pe-icon-7-stroke CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/vendor/pe-icon-7-stroke.css') }}">
<!-- Font-awesome CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.min.css') }}">
<!-- Slick slider css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/slick.min.css') }}">
<!-- animate css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.css')}}">
<!-- Nice Select css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css')}}">
<!-- jquery UI css -->
<link rel="stylesheet" href="{{ asset('assets/css/plugins/jqueryui.min.css')}}">
<!-- main style css -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link rel="shortcut icon" href="{{asset('/assets/images/favicon.png')}}">


<link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">

<!-- Override CSS file - add your own CSS rules -->
<link rel="stylesheet" href="{{ asset('/assets/css/custom_admin_style.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css">

<!-- jQuery 3.4.1 -->
<script src="{{ asset('/assets/js/jquery-3.4.1.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.0/dropzone.js"></script>

<script>
    var CSRF_TOKEN = "{{ csrf_token() }}";
</script>

