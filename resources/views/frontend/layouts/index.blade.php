@extends('frontend.layouts.master')
@section('video')
@include('frontend.layouts.video_container')
@endsection 
@section('title', 'Home')
@section('content')
    <main >
        <!-- hero slider area start -->
        
        <!-- hero slider area end -->

        <!-- service policy area start -->
        <div class="service-policy section-padding shop-main-wrapper">
            <div class="container text-center" style="margin-top: 40px !important ">
                <div class="d-flex mt-30" style="justify-content: space-around;">
                    <div class="">
                        <div class="policy-item" style="align-items: flex-end;">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Free Shipping</h6>                                
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="policy-item" style="align-items: flex-end;">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Support 24/7</h6>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="policy-item" style="align-items: flex-end;">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Money Return</h6>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="policy-item" style="align-items: flex-end;">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>100% Payment Secure</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- service policy area end -->

        <!-- banner statistics area start -->
        <!-- <div class="banner-statistics-area">
            <div class="container">
                <div class="row row-20 mtn-20">
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="{{ asset('assets/img/banner/img1-top.jpg') }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">BEAUTIFUL</h5>
                                <h2 class="banner-text2">Wedding<span>Rings</span></h2>
                                <a href="javascript:void(0);" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="{{ asset('assets/img/banner/img2-top.jpg')}}" alt="product banner">
                            </a>
                            <div class="banner-content text-center">
                                <h5 class="banner-text1">EARRINGS</h5>
                                <h2 class="banner-text2">Tangerine Floral <span>Earring</span></h2>
                                <a href="javascript:void(0);" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="{{ asset('assets/img/banner/img3-top.jpg') }}" alt="product banner">
                            </a>
                            <div class="banner-content text-center">
                                <h5 class="banner-text1">NEW ARRIVALLS</h5>
                                <h2 class="banner-text2">Pearl<span>Necklaces</span></h2>
                                <a href="javascript:void(0);" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                    <div class="col-sm-6">
                        <figure class="banner-statistics mt-20">
                            <a href="#">
                                <img src="{{ asset('assets/img/banner/img4-top.jpg') }}" alt="product banner">
                            </a>
                            <div class="banner-content text-right">
                                <h5 class="banner-text1">NEW DESIGN</h5>
                                <h2 class="banner-text2">Diamond<span>Jewelry</span></h2>
                                <a href="javascript:void(0);" class="btn btn-text">Shop Now</a>
                            </div>
                        </figure>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- banner statistics area end -->

        <!-- product area start -->
        
        <!-- product area end -->

        <!-- product banner statistics area start -->
        
        <!-- product banner statistics area end -->

        <!-- featured product area start -->
        <section class="feature-product section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Best Seller</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="blog-carousel-active slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            @forelse($items as $item)
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details" href="javascript:void(0);">
                                    @if(!empty($item->photo_0))
                                        <img class="pri-img" src="{{ asset($item->photo_0) }}" alt="product">
                                    @endif
                                    </a>
                                </figure>
                                <div class="row">
                                        <div class="col">
                                            <h6 style="font-size: 12px;" class="product-name p-0"><a
                                                    href="javascript:void(0);" style=" color: black !important">{{ $item->item_title }}</a></h6>

                                        </div>
                                        <div class="col text-end">
                                            @if(Auth::check() && Auth::user()->user_type == 0)
                                            <div class="price-box">
                                                <span style="font-size: 12px;color: #f195ab;"
                                                    class="price-regular"><strong>&pound; {{ number_format((float)$item->total_trade, 2, '.', '') }}</strong></span>
                                            </div>
                                            @else
                                            <div class="price-box">
                                                <span style="font-size: 12px;color: #f195ab;"
                                                    class="price-regular"><strong>&pound; {{ number_format((float)$item->total_retail, 2, '.', '') }}</strong></span>
                                            </div>
                                            @endif
                                        </div>
                                        <!-- <p>{{ $item->item_description }}</p> -->
                                    </div>
                            </div>
                            @empty
                            <div style="text-align: left;">No items found</div>
                            @endforelse
                            <!-- product item end -->                            
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- featured product area end -->

        <!-- testimonial area start -->
        <section class="testimonial-area section-padding bg-img1" style="color: black;background-image: url({{ asset('assets/img/testimonial/testimonials-bg.jpg')}})">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title" style="color: black !important;">testimonials</h2>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="testimonial-thumb-wrapper">
                            <div class="testimonial-thumb-carousel">
                                <!-- <div class="testimonial-thumb">
                                    <img src="{{ asset('assets/img/testimonial/testimonial-1.png') }}" alt="testimonial-thumb">
                                </div>
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('assets/img/testimonial/testimonial-2.png') }}" alt="testimonial-thumb">
                                </div>
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('assets/img/testimonial/testimonial-3.png') }}" alt="testimonial-thumb">
                                </div> -->
                            </div>
                        </div>
                        <div class="testimonial-content-wrapper">
                            <div class="testimonial-content-carousel slick-row-10">
                                <div class="testimonial-content">
                                    <p style="color: #f195ab;"><strong> I absolutely love shopping at Lebar. Their jewellery is of the highest quality, and I always find pieces that fit my budget perfectly. The exceptional customer service makes every visit a joy, and I highly recommend them for anyone seeking beautiful jewellery.</strong></p>
                                    <div class="ratings">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                    <h5 class="testimonial-author" style="color: #f195ab;">Dudu Edreyi</h5>
                                </div>
                                <div class="testimonial-content">
                                    <p style="color: #f195ab;"><strong> Shopping at Lebar Jewellery is like going on a treasure hunt in a candy store! Every visit is an adventure, and I always leave with a smile on my face.</strong></p>
                                    <div class="ratings">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                    <h5 class="testimonial-author" style="color: #f195ab;">Jess Lewis</h5>
                                </div>
                                <div class="testimonial-content">
                                    <p style="color: #f195ab;"><strong> I had the pleasure of commissioning a bespoke piece of jewellery from Lebar, and the experience was nothing short of magical. They took my vision and truned it into a wearable work of art. If you're looking for a one-of-a-kinf design, Emilia is the Person to make your dreams come true!</strong></p>
                                    <div class="ratings">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                    <h5 class="testimonial-author" style="color: #f195ab;">Emma Hartley</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- group product start -->
        <!-- <section class="group-product-area section-padding">
            
        </section> -->
        <!-- group product end -->

        <!-- latest blog area start -->
        <!-- latest blog area end -->


    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->
