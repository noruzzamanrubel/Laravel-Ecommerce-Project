<!DOCTYPE html>
<html lang="en">

<head>
    <title>OneTech</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="OneTech shop project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/bootstrap4/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/plugins/slick-1.8.0/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/main_styles.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend/styles/responsive.css') }}">



    <!-- Toastr css -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://js.stripe.com/v3/"></script>
</head>

<body>

    @php
        use App\Models\Admin\Category;
        use App\Models\Wishlist;
        use App\Models\SiteSetting;
        $category = Category::all();
        $setting= SiteSetting::first();
    @endphp

    <div class="super_container">

        <!-- Header -->

        <header class="header">

            <!-- Top Bar -->

            <div class="top_bar">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex flex-row">
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend/images/phone.png') }}" alt="">
                                </div>{{$setting->phone_one}}
                            </div>
                            <div class="top_bar_contact_item">
                                <div class="top_bar_icon"><img src="{{ asset('frontend/images/mail.png') }}" alt="">
                                </div><a href="mailto:fastsales@gmail.com">{{$setting->email}}</a>
                            </div>
                            <div class="top_bar_content ml-auto">
                                @auth
                                    <div class="top_bar_menu">
                                        <ul class="standard_dropdown top_bar_dropdown">
                                            <li>
                                                <a href="" data-toggle="modal" data-target="#exampleModal">My Order
                                                    Tracking</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endauth

                                <div class="top_bar_user">
                                    <div class="user_icon"><img src="{{ asset('frontend/images/user.svg') }}" alt="">
                                    </div>
                                    @auth
                                        <div>
                                            <ul class="standard_dropdown top_bar_dropdown">
                                                <li>
                                                    <a href="{{ route('login') }}">User Profile<i
                                                            class="fas fa-chevron-down"></i></a>
                                                    <ul>
                                                        <li><a href="{{ route('user.wishlist') }}">Wishlist</a></li>
                                                        <li><a href="{{ route('show.cart') }}">Cart</a></li>
                                                        <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    @else
                                        <div><a href="{{ route('login') }}">Sign in/Register</a></div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Header Main -->

            <div class="header_main">
                <div class="container">
                    <div class="row">

                        <!-- Logo -->
                        <div class="col-lg-2 col-sm-3 col-3 order-1">
                            <div class="logo_container">
                                <div class="logo"><a href="{{ url('/') }}"><img
                                            src="{{ asset('frontend/images/logo.png') }}" width="120px" height="120px" alt=""></a></div>
                            </div>
                        </div>

                        <!-- Search -->
                        <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                            <div class="header_search">
                                <div class="header_search_content">
                                    <div class="header_search_form_container">
                                        <form action="#" class="header_search_form clearfix">
                                            <input type="search" required="required" class="header_search_input"
                                                placeholder="Search for products...">
                                            <div class="custom_dropdown">
                                                <div class="custom_dropdown_list">
                                                    <span class="custom_dropdown_placeholder clc">All Categories</span>
                                                    <i class="fas fa-chevron-down"></i>
                                                    <ul class="custom_list clc">
                                                        <li><a class="clc" href="#">All Categories</a></li>
                                                        @foreach ($category as $row)
                                                            <li><a class="clc" href="#">{{ $row->category_name }}</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                            <button type="submit" class="header_search_button trans_300"
                                                value="Submit"><img src="{{ asset('frontend/images/search.png') }}"
                                                    alt=""></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Wishlist -->
                        <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                            <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                                @auth
                                    @php
                                        $wishlist = Wishlist::where('user_id', Auth::id())->get();
                                    @endphp
                                    <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                        <div class="wishlist_icon"><img src="{{ asset('frontend/images/heart.png') }}"
                                                alt=""></div>
                                        <div class="wishlist_content">
                                            <div class="wishlist_text"><a
                                                    href="{{ route('user.wishlist') }}">Wishlist</a>
                                            </div>
                                            <div class="wishlist_count">{{ count($wishlist) }}</div>
                                        </div>
                                    </div>
                                @else

                                @endauth


                                <!-- Cart -->
                                <div class="cart">
                                    <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                        <div class="cart_icon">
                                            <img src="{{ asset('frontend/images/cart.png') }}" alt="">
                                            <div class="cart_count"><span>{{ Cart::count() }}</span></div>
                                        </div>
                                        <div class="cart_content">
                                            <div class="cart_text"><a href="{{ route('show.cart') }}">Cart</a></div>
                                            <div class="cart_price">{{ Cart::subtotal() }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @yield('content')

            <!-- Newsletter -->

            <div class="newsletter">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div
                                class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                                <div class="newsletter_title_container">
                                    <div class="newsletter_icon"><img src="{{ asset('frontend/images/send.png') }}"
                                            alt="">
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
                                    <form method="POST" action="{{ route('newsletter.store') }}"
                                        class="newsletter_form">
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

            <!-- Footer -->

            <footer class="footer">
                <div class="container">
                    <div class="row">

                        <div class="col-lg-3 footer_col">
                            <div class="footer_column footer_contact">
                                <div class="logo_container">
                                    <div class="logo"><a href="{{ url('/') }}"><img
                                                src="{{ asset('frontend/images/logo.png') }}" alt=""></a></div>
                                </div>
                                <div class="footer_title">{{$setting->company_info}}</div>
                                <div class="footer_phone">{{$setting->phone_two}}</div>
                                <div class="footer_contact_text">
                                    <p>{{$setting->company_address}}</p>
                                </div>
                                <div class="footer_social">
                                    <ul>
                                        <li><a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="{{$setting->youtube}}"><i class="fab fa-twitter"></i></a></li>
                                        <li><a href="{{$setting->instagram}}"><i class="fab fa-youtube"></i></a></li>
                                        <li><a href="{{$setting->twitter}}"><i class="fab fa-google"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-2 offset-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Find it Fast</div>
                                <ul class="footer_list">
                                    <li><a href="#">Computers & Laptops</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Smartphones & Tablets</a></li>
                                    <li><a href="#">TV & Audio</a></li>
                                </ul>
                                <div class="footer_subtitle">Gadgets</div>
                                <ul class="footer_list">
                                    <li><a href="#">Car Electronics</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="footer_column">
                                <ul class="footer_list footer_list_2">
                                    <li><a href="#">Video Games & Consoles</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Cameras & Photos</a></li>
                                    <li><a href="#">Hardware</a></li>
                                    <li><a href="#">Computers & Laptops</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="footer_column">
                                <div class="footer_title">Customer Care</div>
                                <ul class="footer_list">
                                    <li><a href="#">My Account</a></li>
                                    <li><a href="#">Order Tracking</a></li>
                                    <li><a href="#">Wish List</a></li>
                                    <li><a href="#">Customer Services</a></li>
                                    <li><a href="#">Returns / Exchange</a></li>
                                    <li><a href="#">FAQs</a></li>
                                    <li><a href="#">Product Support</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </footer>

            <!-- Copyright -->

            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col">

                            <div
                                class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                                <div class="copyright_content">
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());

                                    </script> All rights reserved | This template is made with <i class="fa fa-heart"
                                        aria-hidden="true"></i> by <a href="https://boomdevs.com/"
                                        target="_blank">BoomDevs</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                </div>
                                <div class="logos ml-sm-auto">
                                    <ul class="logos_list">
                                        <li><a href="#"><img src="{{ asset('frontend/images/logos_1.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend/images/logos_2.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend/images/logos_3.png') }}"
                                                    alt=""></a></li>
                                        <li><a href="#"><img src="{{ asset('frontend/images/logos_4.png') }}"
                                                    alt=""></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('order.tracking') }}">
                        @csrf
                        <div class="model-body">
                            <label for="">Status Code</label>
                            <input type="text" name="code" required="" class="form-control"
                                placeholder="Your Order Status Code">
                        </div>
                        <button class="btn btn-danger mt-3" type="submit">Track Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('frontend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/popper.js') }}"></script>
    <script src="{{ asset('frontend/styles/bootstrap4/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TweenMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/TimelineMax.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/scrollmagic/ScrollMagic.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/animation.gsap.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/greensock/ScrollToPlugin.min.js') }}"></script>
    <script src="{{ asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js') }}"></script>
    <script src="{{ asset('frontend/plugins/slick-1.8.0/slick.js') }}"></script>
    <script src="{{ asset('frontend/plugins/easing/easing.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/product_custom.js') }}"></script>
    <script src="{{ asset('frontend/js/cart_custom.js') }}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        @if (Session::has('message'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;
            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;
            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;
            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
            }
        @endif

    </script>

</body>

</html>
