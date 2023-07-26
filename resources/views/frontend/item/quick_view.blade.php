<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body" style="">
            <!-- product details inner end -->
            <div class="product-details-inner">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product-large-slider">
                            @if(!empty($item->photo_0))
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset($item->photo_0)}}" alt="product-details" />
                            </div>
                            @endif
                            @if(!empty($item->photo_1))
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset($item->photo_1)}}" alt="product-details" />
                            </div>
                            @endif
                            @if(!empty($item->photo_2))
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset($item->photo_2)}}" alt="product-details" />
                            </div>
                            @endif
                            @if(!empty($item->photo_3))
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset($item->photo_3)}}" alt="product-details" />
                            </div>
                            @endif
                        </div>
                        <div class="pro-nav slick-row-10 slick-arrow-style">
                            @if(!empty($item->photo_1))
                            <div class="pro-nav-thumb">
                                <img src="{{ asset($item->photo_1) }}" alt="product-details" />
                            </div>
                            @endif
                            @if(!empty($item->photo_2))
                            <div class="pro-nav-thumb">
                                <img src="{{ asset($item->photo_2) }}" alt="product-details" />
                            </div>
                            @endif
                            @if(!empty($item->photo_3))
                            <div class="pro-nav-thumb">
                                <img src="{{ asset($item->photo_3) }}" alt="product-details" />
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-details-des">
                           
                            <h3 class="product-name">{{ $item->item_title }}</h3>
                            <p class="pro-desc">{{ $item->item_description }}</p>
                            <div class="price-box">
                                <span class="price-regular"  style="color: black;">&pound; {{ number_format((float)$item->total_retail, 2, '.', '') }}</span>
                            </div>
                            <div class="quantity-cart-box d-flex align-items-center">
                                <h6 class="option-title">Size:</h6>
                                <div class="size">
                                    {!! Form::select('item_size', $itemSize ?? [],  '', ['class' => 'form-control dropdown-select','data-control'=>"select2", 'id'=>'item-size']) !!}
                                </div>
                            </div>
                            <div class="quantity-cart-box d-flex align-items-center">
                                <h6 class="option-title">qty:</h6>
                                <div class="quantity">
                                    <div class="pro-qty"><input type="text" id="item-qty" value="1"></div>
                                </div>
                                <div style="width: 50px;">
                                    <a style="color: #f195ab;" href="javascript:void(0);"
                                                data-bs-toggle="tooltip" data-bs-placement="left"><i
                                                    class="pe-7s-like"></i></a>
                                </div>
                            </div>
                            <div class="action_link">
                                <a style="background: #f195ab !important; color: black !important;" class="btn btn-cart add-to-cart" item-id="{{ $item->id }}" href="#"><strong>Add to cart</strong></a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div> <!-- product details inner end -->
        </div>
    </div>
</div>
