@extends('site3.app')
@section('title', $product->name)
@section('content')
    <section class="">
        <div class="container clearfix">
            <h2 class="title-page">{{ $product->name }}</h2>
        </div>
    </section>

    @if (\Session::has('message'))
        <div class="alert alert-success text-center">

            {!! \Session::get('message') !!}

        </div>
    @endif

    <!-- Single Product Details Area -->
    <section class="single_product_details_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6">
                    <div class="single_product_thumb">
                        <div id="product_details_slider" class="carousel slide" data-ride="carousel">

                            <!-- Carousel Inner -->
                            <div class="carousel-inner item ">

                                @foreach($product->images as $key=> $images)

                                <div class="carousel-item  {{$key == 0 ? 'active' : '' }} " >

                                    <a class="gallery_img"  href="{{ asset('storage/'.$images->full) }}" >

                                        <img class="d-block w-100" src="{{ asset('storage/'.$images->full) }}" >
                                    </a>
                                    <!-- Product Badge -->
                                    <div class="product_badge">
                                        <span class="badge-new">New</span>
                                    </div>
                                </div>
                                @endforeach

                            </div>


                            <!-- Carosel Indicators -->
                            <ol class="carousel-indicators">
                                @foreach($product->images as $image)
                                <li class="active" data-target="#product_details_slider" data-slide-to="{{ $loop->index }}"  style="background-image: url({{ asset('storage/'.$image->full) }});">
                                </li>
                                @endforeach

                            </ol>
                        </div>
                    </div>
                </div>

                <!-- Single Product Description -->
                <div class="col-12 col-lg-6">
                    <div class="single_product_desc">
                        <h4 class="title mb-2">{{ $product->name }}</h4>
                        <div class="single_product_ratings mb-2">
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <i class="fa fa-star" aria-hidden="true"></i>
                            <span class="text-muted">(8 Reviews)</span>
                        </div>
                        @if ($product->sale_price > 0)
                            <var class="price h3 text-danger">
                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->sale_price }}</span>
                                <del class="price-old"> {{ config('settings.currency_symbol') }}{{ $product->price }}</del>
                            </var>
                        @else
                            <var class="price h3 text-success">
                                <span class="currency">{{ config('settings.currency_symbol') }}</span><span class="num" id="productPrice">{{ $product->price }}</span>
                            </var>
                        @endif

                        <!-- Overview -->
                        <div class="short_overview mb-4">
                            <h6>Overview</h6>
                            <p>{{$product->description}}</p>
                        </div>

                        <!-- Color Option -->
                        <div class="widget p-0 color mb-3">
                            <h6 class="widget-title">Color</h6>
                            <div class="widget-desc d-flex">
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
                                    <label class="custom-control-label black" for="customRadio1"></label>
                                </div>

                            </div>
                        </div>

                        <!-- Size Option -->
                        <div class="widget p-0 size mb-3">
                            <h6 class="widget-title">Size</h6>
                            <div class="widget-desc">
                                <ul>
                                    <li><a href="#">XS</a></li>

                                </ul>
                            </div>
                        </div>

                        <!-- Add to Cart Form -->
                        <form  action="{{ route('product.add.cart') }}" class="cart clearfix my-5 d-flex flex-wrap align-items-center" method="post" role="form" id="addToCart">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <dl class="dlist-inline">
                                        @foreach($attributes as $attribute)
                                            @php $attributeCheck = in_array($attribute->id, $product->attributes->pluck('attribute_id')->toArray()) @endphp
                                            @if ($attributeCheck)
                                                <dt>{{ $attribute->name }}: </dt>
                                                <dd>
                                                    <select class="form-control form-control-sm option" style="width:180px;" name="{{ strtolower($attribute->name ) }}">
                                                        <option data-price="0" value="0"> Select a {{ $attribute->name }}</option>
                                                        @foreach($product->attributes as $attributeValue)
                                                            @if ($attributeValue->attribute_id == $attribute->id)
                                                                <option
                                                                    data-price="{{ $attributeValue->price }}"
                                                                    value="{{ $attributeValue->value }}"> {{ ucwords($attributeValue->value . ' +'. $attributeValue->price) }}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </dd>
                                            @endif
                                        @endforeach
                                    </dl>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12">
                                    <dl class="dlist-inline">
                                        <dt>Quantity: </dt>
                                        <dd>
                                            <input class="form-control" type="number" min="1" value="1" max="{{ $product->quantity }}" name="qty" style="width:70px;">
                                            <input type="hidden" name="productId" value="{{ $product->id }}">
                                            <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price  : $product->price }}">
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                            <hr>


