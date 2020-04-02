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
{{--                                                    <div class="product_quick_view">--}}
{{--                                                        <a href="" class="open-modal" data-id="{{$product->id}}"--}}
{{--                                                        data-toggle="modal" data-target="#modal"><i class="icofont-eye-alt"></i> Quick View</a>--}}
{{--                                                        data-product_name="{{ $product->name }}"--}}

{{--                                                    </div>--}}

                                                    <div class=" show-modal product_quick_view">
                                                        <a href="#" class="show-modal" data-toggle="modal"  data-name="{{$product->name}}" data-description="{{$product->description}}"
                                                           data-price="{{$product->price}}" data-price2="{{$product->sale_price}}" data-image="{{ asset('storage/'.$product->images->first()->full) }}"><i class="icofont-eye-alt"></i> Quick View</a>
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
@include('site3.partials.modal');
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





