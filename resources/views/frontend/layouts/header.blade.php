<header class="header-area header-wide">
    <!-- main header start -->
    <div class="main-header d-none d-lg-block">
        <!-- header middle area start -->
        <div class="header-main-area sticky">
            <div class="container-fluid">
                <div class="row align-items-center position-relative">
                    <!-- main menu area start -->
                    <div class="col-lg-5 position-static">
                        <div class="main-menu-area">
                            <div class="main-menu">
                                <!-- main menu navbar start -->
                                @if (Session::has('payment-success'))
                                    <div class="alert alert-success text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ Session::get('payment-success') }}</p>
                                    </div>
                                @endif
                                @if ($errors->has('global'))
                                    <div class="alert alert-danger text-center">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                        <p>{{ $errors->first('global') }}</p>
                                    </div>
                                @endif
                                <nav class="desktop-menu">
                                    <ul>
                                        <li><a href="{{ URL :: to('/item/ring') }}">RING</a></li>
                                        <li><a href="{{ URL :: to('/item/earrings') }}">EARRINGS</a></li>
                                        <li><a href="{{ URL :: to('/item/necklace') }}">NECKLACE</a></li>
                                        <li><a href="{{ URL :: to('/item/bracelet') }}">BRACELET</a></li>
                                        <li><a href="{{ URL :: to('/item/sale') }}">SALE</a></li>
                                    </ul>
                                </nav>
                                <!-- main menu navbar end -->
                            </div>
                        </div>
                    </div>
                    <!-- main menu area end -->
                    <!-- start logo area -->
                    <div class="col-lg-2 text-center">
                        <div class="logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="Albert" style="max-width: 75%;">
                            </a>
                        </div>
                    </div>
                    <!-- end logo area -->

                    <!-- mini cart area start -->
                    <div class="col-lg-5">
                        <div class="header-right d-flex align-items-center justify-content-lg-end">
                            <div class="header-search-container" style="margin-right: 10px; ">
                                <button class="search-trigger d-xl-none d-lg-block"><i
                                        class="pe-7s-search"></i></button>
                                <form class="header-search-box d-lg-none d-xl-block">
                                    <input type="text" placeholder="Search entire store" class="header-search-field">
                                    <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form>
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        <a href="#">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                            <li><a href="javascript:void(0)">My Account</a></li>
                                            @guest
                                                <li><a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                                </li>
                                            @else
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            @endguest
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="pe-7s-like"></i>
                                            <div class="notification">0</div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="minicart-btn">
                                            <i class="pe-7s-shopbag"></i>
                                            @if(isset($cartItem))

                                            <div class="notification">{{ count($cartItem)}}</div>
                                            @endif
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- mini cart area end -->

                </div>
            </div>
        </div>
        <!-- header middle area end -->
    </div>
    <!-- main header start -->
    @yield('video')
    <!-- mobile header start -->
    <!-- mobile header start -->
    <div class="mobile-header d-lg-none d-md-block sticky">
        <!--mobile header top start -->
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="mobile-main-header">
                        <div class="mobile-logo">
                            <a href="index.html">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="Albert" style="max-width: 75%;">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">
                            <div class="mini-cart-wrap">
                                <a href="javascript:void(0)">
                                    <i class="pe-7s-shopbag"></i>
                                    <div class="notification">0</div>
                                </a>
                            </div>
                            <button class="mobile-menu-btn">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile header top start -->
    </div>
    <!-- mobile header end -->
    <!-- mobile header end -->

    <!-- offcanvas mobile menu start -->
    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="pe-7s-close"></i>
            </div>

            <div class="off-canvas-inner">
                <!-- search box start -->
                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" placeholder="Search Here...">
                        <button class="search-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="{{ URL :: to('/item/ring') }}">RING</a></li>
                            <li><a href="{{ URL :: to('/item/earrings') }}">EARRINGS</a></li>
                            <li><a href="{{ URL :: to('/item/necklace') }}">NECKLACE</a></li>
                            <li><a href="{{ URL :: to('/item/bracelet') }}">BRACELET</a></li>
                            <li><a href="{{ URL :: to('/item/sale') }}">SALE</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

            
            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->
    <!-- offcanvas mobile menu end -->
</header>