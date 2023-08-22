<!-- footer area start -->
    <footer class="footer-widget-area">
        <div class="footer-top section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <div class="widget-title">
                                <div class="widget-logo">
                                    <a href="index.html">
                                       <img src="{{ asset('assets/img/logo.png') }}" alt="Albert" style="max-width: 75%;">
                                    </a>
                                </div>
                            </div>
                            <div class="widget-body">
                                <p>We are a team of designers and developers that create high quality Jewellery.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="widget-item">
                            <!-- <h6 class="widget-title">Contact Us</h6> -->
                            <div class="widget-body">
                                <div class="mega-menu">
                                    <ul class="dd-main-ul">

                                        <div class="d-flex contact-block">

                                            
                                            <li class="dd-menu-link-5">
                                                <a href="javascript:void();">
                                                    <span>Contact</span>
                                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M15.39 7.6a.54.54 0 00-.78 0L10 12.21 5.39 7.6a.54.54 0 00-.78 0 .55.55 0 000 .77L10 13.76l5.39-5.39a.55.55 0 000-.77z"
                                                            fill="currentColor">
                                                        </path>
                                                    </svg>
                                                </a>

                                                <div class="sidebar-body" id="dd-menu-3">
                                                    <ul style="width: 240px !important;" class="checkbox-container categories-list">
                                                        <li><a href="https://www.google.com/maps/search/?api=1&query=51.51896070301455,-0.10800764314808704"><i class="pe-7s-home"></i></a> <a href="https://www.google.com/maps/search/?api=1&query=51.51896070301455,-0.10800764314808704" style="text-decoration: none;"> London Diamond Bourse ,100 Hatton Garden ,EC1N 8NX, London, United Kingdom </a></li>
                                                        <li><a style="text-decoration: none;" href="mailto:demo@plazathemes.com"><i class="pe-7s-mail"></i> </a> <a href="mailto:demo@plazathemes.com" style="text-decoration: none;">sales@albertlebar.com </a></li>
                                                        <li><a href="tel:07930 906567" style="text-decoration: none;"><i class="pe-7s-call"></i> </a> <a style="text-decoration: none;" href="tel:07930 906567">07930 906567</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </div>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget-item">
                            <!-- <h6 class="widget-title">Information</h6> -->
                            <div class="widget-body">
                                <ul class="info-list" style="display: block !important;">
                                    <li><a href="{{ URL :: to('/about-us') }}">About Us</a></li>
                                    <li><a href="{{ URL :: to('/book-appointment') }}">Book Appointment</a></li>
                                    <!-- <li><a href="javascript:void(0)">Delivery Information</a></li> -->
                                    <li><a href="{{ URL :: to('/return-policy') }}">Return Policy</a></li>
                                    <li><a href="{{ URL :: to('/terms-conditions') }}">Terms & Conditions</a></li>
                                    <!-- <li><a href="javascript:void(0)">site map</a></li> -->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="widget-item">
                            <!-- <h6 class="widget-title">Follow Us</h6> -->
                            <div class="widget-body social-link">
                                <a target="_blank" href="https://www.facebook.com/lebardiamondandjewelry"><i class="fa fa-facebook" style="font-family: "></i></a>
                                <a target="_blank" href="https://www.linkedin.com/company/93232851/admin/feed/posts/"><i class="fa fa-linkedin"></i></a>
                                <a target="_blank" href="https://www.instagram.com/albertlebarjewellery/"><i class="fa fa-instagram"></i></a>
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=447930906567"><i class="fa fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="copyright-text text-center">
                            <p><a href="{{ URL :: to('/') }}">
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Albert" style="max-width: 7%;"></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

    <!-- Quick view modal start -->
    <div class="modal" id="quick_view">
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
                                   
                                    <h3 class="product-name">Ring Silver</h3>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
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
    </div>
    <!-- Quick view modal end -->

    <!-- offcanvas mini cart start -->
    <div class="offcanvas-minicart-wrapper">
        <div class="minicart-inner">
            <div class="offcanvas-overlay"></div>
            <div class="minicart-inner-content">
                <div class="minicart-close">
                    <i class="pe-7s-close"></i>
                </div>
                <div class="minicart-content-box">
                    <div class="minicart-item-wrapper">
                        <ul>
                            <?php
                            $allTotal = 0;
                            $VAT = 0;
                            ?>
                            @if(isset($cartItem))
                            @forelse($cartItem as $id=>$item)
                            <li class="minicart-item">
                                <div class="minicart-thumb">
                                    <a href="javascript:void(0);">
                                        <img src="{{ asset($item['photo_0']) }}" alt="product">
                                    </a>
                                </div>
                                <div class="minicart-content">
                                    <h3 class="product-name">
                                        <a href="javascript:void(0);">{{ $item['item_title'] }}</a>
                                    </h3>
                                    <p>
                                        <span class="cart-quantity">{{ $item['quantity'] }} <strong>&times;</strong></span>
                                        <span class="cart-price" style="color: #f195ab;">{{ number_format((float)$item['price'], 2, '.', '') }}</span>
                                    </p>
                                </div>
                                <!-- <button class="minicart-remove"><i class="pe-7s-close"></i></button> -->
                            </li>
                            <?php
                                $Total = $item['quantity'] * $item['price'];
                                $allTotal = $allTotal + $Total;
                                $VAT = $allTotal * 0.2;
                            ?>
                            @empty
                            <div style="text-align: center;">No Item added</div>
                            @endforelse
                            @endif
                        </ul>
                    </div>

                    <div class="minicart-pricing-box">
                        <ul>
                            <li class="total">
                                <span>Sub total</span>
                                <span><strong style="color: #f195ab !important;">&pound;{{ number_format((float)$allTotal, 2, '.', '') }}</strong></span>
                            </li>
                            <li class="total">
                                <span>VAT (20%)</span>
                                <span><strong style="color: #f195ab !important;">&pound;{{ number_format($VAT, 2, '.', '') }}</strong></span>
                            </li>
                            <li class="total">
                                <span>total</span>
                                <span><strong style="color: #f195ab !important;">&pound;{{ number_format((float)$allTotal + $VAT, 2, '.', '') }}</strong></span>
                            </li>
                        </ul>
                    </div>

                    <div class="minicart-button">
                        <a href="{{ URL :: to('/cart') }}"><i class="fa fa-shopping-cart"></i> View Cart</a>
                        <!-- <a href="javascript:void(0)"><i class="fa fa-share"></i> Checkout</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- offcanvas mini cart end -->

    <!-- Modernizer JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <!-- jQuery JS -->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <!-- Bootstrap JS -->
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <!-- slick Slider JS -->
    <script src="{{ asset('assets/js/plugins/slick.min.js') }}"></script>
    <!-- Countdown JS -->
    <script src="{{ asset('assets/js/plugins/countdown.min.js') }}"></script>
    <!-- Nice Select JS -->
    <script src="{{ asset('assets/js/plugins/nice-select.min.js')}}"></script>
    <!-- jquery UI JS -->
    <script src="{{ asset('assets/js/plugins/jqueryui.min.js') }}"></script>
    <!-- Image zoom JS -->
    <script src="{{ asset('assets/js/plugins/image-zoom.min.js')}}"></script>
    <!-- Images loaded JS -->
    <script src="{{ asset('assets/js/plugins/imagesloaded.pkgd.min.js')}}"></script>
    <!-- mail-chimp active js -->
    <script src="{{ asset('assets/js/plugins/ajaxchimp.js') }}"></script>
    <!-- contact form dynamic js -->
    <script src="{{ asset('assets/js/plugins/ajax-mail.js')}}"></script>
    <!-- google map api -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
    <!-- google map active js -->
    <script src="{{ asset('assets/js/plugins/google-map.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main2.js') }}"></script>
    <script type="text/javascript">
        $('.dd-menu-link-5').mouseenter(function() {
            $(this).closest('.mega-menu').addClass('menu-hover-3 menu-slide');
            $('.dd-menu-link-5 .sidebar-body').addClass('z-9');
        })
        .mouseleave(function() {
            $(this).closest('.mega-menu').removeClass('menu-hover-3 menu-slide');
            $('.dd-menu-link-5 .sidebar-body').removeClass('z-9');
        });

        $('#input-bar').keyup(function()
        {
            var keycode = (event.keyCode ? event.keyCode : event.which);
                    
            if(keycode == '13')
            {
                setTimeout(function () {
                    window.location.href = "{{URL::to('/item')}}"+'/'+'search?search_word='+$("#input-bar").val();
                }, 2000);
            }
        });
    </script>