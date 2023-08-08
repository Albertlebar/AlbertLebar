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
                            <p style="margin-bottom: 0px;" class="pro-desc">{{ $item->item_description }}</p>
                            <p style="font-size: 10px;"><strong> Item Code: </strong> {{ $item->item_code }}</p>
                            <div class="price-box">
                                <span style="font-size: 13px;" class="price-regular"  style="color: black;">Measurement: {{ $item->measurement }}</span>
                            </div>
                            <div class="quantity-cart-box d-flex align-items-center">
                                <h6 class="option-title">Size</h6>
                                <div class="size">
                                    {!! Form::select('item_size', $itemSize ?? [],  '', ['class' => 'form-control dropdown-select','data-control'=>"select2", 'id'=>'item-size']) !!}
                                </div>
                            </div>
                            <div class="quantity-cart-box d-flex align-items-center">
                                <h6 class="option-title">qty</h6>
                                <i class="fa fa-minus-circle mr-3"></i>
                                <div class="quantity">
                                    <div class="pro-qty"><input type="text" id="item-qty" value="1"></div>
                                </div>
                                <i class="fa fa-plus-circle"></i>
                            </div>
                            <div class="d-flex" style="justify-content: end;">
                                @if(Auth::check() && Auth::user()->user_type == 0)
                                <div class="price-box"  style="margin-top:5px;">
                                    <span class="price-regular"  style="color: black;">&pound; {{ number_format((float)$item->total_trade, 2, '.', '') }}</span>
                                </div>
                                @else
                                <div class="price-box"  style="margin-top:5px;">
                                    <span class="price-regular"  style="color: black;">&pound; {{ number_format((float)$item->total_retail, 2, '.', '') }}</span>
                                </div>
                                @endif
                                <div class="action_link ml-3">
                                    <a style="background: #f195ab !important; color: black !important;" class="btn btn-cart add-to-cart" item-id="{{ $item->id }}" href="javascript:void(0)"><strong>Add to cart</strong></a>
                                </div>
                                <div class="ml-2" style="width: 50px;margin-top: 10px;">
                                    <a style="color: #f195ab;" href="javascript:void(0);"
                                                data-bs-toggle="tooltip" data-bs-placement="left"><i
                                                    class="pe-7s-like"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- product details inner end -->
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".fa-minus-circle").click(function(event) {
       var qty = $('#item-qty').val();
       if(qty > 1)
       {
        $('#item-qty').val(parseInt(qty) - 1);        
       }
    });

    $(".fa-plus-circle").click(function(event) {
       var qty = $('#item-qty').val();
       $('#item-qty').val(parseInt(qty) + 1);
    });
</script>