{{--                            <div class="quantity">--}}
{{--                                <input type="number" class="qty-text form-control" id="qty2" step="1" min="1" max="{{ $product->quantity }}" name="quantity" >--}}
{{--                                <input type="hidden" name="productId" value="{{ $product->id }}">--}}
{{--                                <input type="hidden" name="price" id="finalPrice" value="{{ $product->sale_price != '' ? $product->sale_price  : $product->price }}">--}}
{{--                            </div>--}}


                            <button type="submit" name="addtocart"  class="btn btn-primary mt-1 mt-md-0 ml-1 ml-md-3">Add to cart</button>
                        </form>

                        <!-- Others Info -->
                        <div class="others_info_area mb-3 d-flex flex-wrap">
                            <a class="add_to_wishlist" href="wishlist.html"><i class="fa fa-heart" aria-hidden="true"></i> WISHLIST</a>
                            <a class="add_to_compare" href="compare.html"><i class="fa fa-th" aria-hidden="true"></i> COMPARE</a>
                            <a class="share_with_friend" href="#"><i class="fa fa-share" aria-hidden="true"></i> SHARE WITH FRIEND</a>
                        </div>

                        <!-- Size Guide -->

                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product_details_tab section_padding_100_0 clearfix">
                        <!-- Tabs -->
                        <ul class="nav nav-tabs" role="tablist" id="product-details-tab">
                            <li class="nav-item">
                                <a href="#description" class="nav-link active" data-toggle="tab" role="tab">Description</a>
                            </li>
                            <li class="nav-item">
                                <a href="#reviews" class="nav-link" data-toggle="tab" role="tab">Reviews <span class="text-muted">(3)</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="#addi-info" class="nav-link" data-toggle="tab" role="tab">Additional Information</a>
                            </li>
                            <li class="nav-item">
                                <a href="#refund" class="nav-link" data-toggle="tab" role="tab">Return &amp; Cancellation</a>
                            </li>
                        </ul>
                        <!-- Tab Content -->
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="description">
                                <div class="description_area">
                                    <h5>Description</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur nulla similique deserunt nemo ea eum expedita, et repellat repudiandae unde quia molestias deleniti incidunt, ad cupiditate. Corporis ipsam minus officiis neque magni harum accusantium nobis labore veritatis, consectetur ab rerum.</p>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex cum dolore, adipisci vitae quidem. Quaerat tenetur explicabo tempore beatae dolor. Quo ipsa labore, itaque ea ratione. Ratione labore quae corporis.</p>

                                    <div class="embed-responsive embed-responsive-16by9 mb-3">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/tjvOOKx7Ytw?ecver=1" allowfullscreen></iframe>
                                    </div>

                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic facere quos repudiandae ratione maiores accusantium suscipit, quod fugiat. Fugit quod laborum quidem, quos adipisci harum aspernatur, repudiandae, beatae expedita rerum ipsam dicta molestias et quis sapiente maiores amet laudantium minus nostrum. Nobis amet veritatis autem illo neque voluptas culpa vero iusto distinctio perspiciatis.</p>

                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima animi ab, quis atque, sed nulla veniam quisquam amet perspiciatis, aliquam dolore tempora, consequuntur beatae quae dolor rem repellendus! Vitae architecto sequi quo eaque iusto impedit suscipit non maxime sint totam, nesciunt necessitatibus iste nulla ab, veritatis assumenda.</p>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="reviews">
                                <div class="reviews_area">
                                    <ul>
                                        <li>
                                            <div class="single_user_review mb-15">
                                                <div class="review-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>for Quality</span>
                                                </div>
                                                <div class="review-details">
                                                    <p>by <a href="#">Designing World</a> on <span>12 Sep 2019</span></p>
                                                </div>
                                            </div>
                                            <div class="single_user_review mb-15">
                                                <div class="review-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>for Design</span>
                                                </div>
                                                <div class="review-details">
                                                    <p>by <a href="#">Designing World</a> on <span>12 Sep 2019</span></p>
                                                </div>
                                            </div>
                                            <div class="single_user_review">
                                                <div class="review-rating">
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    <span>for Value</span>
                                                </div>
                                                <div class="review-details">
                                                    <p>by <a href="#">Designing World</a> on <span>12 Sep 2019</span></p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="submit_a_review_area mt-50">
                                    <h4>Submit A Review</h4>
                                    <form action="#" method="post">
                                        <div class="form-group">
                                            <span>Your Ratings</span>
                                            <div class="stars">
                                                <input type="radio" name="star" class="star-1" id="star-1">
                                                <label class="star-1" for="star-1">1</label>
                                                <input type="radio" name="star" class="star-2" id="star-2">
                                                <label class="star-2" for="star-2">2</label>
                                                <input type="radio" name="star" class="star-3" id="star-3">
                                                <label class="star-3" for="star-3">3</label>
                                                <input type="radio" name="star" class="star-4" id="star-4">
                                                <label class="star-4" for="star-4">4</label>
                                                <input type="radio" name="star" class="star-5" id="star-5">
                                                <label class="star-5" for="star-5">5</label>
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Nickname</label>
                                            <input type="email" class="form-control" id="name" placeholder="Nazrul">
                                        </div>
                                        <div class="form-group">
                                            <label for="options">Reason for your rating</label>
                                            <select class="form-control small right py-0 w-100" id="options">
                                                <option>Quality</option>
                                                <option>Value</option>
                                                <option>Design</option>
                                                <option>Price</option>
                                                <option>Others</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="comments">Comments</label>
                                            <textarea class="form-control" id="comments" rows="5" data-max-length="150"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit Review</button>
                                    </form>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="addi-info">
                                <div class="additional_info_area">
                                    <h5>Additional Info</h5>
                                    <p>What should I do if I receive a damaged parcel?
                                        <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit impedit similique qui, itaque delectus labore.</span></p>
                                    <p>I have received my order but the wrong item was delivered to me.
                                        <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis quam voluptatum beatae harum tempore, ab?</span></p>
                                    <p>Product Receipt and Acceptance Confirmation Process
                                        <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum ducimus, temporibus soluta impedit minus rerum?</span></p>
                                    <p class="mb-0">How do I cancel my order?
                                        <br> <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum eius eum, minima!</span></p>
                                </div>
                            </div>

                            <div role="tabpanel" class="tab-pane fade" id="refund">
                                <div class="refund_area">
                                    <h6>Return Policy</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa quidem, eos eius laboriosam voluptates totam mollitia repellat rem voluptate obcaecati quas fuga similique impedit cupiditate vitae repudiandae. Rem, tenetur placeat!</p>

                                    <h6>Return Criteria</h6>
                                    <ul class="mb-30 ml-30">
                                        <li><i class="icofont-check"></i> Package broken</li>
                                        <li><i class="icofont-check"></i> Physical damage in the product</li>
                                        <li><i class="icofont-check"></i> Software/hardware problem</li>
                                        <li><i class="icofont-check"></i> Accessories missing or damaged etc.</li>
                                    </ul>

                                    <h6>Q. What should I do if I receive a damaged parcel?</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit impedit similique qui, itaque delectus labore.</p>

                                    <h6>Q. I have received my order but the wrong item was delivered to me.</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis quam voluptatum beatae harum tempore, ab?</p>

                                    <h6>Q. Product Receipt and Acceptance Confirmation Process</h6>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum ducimus, temporibus soluta impedit minus rerum?</p>

                                    <h6>Q. How do I cancel my order?</h6>
                                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum eius eum, minima!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    @push('scripts')
        <script>


            $(document).ready(function () {
                $('#addToCart').submit(function (e) {
                    if ($('.option').val() == 0) {
                        e.preventDefault();
                        alert('Please select an option');
                    }
                });
                $('.option').change(function () {
                    $('#productPrice').html("{{ $product->sale_price != '' ? $product->sale_price : $product->price }}");
                    let extraPrice = $(this).find(':selected').data('price');
                    let price = parseFloat($('#productPrice').html());
                    let finalPrice = (Number(extraPrice) + price).toFixed(2);
                    $('#finalPrice').val(finalPrice);
                    $('#productPrice').html(finalPrice);
                });
            });
        </script>
    @endpush
@stop

