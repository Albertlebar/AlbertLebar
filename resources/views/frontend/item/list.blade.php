@extends('frontend.layouts.master')  
@section('title',
'Item') @section('content') <!-- page main wrapper start --> 
<?php 
    $metalType = explode(',', request()->get('metal_type'));
    $metalColour = explode(',', request()->get('metal_colour'));
    $sort = explode(',', request()->get('sort'));
?>
<div
class="shop-main-wrapper section-padding pb-0 pt-0"> <div
class="container-fluid">


        <div class="row">


            <!-- shop main wrapper start -->
            <div class="col order-1 order-lg-2">
                <div class="shop-product-wrapper">
                    <!-- shop product top wrap start -->
                    <div class="shop-top-bar">
                        <div class="row shop-top-bar-menu">
                            <div class="p-0 mb-6 d-flex justify-content-center text-center">
                                <div class="mega-menu">
                                    <ul class="dd-main-ul">

                                        <div class="d-flex">

                                            <li class="dd-menu-link-1">
                                                <a href="javascript:void();">
                                                    <span>Metal Type</span>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.39 7.6a.54.54 0 00-.78 0L10 12.21 5.39 7.6a.54.54 0 00-.78 0 .55.55 0 000 .77L10 13.76l5.39-5.39a.55.55 0 000-.77z"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <div class="sidebar-body" id="dd-menu-1">
                                                    <ul class="checkbox-container categories-list">
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array("0",$metalType))
                                                                <input type="checkbox" class="custom-control-input" name="metal_type[]" 
                                                                    id="customCheck2" value="0" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input" name="metal_type[]" 
                                                                    id="customCheck2" value="0">
                                                                @endif
                                                                <label class="custom-control-label metal_type"
                                                                    for="customCheck2" data-value="0">9K
                                                                    </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array("1",$metalType))
                                                                <input type="checkbox" class="custom-control-input" name="metal_type[]"
                                                                    id="customCheck3" value="1" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input" name="metal_type[]"
                                                                    id="customCheck3" value="1">
                                                                @endif
                                                                <label class="custom-control-label metal_type"
                                                                    for="customCheck3" data-value="1">18K
                                                                    </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array("2",$metalType))
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck4" name="metal_type[]" value="2" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck4" name="metal_type[]" value="2">
                                                                @endif
                                                                <label class="custom-control-label metal_type"
                                                                    for="customCheck4" data-value="2">Platinum</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>


                                            </li>
                                            
                                            <li class="dd-menu-link-3">
                                                <a href="javascript:void();">
                                                    <span>Metal Colour</span>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.39 7.6a.54.54 0 00-.78 0L10 12.21 5.39 7.6a.54.54 0 00-.78 0 .55.55 0 000 .77L10 13.76l5.39-5.39a.55.55 0 000-.77z"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <div class="sidebar-body" id="dd-menu-3">
                                                    <ul class="checkbox-container categories-list">
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array("0",$metalColour))
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck32" name="metal_colour[]" value="0" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck32" name="metal_colour[]" value="0">
                                                                @endif
                                                                <label class="custom-control-label metal_colour"
                                                                    for="customCheck32" data-value="0">White</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array("1",$metalColour))
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck43" name="metal_colour[]" value="1" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck43" name="metal_colour[]" value="1">
                                                                @endif
                                                                <label class="custom-control-label metal_colour"
                                                                    for="customCheck43" data-value="1">Yellow
                                                                    </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array("2",$metalColour))
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck54" name="metal_colour[]" value="2" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck54" name="metal_colour[]" value="2">
                                                                @endif
                                                                <label class="custom-control-label metal_colour"
                                                                    for="customCheck54" data-value="2">Red</label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array("3",$metalColour))
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck55" name="metal_colour[]" value="3" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck55" name="metal_colour[]" value="3">
                                                                @endif
                                                                <label class="custom-control-label metal_colour"
                                                                    for="customCheck55" data-value="3">Mix</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </li>
                                            <li class="ml-3">
                                                <strong><a style="background: #f195ab; color: white" href="javascript:void(0)" class="badge set_filter">Filter</a></strong>
                                            </li>
                                        </div>
                                        <div class="d-flex">
                                            <li class="dd-menu-link-last">
                                                <a href="javascript:void();" class="pe-0">
                                                    <span>Sort by</span>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.39 7.6a.54.54 0 00-.78 0L10 12.21 5.39 7.6a.54.54 0 00-.78 0 .55.55 0 000 .77L10 13.76l5.39-5.39a.55.55 0 000-.77z"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <div class="sidebar-body" id="dd-menu-last">
                                                    <ul class="checkbox-container categories-list">
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array('low_high',$sort))
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck443" name="sort[]" value="low_high" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck443" name="sort[]" value="low_high">
                                                                @endif
                                                                <label class="custom-control-label"
                                                                    for="customCheck443">
                                                                    Price low to high
                                                                </label>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <div class="custom-control custom-checkbox">
                                                                @if(in_array("high_low",$sort))
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck554" value="high_low" name="sort[]" checked>
                                                                @else
                                                                <input type="checkbox" class="custom-control-input"
                                                                    id="customCheck554" name="sort[]" value="high_low">
                                                                @endif
                                                                <label class="custom-control-label"
                                                                    for="customCheck554">Price high to low</label>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </li>
                                        </div>


                                    </ul>



                                    <div class="megamenu-dd">
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
                                    @if(!empty($item->photo_0))
                                    <figure class="product-thumb mb-0">
                                        <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details"
                                            href="javascript:void(0);">
                                            @if(!empty($item->photo_0))
                                                <img class="pri-img"
                                                src="{{asset($item->photo_0)}}"
                                                alt="product">
                                            @endif
                                        </a>
                                        <div class="button-group">
                                            @if(Auth::check())
                                            @if(count($item->itemFavorite) > 0)
                                            <a style="color: #f195ab;" data-id="{{ $item->id }}" class="unfavorite" href="javascript:void(0);"
                                                data-bs-toggle="tooltip" data-bs-placement="left"><i class="fa fa-heart"></i>
                                            </a>
                                            @else
                                            <a style="color: #f195ab;" data-id="{{ $item->id }}" class="favorite" href="javascript:void(0);"
                                                data-bs-toggle="tooltip" data-bs-placement="left"><i class="pe-7s-like"></i>
                                            </a>
                                            @endif
                                            @endif
                                            <!-- <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details" id="quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a> -->
                                        </div>
                                        <!-- <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div> -->
                                    </figure>
                                    @endif  
                                    @if(!empty($item->photo_1))
                                    <figure class="product-thumb mb-0">
                                        <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details"
                                            href="javascript:void(0);">
                                            @if(!empty($item->photo_1))
                                                <img class=""
                                                src="{{asset($item->photo_1) }}"
                                                alt="product">
                                            @endif
                                        </a>
                                        <div class="button-group">
                                            @if(Auth::check())
                                                @if(count($item->itemFavorite) > 0)
                                                <a style="color: #f195ab;" data-id="{{ $item->id }}" class="unfavorite" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"><i class="fa fa-heart"></i>
                                                </a>
                                                @else
                                                <a style="color: #f195ab;" data-id="{{ $item->id }}" class="favorite" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"><i class="pe-7s-like"></i>
                                                </a>
                                                @endif
                                            @endif
                                            <!-- <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details" id="quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a> -->
                                        </div>
                                        <!-- <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div> -->
                                    </figure>
                                    @endif
                                    @if(!empty($item->photo_2))
                                    <figure class="product-thumb mb-0">
                                        <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details"
                                            href="javascript:void(0);">
                                            @if(!empty($item->photo_2))
                                                <img class=""
                                                src="{{asset($item->photo_2) }}"
                                                alt="product">
                                            @endif
                                        </a>
                                        <div class="button-group">
                                            @if(Auth::check())
                                                @if(count($item->itemFavorite) > 0)
                                                <a style="color: #f195ab;" data-id="{{ $item->id }}" class="unfavorite" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"><i class="fa fa-heart"></i>
                                                </a>
                                                @else
                                                <a style="color: #f195ab;" data-id="{{ $item->id }}" class="favorite" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"><i class="pe-7s-like"></i>
                                                </a>
                                                @endif
                                            @endif
                                            <!-- <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details" id="quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a> -->
                                        </div>
                                        <!-- <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div> -->
                                    </figure>
                                    @endif
                                    @if(!empty($item->photo_3))
                                    <figure class="product-thumb mb-0">
                                        <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details"
                                            href="javascript:void(0);">
                                            @if(!empty($item->photo_3))
                                                <img class=""
                                                src="{{asset($item->photo_3) }}"
                                                alt="product">
                                            @endif
                                        </a>
                                        <div class="button-group">
                                            @if(Auth::check())
                                                @if(count($item->itemFavorite) > 0)
                                                <a style="color: #f195ab;" data-id="{{ $item->id }}" class="unfavorite" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"><i class="fa fa-heart"></i>
                                                </a>
                                                @else
                                                <a style="color: #f195ab;" data-id="{{ $item->id }}" class="favorite" href="javascript:void(0);"
                                                    data-bs-toggle="tooltip" data-bs-placement="left"><i class="pe-7s-like"></i>
                                                </a>
                                                @endif
                                            @endif
                                            <!-- <a data-bs-toggle="modal" data-id="{{ $item->id }}" class="quick_view_details" id="quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a> -->
                                        </div>
                                        <!-- <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div> -->
                                    </figure>
                                    @endif
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

    var banerHeight = $('.video-container').height();
    $('.shop-main-wrapper').css('marginTop', banerHeight + 5);

    $(window).resize(function(){
        var banerHeight = $('.video-container').height();
        $('.shop-main-wrapper').css('marginTop', banerHeight + 5);
        // console.log(banerHeight);

    });
});

