<div class="modal fade" id="show" tabindex="-1" role="dialog"
     aria-labelledby="quickview" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <h1></h1>
                <div class="quickview_body">
                    <div class="container">
                        <h2 class="product-name"></h2>

                        <div class="row">
                            <div class="col-12 col-lg-5">

                                <div class="quickview_pro_img">
                                    <img id="first_img"> </img>
                                    <!-- Product Badge -->
                                    <div class="product_badge">
                                        <span class="badge-new">New</span>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 col-lg-7">
                                <div class="quickview_pro_des">
                                    <h4 class="title" id="title"><b id="ti"/></h4>
                                    <div class="top_seller_product_rating mb-15">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>

                                    {{--                                                                <h5 class="price">{{config('settings.currency_symbol')}}<b  id="pr2"/><span><b id="pr"/></span></h5>--}}
                                    @if ($product->sale_price != 0)
                                        <div class="price-wrap h5">
                                                                        <span
                                                                            class="product-price" style="color: red" > {{ config('settings.currency_symbol') }} <b  id="pr2"/> </span>
                                            <del
                                                class="price-old"> {{ config('settings.currency_symbol')}} <b id="pr"/> </del>
                                        </div>
                                    @else
                                        <div class="price-wrap h5">
                                                                        <span
                                                                            class="product-price"> {{ config('settings.currency_symbol') }} <b id="pr"/> </span>
                                        </div>
                                    @endif
                                    <p><b id="by"/></p>
                                    <a href="">View
                                        Full Product Details</a>
                                </div>
                                <!-- Add to Cart Form -->
                                <form action="" class="cart" method="" role="form"
                                      id="addToCart">

                                    {{--                                                                <div class="quantity">--}}
                                    {{--                                                                    <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">--}}
                                    {{--                                                                </div>--}}
                                    <a href=""
                                       type="" value="5" class="cart-submit">Product
                                        Details</a>
                                    <h2 class="data-title"></h2>
                                {{--                                                                <button type="submit" name="addtocart" id="addToCart" value="5" class="cart-submit">Add to cart</button>--}}
                                <!-- Wishlist -->
                                    <div class="modal_pro_wishlist">
                                        <a href="wishlist.html"><i
                                                class="icofont-heart"></i></a>
                                    </div>
                                    <!-- Compare -->
                                    <div class="modal_pro_compare">
                                        <a href="compare.html"><i
                                                class="icofont-exchange"></i></a>
                                    </div>
                                </form>
                                <!-- Share -->
                                <div class="share_wf mt-30">
                                    <p>Share with friends</p>
                                    <div class="_icon">
                                        <a href="#"><i class="fa fa-facebook"
                                                       aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-twitter"
                                                       aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-pinterest"
                                                       aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"
                                                       aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-instagram"
                                                       aria-hidden="true"></i></a>
                                        <a href="#"><i class="fa fa-envelope-o"
                                                       aria-hidden="true"></i></a>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
