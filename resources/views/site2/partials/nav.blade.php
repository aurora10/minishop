<div class="bigshop-main-menu" id="sticker">
    <div class="container">
        <div class="classy-nav-container breakpoint-off">
            <nav class="classy-navbar" id="bigshopNav">

                <!-- Nav Brand -->
                <a href="index-2.html" class="nav-brand"><img src="img/core-img/logo.png" alt="logo"></a>

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
                    <div class="classynav ">
                        <ul class="classynav">

                            @foreach($categories as $cat)

                                @foreach($cat->items as $category)

                                    @if ($category->items->count() > 0)

                                        <li>
                                            <a class="nav-link dropdown-toggle" href="{{ route('category.show', $category->slug) }}" id="{{ $category->slug }}"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ $category->name }}</a>
                                            <div class="dropdown-menu" aria-labelledby="{{ $category->slug }}">

                                                @foreach($category->items as $item )


                                                    <a class="dropdown-item" href="{{ route('category.show', $item->slug) }}">{{ $item->name }}</a>

                                                @endforeach

                                            </div>

                                        </li>
                                    @else
                                        <li class="nav-item">
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
                        <div class="cart--btn"><i class="icofont-cart"></i> <span class="cart_quantity">2</span>
                        </div>

                        <!-- Cart Dropdown Content -->
                        <div class="cart-dropdown-content">
                            <ul class="cart-list">
                                <li>
                                    <div class="cart-item-desc">
                                        <a href="#" class="image">
                                            <img src="img/top-1.png" class="cart-thumb" alt="">
                                        </a>
                                        <div>
                                            <a href="#">Kid's Fashion</a>
                                            <p>1 x - <span class="price">$32.99</span></p>
                                        </div>
                                    </div>
                                    <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                </li>
                                <li>
                                    <div class="cart-item-desc">
                                        <a href="#" class="image">
                                            <img src="img/best-4.png" class="cart-thumb" alt="">
                                        </a>
                                        <div>
                                            <a href="#">Headphone</a>
                                            <p>2x - <span class="price">$49.99</span></p>
                                        </div>
                                    </div>
                                    <span class="dropdown-product-remove"><i class="icofont-bin"></i></span>
                                </li>
                            </ul>
                            <div class="cart-pricing my-4">
                                <ul>
                                    <li>
                                        <span>Sub Total:</span>
                                        <span>$822.96</span>
                                    </li>
                                    <li>
                                        <span>Shipping:</span>
                                        <span>$30.00</span>
                                    </li>
                                    <li>
                                        <span>Total:</span>
                                        <span>$856.63</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-box">
                                <a href="checkout-1.html" class="btn btn-primary d-block">Checkout</a>
                            </div>
                        </div>
                    </div>

                    <!-- Account -->
                    <div class="account-area">
                        <div class="user-thumbnail">
                            <img src="img/bg-img/user.jpg" alt="">
                        </div>
                        <ul class="user-meta-dropdown">
                            <li class="user-title"><span>Hello,</span> Lim Sarah</li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="order-list.html">Orders List</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="login.html"><i class="icofont-logout"></i> Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
