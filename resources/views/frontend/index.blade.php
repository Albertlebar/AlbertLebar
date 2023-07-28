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
            <div class="container text-center">
                <div class="d-flex mtn-30" style="justify-content: space-around;">
                    <div class="">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-plane"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Free Shipping</h6>
                                <p>Free shipping all order</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-help2"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Support 24/7</h6>
                                <p>Support 24 hours a day</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-back"></i>
                            </div>
                            <div class="policy-content">
                                <h6>Money Return</h6>
                                <p>30 days for free return</p>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="policy-item">
                            <div class="policy-icon">
                                <i class="pe-7s-credit"></i>
                            </div>
                            <div class="policy-content">
                                <h6>100% Payment Secure</h6>
                                <p>We ensure secure payment</p>
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
                                    @if(!empty($item->photo_1))
                                        <img class="sec-img" src="{{ asset($item->photo_1) }}" alt="product">
                                    @endif
                                    @if(!empty($item->photo_2))
                                        <img class="sec-img" src="{{ asset($item->photo_2) }}" alt="product">
                                    @endif
                                    @if(!empty($item->photo_3))
                                        <img class="sec-img" src="{{ asset($item->photo_3) }}" alt="product">
                                    @endif
                                    </a>
                                    <div class="button-group">
                                        <a href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                    </div>
                                </figure>
                                <div class="row">
                                        <div class="col">
                                            <h6 style="font-size: 12px;" class="product-name p-0"><a
                                                    href="javascript:void(0);" style=" color: black !important">{{ $item->item_title }}</a></h6>

                                        </div>
                                        <div class="col text-end">
                                            <div class="price-box">
                                                <span style="font-size: 12px;color: #f195ab;"
                                                    class="price-regular"><strong>&pound; {{ number_format((float)$item->total_retail, 2, '.', '') }}</strong></span>
                                            </div>
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
        <section class="testimonial-area section-padding bg-img1" style="color: black;background-image: url({{ asset('assets/img/testimonial/testimonials-bg.jpeg')}})">
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
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('assets/img/testimonial/testimonial-1.png') }}" alt="testimonial-thumb">
                                </div>
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('assets/img/testimonial/testimonial-2.png') }}" alt="testimonial-thumb">
                                </div>
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('assets/img/testimonial/testimonial-3.png') }}" alt="testimonial-thumb">
                                </div>
                                <div class="testimonial-thumb">
                                    <img src="{{ asset('assets/img/testimonial/testimonial-2.png') }}" alt="testimonial-thumb">
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-content-wrapper">
                            <div class="testimonial-content-carousel">
                                <div class="testimonial-content">
                                    <p><strong> Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</strong></p>
                                    <div class="ratings" style="color: black;">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                    <h5 class="testimonial-author">lindsy niloms</h5>
                                </div>
                                <div class="testimonial-content">
                                    <p><strong> Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</strong></p>
                                    <div class="ratings"  style="color: black;">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                    <h5 class="testimonial-author">Daisy Millan</h5>
                                </div>
                                <div class="testimonial-content">
                                    <p><strong> Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</strong></p>
                                    <div class="ratings"  style="color: black;">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                    <h5 class="testimonial-author">Anamika lusy</h5>
                                </div>
                                <div class="testimonial-content">
                                    <p><strong> Vivamus a lobortis ipsum, vel condimentum magna. Etiam id turpis tortor. Nunc scelerisque, nisi a blandit varius, nunc purus venenatis ligula, sed venenatis orci augue nec sapien. Cum sociis natoque</strong></p>
                                    <div class="ratings"  style="color: black;">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                    </div>
                                    <h5 class="testimonial-author">Maria Mora</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial area end -->

        <!-- group product start -->
        <section class="group-product-area section-padding">
            
        </section>
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
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
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
    $('.shop-main-wrapper').css('marginTop', banerHeight - 60);
    // console.log(banerHeight);

});
</script>

@endpush