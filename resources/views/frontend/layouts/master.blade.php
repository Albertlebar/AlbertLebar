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
</body>
</html>