<div class="modal" id="quick_view_item_details">

</div>

@endsection

@push('script')
<script type="text/javascript">
// banner hight
$(document).ready(function() {  
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 50);
    // console.log(banerHeight);

    $(".quick_view_details").click(function(event) {
       
        $("#quick_view_item_details").empty();
      
        var id = $(this).attr('data-id');
        $.ajax({
            url: 'item/item-details' + '/' + id,
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

    $(document).on("click", ".add-to-cart", function(e) {
        e.preventDefault();
        var itemId = $(this).attr('item-id');
        var itemSize = $('#item-size').val();
        var itemQty = $('#item-qty').val();
        $.ajax({
            url: 'item/add-to-cart',
            data:{'item_id' : itemId, 'item_size' : itemSize, 'item_qty' : itemQty,'_token':"{{csrf_token()}}"},
            dataType: 'json',
            type: 'POST',
            success: function(data) {
                location.reload(true); // show bootstrap modal
            },
            error: function(result) {
                $("#quick_view_item_details").html("Sorry Cannot Load Data");
            }
          
        });
    });

    $('#quick_view_item_details').on('shown.bs.modal', function () {
        $('.product-large-slider').not('.slick-initialized').slick({
            fade: true,
            arrows: false,
            speed: 1000,
            asNavFor: '.pro-nav'
        });

        $('.pro-nav').not('.slick-initialized').slick({
        slidesToShow: 4,
        asNavFor: '.product-large-slider',
        centerMode: true,
        speed: 1000,
        centerPadding: 0,
        focusOnSelect: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="lnr lnr-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="lnr lnr-chevron-right"></i></button>',
        responsive: [{
            breakpoint: 576,
            settings: {
                slidesToShow: 3,
            }
        }]
    });
        $('.img-zoom').zoom();
    });
});

$(window).resize(function(){
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight - 50);
    // console.log(banerHeight);

});
</script>

@endpush