<!DOCTYPE html>
<html lang="en">

<head>
    <title>New York Car Auction</title>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="New York Car Auction">
    <meta name="keywords" content="">
    <meta name="author" content="hsoft">
    <meta name="MobileOptimized" content="320">
    <!--Srart Style -->
    
    @yield('extra-css')
    <style>
        .login-text{
    font-weight: 700;
    margin-right: 10px;
    margin-top: 2px;
        }
/* Responsive css starts here */

@media screen and (max-width: 460px){
    ul.impl_header_icons li{
    margin-right: 0;
    width: 50%;
    float: left;
    height: 58px;
    text-align: center;
    margin-top: 10px;
    margin-bottom: 12px;
    border: 1px solid #565656;
    vertical-align: middle;
    padding: 14px;
    position: relative;
    }
    ul.impl_header_icons li a {
    display: block;
}
ul.impl_header_icons li span{
    float: none;
}
.impl_top_header{
    border-bottom: 1px solid #565656;
}
.impl_menu_wrapper {
    width: 100%;
    background-color: #151515;
}
.impl_menu_btn {
    top: 12px;
}
.impl_menu_btn:hover{
    color: #ffffff;
}

.impl_search_box .select2{
    width: 100%;
    margin-left: 0;
}
.impl_fea_car_data ul li{
    float: left;
    text-align: left;
}
.impl_featured_wrappar {
    padding: 25px 15px 50px;
    background-color: #0a0a0a;
}
.impl_provide_wrapper{
    padding: 25px 15px 50px;
}

.impl_logo_responsive img{
    max-width: 80%;
    height: auto;
    text-align: left;
    float: left;
}
.impl_menu_btn {
    top: 50%;
    margin-top: -10px;
    font-size: 25px;
}


}

/* Responsive end here */
    </style>
    
    <!-- Favicon Link -->
    <link rel="shortcut icon" type="image/png" href="/dist/images/favicon.png">

    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.css')}}">

</head>

