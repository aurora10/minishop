@extends('site3.app')
@section('title', $category->name)
@section('content')


    <section class="">
        <div class="container clearfix">
            <h2 class="title-page">{{ $category->name }}</h2>
        </div>


        <section class="shop_grid_area section_padding_100">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Shop Top Sidebar -->
                        <div class="shop_top_sidebar_area d-flex flex-wrap align-items-center justify-content-between">
                            <div class="view_area d-flex">
                                <div class="grid_view">
                                    <a href="shop-grid-left-sidebar.html" data-toggle="tooltip" data-placement="top"
                                       title="Grid View"><i class="icofont-layout"></i></a>
                                </div>
                                <div class="list_view ml-3">
                                    <a href="shop-list-left-sidebar.html" data-toggle="tooltip" data-placement="top"
                                       title="List View"><i class="icofont-listine-dots"></i></a>
                                </div>
                            </div>
                            <select class="small right">
                                <option selected>Short by Popularity</option>
                                <option value="1">Short by Newest</option>
                                <option value="2">Short by Sales</option>
                                <option value="3">Short by Ratings</option>
                            </select>
                        </div>


                        <div class="shop_grid_product_area">

                            <div class="row justify-content-center">
                                <!-- Single Product -->
                                @forelse($category->products as $product)
                                    <div class="col-9 col-sm-6 col-md-4 col-lg-3">

                                        <div class="single-product-area mb-30">
                                            @if ($product->images->count() > 0)
                                                <div class="product_image">
                                                    <!-- Product Image -->

                                                    <img class="normal_img"
                                                         src="{{ asset('storage/'.$product->images->first()->full) }}"
                                                         alt="">
                                                    <img class="hover_img"
                                                         src="{{ asset('storage/'.$product->images->random()->full) }}"
                                                         alt="">
                                                    @else
                                                        <img class="normal_img" src="https://via.placeholder.com/176">
                                                @endif

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
                                                <!-- Product Description -->
                                                <div class="product_description">
                                                    <!-- Add to cart -->
                                                    <div class="product_add_to_cart" id="addToCart">
                                                        <a href="{{ route('product.show', $product->slug) }}"
                                                           id="addToCart"><i class="icofont-shopping-cart"></i> Add to
                                                            Cart</a>
                                                    </div>
                                                    <!-- Quick View -->
                                                    <div class="product_quick_view">
                                                        <a href="" class="open-modal" data-id="{{$product->id}}"
data-toggle="modal" data-target="#modal"><i class="icofont-eye-alt"></i> Quick View</a>
{{--                                                        data-product_name="{{ $product->name }}"--}}

                                                    </div>
                                                    <p class="brand_name">Top</p>
                                                    <a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                    @if ($product->sale_price != 0)
                                                        <div class="price-wrap h5">
                                                            <span
                                                                class="product-price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>
                                                            <del
                                                                class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>
                                                        </div>
                                                    @else
                                                        <div class="price-wrap h5">
                                                            <span
                                                                class="product-price"> {{ config('settings.currency_symbol').$product->price }} </span>
                                                        </div>
                                                    @endif

                                                </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>No Products found in {{ $category->name }}.</p>
                            @endforelse
                            <!-- Single Product -->

                            </div>

                            <!-- Quick View Modal Area -->
                            <div class="modal fade" id="modal" tabindex="-1" role="dialog"
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
                                                                <img class="first_img"
                                                                     src=""
                                                                     alt="">
                                                                <img class="hover_img"
                                                                     src=""
                                                                     alt="">
                                                                <!-- Product Badge -->
                                                                <div class="product_badge">
                                                                    <span class="badge-new">New</span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="col-12 col-lg-7">
                                                            <div class="quickview_pro_des">
                                                                <h4 class="title" id="title">tttt</h4>
                                                                <div class="top_seller_product_rating mb-15">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </div>
{{--                                                                @if ($product->sale_price != 0)--}}
{{--                                                                    <div class="price-wrap h5">--}}
{{--                                                                        <span--}}
{{--                                                                            class="product-price"> {{ config('settings.currency_symbol').$product->sale_price }} </span>--}}
{{--                                                                        <del--}}
{{--                                                                            class="price-old"> {{ config('settings.currency_symbol').$product->price }}</del>--}}
{{--                                                                    </div>--}}
{{--                                                                @else--}}
{{--                                                                    <div class="price-wrap h5">--}}
{{--                                                                        <span--}}
{{--                                                                            class="product-price"> {{ config('settings.currency_symbol').$product->price }} </span>--}}
{{--                                                                    </div>--}}
{{--                                                                @endif--}}
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit. Mollitia expedita quibusdam aspernatur,
                                                                    sapiente consectetur accusantium perspiciatis
                                                                    praesentium eligendi, in fugiat?</p>
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
                            <!-- Shop Pagination Area -->
                            <div class="shop_pagination_area mt-30">
                                <nav aria-label="Page navigation">
                                    <ul class="pagination pagination-sm justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fa fa-angle-left"
                                                                             aria-hidden="true"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                                        <li class="page-item"><a class="page-link" href="#">9</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fa fa-angle-right"
                                                                             aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </section>



@stop





