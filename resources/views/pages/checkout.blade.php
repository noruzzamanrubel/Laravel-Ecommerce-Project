@extends('layouts.app')

@section('content')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/cart_responsive.css') }}">

    <div class="cart_section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart_container">
                        <div class="cart_title">Checkout Pages</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cart as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_image"><img src="{{ asset($row->options->image) }}" alt="">
                                        </div>
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title">Name</div>
                                                <div class="cart_item_text">{{ $row->name }}</div>
                                            </div>
                                            @if ($row->options->color == null)
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Color</div>
                                                    <div class="cart_item_text">{{ $row->options->color }}</div>
                                                </div>
                                            @endif
                                            @if ($row->options->size == null)

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title">Size</div>
                                                    <div class="cart_item_text">{{ $row->options->size }}</div>
                                                </div>
                                            @endif
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title">Quantity</div>
                                                <form action="{{ route('cart.update') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="cartid" value="{{ $row->rowId }}">
                                                    <input type="number" name="qty" value="{{ $row->qty }}"
                                                        style="width: 50px;">
                                                    <button type="submit" class="btn btn-success btn-sm"><i
                                                            class="fas fa-check-square"></i></button>
                                                </form>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title">Price</div>
                                                <div class="cart_item_text">${{ $row->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Total</div>
                                                <div class="cart_item_text">${{ $row->price * $row->qty }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title">Action</div><br>
                                                <a href="{{ url('remove/cart/' . $row->rowId) }}"
                                                    class="btn btn-sm btn-danger">X</a>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <br><br>

                        <!-- Order Total -->
                        <div class="row">
                            <div class="col-lg-4 col-12">
                                <div class="coupon_section">
                                    <h5>Apply Coupon</h5>
                                    <form class="form-inline" method="POST" action="{{route('apply.coupon')}}">
                                        @csrf
                                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="coupon"
                                            placeholder="Enter Your Coupon">
                                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 offset-lg-2 col-12">
                                <div class="product_info">
                                    <ul class="list-group">
                                        <li class="list-group-item">SubTotal <span class="float-right">{{Cart::subtotal()}}</span></li>
                                        <li class="list-group-item">Coupon<span class="float-right">550</span></li>
                                        <li class="list-group-item">Shipping Chrage<span class="float-right">550</span></li>
                                        <li class="list-group-item">Vat<span class="float-right">550</span></li>
                                        <li class="list-group-item">Total<span class="float-right">550</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="cart_buttons">
                            <a href="{{ route('user.checkout') }}" class="button cart_button_checkout">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div
                        class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="{{ asset('frontend/images/send.png') }}" alt="">
                            </div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text">
                                <p>...and receive %20 coupon for first shopping.</p>
                            </div>
                        </div>
                        <div class="newsletter_content clearfix">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form method="POST" action="{{ route('newsletter.store') }}" class="newsletter_form">
                                @csrf
                                <input type="email" class="newsletter_input" required="required"
                                    placeholder="Enter your email address" name="email">
                                <button type="submit" class="newsletter_button">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
