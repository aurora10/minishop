<div class="bigshop-main-menu" id="sticker">
    <div class="container">
        <div class="classy-nav-container breakpoint-off">
            <nav class="classy-navbar" id="bigshopNav">
                <!-- Nav Brand -->
                <a href="<?php echo e(url('/')); ?>" class="nav-brand"><img src="<?php echo e(asset('frontend/images/logo.png')); ?>" alt="logo"></a>
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
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <?php $__currentLoopData = $cat->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <?php if($category->items->count() > 0): ?>

                                        <li> <a href="<?php echo e(route('category.show', $category->slug)); ?>"  id="<?php echo e($category->slug); ?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo e($category->name); ?></a>
                                            <ul class="dropdown">
                                                <?php $__currentLoopData = $category->items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                                    <li><a  href="<?php echo e(route('category.show', $item->slug)); ?>"><?php echo e($item->name); ?></a></li>


                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </li>

                                    <?php else: ?>
                                        <li>
                                            <a class="nav-link" href="<?php echo e(route('category.show', $category->slug)); ?>"><?php echo e($category->name); ?></a>
                                        </li>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


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
                        <div class="cart--btn"><a href="<?php echo e(route('checkout.cart')); ?>"><i class="icofont-cart"></i></a> <span class="cart_quantity"><?php echo e($cartCount); ?>  items</span>
                        </div>
                        <!-- Cart Dropdown Content -->
                        <div class="cart-dropdown-content">
                            <ul class="cart-list">
                                <?php $__currentLoopData = \Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <div class="cart-item-desc">
                                        <a href="#" class="image">
                                            <img src="img/product-img/top-1.png" class="cart-thumb" alt="">
                                        </a>
                                        <div>
                                            <a href="#"><?php echo e(Str::words($item->name,20)); ?></a>
                                            <p><?php echo e($item->quantity); ?> x - <span class="price"><?php echo e(config('settings.currency_symbol'). $item->price); ?></span></p>
                                        </div>
                                    </div>
                                    <a href="<?php echo e(route('checkout.cart.remove', $item->id)); ?>"><span class="dropdown-product-remove"><i class="icofont-bin"></i></span></a>

                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="cart-pricing my-4">
                                <ul>
                                    <li>
                                        <span>Sub Total:</span>
                                        <span><?php echo e(config('settings.currency_symbol')); ?><?php echo e(\Cart::getSubTotal()); ?></span>
                                    </li>
                                    <li>
                                        <span>Shipping:</span>
                                        <span>$0.00</span>
                                    </li>
                                    <li>
                                        <span>Total:</span>
                                        <span><?php echo e(config('settings.currency_symbol')); ?><?php echo e(\Cart::getSubTotal()); ?> </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-box">
                                <a href="<?php echo e(route('checkout.cart')); ?>" class="btn btn-primary d-block">Checkout</a>
                            </div>
                        </div>
                    </div>
                    <!-- Account -->
                    <div class="account-area">

                        <?php if(auth()->guard()->guest()): ?>
                            <div class="user-thumbnail">

                                <i class="icofont-ui-user"></i>
                            </div>
                            <ul class="user-meta-dropdown">
                                <li class="user-title"><a href="<?php echo e(route('register')); ?>">Register</a></li>
                                <li class="user-title"><a href="<?php echo e(route('login')); ?>">Login</a></li>
                            </ul>




                            <?php else: ?>

                            <div class="user-thumbnail">
                                <img src="https://eu.ui-avatars.com/api/?name=<?php echo e(Auth::user()->full_name); ?>" alt="">
                            </div>


                            <ul class="user-meta-dropdown">

                            <li class="user-title"><span>Hello,</span> <?php echo e(Auth::user()->full_name); ?></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="<?php echo e(route('account.orders')); ?>">Orders List</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <?php echo e(__('Logout')); ?>             <i class="icofont-logout"></i>


                                </a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                </form>
                            </li>

                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
<?php /**PATH /Users/albert/minishop/resources/views/site3/partials/nav.blade.php ENDPATH**/ ?>