<body>
    <!------ Preloader Start ------>
    <div id="preloader">
        <div id="status">
            <img src="/upload_image/{{$site_infos->logo}}" alt="" />
            <div class="loader">
                Loading...
                <div class="ball"></div>
                <div class="ball"></div>
                <div class="ball"></div>
            </div>
        </div>
    </div>
    <!------ Header Start ------>
    <div class="impl_header_wrapper">
        <div class="impl_logo">
            <a href="/"><img style="width: 230px;" src="/dist/images/logo.png" alt="Logo" class="img-fluid"></a>
        </div>
        <div class="impl_top_header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="impl_top_info">
                            {{-- <ul class="impl_header_social">
                                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                            </ul> --}}
                            <p class="impl_header_time"><i class="fa fa-clock-o" aria-hidden="true"></i> Working Hours -
                                6 AM To 8 PM <span>sunday closed</span></p>
                            <ul class="impl_header_icons">
                                <!-- <li class="impl_search"><span><i class="fa fa-search" aria-hidden="true"></i></span>
                                </li> -->
                                <!-- <li><a href="/compare"><i class="fa fa-exchange" aria-hidden="true"></i></a></li> -->
                                <li><a href="/"><img style="width: 100px;" src="/dist/images/app-store.png"></a></li>
                                <li><a href="/"><img style="width: 100px;" src="/dist/images/play-store.png"></a></li>

                                <!-- <li class="cart-popup"><a href="#"><i class="fa fa-shopping-cart"
                                            aria-hidden="true"></i></a>
                                    <div class="cart-box">
                                        <div class="popup-container">
                                            <div class="cart-entry">
                                                <a href="#" class="image">
                                                    <img src="http://via.placeholder.com/70x60" alt="">
                                                </a>
                                                <div class="content">
                                                    <a href="#" class="title">Serpent</a>
                                                    <p class="quantity">Quantity: 1</p>
                                                    <span class="price">$4500.00</span>
                                                </div>
                                                <div class="button-x">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="cart-entry">
                                                <a href="#" class="image">
                                                    <img src="http://via.placeholder.com/70x60" alt="">
                                                </a>
                                                <div class="content">
                                                    <a href="#" class="title">Empire</a>
                                                    <p class="quantity">Quantity: 1</p>
                                                    <span class="price">$900.00</span>
                                                </div>
                                                <div class="button-x">
                                                    <i class="fa fa-times-circle" aria-hidden="true"></i>
                                                </div>
                                            </div>
                                            <div class="summary">
                                                <div class="subtotal">Sub Total</div>
                                                <div class="price-s">$5100.0</div>
                                            </div>
                                            <div class="cart-buttons">
                                                <a href="checkout.html" class="btn impl_btn">View Cart</a>
                                                <a href="checkout.html" class="btn impl_btn">Checkout</a>
                                                <div class="clear"></div>
                                            </div>
                                        </div>
                                    </div>
                                </li> -->
                                <!-- <li><a href="#signin" data-toggle="modal"> <span class="login-text">LOGIN</span>  <i style="font-size: 24px;" class="fa fa-sign-in" aria-hidden="true"></i></a></li> -->
                                @if(\Auth::check())
                                  <li>
                                  <p>Welcome {{\Auth::user()->name}}</p>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> <span class="login-text" style="margin-top: -17px;margin-left:20px;">Logout</span>  
                                        <i class="fa fa-sign-out" aria-hidden="true" style="position: absolute;top: 24px;"></i>
                                    </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                                </li>
                                @else
                                <li>
                                    <a href="/login"> <span class="login-text">LOGIN</span>  
                                        <i style="font-size: 24px;" class="fa fa-sign-in" aria-hidden="true"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="/member-registration"> <span class="login-text">SIGNUP</span>  
                                        <i style="font-size: 20px;" class="fa fa-user-plus" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                            @endif
                            <!-- <div class="impl_search_overlay">
                                <div class="impl_search_area">
                                    <div class="srch_inner">
                                        <form action="#">
                                            <input type="text" placeholder="Search here... ">
                                            <button type="submit"><i class="fa fa-search"
                                                    aria-hidden="true"></i></button>
                                        </form>
                                        <div class="srch_close_btn">
                                            <span class="srch_close_btn_icon"><i class="fa fa-times"
                                                    aria-hidden="true"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--sign-in form-->
        <div class="modal" id="signin">
            <div class="impl_signin">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="impl_sign_form">
                    <h1>Sign In</h1>
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                        <span class="form_icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                        <span class="form_icon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="forget_password">
                        <div class="remember_checkbox">
                            <label>Keep me signed in
                                <input type="checkbox">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <a href="#">Forgot Password ?</a>
                    </div>
                    <a href="#" class="impl_btn">submit</a>
                    <p>Dont Have An Account? <a class="impl_modal" href="#signup" data-toggle="modal">Sign Up</a></p>
                </div>
                <div class="impl_sign_img">
                    <h2>Welcome To New York Car Auction</h2>
                    <p>A Perfect Zone To Buy Cars</p>
                    <div class="impl_sign_bottom">
                        <h3>It’s Not Just A Car </h3>
                        <h3>It’s Someone’s Dream</h3>
                    </div>
                </div>
            </div>
        </div>
        <!--sign-up form-->
        <div class="modal" id="signup">
            <div class="impl_signin">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <div class="impl_sign_form">
                    <h1>Sign up</h1>
                    <div class="form-group">
                        <input type="text" placeholder="Username" class="form-control">
                        <span class="form_icon">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Email" class="form-control">
                        <span class="form_icon">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Password" class="form-control">
                        <span class="form_icon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="password" placeholder="Confirm Password" class="form-control">
                        <span class="form_icon">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>
                    <a href="#" class="impl_btn">sign up</a>
                    <p>Dont Have An Account? <a href="#signup" data-toggle="modal" class="impl_modal">Sign Up</a></p>
                </div>
                <div class="impl_sign_img">
                    <h2>Welcome To New York Car Auction</h2>
                    <p>A Perfect Zone To Buy Cars</p>
                    <div class="impl_sign_bottom">
                        <h3>It’s Not Just A Car </h3>
                        <h3>It’s Someone’s Dream</h3>
                    </div>
                </div>
            </div>
        </div>
        <!--menu start-->
        <div class="impl_menu_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <button class="impl_menu_btn">
                            <i class="fa fa-car" aria-hidden="true"></i>
                            <i class="fa fa-bars" aria-hidden="true"></i>
                        </button>
                        <div class="impl_menu_inner">
                            <div class="impl_logo_responsive">
                                <a href="/"><img src="/upload_image/{{$site_infos->logo}}" alt="Logo" class="img-fluid"></a>
                            </div>
                            <a href="/auctions" class="impl_btn">Auctions</a>
                            <div class="impl_menu">
                                <nav>
                                    <div class="menu_cross">
                                        <i class="fa fa-times" aria-hidden="true"></i>
                                    </div>
                                    <ul>
                                        <li class="active"><a href="/">Home</a></li>
                                        <li class="dropdown"><a href="javascript:;">Find Vehicles</a>
                                            <ul class="sub-menu">
                                                <li><a href="/all-vehicles">All Vehicles</a></li>
                                                <li><a href="/future-vehicles">Future Vehicles</a></li>
                                                <!-- <li><a href="/buy-now-cars">Buy Now Cars</a></li> -->
                                            </ul>
                                        </li>
                                       
                                        <!-- <li><a href="/shipping">Shipping</a></li> -->
                                        <li class="dropdown"><a href="javascript:;">Support</a>
                                            <ul class="sub-menu">
                                                <li><a href="/how-it-works">How it Works</a></li>
                                                <li><a href="/services">Services</a></li>
                                                <li><a href="/member-fees">Member Fees</a></li>
                                                <li><a href="/terms-and-conditions">Terms and Conditions</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/about-us">About Us</a></li>
                                        <!-- <li><a href="/member-registration">Member Registration</a></li> -->
                                        <li><a href="/contact">Contact Us</a></li>
                                        @if(\Auth::check())
                                        <li><a href="/member/dashboard">My Account</a></li>
                                        @endif
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@yield('content')

  
<!------ Footer Section Start ------>
    <div class="impl_footer_wrapper">
        <!-- <div class="impl_social_wrapper">
            <ul>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-rss" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
        </div> -->
        <div class="impl_foo_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="impl_foo_box footer_abt_text">
                            <a href="#"><img src="/upload_image/{{$site_infos->logo}}" alt=""></a>
                            <p>New York car auction running successfully and properly serve our customers. We are selling many thousand of vehicles every year. Now run five auctions a week, handling everything, imported vehicles and occasional classic car auctions too.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="impl_foo_box">
                            <h1 class="impl_foo_title">Basic Information</h1>
                            <ul>
                                <li><a href="/"><i class="fa fa-angle-right" aria-hidden="true"></i> Home</a></li>
                                <li><a href="/about-us"><i class="fa fa-angle-right" aria-hidden="true"></i> About Us</a></li>
                                <li><a href="/all-vehicles"><i class="fa fa-angle-right" aria-hidden="true"></i> Find Vehicles</a></li>
                                <li><a href="/how-it-works"><i class="fa fa-angle-right" aria-hidden="true"></i> Hoiw it Works</a></li>
                                <li><a href="/services"><i class="fa fa-angle-right" aria-hidden="true"></i> Services</a></li>
                                <li><a href="/member-fees"><i class="fa fa-angle-right" aria-hidden="true"></i> Member Fees</a></li>
                                <li><a href="/terms-and-conditions"><i class="fa fa-angle-right" aria-hidden="true"></i> Terms and Conditions</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="impl_foo_box">
                            <h1 class="impl_foo_title">contact us</h1>
                            <ul>
                                <li>
                                    <div class="impl_foo_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                    <div class="impl_foo_text">
                                        <p>{{$site_infos->mobile_1}}</p>
                                        <p>{{$site_infos->mobile_2}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="impl_foo_icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                    <div class="impl_foo_text">
                                        <p>{{$site_infos->address}} <br> {{$site_infos->city}} , {{$site_infos->state}}</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="impl_foo_icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <div class="impl_foo_text">
                                        <a href="#">{{$site_infos->email_1}}</a>
                                        <a href="#">{{$site_infos->email_2}}</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="impl_foo_box">
                            <h1 class="impl_foo_title">Subscribe </h1>
                            <p>If you need for auction, click subscribe our New York City Car Auction. You will get updated information from us and will get future privileges through our website or our mobile app</p>
                            <div class="impl_footer_subs">
                                <input type="text" class="form-control" placeholder="Enter Your Email">
                                <button class="foo_subs_btn"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!----Bottom Footer Start---->
    <div class="impl_btm_footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <p class="impl_copyright">Copyright &copy; 2020 New York Car Auction. All Rights Reserved Developed By <a target="_blank" href="/member/dashboard">LRBINFOTECH</a></p>
                </div>
            </div>
        </div>
    </div>
    <!---- Go To Top---->
    <span class="gotop"><img src="{{ asset('dist/images/goto.png')}}" alt=""></span>

    
@yield('extra-js')
    <script src="{{ asset('toastr/toastr.min.js')}}" type="text/javascript"></script>
</body>

</html>