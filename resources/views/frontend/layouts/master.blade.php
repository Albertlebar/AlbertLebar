<!DOCTYPE html>
<html>
<head>
    @include('frontend.layouts.head')
</head>
<body>
	<?php
	if(Auth::check())
      {
        $cartItem = App\Models\Cart::join('items','carts.item_id','items.id')->join('item_images','carts.item_id','item_images.item_id')->where('is_main_image',1)->where('user_id',Auth::user()->id)->get()->toArray();
        // echo "<pre>";
        // print_r($cartItem);
        // die; 
      }else{
        $cartItem = \Session::get('cart');
      }
	?>
    <!-- Start Header Area -->
        @include('frontend.layouts.header')    
    <!-- end Header Area -->

        @yield('content')
        
        @include('frontend.layouts.footer')
        @include('backend.layouts.footer')
        @stack('script')
        <!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/64c44627cc26a871b02be36f/1h6fb42cu';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
@include('cookieConsent::index')
</body>
</html>
