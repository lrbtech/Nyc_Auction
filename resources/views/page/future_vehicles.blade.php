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
                    <h1>Future Vehicles</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Find Vehicles</a></li>
                        <li class="breadcrumb-item active">Future Vehicles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Featured Cars Start ------>
    <div class="impl_featured_wrappar">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Future Vehicles</h1>
                    </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6">
                    <div class="impl_fea_car_box">
                        <div class="impl_fea_car_img">
                            <img src="dist/images/product/fea_car1.jpg" alt="" class="img-fluid impl_frst_car_img" />
                            <img src="dist/images/product/fea_car1_hover.jpg" alt=""
                                class="img-fluid impl_hover_car_img" />
                            <span class="impl_img_tag" title="compare"><i class="fa fa-exchange"
                                    aria-hidden="true"></i></span>
                        </div>
                        <div class="impl_fea_car_data">
                            <h2><a href="purchase_new.html">Aurora</a></h2>
                            <ul>
                                <li><span class="impl_fea_title">model</span>
                                    <span class="impl_fea_name">Aurora 811</span></li>
                                <li><span class="impl_fea_title">Vehicle Status</span>
                                    <span class="impl_fea_name">new</span></li>
                                <li><span class="impl_fea_title">Color</span>
                                    <span class="impl_fea_name">white</span></li>
                            </ul>
                            <div class="impl_fea_btn">
                                <button class="impl_btn"><span class="impl_doller">AED 72000 </span><a href="single-vehicles"><span class="impl_bnw">View Details</span></a></button>
                            </div>
                        </div>
                    </div>
                </div> -->
                    
                @foreach($vehicle as $index => $vehicle1)
                <div class="col-lg-4 col-md-6">
                    <div class="impl_fea_car_box">
                        <div class="impl_fea_car_img">
                            <img style="width: 350px;height: 200px;" src="{{asset('vehicle_image/').'/'.$vehicle1->image}}" alt="" class="img-fluid impl_frst_car_img" />
                            <!-- <img src="{{asset('vehicle_image/').'/'.$vehicle1->image}}" alt=""
                                class="img-fluid impl_hover_car_img" /> -->
                            <!-- <span class="impl_img_tag" title="compare"><i class="fa fa-exchange" aria-hidden="true"></i></span> -->
                        </div>
                        <div class="impl_fea_car_data">
                            <h2><a href="#" onclick="viewDetails({{$vehicle1->id}})">
                    @foreach($car as $car1)
                    @if($car1->id == $vehicle1->car_id)
                    {{$car1->name}}
                    @endif
                    @endforeach</a></h2>
                            <ul>
                                <li><span class="impl_fea_title">model</span>
                                    <span class="impl_fea_name">{{$vehicle1->vehicle_model}}</span></li>
                                <li><span class="impl_fea_title">Vehicle Status</span>
                                    <span class="impl_fea_name">{{$vehicle1->vehicle_status}}</span></li>
                                <li><span class="impl_fea_title">Color</span>
                                    <span class="impl_fea_name">{{$vehicle1->colour}}</span></li>
                            </ul>
                            <div class="impl_fea_btn">
                                <button class="impl_btn"><span class="impl_doller">AED {{$vehicle1->price}} </span><a href="#" onclick="viewDetails({{$vehicle1->id}})"><span class="impl_bnw">View Details</span></a></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>

<style type="text/css">
    .product_view .modal-dialog{max-width: 800px; width: 100%;}
    .pre-cost{text-decoration: line-through; color: #a5a5a5;}
    .space-ten{padding: 10px 0;}
</style>
<div class="modal fade product_view" id="popup_modal">
    <div class="modal-dialog">
        <div class="modal-content" id="view-details">
            
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

<script type="text/javascript">
function viewDetails(id)
{
    $.ajax({
    url : '/vehicle-quick-view/'+id,
    type: "GET",
    success: function(data)
    {
        $('#view-details').html(data);
        $('#popup_modal').modal('show');
    }
  });
}
</script>
@endsection
    