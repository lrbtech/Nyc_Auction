@extends('page.app')
@section('extra-css')

    <link rel="stylesheet" type="text/css" href="dist/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="dist/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" type="text/css" href="dist/js/plugin/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="dist/js/plugin/nice_select/nice-select.css">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">
@endsection
@section('content')
    <!------ Breadcrumbs Start ------>
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>How It Works</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Support</a></li>
                        <li class="breadcrumb-item active">How It Works</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div  class="impl_featured_wrappar">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>How It Works</h1>
                    </div>
                </div> -->
    <!--sign-in form-->

<style type="text/css">
.impl_heading {
	width:100% !important; 
    text-align:left !important;
    /*color: #000;*/
}
</style>       
                
                <div class="impl_heading">
                    <!-- <h2>Welcome To New York Car Auction</h2> -->
                    
<?php echo html_entity_decode($site_info->how_it_works); ?>
                    <!-- <div class="impl_sign_bottom">
                        <h3>It’s Not Just A Car </h3>
                        <h3>It’s Someone’s Dream</h3>
                    </div> -->
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
    <script type="text/javascript" src="dist/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="dist/js/plugin/nice_select/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="dist/js/custom.js"></script>

@endsection
    