@extends('frontend.layouts.master') @section('video')
@include('frontend.layouts.video_container') @endsection  @section('title',
'Item') @section('content') <!-- page main wrapper start --> <div
class="shop-main-wrapper section-padding pb-0 pt-0"> <div
class="container-fluid">


        <div class="row">


            <!-- shop main wrapper start -->
            <div class="col order-1 order-lg-2">
                <div class="shop-product-wrapper">
                    <!-- shop product top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row shop-top-bar-menu">


                            <div class="col-sm-12 col-lg-12 mb-6 d-flex justify-content-center text-center">
                                <div class="row d-flex align-items-center dd-full-menu">
                                    <div class="col-auto">
                                        <div class="main-menu">
                                            <ul>
                                                <li class="active"><a class="p-0" href="index.html">Metal Type <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <div class="sidebar-single p-3 m-0">
                                                            <div class="sidebar-body">
                                                                <ul class="checkbox-container categories-list">
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck2">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck2">9K (3)</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck3">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck3">18K (4)</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck4">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck4">Platinum (15)</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="main-menu">
                                            <ul>
                                                <li class="active"><a class="p-0" href="index.html">Metal Type <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <div class="sidebar-single p-3 m-0">
                                                            <div class="sidebar-body">
                                                                <ul class="checkbox-container categories-list">
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck2">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck2">9K (3)</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck3">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck3">18K (4)</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck4">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck4">Platinum (15)</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="main-menu">
                                            <ul>
                                                <li class="active"><a class="p-0" href="index.html">Metal Type <i
                                                            class="fa fa-angle-down"></i></a>
                                                    <ul class="dropdown">
                                                        <div class="sidebar-single p-3 m-0">
                                                            <div class="sidebar-body">
                                                                <ul class="checkbox-container categories-list">
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck2">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck2">9K (3)</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck3">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck3">18K (4)</label>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                        <div class="custom-control custom-checkbox">
                                                                            <input type="checkbox"
                                                                                class="custom-control-input"
                                                                                id="customCheck4">
                                                                            <label class="custom-control-label"
                                                                                for="customCheck4">Platinum (15)</label>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="short-by">



                                <div class="top-bar-right d-flex">

                                    <div class="product-short">
                                        <p class="mb-0">Sort By : </p>
                                        <select class="nice-select" name="sortby">
                                            <option value="trending">Relevance</option>
                                            <option value="sales">Name (A - Z)</option>
                                            <option value="sales">Name (Z - A)</option>
                                            <option value="rating">Price (Low &gt; High)</option>
                                            <option value="date">Rating (Lowest)</option>
                                            <option value="price-asc">Model (A - Z)</option>
                                            <option value="price-asc">Model (Z - A)</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shop product top wrap start -->

                    <!-- product item list wrapper start -->
                    <div class="shop-product-wrap greed-view row mbn-30">
                        <!-- product single item start -->
                        @forelse($items as $item)
                        <div class="col-md-4 col-sm-6 p-0 border border-white">
                            <div class="product-item">
                                <div
                                    class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
                                    <figure class="product-thumb mb-0">
                                        <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details"
                                            href="javascript:void(0);">
                                            @foreach($item->itemImage as $images)
                                            @if($images->is_main_image == 1)
                                            <img class="pri-img"
                                                src="{{asset('assets/images/items/').'/'.$images->images}}"
                                                alt="product">
                                            @else
                                            <img class="sec-img"
                                                src="{{asset('assets/images/items/').'/'.$images->images}}"
                                                alt="product">
                                            @endif
                                            @endforeach
                                        </a>
                                        <div class="button-group">
                                            <a style="color: #f195ab;" href="javascript:void(0);"
                                                data-bs-toggle="tooltip" data-bs-placement="left"><i
                                                    class="pe-7s-like"></i></a>
                                            <!-- <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details" id="quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a> -->
                                        </div>
                                        <!-- <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div> -->
                                    </figure>
                                    <figure class="product-thumb mb-0">
                                        <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details"
                                            href="javascript:void(0);">
                                            @foreach($item->itemImage as $images)
                                            @if($images->is_main_image == 1)
                                            <img class="pri-img"
                                                src="{{asset('assets/images/items/').'/'.$images->images}}"
                                                alt="product">
                                            @else
                                            <img class="sec-img"
                                                src="{{asset('assets/images/items/').'/'.$images->images}}"
                                                alt="product">
                                            @endif
                                            @endforeach
                                        </a>
                                        <div class="button-group">
                                            <a style="color: #f195ab;" href="javascript:void(0);"
                                                data-bs-toggle="tooltip" data-bs-placement="left"><i
                                                    class="pe-7s-like"></i></a>
                                            <!-- <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details" id="quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a> -->
                                        </div>
                                        <!-- <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div> -->
                                    </figure>
                                </div>
                                <div class="product-content-list py-2 px-3">

                                    <div class="row">
                                        <!-- <div class="col">
                                                Metal Type : <strong> {{ config('params.metal_type')[$item->metal_type] }} </strong>
                                            </div>
                                            <div class="col text-end">
                                                Metal color: <strong> {{ config('params.metal_colour')[$item->metal_colour] }}</strong>
                                            </div> -->
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <h6 style="font-size: 12px;" class="product-name p-0"><a
                                                    href="javascript:void(0);">{{ $item->item_title }}</a></h6>

                                        </div>
                                        <div class="col text-end">
                                            <div class="price-box">
                                                <span style="font-size: 12px;color: #f195ab;"
                                                    class="price-regular">&pound; {{ number_format((float)$item->total_retail, 2, '.', '') }}</span>
                                            </div>
                                        </div>
                                        <!-- <p>{{ $item->item_description }}</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div style="text-align: left;">No items found</div>
                        @endforelse
                        <!-- product list item end -->

                        <!-- product single item start -->
                    </div>
                    <!-- product item list wrapper end -->

                    <!-- start pagination area -->
                    <div class="paginatoin-area text-center mt-0 mb-0">
                            <!-- {{$items->links('vendor.pagination.default')}} -->
                        {{ $items->appends(request()->input())->links('vendor.pagination.default') }}
                    </div>
                    <!-- end pagination area -->
                </div>
            </div>
            <!-- shop main wrapper end -->
        </div>
    </div>
</div>

<div class="modal" id="quick_view_item_details">

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

    $(document).on("click", ".add-to-cart", function(e) {
        e.preventDefault();
        var itemId = $(this).attr('item-id');
        var itemSize = $('#item-size').val();
        var itemQty = $('#item-qty').val();
        $.ajax({
            url: 'add-to-cart',
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

    // console.log(banerHeight);

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

var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight + 5);

$(window).resize(function(){
    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight + 5);
    // console.log(banerHeight);

});




</script>

@endpush
