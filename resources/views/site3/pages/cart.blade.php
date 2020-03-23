@extends('site3.app')
@section('title', 'Shopping Cart')

@section('content')


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
                    @if (Session::has('message'))
                        <p class="alert alert-success">{{ Session::get('message') }}</p>
                    @endif
                </div>
            </div>
            <div class="row">
                <main class="col-sm-9">
                    @if (\Cart::isEmpty())
                        <p class="alert alert-warning">Your shopping cart is empty.</p>


                    @endif
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
{{--                                            <th scope="col">Total</th>--}}
                                            <th scope="col"><i class="icofont-ui-delete"></i></th>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach(\Cart::getContent() as $item)
{{--                                            {{dd($item)}}}}--}}
                                        <tr>

                                            <td>
                                                @if($item->image)
                                                <img src="{{ asset('storage/'.$product->images->first()->full) }}" alt="Product">
                                                @endif
                                            </td>

                                            <td>
                                                <a href="#">{{ Str::words($item->name,20) }}</a>
                                                @foreach($item->attributes as $key  => $value)
                                                    <dl class="dlist-inline small">
{{--                                                                                                                    <dt>{{ ucwords($key) }}: </dt>--}}
                                                        <dd>{{ ucwords($value) }}</dd>
                                                    </dl>
                                                @endforeach
                                            </td>


                                            <td>{{ config('settings.currency_symbol'). $item->price }}</td>
                                            <td>
                                                <div class="quantity">
                                                    {{ $item->quantity }}
{{--                                                    <input type="number" class="qty-text" id="qty2" step="1" min="1" max="99" name="quantity" value="1">--}}
                                                </div>
                                            </td>
{{--                                            <td></td>--}}
                                            <th scope="row">
                                                <a href="{{ route('checkout.cart.remove', $item->id) }}"></a><i class="icofont-close"></i>
                                            </th>
                                        </tr>



                                        @endforeach
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
                                            <td>{{ config('settings.currency_symbol') }}0.00</td>
                                        </tr>
                                        <tr>
                                            <td>VAT (10%)</td>
                                            <td>$5.60</td>
                                        </tr>
                                        <tr>
                                            <td>Total</td>
                                            <td><strong>{{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal()  }} </strong></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <a href="{{ route('checkout.index') }}" class="btn btn-primary d-block">Proceed To Checkout</a>
                                <div class="clear">  &nbsp; </div>
                                <a href="{{ route('checkout.cart.clear') }}" class="btn btn-danger d-block">Clear Cart</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

