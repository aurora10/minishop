<div class="bigshop-main-menu" id="sticker">
    <div class="container">
        <div class="classy-nav-container breakpoint-off">
            <nav class="classy-navbar" id="bigshopNav">
                <!-- Nav Brand -->
                <a href="{{ url('/') }}" class="nav-brand"><img src="{{ asset('frontend/images/logo.png') }}" alt="logo"></a>
                <!-- Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- Close -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav -->
                    <div class="classynav">
                        <ul>
                            @foreach($categories as $cat)

                                @foreach($cat->items as $category)

                                    @if ($category->items->count() > 0)

                                        <li> <a href="{{ route('category.show', $category->slug) }}"  id="{{ $category->slug }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                            <ul class="dropdown">
                                                @foreach($category->items as $item )


                                                    <li><a  href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a></li>


                                                @endforeach
                                            </ul>
                                        </li>

                                    @else
                                        <li>
                                            <a class="nav-link" href="{{ route('category.show', $category->slug) }}">{{ $category->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach


                        </ul>


                    </div>
                </div>
                <!-- Hero Meta -->
                <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                    <!-- Search -->
                    <div class="search-area">
                        <div class="search-btn"><i class="icofont-search"></i></div>
                        <!-- Form -->
                        <div class="search-form">
                            <input type="search" class="form-control" placeholder="Search">
                            <input type="submit" class="d-none" value="Send">
                        </div>
                    </div>
                    <!-- Wishlist -->
                    <div class="wishlist-area">
                        <a href="wishlist.html" class="wishlist-btn"><i class="icofont-heart"></i></a>
                    </div>
                    <!-- Cart -->
                    <div class="cart-area">
                        <div class="cart--btn"><a href="{{route('checkout.cart')}}"><i class="icofont-cart"></i></a> <span class="cart_quantity">{{ $cartCount}}  items</span>
                        </div>
                        <!-- Cart Dropdown Content -->
                        <div class="cart-dropdown-content">
                            <ul class="cart-list">
                                @foreach(\Cart::getContent() as $item)
                                <li>
                                    <div class="cart-item-desc">
                                        <a href="#" class="image">
                                            <img src="img/product-img/top-1.png" class="cart-thumb" alt="">
                                        </a>
                                        <div>
                                            <a href="#">{{ Str::words($item->name,20) }}</a>
                                            <p>{{ $item->quantity }} x - <span class="price">{{ config('settings.currency_symbol'). $item->price }}</span></p>
                                        </div>
                                    </div>
                                    <a href="{{ route('checkout.cart.remove', $item->id) }}"><span class="dropdown-product-remove"><i class="icofont-bin"></i></span></a>

                                </li>
                                @endforeach
                            </ul>
                            <div class="cart-pricing my-4">
                                <ul>
                                    <li>
                                        <span>Sub Total:</span>
                                        <span>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal()  }}</span>
                                    </li>
                                    <li>
                                        <span>Shipping:</span>
                                        <span>$0.00</span>
                                    </li>
                                    <li>
                                        <span>Total:</span>
                                        <span>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal()  }} </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-box">
                                <a href="{{route('checkout.cart')}}" class="btn btn-primary d-block">Checkout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Account -->
                    <div class="account-area">

                        @guest
                            <div class="user-thumbnail">
{{--                                <img src="" alt="">--}}
                                <i class="icofont-ui-user"></i>
                            </div>
                            <ul class="user-meta-dropdown">
                                <li class="user-title"><a href="{{ route('register') }}">Register</a></li>
                                <li class="user-title"><a href="{{ route('login') }}">Login</a></li>
                            </ul>




                            @else

                            <div class="user-thumbnail">
                                <img src="https://eu.ui-avatars.com/api/?name={{ Auth::user()->full_name }}" alt="">
                            </div>


                            <ul class="user-meta-dropdown">

                            <li class="user-title"><span>Hello,</span> {{ Auth::user()->full_name }}</li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="{{ route('account.orders') }}">Orders List</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}             <i class="icofont-logout"></i>


                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>

                            </ul>
                        @endguest
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
