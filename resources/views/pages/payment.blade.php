@extends('layouts.app')

@section('content')

    @php
    $setting = DB::table('settings')->first();
    $chrage = $setting->shipping_chrage;
    $vat = $setting->vat;
    @endphp

    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/contact_responsive.css') }}">

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-lg-8" style="border: 1px solid grey; padding:20px; Border-radius:10px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Cart Product</div>
                        <div class="cart_items">
                            <ul class="cart_list">
                                @foreach ($cart as $row)
                                    <li class="cart_item clearfix">
                                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"><b>Product Image</b></div>
                                                <div class="cart_item_text"><img src="{{ asset($row->options->image) }}"
                                                        width="133px" height="133px" alt=""></div>
                                            </div>
                                            <div class="cart_item_name cart_info_col">
                                                <div class="cart_item_title"><b>Product Name</b></div>
                                                <div class="cart_item_text">{{ $row->name }}</div>
                                            </div>
                                            @if ($row->options->color == null)
                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title"><b>Color</b></div>
                                                    <div class="cart_item_text">{{ $row->options->color }}</div>
                                                </div>
                                            @endif
                                            @if ($row->options->size == null)

                                            @else
                                                <div class="cart_item_color cart_info_col">
                                                    <div class="cart_item_title"><b>Size</b></div>
                                                    <div class="cart_item_text">{{ $row->options->size }}</div>
                                                </div>
                                            @endif
                                            <div class="cart_item_quantity cart_info_col">
                                                <div class="cart_item_title"><b>Quantity</b></div>
                                                <div class="cart_item_text">{{ $row->qty }}</div>
                                            </div>
                                            <div class="cart_item_price cart_info_col">
                                                <div class="cart_item_title"><b>Price</b></div>
                                                <div class="cart_item_text">${{ $row->price }}</div>
                                            </div>
                                            <div class="cart_item_total cart_info_col">
                                                <div class="cart_item_title"><b>Total</b></div>
                                                <div class="cart_item_text">${{ $row->price * $row->qty }}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="col-8" style="float: right">
                            <div class="product_info">
                                <ul class="list-group">
                                    @if (Session::has('coupon'))
                                        <li class="list-group-item">SubTotal <span
                                                class="float-right">${{ Session::get('coupon')['balance'] }}</span>
                                        </li>
                                        <li class="list-group-item">Coupon:({{ Session::get('coupon')['name'] }})
                                            <a href="{{ route('coupon.remove') }}" class="btn btn-danger btn-sm">X</a>
                                            <span class="float-right">${{ Session::get('coupon')['discount'] }}
                                            </span>
                                        </li>
                                    @else
                                        <li class="list-group-item">SubTotal <span
                                                class="float-right">${{ Cart::Subtotal() }}</span>
                                        </li>
                                    @endif

                                    <li class="list-group-item">Shipping Chrage<span
                                            class="float-right">${{ $chrage }}</span></li>
                                    <li class="list-group-item">Vat<span class="float-right">${{ $vat }}</span>
                                    </li>
                                    @if (Session::has('coupon'))
                                        <li class="list-group-item">Total<span
                                                class="float-right">${{ Session::get('coupon')['balance'] + $chrage + $vat }}</span>
                                        </li>
                                    @else
                                        <li class="list-group-item">Total<span
                                                class="float-right">${{ Cart::total() + $chrage + $vat }}</span></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" style="border: 1px solid grey; padding:20px; Border-radius:10px">
                    <div class="contact_form_container">
                        <div class="contact_form_title text-center">Shipping Address</div>

                        <form method="POST" action="">
                            @csrf

                            <div class="form-group">
                                <label for="name">Full name</label>
                                <input type="text" id="name" name="name" class="form-control" aria-describedby="emailHelp"
                                    required=" " placeholder="Enter Your Full name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="contact_form_button">
                                <button type="submit" class="btn btn-info">Sign Up</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="panel"></div>
    </div>
@endsection
