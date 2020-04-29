<!-- Header Area End -->
<!-- Welcome Slides Area -->
<?php
use App\Http\Controllers\Site\ProductController;
use Illuminate\Support\Str;
$products = ProductController::latest_products();
$random_products = ProductController::random_products();
$random_products2 = ProductController::random_products();
$random_products3 = ProductController::random_products();

//dd($products);
//?>
<section class="welcome_area">
    <div class="welcome_slides owl-carousel">
        <!-- Single Slide -->
        <div class="single_slide bg-img" style="background-image: url(frontend/images/bg-img/6.jpg)">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-7 col-md-8">
                        <div class="welcome_slide_text">
                            <p data-animation="fadeInUp" data-delay="0">Special Offer</p>
                            <h2 data-animation="fadeInUp" data-delay="200ms">40% Off Today</h2>
                            <h4 data-animation="fadeInUp" data-delay="500ms">Only $78</h4>
                            <a href="#" class="btn btn-primary" data-animation="fadeInUp" data-delay="1s">Buy
                                Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Single Slide -->
        <div class="single_slide bg-img" style="background-image: url(frontend/images/bg-img/7.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-md-8">
                        <div class="welcome_slide_text">
                            <p data-animation="fadeInUp" data-delay="0">Sustainable Clock</p>
                            <h2 data-animation="fadeInUp" data-delay="200ms">Smart Watch</h2>
                            <h4 data-animation="fadeInUp" data-delay="500ms">Only $31 <span class="regular-price">$43</span></h4>
                            <a href="#" class="btn btn-primary" data-animation="fadeInUp" data-delay="600ms">Check
                                Collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slide -->
        <div class="single_slide bg-img" style="background-image: url(frontend/images/bg-img/9.jpg);">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-12 col-md-6">
                        <div class="welcome_slide_text">
                            <p style="color: red" data-animation="fadeInUp" data-delay="0">100% Cotton</p>
                            <h2 style="color: red" data-animation="fadeInUp" data-delay="200ms">Hot Shoes</h2>
                            <h4 style="color: red" data-animation="fadeInUp" data-delay="500ms">Now $19</h4>
                            <a href="#" class="btn btn-primary" data-animation="fadeInUp" data-delay="900ms">Add to
                                cart</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Welcome Slides Area -->
<!-- Top Catagory Area -->

<!-- Top Catagory Area -->
<!-- Quick View Modal Area -->
<!-- Quick View Modal Area -->
<!-- New Arrivals Area -->
<section class="new_arrivals_area section_padding_100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section_heading new_arrivals">
                    <h5>New Arrivals</h5>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-12">

                <div class="new_arrivals_slides owl-carousel">
                    <!-- Single Product -->
                    @foreach($products as $product)
{{--                        {{dd($product)}}--}}
                    <div class="single-product-area">

                        @if($product->images)
                        <div class="product_image" >

                            <!-- Product Image -->
                            <img class="normal_img" src="{{ asset('storage/'.$product->images->first()->full) }}" alt="">
                            <img class="hover_img" src="{{ asset('storage/'.$product->images->random()->full) }}" alt="">

                            <!-- Product Badge -->
                            <div class="product_badge">
                                <span>New</span>
                            </div>

                            <!-- Wishlist -->
                            <div class="product_wishlist">
                                <a href="wishlist.html"><i class="icofont-heart"></i></a>
                            </div>
                            <!-- Compare -->
                            <div class="product_compare">
                                <a href="compare.html"><i class="icofont-exchange"></i></a>
                            </div>


                        </div>
                    @endif



                    <!-- Product Description -->
                        <div class="product_description">
                            <!-- Add to cart -->
                            <div class="product_add_to_cart">
                                <a href="{{ route('product.show', $product->slug) }}"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                            </div>
                            <!-- Quick View -->
                            <div class=" show-modal product_quick_view">
                                <a href="#" class="show-modal" data-toggle="modal"  data-name="{{$product->name}}"
                                   data-description="{{$product->description}}" data-route ="{{route('product.show', $product->slug)}}"
                                   data-price="{{$product->price}}" data-price2="{{$product->sale_price}}"
                                   data-image="{{ asset('storage/'.$product->images->first()->full) }}"><i class="icofont-eye-alt"></i> Quick View</a>
                            </div>

{{--                            <a href="#" class="show-modal btn btn-info btn-sm" data-id="{{$product->id}}"--}}
{{--                               data-name="{{$product->name}}" data-description="{{$product->description}}" data-price="{{$product->price}}"--}}

