@extends('layouts.app')

@section('content')
    <!-- Characteristics -->
    @include('layouts.menubar')
    @include('layouts.slider')
    @php
    use App\Models\Admin\Category;
    use App\Models\Admin\Subcategory;
    use App\Models\Admin\Brand;
    use App\Models\Product;

    $featured = Product::where('status', 1)
        ->orderBy('id', 'desc')
        ->limit(16)
        ->get();
    $hot_deal = Product::where('status', 1)
        ->where('hot_deal', 1)
        ->orderBy('id', 'asc')
        ->limit(5)
        ->get();
    @endphp

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_1.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_2.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_3.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="{{ asset('frontend/images/char_4.png') }}" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Deals of the week -->

    <div class="deals_featured">
        <div class="container">
            <div class="row">
                <div class="col d-flex flex-lg-row flex-column align-items-center justify-content-start">

                    <!-- Deals -->

                    <div class="deals">
                        <div class="deals_title">Deals of the Week</div>
                        <div class="deals_slider_container">

                            <!-- Deals Slider -->
                            <div class="owl-carousel owl-theme deals_slider">
                                @foreach ($hot_deal as $row)
                                    <!-- Deals Item -->
                                    <div class="owl-item deals_item">
                                        <div class="deals_image"><img src="{{ asset($row->image_one) }}" width="310px"
                                                height="310px">
                                        </div>
                                        <div class="deals_content">
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_category"><a
                                                        href="#">{{ $row->brand->brand_name }}</a></div>
                                                @if ($row->discount_price == null)
                                                @else
                                                    <div class="deals_item_price_a ml-auto">${{ $row->selling_price }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="deals_info_line d-flex flex-row justify-content-start">
                                                <div class="deals_item_name">{{ $row->product_name }}</div>
                                                @if ($row->discount_price == null)
                                                    <div class="deals_item_price ml-auto">${{ $row->selling_price }}</div>
                                                @else
                                                @endif
                                                @if ($row->discount_price != null)
                                                    <div class="deals_item_price ml-auto">${{ $row->discount_price }}
                                                    </div>
                                                @else
                                                @endif

                                            </div>
                                            <div class="available">
                                                <div class="available_line d-flex flex-row justify-content-start">
                                                    <div class="available_title">Available:
                                                        <span>{{ $row->product_quantity }}</span>
                                                    </div>
                                                </div>
                                                <div class="available_bar"><span style="width:17%"></span></div>
                                            </div>
                                            <div
                                                class="deals_timer d-flex flex-row align-items-center justify-content-start">
                                                <div class="deals_timer_title_container">
                                                    <div class="deals_timer_title">Hurry Up</div>
                                                    <div class="deals_timer_subtitle">Offer ends in:</div>
                                                </div>
                                                <div class="deals_timer_content ml-auto">
                                                    <div class="deals_timer_box clearfix" data-target-time="">
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_hr" class="deals_timer_hr"></div>
                                                            <span>hours</span>
                                                        </div>
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_min" class="deals_timer_min"></div>
                                                            <span>mins</span>
                                                        </div>
                                                        <div class="deals_timer_unit">
                                                            <div id="deals_timer1_sec" class="deals_timer_sec"></div>
                                                            <span>secs</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        <div class="deals_slider_nav_container">
                            <div class="deals_slider_prev deals_slider_nav"><i class="fas fa-chevron-left ml-auto"></i>
                            </div>
                            <div class="deals_slider_next deals_slider_nav"><i class="fas fa-chevron-right ml-auto"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Featured -->
                    <div class="featured">
                        <div class="tabbed_container">
                            <div class="tabs">
                                <ul class="clearfix">
                                    <li class="active">Featured</li>
                                </ul>
                                <div class="tabs_line"><span></span></div>
                            </div>

                            <!-- Product Panel -->
                            <div class="product_panel panel active">
                                <div class="featured_slider slider">
                                    @foreach ($featured as $row)
                                        <!-- Slider Item -->
                                        <div class="featured_slider_item">
                                            <div class="border_active"></div>
                                            <div
                                                class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                <div
                                                    class="product_image d-flex flex-column align-items-center justify-content-center">
                                                    <img src="{{ asset($row->image_one) }}" width="115px" height="115px">
                                                </div>
                                                <div class="product_content">
                                                    @if ($row->discount_price == null)
                                                        <div class="product_price discount">${{ $row->selling_price }}
                                                        </div>
                                                    @else
                                                        <div class="product_price discount">
                                                            ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                        </div>
                                                    @endif

                                                    <div class="product_name">
                                                        <div><a
                                                                href="{{ url('product/details/' . $row->id . '/' . $row->product_name) }}">{{ $row->product_name }}</a>
                                                        </div>
                                                    </div>
                                                    <div class="product_extras">
                                                        <div class="product_color">
                                                            <input type="radio" checked name="product_color"
                                                                style="background:#b19c83">
                                                            <input type="radio" name="product_color"
                                                                style="background:#000000">
                                                            <input type="radio" name="product_color"
                                                                style="background:#999999">
                                                        </div>
                                                        <button class="product_cart_button addcart"
                                                            data-id="{{ $row->id }}">Add to Cart</button>
                                                    </div>
                                                </div>

                                                <button class="addwishlist" data-id="{{ $row->id }}">
                                                    <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                </button>

                                                <ul class="product_marks">
                                                    @if ($row->discount_price == null)
                                                        <li class="product_mark product_new">New</li>
                                                    @else
                                                        @php
                                                            $amount = $row->selling_price - $row->discount_price;
                                                            $discount = ($amount / $row->selling_price) * 100;
                                                        @endphp
                                                        <li class="product_mark product_discount">
                                                            {{ intval($discount) }}%
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="featured_slider_dots_cover"></div>
                            </div>

                            <!-- Product Panel -->

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Popular Categories -->

    <div class="popular_categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="popular_categories_content">
                        <div class="popular_categories_title">Popular Categories</div>
                        <div class="popular_categories_slider_nav">
                            <div class="popular_categories_prev popular_categories_nav"><i
                                    class="fas fa-angle-left ml-auto"></i></div>
                            <div class="popular_categories_next popular_categories_nav"><i
                                    class="fas fa-angle-right ml-auto"></i></div>
                        </div>
                        <div class="popular_categories_link"><a href="#">full catalog</a></div>
                    </div>
                </div>

                <!-- Popular Categories Slider -->

                <div class="col-lg-9">
                    <div class="popular_categories_slider_container">
                        <div class="owl-carousel owl-theme popular_categories_slider">

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('frontend/images/popular_1.png') }}" alt=""></div>
                                    <div class="popular_category_text">Smartphones & Tablets</div>
                                </div>
                            </div>

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('frontend/images/popular_2.png') }}" alt=""></div>
                                    <div class="popular_category_text">Computers & Laptops</div>
                                </div>
                            </div>

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('frontend/images/popular_3.png') }}" alt=""></div>
                                    <div class="popular_category_text">Gadgets</div>
                                </div>
                            </div>

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('frontend/images/popular_4.png') }}" alt=""></div>
                                    <div class="popular_category_text">Video Games & Consoles</div>
                                </div>
                            </div>

                            <!-- Popular Categories Item -->
                            <div class="owl-item">
                                <div class="popular_category d-flex flex-column align-items-center justify-content-center">
                                    <div class="popular_category_image"><img
                                            src="{{ asset('frontend/images/popular_5.png') }}" alt=""></div>
                                    <div class="popular_category_text">Accessories</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background"
            style="background-image:url({{ asset('frontend/images/banner_2_background.jpg') }})"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating">
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                        </div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img
                                                src="{{ asset('frontend/images/banner_2_product.png') }}" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating">
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                        </div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img
                                                src="{{ asset('frontend/images/banner_2_product.png') }}" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating">
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                            <i></i>
                                        </div>
                                        <div class="button banner_2_button"><a href="#">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img
                                                src="{{ asset('frontend/images/banner_2_product.png') }}" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--Category One -->
    @php
    $cats = Category::skip(3)->first();
    $product = Product::where('status', 1)
        ->limit(10)
        ->orderBy('id', 'DESC')
        ->get();

    @endphp

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="tabbed_container">
                        <div class="tabs clearfix tabs-right">
                            <div class="new_arrivals_title">{{ $cats->category_name }}</div>
                            <ul class="clearfix">
                                <li class="active"></li>
                            </ul>
                            <div class="tabs_line"><span></span></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12" style="z-index:1;">

                                <!-- Product Panel -->
                                <div class="product_panel panel active">
                                    <div class="arrivals_slider slider">
                                        @foreach ($product as $row)
                                            <!-- Slider Item -->
                                            <div class="arrivals_slider_item">
                                                <div class="border_active"></div>
                                                <div
                                                    class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div
                                                        class="product_image d-flex flex-column align-items-center justify-content-center">
                                                        <img src="{{ asset($row->image_one) }}" width="115px"
                                                            height="115px">
                                                    </div>
                                                    <div class="product_content">
                                                        @if ($row->discount_price == null)
                                                            <div class="product_price discount">
                                                                ${{ $row->selling_price }}
                                                            </div>
                                                        @else
                                                            <div class="product_price discount">
                                                                ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                            </div>
                                                        @endif

                                                        <div class="product_name">
                                                            <div><a href="product.html">{{ $row->product_name }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="product_extras">
                                                            <div class="product_color">
                                                                <input type="radio" checked name="product_color"
                                                                    style="background:#b19c83">
                                                                <input type="radio" name="product_color"
                                                                    style="background:#000000">
                                                                <input type="radio" name="product_color"
                                                                    style="background:#999999">
                                                            </div>
                                                            <button class="product_cart_button addcart"
                                                                data-id="{{ $row->id }}">Add to Cart</button>
                                                        </div>
                                                    </div>

                                                    <button class="addwishlist" data-id="{{ $row->id }}">
                                                        <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                    </button>

                                                    <ul class="product_marks">
                                                        @if ($row->discount_price == null)
                                                            <li class="product_mark product_new">New</li>
                                                        @else
                                                            @php
                                                                $amount = $row->selling_price - $row->discount_price;
                                                                $discount = ($amount / $row->selling_price) * 100;
                                                            @endphp
                                                            <li class="product_mark product_discount">
                                                                {{ intval($discount) }}%
                                                            </li>
                                                        @endif
                                                    </ul>
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

            <!-- Hot Category Two -->
            @php
                $cats = Category::skip(3)->first();
                $product = Product::where('status', 1)
                    ->limit(10)
                    ->orderBy('id', 'asc')
                    ->get();
                
            @endphp

            <div class="new_arrivals">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="tabbed_container">
                                <div class="tabs clearfix tabs-right">
                                    <div class="new_arrivals_title">{{ $cats->category_name }}</div>
                                    <ul class="clearfix">
                                        <li class="active"></li>
                                    </ul>
                                    <div class="tabs_line"><span></span></div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12" style="z-index:1;">

                                        <!-- Product Panel -->
                                        <div class="product_panel panel active">
                                            <div class="arrivals_slider slider">
                                                @foreach ($product as $row)
                                                    <!-- Slider Item -->
                                                    <div class="arrivals_slider_item">
                                                        <div class="border_active"></div>
                                                        <div
                                                            class="product_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                            <div
                                                                class="product_image d-flex flex-column align-items-center justify-content-center">
                                                                <img src="{{ asset($row->image_one) }}" width="115px"
                                                                    height="115px">
                                                            </div>
                                                            <div class="product_content">
                                                                @if ($row->discount_price == null)
                                                                    <div class="product_price discount">
                                                                        ${{ $row->selling_price }}
                                                                    </div>
                                                                @else
                                                                    <div class="product_price discount">
                                                                        ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                                    </div>
                                                                @endif

                                                                <div class="product_name">
                                                                    <div><a
                                                                            href="product.html">{{ $row->product_name }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="product_extras">
                                                                    <div class="product_color">
                                                                        <input type="radio" checked name="product_color"
                                                                            style="background:#b19c83">
                                                                        <input type="radio" name="product_color"
                                                                            style="background:#000000">
                                                                        <input type="radio" name="product_color"
                                                                            style="background:#999999">
                                                                    </div>
                                                                    <button class="product_cart_button addcart"
                                                                        data-id="{{ $row->id }}">Add to Cart</button>
                                                                </div>
                                                            </div>

                                                            <button class="addwishlist" data-id="{{ $row->id }}">
                                                                <div class="product_fav"><i class="fas fa-heart"></i></div>
                                                            </button>

                                                            <ul class="product_marks">
                                                                @if ($row->discount_price == null)
                                                                    <li class="product_mark product_new">New</li>
                                                                @else
                                                                    @php
                                                                        $amount = $row->selling_price - $row->discount_price;
                                                                        $discount = ($amount / $row->selling_price) * 100;
                                                                    @endphp
                                                                    <li class="product_mark product_discount">
                                                                        {{ intval($discount) }}%
                                                                    </li>
                                                                @endif
                                                            </ul>
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

                    <!-- Best Sellers -->

                    <div class="best_sellers">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="tabbed_container">
                                        <div class="tabs clearfix tabs-right">
                                            <div class="new_arrivals_title">Hot Best Sellers</div>
                                            <ul class="clearfix">
                                                <li class="active">Top 20</li>
                                                <li>Audio & Video</li>
                                                <li>Laptops & Computers</li>
                                            </ul>
                                            <div class="tabs_line"><span></span></div>
                                        </div>

                                        <div class="bestsellers_panel panel active">

                                            <!-- Best Sellers Slider -->

                                            <div class="bestsellers_slider slider">

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_1.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_2.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Samsung
                                                                    J730F...</a></div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_3.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Nomi Black
                                                                    White</a></div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_4.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Samsung
                                                                    Charm
                                                                    Gold</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_5.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Beoplay
                                                                    H7</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_6.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Huawei
                                                                    MediaPad
                                                                    T3</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_1.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_2.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_3.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_4.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_5.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_6.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="bestsellers_panel panel">

                                            <!-- Best Sellers Slider -->

                                            <div class="bestsellers_slider slider">

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_1.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_2.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_3.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_4.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_5.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_6.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_1.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_2.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_3.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_4.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_5.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_6.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="bestsellers_panel panel">

                                            <!-- Best Sellers Slider -->

                                            <div class="bestsellers_slider slider">

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_1.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_2.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_3.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_4.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_5.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_6.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_1.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_2.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_3.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_4.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item discount">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_5.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                                <!-- Best Sellers Item -->
                                                <div class="bestsellers_item">
                                                    <div
                                                        class="bestsellers_item_container d-flex flex-row align-items-center justify-content-start">
                                                        <div class="bestsellers_image"><img
                                                                src="{{ asset('frontend/images/best_6.png') }}" alt="">
                                                        </div>
                                                        <div class="bestsellers_content">
                                                            <div class="bestsellers_category"><a href="#">Headphones</a>
                                                            </div>
                                                            <div class="bestsellers_name"><a href="product.html">Xiaomi
                                                                    Redmi Note
                                                                    4</a>
                                                            </div>
                                                            <div class="rating_r rating_r_4 bestsellers_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="bestsellers_price discount">$225<span>$300</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bestsellers_fav active"><i class="fas fa-heart"></i></div>
                                                    <ul class="bestsellers_marks">
                                                        <li class="bestsellers_mark bestsellers_discount">-25%</li>
                                                        <li class="bestsellers_mark bestsellers_new">new</li>
                                                    </ul>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Adverts -->

                    <div class="adverts">
                        <div class="container">
                            <div class="row">

                                <div class="col-lg-4 advert_col">

                                    <!-- Advert Item -->

                                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                                        <div class="advert_content">
                                            <div class="advert_title"><a href="#">Trends 2018</a></div>
                                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur adipiscing
                                                Donec et.
                                            </div>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="advert_image"><img src="{{ asset('frontend/images/adv_1.png') }}"
                                                    alt=""></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 advert_col">

                                    <!-- Advert Item -->

                                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                                        <div class="advert_content">
                                            <div class="advert_subtitle">Trends 2018</div>
                                            <div class="advert_title_2"><a href="#">Sale -45%</a></div>
                                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="advert_image"><img src="{{ asset('frontend/images/adv_2.png') }}"
                                                    alt=""></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-4 advert_col">

                                    <!-- Advert Item -->

                                    <div class="advert d-flex flex-row align-items-center justify-content-start">
                                        <div class="advert_content">
                                            <div class="advert_title"><a href="#">Trends 2018</a></div>
                                            <div class="advert_text">Lorem ipsum dolor sit amet, consectetur.</div>
                                        </div>
                                        <div class="ml-auto">
                                            <div class="advert_image"><img src="{{ asset('frontend/images/adv_3.png') }}"
                                                    alt=""></div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Trends -->
                    @php
                        $buyget = Product::where('status', 1)
                            ->where('buyone_getone', 1)
                            ->limit(6)
                            ->orderBy('id', 'asc')
                            ->get();
                        
                    @endphp

                    <div class="trends">
                        <div class="trends_background"
                            style="background-image:url({{ asset('frontend/images/trends_background.jpg') }})">
                        </div>
                        <div class="trends_overlay"></div>
                        <div class="container">
                            <div class="row">

                                <!-- Trends Content -->
                                <div class="col-lg-3">
                                    <div class="trends_container">
                                        <h2 class="trends_title">Buy One Get One</h2>
                                        <div class="trends_text">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                                        </div>
                                        <div class="trends_slider_nav">
                                            <div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i>
                                            </div>
                                            <div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Trends Slider -->
                                <div class="col-lg-9">
                                    <div class="trends_slider_container">

                                        <!-- Trends Slider -->

                                        <div class="owl-carousel owl-theme trends_slider">
                                            @foreach ($buyget as $row)
                                                <!-- Trends Slider Item -->
                                                <div class="owl-item">
                                                    <div class="trends_item is_new">
                                                        <div
                                                            class="trends_image d-flex flex-column align-items-center justify-content-center">
                                                            <img src="{{ asset($row->image_one) }}" alt="">
                                                        </div>
                                                        <div class="trends_content">
                                                            <div class="trends_category"><a
                                                                    href="#">{{ $row->brand->brand_name }}</a></div>
                                                            <div class="trends_info clearfix">
                                                                <div class="trends_name"><a
                                                                        href="product.html">{{ $row->product_name }}</a>
                                                                </div>
                                                                @if ($row->discount_price == null)
                                                                    <div class="product_price discount">
                                                                        ${{ $row->selling_price }}
                                                                    </div>
                                                                @else
                                                                    <div class="product_price discount">
                                                                        ${{ $row->discount_price }}<span>${{ $row->selling_price }}</span>
                                                                    </div>
                                                                @endif
                                                                <button class="btn btn-danger btn-sm addcart"
                                                                    data-id="{{ $row->id }}">Add to Cart</button>
                                                            </div>
                                                        </div>
                                                        <ul class="trends_marks">
                                                            <li class="trends_mark trends_new">buy</li>
                                                        </ul>
                                                        <button class="addwishlist" data-id="{{ $row->id }}">
                                                            <div class="trends_fav"><i class="fas fa-heart"></i></div>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Reviews -->

                    <div class="reviews">
                        <div class="container">
                            <div class="row">
                                <div class="col">

                                    <div class="reviews_title_container">
                                        <h3 class="reviews_title">Latest Reviews</h3>
                                        <div class="reviews_all ml-auto"><a href="#">view all <span>reviews</span></a></div>
                                    </div>

                                    <div class="reviews_slider_container">

                                        <!-- Reviews Slider -->
                                        <div class="owl-carousel owl-theme reviews_slider">

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="{{ asset('frontend/images/review_1.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Roberto Sanchez</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="{{ asset('frontend/images/review_2.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Brandon Flowers</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="{{ asset('frontend/images/review_3.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Emilia Clarke</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="{{ asset('frontend/images/review_1.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Roberto Sanchez</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="{{ asset('frontend/images/review_2.jpg') }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Brandon Flowers</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Reviews Slider Item -->
                                            <div class="owl-item">
                                                <div class="review d-flex flex-row align-items-start justify-content-start">
                                                    <div>
                                                        <div class="review_image"><img
                                                                src="{{ asset('frontend/images/review_3.jpg') }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <div class="review_content">
                                                        <div class="review_name">Emilia Clarke</div>
                                                        <div class="review_rating_container">
                                                            <div class="rating_r rating_r_4 review_rating">
                                                                <i></i><i></i><i></i><i></i><i></i>
                                                            </div>
                                                            <div class="review_time">2 day ago</div>
                                                        </div>
                                                        <div class="review_text">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                                Maecenas
                                                                fermentum
                                                                laoreet.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="reviews_dots"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Recently Viewed -->

                    <div class="viewed">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="viewed_title_container">
                                        <h3 class="viewed_title">Recently Viewed</h3>
                                        <div class="viewed_nav_container">
                                            <div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                            <div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
                                        </div>
                                    </div>

                                    <div class="viewed_slider_container">

                                        <!-- Recently Viewed Slider -->

                                        <div class="owl-carousel owl-theme viewed_slider">

                                            <!-- Recently Viewed Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="viewed_image"><img
                                                            src="{{ asset('frontend/images/view_1.jpg') }}" alt="">
                                                    </div>
                                                    <div class="viewed_content text-center">
                                                        <div class="viewed_price">$225<span>$300</span></div>
                                                        <div class="viewed_name"><a href="#">Beoplay H7</a></div>
                                                    </div>
                                                    <ul class="item_marks">
                                                        <li class="item_mark item_discount">-25%</li>
                                                        <li class="item_mark item_new">new</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Recently Viewed Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="viewed_image"><img
                                                            src="{{ asset('frontend/images/view_2.jpg') }}" alt="">
                                                    </div>
                                                    <div class="viewed_content text-center">
                                                        <div class="viewed_price">$379</div>
                                                        <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
                                                    </div>
                                                    <ul class="item_marks">
                                                        <li class="item_mark item_discount">-25%</li>
                                                        <li class="item_mark item_new">new</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Recently Viewed Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="viewed_image"><img
                                                            src="{{ asset('frontend/images/view_3.jpg') }}" alt="">
                                                    </div>
                                                    <div class="viewed_content text-center">
                                                        <div class="viewed_price">$225</div>
                                                        <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
                                                    </div>
                                                    <ul class="item_marks">
                                                        <li class="item_mark item_discount">-25%</li>
                                                        <li class="item_mark item_new">new</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Recently Viewed Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="viewed_image"><img
                                                            src="{{ asset('frontend/images/view_4.jpg') }}" alt="">
                                                    </div>
                                                    <div class="viewed_content text-center">
                                                        <div class="viewed_price">$379</div>
                                                        <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
                                                    </div>
                                                    <ul class="item_marks">
                                                        <li class="item_mark item_discount">-25%</li>
                                                        <li class="item_mark item_new">new</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Recently Viewed Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="viewed_image"><img
                                                            src="{{ asset('frontend/images/view_5.jpg') }}" alt="">
                                                    </div>
                                                    <div class="viewed_content text-center">
                                                        <div class="viewed_price">$225<span>$300</span></div>
                                                        <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
                                                    </div>
                                                    <ul class="item_marks">
                                                        <li class="item_mark item_discount">-25%</li>
                                                        <li class="item_mark item_new">new</li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <!-- Recently Viewed Item -->
                                            <div class="owl-item">
                                                <div
                                                    class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                                    <div class="viewed_image"><img
                                                            src="{{ asset('frontend/images/view_6.jpg') }}" alt="">
                                                    </div>
                                                    <div class="viewed_content text-center">
                                                        <div class="viewed_price">$375</div>
                                                        <div class="viewed_name"><a href="#">Speedlink...</a></div>
                                                    </div>
                                                    <ul class="item_marks">
                                                        <li class="item_mark item_discount">-25%</li>
                                                        <li class="item_mark item_new">new</li>
                                                    </ul>
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
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
{{-- 
    <script type="text/javascript">
        $(document).ready(function() {
            $('.addcart').on('click', function() {

                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: " {{ url('/add/to/cart/') }}/" + id,
                        type: "GET",
                        datType: "json",
                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener(
                                        'mouseenter', Swal
                                        .stopTimer)
                                    toast.addEventListener(
                                        'mouseleave', Swal
                                        .resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }

                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });

    </script> --}}


<script type="text/javascript">
    
   $(document).ready(function(){
     $('.addcart').on('click', function(){
        var id = $(this).data('id');
        if (id) {
            $.ajax({
                url: " {{ url('/add/to/cart/') }}/"+id,
                type:"GET",
                datType:"json",
                success:function(data){
             const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
                  onOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                  }
                })
             if ($.isEmptyObject(data.error)) {
                Toast.fire({
                  icon: 'success',
                  title: data.success
                })
             }else{
                 Toast.fire({
                  icon: 'error',
                  title: data.error
                })
             }
 
                },
            });
        }else{
            alert('danger');
        }
     });
   });
</script>


    <script type="text/javascript">
        $(document).ready(function() {
            $('.addwishlist').on('click', function() {
                var id = $(this).data('id');
                if (id) {
                    $.ajax({
                        url: " {{ url('add/wishlist/') }}/" + id,
                        type: "GET",
                        datType: "json",
                        success: function(data) {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                onOpen: (toast) => {
                                    toast.addEventListener(
                                        'mouseenter',
                                        Swal
                                        .stopTimer)
                                    toast.addEventListener(
                                        'mouseleave',
                                        Swal
                                        .resumeTimer)
                                }
                            })
                            if ($.isEmptyObject(data.error)) {
                                Toast.fire({
                                    icon: 'success',
                                    title: data.success
                                })
                            } else {
                                Toast.fire({
                                    icon: 'error',
                                    title: data.error
                                })
                            }

                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });

    </script>
@endsection
