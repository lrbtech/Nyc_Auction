@extends('page.app')
@section('extra-css')

    <link rel="stylesheet" type="text/css" href="/dist/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/ion.rangeSlider.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/ion.rangeSlider.skinFlat.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/magnific/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="/dist/js/plugin/slick/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/dist/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('toastr/toastr.css')}}">
@endsection
@section('content')
    <!------ Breadcrumbs Start ------>
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Member Login</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Create New Password</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Testimonial Section Start ------>
    <div class="impl_query_wrapper">
        <div class="container">
            <div class="row">
            	<?php
                $today = date('Y-m-d');
                ?>
                @if($member->status == '0')
                @if($member->end_date >= $today)
                <div class="col-lg-6 col-md-12">
                    <div class="impl_heading">
                        <h1>Create Password</h1>
                    </div>
                    <div class="impl_query_form">
                    <form id="form" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" value="{{$id}}">
                    <input type="hidden" name="member_id" id="member_id" value="{{$member->member_id}}">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <label>New Password</label>
                                <div class="input-group">
				                    <input class="form-control" type="password" name="password" id="password">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Confirm Password</label>
                                <div class="input-group">
				                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br>
                                <div class="input-group">
                                    <button onclick="Save()" type="button" class="btn btn-primary glow position-relative w-100">New Password</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
                @else
                <center>Your Link has Expired</center>
                @endif
                @else
                <center>Already Register Your Password</center>
                @endif


            </div>
        </div>
    </div>
@endsection
@section('extra-js')

    <script type="text/javascript" src="/dist/js/jquery.js"></script>
    <script type="text/javascript" src="/dist/js/popper.js"></script>
    <script type="text/javascript" src="/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/dist/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="/dist/js/appear.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/counter/jquery.countTo.js"></script>
    <script type="text/javascript" src="/dist/js/custom.js"></script>
    <script src="{{ asset('toastr/toastr.min.js')}}"></script>
<script type="text/javascript">
// $('.salon').addClass('active');


function Save(){
  var formData = new FormData($('#form')[0]);
    $.ajax({
        url : '/member-update-password',
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType: "JSON",
        success: function(data)
        {                
            $("#form")[0].reset();
            // $('#popup_modal').modal('hide');
            // $('.zero-configuration').load(location.href+' .zero-configuration');
            toastr.success(data, 'Successfully Update');
            window.location.href="/login";
        },error: function (data) {
            var errorData = data.responseJSON.errors;
            $.each(errorData, function(i, obj) {
            toastr.error(obj[0]);
      });
    }
    });
}
</script>
@endsection