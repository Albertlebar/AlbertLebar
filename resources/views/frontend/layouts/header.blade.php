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
                                    <?php
                                        $categorys = \App\Models\Category::all();
                                        $count = 1;
                                    ?>
                                    <ul>
                                        @forelse($categorys as $category)
                                    <!-- {{ URL :: to('/item/'.strtolower($category->title)) }} -->
                                        <li><a href="javascript:void(0)">{{ strtoupper($category->title) }} <i class="fa fa-angle-down"></i></a>
                                            <ul class="dropdown">
                                                @foreach($category->subCategory as $subCat)
                                                <li><a href="{{ URL :: to('/item/'.strtolower($category->title).'?sub_cate_id='.$subCat->id) }}">{{ $subCat->title }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @empty
                                        @endforelse
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
                            <a href="{{ URL :: to('/') }}">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="Albert" style="max-width: 75%;">
                            </a>
                        </div>
                    </div>
                    <!-- end logo area -->

                    <!-- mini cart area start -->
                    <div class="col-lg-5">
                        <div class="header-right d-flex align-items-center justify-content-lg-end">
                            <div class="header-search-container" id="searchParent" style="margin-right: 10px;display: contents; ">
                                <button class="search-trigger" style="margin-top: 3px; " id="search"><i
                                        class="pe-7s-search"></i></button>
                                <div id="inputParent">
                                    <input type="text" placeholder="Search entire store" autocoplete="off"       id="input-bar">
                                </div>
                                <!-- <form class="header-search-box d-lg-none d-xl-block">
                                    <input type="text" placeholder="Search entire store" class="header-search-field">
                                    <button class="header-search-btn"><i class="pe-7s-search"></i></button>
                                </form> -->
                               <!--  <div class="header-search-container" id="searchParent">
                                    <i id="search" class="pe-7s-search"></i>
                                    <div id="inputParent">
                                        <input type="text" placeholder="Pesquise" autocoplete="off"       id="input-bar">
                                    </div>
                                </div> -->
                            </div>
                            <div class="header-configure-area">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        @guest
                                        <a href="{{ route('login') }}">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        @else
                                        <a href="#">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                                <!-- <li><a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                                </li> -->
                                            <li><a href="{{ URL::to('/my-account') }}">My Account</a></li>
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
                                            
                                        </ul>
                                        @endguest
                                    </li>
                                    @if(Auth::check())
                                    <li>
                                        <a href="{{ URL::to('item/favorite') }}">
                                            <i class="pe-7s-like"></i>
                                            <div class="notification">{{ count($fav) }}</div>
                                        </a>
                                    </li>
                                    @endif
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
                            <a href="{{ URL :: to('/') }}">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="Albert" style="max-width: 75%;">
                            </a>
                        </div>
                        <div class="mobile-menu-toggler">

                        
                        <div class="header-configure-area pr-0">
                                <ul class="nav justify-content-end">
                                    <li class="user-hover">
                                        @guest
                                        <a href="{{ route('login') }}">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        @else
                                        <a href="#">
                                            <i class="pe-7s-user"></i>
                                        </a>
                                        <ul class="dropdown-list">
                                                <!-- <li><a class="dropdown-item" href="{{ route('login') }}">Login</a>
                                                </li> -->
                                            <li><a href="{{ URL::to('/my-account') }}">My Account</a></li>
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
                                            
                                        </ul>
                                        @endguest
                                    </li>
                                    @if(Auth::check())
                                    <li>
                                        <a href="{{ URL::to('item/favorite') }}">
                                            <i class="pe-7s-like"></i>
                                            <div class="notification">{{ count($fav) }}</div>
                                        </a>
                                    </li>
                                    @endif
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
                        <input type="text" id="search_data" placeholder="Search Here...">
                        <button class="search-btn"><i class="pe-7s-search"></i></button>
                    </form>
                </div>
                <!-- search box end -->

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            @forelse($categorys as $category)
                            <li><a href="{{ URL :: to('/item/'.strtolower($category->title)) }}">{{ strtoupper($category->title) }}</a></li>
                            @empty
                            @endforelse
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