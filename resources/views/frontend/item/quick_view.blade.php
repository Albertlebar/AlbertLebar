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
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset('assets/img/product/product-details-img1.jpg') }}".jpg" alt="product-details" />
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset('assets/img/product/product-details-img2.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset('assets/img/product/product-details-img3.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset('assets/img/product/product-details-img4.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-large-img img-zoom">
                                <img  src="{{asset('assets/img/product/product-details-img5.jpg') }}" alt="product-details" />
                            </div>
                        </div>
                        <div class="pro-nav slick-row-10 slick-arrow-style">
                            <div class="pro-nav-thumb">
                                <img src="{{asset('assets/img/product/product-details-img1.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{asset('assets/img/product/product-details-img2.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{asset('assets/img/product/product-details-img3.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{asset('assets/img/product/product-details-img4.jpg') }}" alt="product-details" />
                            </div>
                            <div class="pro-nav-thumb">
                                <img src="{{asset('assets/img/product/product-details-img5.jpg') }}" alt="product-details" />
                            </div>
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
                                <h6 class="option-title">qty:</h6>
                                <div class="quantity">
                                    <div class="pro-qty"><input type="text" value="1"></div>
                                </div>
                                
                            </div>
                            <div class="action_link">
                                    <a class="btn btn-cart2" href="#">Add to cart</a>
                                </div>
                           
                        </div>
                    </div>
                </div>
            </div> <!-- product details inner end -->
        </div>
    </div>
</div>
