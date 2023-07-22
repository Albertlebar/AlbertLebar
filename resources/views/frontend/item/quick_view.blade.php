<div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <!-- product details inner end -->
            <div class="product-details-inner">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="product-large-slider">
                            @foreach($item->itemImage as $images)
                            @if($images->is_main_image == 1)
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset('assets/images/items/').'/'.$images->images}}".jpg" alt="product-details" />
                            </div>
                            @else
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset('assets/images/items/').'/'.$images->images}}".jpg" alt="product-details" />
                            </div>
                            @endif
                            @endforeach
                        </div>
                        <div class="pro-nav slick-row-10 slick-arrow-style">
                            @foreach($item->itemImage as $images)
                            @if($images->is_main_image == 1)
                            <div class="pro-nav-thumb">
                                <img src="{{asset('assets/images/items/').'/'.$images->images}}" alt="product-details" />
                            </div>
                            @else
                            <div class="pro-nav-thumb">
                                <img src="{{asset('assets/images/items/').'/'.$images->images}}" alt="product-details" />
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="product-details-des">
                           
                            <h3 class="product-name">{{ $item->item_title }}</h3>
                            <p class="pro-desc">{{ $item->item_description }}</p>
                            <div class="price-box">
                                <span class="price-regular">&pound; {{ $item->total_retail }}</span>
                            </div>
                            <div class="quantity-cart-box d-flex align-items-center">
                                <h6 class="option-title">Size:</h6>
                                <div class="size">
                                    {!! Form::select('item_size', config('params.item_size') ?? [],  $item->item_size ?? 'H', ['class' => 'form-control','data-control'=>"select2", 'id'=>'item-size']) !!}
                                </div>
                            </div>
                            <div class="quantity-cart-box d-flex align-items-center">
                                <h6 class="option-title">qty:</h6>
                                <div class="quantity">
                                    <div class="pro-qty"><input type="text" id="item-qty" value="1"></div>
                                </div>
                            </div>
                            <div class="action_link">
                                <a class="btn btn-cart add-to-cart" item-id="{{ $item->id }}" href="#"><strong>Add to cart</strong></a>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div> <!-- product details inner end -->
        </div>
    </div>
</div>
