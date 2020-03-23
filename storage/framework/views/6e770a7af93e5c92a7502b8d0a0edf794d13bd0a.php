<?php $__env->startSection('title', 'Shopping Cart'); ?>

<?php $__env->startSection('content'); ?>


    <section class="">
        <div>&nbsp;</div>
        <div class="container clearfix">
            <h2 class="title-page">Cart</h2>
        </div>
        <div>&nbsp;</div>
    </section>

    <section class="section-content bg padding-y border-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <?php if(Session::has('message')): ?>
                        <p class="alert alert-success"><?php echo e(Session::get('message')); ?></p>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <main class="col-sm-9">
                    <?php if(\Cart::isEmpty()): ?>
                        <p class="alert alert-warning">Your shopping cart is empty.</p>


                    <?php endif; ?>
                </main>

            </div>

            <div class="cart_area section_padding_100_70 clearfix">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-12">
                            <div class="cart-table">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-30">
                                        <thead>
                                        <tr>

                                            <th scope="col">Image</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Unit Price</th>
                                            <th scope="col">Quantity</th>

                                            <th scope="col"><i class="icofont-ui-delete"></i></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        <?php $__currentLoopData = \Cart::getContent(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                        <tr>

                                            <td>
                                                <?php if($item->image): ?>
                                                <img src="<?php echo e(asset('storage/'.$product->images->first()->full)); ?>" alt="Product">
                                                <?php endif; ?>
                                            </td>

                                            <td>
                                                <a href="#"><?php echo e(Str::words($item->name,20)); ?></a>
                                                <?php $__currentLoopData = $item->attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key  => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <dl class="dlist-inline small">

                                                        <dd><?php echo e(ucwords($value)); ?></dd>
                                                    </dl>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </td>


                                            <td><?php echo e(config('settings.currency_symbol'). $item->price); ?></td>
                                            <td>
                                                <div class="quantity">
                                                    <?php echo e($item->quantity); ?>


                                                </div>
                                            </td>

                                            <th scope="row">
                                                <a href="<?php echo e(route('checkout.cart.remove', $item->id)); ?>"></a><i class="icofont-close"></i>
                                            </th>
                                        </tr>



                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-6">
                            <div class="cart-apply-coupon mb-30">
                                <h6>Have a Coupon?</h6>
                                <p>Enter your coupon code here &amp; get awesome discounts!</p>
                                <!-- Form -->
                                <div class="coupon-form">
                                    <form action="#">
                                        <input type="text" class="form-control" placeholder="Enter Your Coupon Code">
                                        <button type="submit" class="btn btn-primary">Apply Coupon</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-5">
                            <div class="cart-total-area mb-30">
                                <h5 class="mb-3">Cart Totals</h5>
                                <div class="table-responsive">
                                    <table class="table mb-3">
                                        <tbody>

                                        <tr>
                                            <td>Shipping</td>
                                            <td><?php echo e(config('settings.currency_symbol')); ?>0.00</td>
                                        </tr>
                                        <tr>
                                            <td>VAT (10%)</td>
                                            <td>$5.60</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td><strong><?php echo e(config('settings.currency_symbol')); ?><?php echo e(\Cart::getSubTotal()); ?> </strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-primary d-block">Proceed To Checkout</a>
                                <div class="clear">  &nbsp; </div>
                                <a href="<?php echo e(route('checkout.cart.clear')); ?>" class="btn btn-danger d-block">Clear Cart</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('site3.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/albert/minishop/resources/views/site3/pages/cart.blade.php ENDPATH**/ ?>