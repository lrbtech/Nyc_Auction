@extends('page.app')
@section('extra-css')
	<link rel="stylesheet" type="text/css" href="dist/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">
@endsection
@section('content')
    <!------ Breadcrumbs Start ------>
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Member</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Member Registration</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Contact Wrapper Start ------>
    <div class="impl_contact_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <div class="">
                        <div class="col-lg-12 col-md-12">
                            <h1 style="text-align:center;">Thanks for joining the Newyork Car Auction</h1>
                            <br><br>
                            <h4 style="text-align:center;">Please Check your mail and verify your Accouunt</h4>
                        </div>
                    </div>
                </div>
             
            </div>
        </div>
    </div>
    
@endsection
@section('extra-js')

<!--Main js file Style-->
    <script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript" src="dist/js/popper.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="dist/js/contact_form.js"></script>
    <script type="text/javascript" src="dist/js/custom.js"></script>
    <!--Main js file End-->
    
@endsection