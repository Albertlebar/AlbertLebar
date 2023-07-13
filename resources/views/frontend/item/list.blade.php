@extends('frontend.layouts.master')
@section('title', 'Item')
@section('content')
    <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0" style="margin-top: 500px;">
            <div class="container-fluid">
           

                <div class="row">
                

                <!-- shop main wrapper start -->
                    <div class="col order-1 order-lg-2">
                        <div class="shop-product-wrapper">
                            <!-- shop product top wrap start -->
                            <div class="shop-top-bar">
                                <div class="row align-items-center">

                                <div class="col">

                    <div class="row">
                        <div class="col-auto">
                            <div class="main-menu">
                                <ul>
                                    <li class="active"><a class="p-0" href="index.html">Metal Type <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown">
                                            <div class="sidebar-single p-3 m-0">
                                            <div class="sidebar-body">
                                                <ul class="checkbox-container categories-list">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                            <label class="custom-control-label" for="customCheck2">9K (3)</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                            <label class="custom-control-label" for="customCheck3">18K (4)</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                            <label class="custom-control-label" for="customCheck4">Platinum (15)</label>
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
                                    <li class="active"><a class="p-0" href="index.html">Metal Type <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown">
                                            <div class="sidebar-single p-3 m-0">
                                            <div class="sidebar-body">
                                                <ul class="checkbox-container categories-list">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                            <label class="custom-control-label" for="customCheck2">9K (3)</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                            <label class="custom-control-label" for="customCheck3">18K (4)</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                            <label class="custom-control-label" for="customCheck4">Platinum (15)</label>
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
                                    <li class="active"><a class="p-0" href="index.html">Metal Type <i class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown">
                                            <div class="sidebar-single p-3 m-0">
                                            <div class="sidebar-body">
                                                <ul class="checkbox-container categories-list">
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                            <label class="custom-control-label" for="customCheck2">9K (3)</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                            <label class="custom-control-label" for="customCheck3">18K (4)</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                            <label class="custom-control-label" for="customCheck4">Platinum (15)</label>
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

                <div class="col text-center"><div class="product-amount">
                                                <p>Showing 1–16 of 21 results</p>
                                            </div></div>
                                    
                                    <div class="col">

                                       

                                        <div class="top-bar-right d-flex">
                                        
                                            <div class="product-short">
                                                <p>Sort By : </p>
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
                                <div class="col-md-4 col-sm-6 p-1">
                                    <!-- product grid start -->
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="javascript:void(0);">
                                                <img class="pri-img" src="{{ asset('assets/img/product/product-1.jpg') }}" alt="product">
                                                <img class="sec-img" src="{{asset('assets/img/product/product-18.jpg') }}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                        </figure>
                                        <div class="product-content-list py-2 px-3">

                                        <div class="row">
                                            <div class="col">
                                                Metal Type : <strong> 9K </strong>
                                        </div>
                                            <div class="col text-end">
                                                Metal color: <strong> Yellow</strong>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                            <h5 class="product-name p-0"><a href="javascript:void(0);">xzkkvxhkgsd</a></h5>
                                            
                                        </div>
                                        <div class="col text-end">
                                            <div class="price-box mt-2">
                                                <span class="price-regular">£ 2932.5000</span>
                                            </div>
                                        </div>
                                            <p>fdlsfjldsjfsdfds</p>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                    <!-- product grid end -->

                                    <!-- product list item end -->
                                    @forelse($items as $item)
                                    <div class="col-md-4 col-sm-6  p-1">
                                    <div class="product-item">
                                        <figure class="product-thumb">
                                            <a href="javascript:void(0);">
                                                <img class="pri-img" src="{{asset('assets/img/product/product-1.jpg') }}" alt="product">
                                                <img class="sec-img" src="{{asset('assets/img/product/product-18.jpg')}}" alt="product">
                                            </a>
                                            <div class="product-badge">
                                                <div class="product-label new">
                                                    <span>new</span>
                                                </div>
                                                <div class="product-label discount">
                                                    <span>10%</span>
                                                </div>
                                            </div>
                                            <div class="button-group">
                                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                <a href="javascript:void(0);" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                            </div>
                                            <div class="cart-hover">
                                                <button class="btn btn-cart">add to cart</button>
                                            </div>
                                        </figure>
                                        <div class="product-content-list py-2 px-3">

                                        <div class="row">
                                            <div class="col">
                                                Metal Type : <strong> {{ config('params.metal_type')[$item->metal_type] }} </strong>
                                        </div>
                                            <div class="col text-end">
                                                Metal color: <strong> {{ config('params.metal_colour')[$item->metal_colour] }}</strong>
                                        </div>
                                        </div>
                                        <div class="row">
                                        <div class="col">
                                            <h5 class="product-name p-0"><a href="javascript:void(0);">{{ $item->item_title }}</a></h5>
                                            
                                        </div>
                                        <div class="col text-end">
                                            <div class="price-box mt-2">
                                                <span class="price-regular">&pound; {{ $item->total_retail }}</span>
                                            </div>
                                        </div>
                                            <p>{{ $item->item_description }}</p>
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
                            <div class="paginatoin-area text-center mt-0 mb-5">
                                <ul class="pagination-box">
                                    <li><a class="previous" href="#"><i class="pe-7s-angle-left"></i></a></li>
                                    <li class="active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a class="next" href="#"><i class="pe-7s-angle-right"></i></a></li>
                                </ul>
                            </div>
                            <!-- end pagination area -->
                        </div>
                    </div>
                    <!-- shop main wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->
@endsection