$(window).resize(function() {
  var width = $(window).width();
  var height = $(window).height();
})


// banner hight
$(document).ready(function() {

    // $(document).on("change", "#item_size", function(e) {
    //     e.preventDefault();
    //     var item_type = $(this).val();
    //     alert(item_type);
    // });
    // location.reload();
    $(window).resize(function() {
      var width = $(window).width();
      var height = $(window).height();
    })
    $('.dd-menu-link-1').mouseenter(function() {
            $(this).closest('.mega-menu').addClass('menu-hover-1 menu-slide');
            $('.dd-menu-link-1 .sidebar-body').addClass('z-9');
        })
        .mouseleave(function() {
            $(this).closest('.mega-menu').removeClass('menu-hover-1 menu-slide');
            $('.dd-menu-link-1 .sidebar-body').removeClass('z-9');
        }); 


    $('.dd-menu-link-2').mouseenter(function() {
            $(this).closest('.mega-menu').addClass('menu-hover-2 menu-slide');
            $('.dd-menu-link-2 .sidebar-body').addClass('z-9');
        })
        .mouseleave(function() {
            $(this).closest('.mega-menu').removeClass('menu-hover-2 menu-slide');
            $('.dd-menu-link-2 .sidebar-body').removeClass('z-9');
        });


    $('.dd-menu-link-3').mouseenter(function() {
            $(this).closest('.mega-menu').addClass('menu-hover-3 menu-slide');
            $('.dd-menu-link-3 .sidebar-body').addClass('z-9');
        })
        .mouseleave(function() {
            $(this).closest('.mega-menu').removeClass('menu-hover-3 menu-slide');
            $('.dd-menu-link-3 .sidebar-body').removeClass('z-9');
        });


    $('.dd-menu-link-last').mouseenter(function() {
            $(this).closest('.mega-menu').addClass('menu-hover-last menu-slide');
            $('.dd-menu-link-last .sidebar-body').addClass('z-9');
        })
        .mouseleave(function() {
            $(this).closest('.mega-menu').removeClass('menu-hover-last menu-slide');
            $('.dd-menu-link-last .sidebar-body').removeClass('z-9');
        });

    $('.set_filter').click(function(){
        var metalType = [];
        var metalColour = [];
        var sort = [];
        // $("#"+$(this).attr('for')).prop("checked",true);
        $("input[name='metal_type[]']:checked").each(function() {
            metalType.push($(this).attr('value'));
            // alert($(this).attr('value'));
        });

        $("input[name='metal_colour[]']:checked").each(function() {
            metalColour.push($(this).attr('value'));
            // alert($(this).attr('value'));
        });

        $("input[name='sort[]']:checked").each(function() {
            sort.push($(this).attr('value'));
            // alert($(this).attr('value'));
        });
        // console.log(allVals);
        set_query_para('metal_type',metalType);
        set_query_para('metal_colour',metalColour);
        set_query_para('sort',sort);
        location.reload();
    });

     function ltrim(str, characters)
{
    var nativeTrimLeft = String.prototype.trimLeft;
    str = makeString(str);
    if (!characters && nativeTrimLeft) return nativeTrimLeft.call(str);
    characters = defaultToWhiteSpace(characters);
    return str.replace(new RegExp('^' + characters + '+'), '');
}
function makeString(object)
{
    if (object == null) return '';
    return String(object);
}
function defaultToWhiteSpace(characters)
{
    if (characters == null){
        return '\\s';
    }
    else if (characters.source){
    return characters.source;
    }
    else{
        return '[' + escapeRegExp(characters) + ']';
    }
}
function escapeRegExp(str)
{
    return makeString(str).replace(/([.*+?^=!:${}()|[\]\/\\])/g, '\\$1');
}
    function set_query_para($key,$data)
{
    var url_string = "";
    var search = ltrim(window.location.search,"?")
    var search_join = [];
    var $target_found = false;
    var search_split = search.split("&");
    if(search!="")
    {
        $.each(search_split,function($index,$value)
        {
            var $value_split = $value.split("=");
            if($value_split.length=2)
            {
                if($value_split[0]==$key)
                {
                    $value_split[1] = $data
                    $target_found = true;
                }
            }

            var $value_join = $value_split.join("=");

            search_join.push($value_join);
      });
    }

    if(!$target_found)
    {
      search_join.push($key+"="+$data)
    }

    url_string  +=("?"+(search_join.join("&")));

    history.pushState(null,null,url_string);
}

    $('#sort-by').change(function(e) {
        var sortBy = $("#sort-by :selected").val();
        set_query_para('sort',sortBy);
        location.reload();
    });

    $('.favorite').on('click',function(){
        var itemId = $(this).attr('data-id');
        // alert(itemId);
         // $(this).find('i').removeClass('pe-7s-like');
         //        $(this).find('i').addClass('fa fa-heart');
         //        $(this).removeClass('favorite');
         //        $(this).addClass('unfavorite')
        $.ajax({
            url: 'favorite',
            data:{'item_id' : itemId,'_token':"{{csrf_token()}}"},
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

    $('.unfavorite').on('click',function(){
        var itemId = $(this).attr('data-id');
        // alert(itemId);
        // $(this).find('i').removeClass('fa fa-heart');
        // $(this).find('i').addClass('pe-7s-like');
        // $(this).addClass('favorite');
        // $(this).removeClass('unfavorite');
        $.ajax({
            url: 'unfavorite',
            data:{'item_id' : itemId,'_token':"{{csrf_token()}}"},
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

</script>

@endpush
