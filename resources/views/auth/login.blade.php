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
                    <!-- <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Create New Password</li>
                    </ol> -->
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
                        <h1>Member Login</h1>
                    </div>
                    <div class="impl_query_form">
                    <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Email ID</label>
                                <div class="input-group">
                                    <input class="input100 @error('email') is-invalid @enderror form-control" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                   
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <label>Password</label>
                                <div class="input-group">
                                    <input id="password" type="password" class="input100 @error('password') is-invalid @enderror form-control" name="password" required autocomplete="current-password">
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="text-center p-t-12">
                                    @if (Route::has('password.request'))
                                        <a class="txt2" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <br>
                                <div class="input-group">
                                    <button type="submit" class="btn btn-primary glow position-relative w-100">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>


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