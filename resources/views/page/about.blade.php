@extends('page.app')
@section('extra-css')

    <link rel="stylesheet" type="text/css" href="dist/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="dist/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" type="text/css" href="dist/js/plugin/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="dist/js/plugin/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="dist/js/plugin/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">
@endsection
@section('content')
    <!------ Breadcrumbs Start ------>
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>About Us</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ About our company Start ------>
    <div class="impl_provide_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1><?php echo html_entity_decode($site_info->about_title); ?></h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="row">
<?php echo html_entity_decode($site_info->about_info); ?>
                        
                        
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="impl_service_video">
                        <div class="impl_video_inner">
                            <div class="impl_servdo_video">
                                <span class="impl_play_icon"><a class="impl-popup-youtube" href="https://www.youtube.com/watch?v=BqjuObIH1nY"><i class="fa fa-play" aria-hidden="true"></i></a></span>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!------ Counter Section Start ------>
    <div class="impl_counter_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cont_box">
                        <div class="impl_count_img">
                            <img src="images/svg/count_car.svg" alt="" />
                        </div>
                        <div class="impl_count_text">
                            <h1 class="count-no" data-to="8210" data-speed="10000">8210</h1>
                            <p>Cars in stock</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cont_box">
                        <div class="impl_count_img">
                            <img src="images/svg/trophy.svg" alt="" />
                        </div>
                        <div class="impl_count_text">
                            <h1 class="count-no" data-to="686" data-speed="10000">686</h1>
                            <p>awards</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cont_box">
                        <div class="impl_count_img">
                            <img src="images/svg/user.svg" alt="" />
                        </div>
                        <div class="impl_count_text">
                            <h1 class="count-no" data-to="6281" data-speed="10000">6281</h1>
                            <p>customers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="impl_cont_box">
                        <div class="impl_count_img">
                            <img src="images/svg/count_car1.svg" alt="" />
                        </div>
                        <div class="impl_count_text">
                            <h1 class="count-no" data-to="4100" data-speed="10000">4100</h1>
                            <p>Cars Repaired</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------ Testimonial Section Start ------>
    <div class="impl_query_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="impl_heading">
                        <h1>Ask An Expert</h1>
                    </div>
                    <div class="impl_query_form">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <input type="text" class="form-control require" name="name" placeholder="Enter Your Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <input type="text" class="form-control require" name="name" placeholder="Enter Your Email">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="input-group">
                                    <textarea class="form-control" placeholder="Enter Your Query"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <input type="hidden" name="form_type" value="contact">
                                <a class="impl_btn submitForm">send</a>
                                <div class="response text-center text-capitalize"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="impl_query_img">
                        <img src="dist/images/query_img.jpg" alt="" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('extra-js')

    <script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript" src="dist/js/popper.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="dist/js/appear.min.js"></script>
    <script type="text/javascript" src="dist/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="dist/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="dist/js/plugin/counter/jquery.countTo.js"></script>
    <script type="text/javascript" src="dist/js/custom.js"></script>

@endsection