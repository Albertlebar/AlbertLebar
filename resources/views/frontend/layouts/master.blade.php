<!DOCTYPE html>
<html>
<head>
    @include('frontend.layouts.head')
</head>
<body>
    <!-- Start Header Area -->
        @include('frontend.layouts.header')    
    <!-- end Header Area -->

        @yield('content')
        
        @include('frontend.layouts.footer')

        @stack('script')
</body>
</html>