{{--                               data-image="{{ asset('storage/'.$product->images->first()->full) }}"--}}
{{--                               data-image2="{{ asset('storage/'.$product->images->random()->full) }}" >--}}
{{--                                <i class="fa fa-eye"></i>--}}
{{--                            </a>--}}

                            <p class="brand_name">Top</p>
                            <a href="#">{{Str::limit($product->name, 30)}}</a>
                            <h6 class="product-price">{{config('settings.currency_symbol').$product->price}}</h6>
                        </div>

                    </div>
                    @endforeach

                </div>

            </div>

        </div>
    </div>
</section>
<!-- New Arrivals Area -->
<!-- Featured Products Area -->
<!-- Featured Products Area -->
<!-- Best Rated/Onsale/Top Sale Product Area -->
<section class="best_rated_onsale_top_sellares section_padding_100_70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="tabs_area">
                    <!-- Tabs -->
                    <ul class="nav nav-tabs" role="tablist" id="product-tab">
                        <li class="nav-item">
                            <a href="#top-sellers" class="nav-link active" data-toggle="tab" role="tab">Top Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a href="#best-rated" class="nav-link" data-toggle="tab" role="tab">Best Rated</a>
                        </li>
                        <li class="nav-item">
                            <a href="#on-sale" class="nav-link " data-toggle="tab" role="tab">On Sale</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade" id="top-sellers">
                            <div class="top_sellers_area">

                                <div class="row">
                                    @foreach($random_products as $product)
                                    <div class="col-12 col-sm-6 col-lg-4">

                                        <div class="single_top_sellers">
                                            @if($product->images)
                                            <div class="top_seller_image">
                                                <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="Top-Sellers">
                                            </div>
                                            @endif

                                            <div class="top_seller_desc">
                                                <h5>{{Str::limit($product->name, 30)}}</h5>
{{--                                                <h6>{{config('settings.currency_symbol').$rand_product->price}}</h6>--}}

                                                @if ($product->sale_price != 0)
                                                    <div class="price-wrap h5">
                                                        <span class="product-price"> <h6 style="color: red; font-size: 20px">{{ config('settings.currency_symbol').$product->sale_price }} </h6></span>
                                                        <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</h6></del>
                                                    </div>
                                                @else
                                                    <div class="price-wrap h5">
                                                        <span class="product-price"> <h6>{{ config('settings.currency_symbol').$product->price }}</h6> </span>
                                                    </div>
                                                @endif<h6>
                                                <div class="top_seller_product_rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                </div>
                                                <!-- Info -->
                                                <div class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                    <!-- Add to cart -->
                                                    <div class="ts_product_add_to_cart">
                                                        <a href="{{ route('product.show', $product->slug) }}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                    </div>
                                                    <!-- Wishlist -->
                                                    <div class="ts_product_wishlist">
                                                        <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                    </div>
                                                    <!-- Compare -->
                                                    <div class="ts_product_compare">
                                                        <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                    </div>
                                                    <!-- Quick View -->
                                                    <div class="ts_product_quick_view">
                                                        <a href="#" id="" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="best-rated">
                            <div class="top_sellers_area">

                                <div class="row">
                                    @foreach($random_products2 as $product)
                                        <div class="col-12 col-sm-6 col-lg-4">

                                            <div class="single_top_sellers">
                                                @if($product->images)
                                                    <div class="top_seller_image">
                                                        <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="Top-Sellers">
                                                    </div>
                                                @endif

                                                <div class="top_seller_desc">
                                                    <h5>{{Str::limit($product->name, 30)}}</h5>
                                                    {{--                                                <h6>{{config('settings.currency_symbol').$rand_product->price}}</h6>--}}

                                                    @if ($product->sale_price != 0)
                                                        <div class="price-wrap h5">
                                                            <span class="product-price"> <h6 style="color: red; font-size: 20px">{{ config('settings.currency_symbol').$product->sale_price }} </h6></span>
                                                            <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</h6></del>
                                                        </div>
                                                    @else
                                                        <div class="price-wrap h5">
                                                            <span class="product-price"> <h6>{{ config('settings.currency_symbol').$product->price }}</h6> </span>
                                                        </div>
                                                    @endif<h6>
                                                        <div class="top_seller_product_rating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                        <!-- Info -->
                                                        <div class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                            <!-- Add to cart -->
                                                            <div class="ts_product_add_to_cart">
                                                                <a href="{{ route('product.show', $product->slug) }}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                            </div>
                                                            <!-- Wishlist -->
                                                            <div class="ts_product_wishlist">
                                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                            </div>
                                                            <!-- Compare -->
                                                            <div class="ts_product_compare">
                                                                <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                            </div>
                                                            <!-- Quick View -->
                                                            <div class="ts_product_quick_view">
                                                                <a href="#" id="" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                            </div>
                                                        </div>

                                                </div>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="on-sale">
                            <div class="top_sellers_area">

                                <div class="row">
                                    @foreach($random_products3 as $product)
                                        <div class="col-12 col-sm-6 col-lg-4">

                                            <div class="single_top_sellers">
                                                @if($product->images)
                                                    <div class="top_seller_image">
                                                        <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="Top-Sellers">
                                                    </div>
                                                @endif

                                                <div class="top_seller_desc">
                                                    <h5>{{Str::limit($product->name, 30)}}</h5>
                                                    {{--                                                <h6>{{config('settings.currency_symbol').$rand_product->price}}</h6>--}}

                                                    @if ($product->sale_price != 0)
                                                        <div class="price-wrap h5">
                                                            <span class="product-price"> <h6 style="color: red; font-size: 20px">{{ config('settings.currency_symbol').$product->sale_price }} </h6></span>
                                                            <del class="price-old"> {{ config('settings.currency_symbol').$product->price }}</h6></del>
                                                        </div>
                                                    @else
                                                        <div class="price-wrap h5">
                                                            <span class="product-price"> <h6>{{ config('settings.currency_symbol').$product->price }}</h6> </span>
                                                        </div>
                                                    @endif<h6>
                                                        <div class="top_seller_product_rating">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                        <!-- Info -->
                                                        <div class="ts-seller-info mt-3 d-flex align-items-center justify-content-between">
                                                            <!-- Add to cart -->
                                                            <div class="ts_product_add_to_cart">
                                                                <a href="{{ route('product.show', $product->slug) }}" data-toggle="tooltip" data-placement="top" title="Add To Cart"><i class="icofont-shopping-cart"></i></a>
                                                            </div>
                                                            <!-- Wishlist -->
                                                            <div class="ts_product_wishlist">
                                                                <a href="wishlist.html" data-toggle="tooltip" data-placement="top" title="Wishlist"><i class="icofont-heart"></i></a>
                                                            </div>
                                                            <!-- Compare -->
                                                            <div class="ts_product_compare">
                                                                <a href="compare.html" data-toggle="tooltip" data-placement="top" title="Compare"><i class="icofont-exchange"></i></a>
                                                            </div>
                                                            <!-- Quick View -->
                                                            <div class="ts_product_quick_view">
                                                                <a href="#" id="" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i></a>
                                                            </div>
                                                        </div>

                                                </div>

                                            </div>

                                        </div>
                                    @endforeach

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Best Rated/Onsale/Top Sale Product Area -->
<!-- Offer Area -->
<!-- Offer Area End -->
<!-- Popular Brands Area -->
<section class="popular_brands_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular_section_heading mb-50">
                    <h5>Popular Brands</h5>
                </div>
            </div>
            <div class="col-12">
                <div class="popular_brands_slide owl-carousel">
                    <div class="single_brands">
                        <img src="/img/partner-img/1.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="/img/partner-img/2.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="/img/partner-img/3.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="/img/partner-img/4.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="/img/partner-img/5.jpg" alt="">
                    </div>
                    <div class="single_brands">
                        <img src="/img/partner-img/6.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Popular Brands Area -->
<!-- Special Featured Area -->
<section class="special_feature_area pt-5">
    <div class="container">
        <div class="row">
            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-ship"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Free Shipping</h6>
                        <p>For orders above $100</p>
                    </div>
                </div>
            </div>
            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-box"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Happy Returns</h6>
                        <p>7 Days free Returns</p>
                    </div>
                </div>
            </div>
            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-money"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>100% Money Back</h6>
                        <p>If product is damaged</p>
                    </div>
                </div>
            </div>
            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-live-support"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Dedicated Support</h6>
                        <p>We provide support 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('site3.partials.modal');




{{--<div id="show" class="modal fade" role="dialog">--}}
{{--    <div class="modal-dialog">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                <h4 class="modal-title"></h4>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                <div class="form-group">--}}
{{--                    <label for="">ID :</label>--}}
{{--                    <b id="i"/>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="">Title :</label>--}}
{{--                    <b id="ti"/>--}}
{{--                </div>--}}
{{--                <div class="form-group">--}}
{{--                    <label for="">Body :</label>--}}
{{--                    <b id="by"/>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
