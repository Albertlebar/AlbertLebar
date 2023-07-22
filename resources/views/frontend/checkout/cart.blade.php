@extends('frontend.layouts.master')
@section('title', 'Cart')
@section('content')
<!-- page main wrapper start -->
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
<div class="shop-main-wrapper section-padding">
    <div class="container-fluid">
      <div class="section-padding">
        <div class="row">
            <div class="col-lg-12 col-12">
              <div class="cart-table table-responsive mb-40">
                <table>
                  <thead>
                    <tr>
                      <th class="pro-thumbnail">Image</th>
                      <th class="pro-title">Product</th>
                      <th class="pro-price">Price</th>
                      <th class="pro-quantity">Quantity</th>
                      <th class="pro-subtotal">Total</th>
                      <th class="pro-remove">Remove</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($cartItem)
                    <?php
                    $allTotal = 0;
                    ?>
                    @foreach($cartItem as $id=>$item)
                    <tr>
                      <td class="pro-thumbnail"><img src="{{asset('assets/images/items/').'/'.$item['images']}}"></td>
                      <td class="pro-title">
                        {{ $item['item_title'] }}  
                      </td>
                      <td class="pro-price"><span class="amount"><span class="money" data-currency-usd="$80.00">&pound;{{ $item['price'] }}</span></span></td>
                      <td class="pro-quantity">
                        <div class="product-quantity quantity">
                          <input type="number" min="1" step="1" value="{{ $item['quantity'] }}" name="updates[]" disabled>
                        <!-- <span class="dec qtybtn">-</span><span class="inc qtybtn">+</span> --></div>
                      </td>
                      <?php
                        $Total = $item['quantity'] * $item['price'];
                        $allTotal = $allTotal + $Total;
                      ?>
                      <td class="pro-subtotal"><span class="money" data-currency-usd="$160.00">&pound;{{ $Total }}</span></td>
                      <td class="pro-remove"><a href="/cart/change?line=1&amp;quantity=0"><i class="pe-7s-trash"></i></a></td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
              </div>
            </div>
            <div class="col-lg-6"></div>
            <div class="col-lg-6">
                <div class="cart-total">
                  <h3>Cart Totals</h3>
                  <table>
                    <tbody>
                      <tr class="cart-subtotal">
                        
                      </tr>
                      <tr class="order-total">
                        <th>Total</th>
                        <td>
                          <strong><span class="amount"><span id="bk-cart-subtotal-price"><span class="money" >&pound;{{ $allTotal ?? '' }}</span></span></span></strong>
                        </td>
                      </tr>                                         
                    </tbody>
                  </table><div class="proceed-to-checkout">
                    <a href="{{ URL :: to('/checkout') }}" class="theme-default-button">Proceed to Checkout</a>
                  </div>
                </div>
              </div>
        </div>
      </div>
    <div>
</div>
<!-- page main wrapper end -->
@endsection
@push('script')
<script type="text/javascript">

$(document).ready(function() {
    // View Form
    $(".quick_view_details").click(function(event) {
       
        $("#quick_view_item_details").empty();
      
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'item-details' + '/' + id,
            type: 'get',
            success: function(data) {
                $("#quick_view_item_details").html(data.html);
                $('#quick_view_item_details').modal('show'); // show bootstrap modal
            },
            error: function(result) {
                $("#quick_view_item_details").html("Sorry Cannot Load Data");
            }
          
        });
    });
});



// banner hight
$(document).ready(function() {

    // $(document).on("change", "#item_size", function(e) {
    //     e.preventDefault();
    //     var item_type = $(this).val();
    //     alert(item_type);
    // });
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
     $(window).resize(function(){
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
    // console.log(banerHeight);

    });  
});
</script>

@endpush
