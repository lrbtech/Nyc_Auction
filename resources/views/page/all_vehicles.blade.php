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

@endsection
@section('content')
    <!------ Breadcrumbs Start ------>
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>All Vehicles</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Find Vehicles</a></li>
                        <li class="breadcrumb-item active">All Vehicles</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<style type="text/css">
.select2-results{
    color: #000 !important;
}

.select2 {
    -webkit-tap-highlight-color: transparent;
    background-color: #fff;
    border-radius: 5px;
    border: solid 1px #e8e8e8;
    box-sizing: border-box;
    cursor: pointer;
    display: block;
    float: left;
    font-family: inherit;
    font-size: 14px;
    font-weight: normal;
    height: 42px;
    line-height: 40px;
    outline: none;
    padding-left: 18px;
    padding-right: 30px;
    position: relative;
    text-align: left !important;
    -webkit-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    white-space: nowrap;
    width: auto;
}


.select2-container--default .select2-selection--single {
     /*background-color: #fff; 
     border: 1px solid #aaa; 
     border-radius: 4px; */
     background-color: #fff; 
     border: none !important; 
     border-radius: none !important; 
     margin-top: 5px;
}
.select2-selection__arrow{
    margin-top: 5px;
}
</style>

    <!------ Purchase new section Start ------>
    <div class="impl_purchase_wrapper">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-6 col-md-6">
                    <div class="impl_sorting_text custom_select">
                        <span class="impl_show"> Showing 9 of 68 Results</span>
                        <div class="impl_select_wrapper">
                            <span>sort by</span>
                            <select>
						<option value="1">Newest</option>
						<option value="2">New</option>
						<option value="3">Old</option>
						<option value="4">Oldest</option>
					</select>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="col-lg-6 col-md-6">
                    <div class="impl_category_type">
                        <a href="purchase_new.html" class="impl_btn active">new car</a>
                        <a href="purchase_used.html" class="impl_btn impl_used_car">used car</a>
                    </div>
                </div> -->
                <div class="col-lg-12 col-md-12">
                    <div class="impl_purchase_inner">
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <form enctype="multipart/form-data" method="POST" action="/vehicle-search">
                                {{ csrf_field() }}
                                <div class="impl_sidebar">
                                    <div class="impl_product_search widget woocommerce">
                                        <div class="impl_footer_subs">
                                            <input id="lot_number" name="lot_number" type="text" class="form-control" placeholder="Enter Lot Number">
                                            <button id="search_lot" class="foo_subs_btn"><i class="fa fa-search" aria-hidden="true"></i></button>
                                        </div>
                                    </div>
                                    <!--Brands-->
                                    <div class="impl_product_color widget woocommerce">
                                        <h2 class="widget-title">brands</h2>
                                        <ul>
                                            @foreach($brand as $brand1)
                                            <li>
                                                <label class="brnds_check_label">
												{{$brand1->name}}
												<input onclick="changeBrand()" value="{{$brand1->id}}" type="checkbox" name="brand_id[]"> 
												<span class="label-text"></span>
											    </label>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <!--Colors-->
                                    <!-- <div class="impl_product_color widget woocommerce">
                                        <h2 class="widget-title">Brands</h2>
                                        <select onchange="changeBrand()" style="width: 100% !important;" class="select2 form-control" name="brand_id" id="brand_id">
                                        <option>Select Brand</option>
                                        @foreach($brand as $brand1)
                                        <option value="{{$brand1->id}}">{{$brand1->name}}</option>
                                        @endforeach
                                        </select>
                                    </div> -->

                                    <div class="impl_product_color widget woocommerce">
                                        <h2 class="widget-title">Model</h2>
                                        <select style="width: 100% !important;" class="select2 form-control" name="car_id" id="car_id">
                                        <option>Select Model</option>
                                        @foreach($car as $car1)
                                        <option value="{{$car1->id}}">{{$car1->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>

                                    <div class="impl_product_color widget woocommerce">
                                        <h2 class="widget-title">Year</h2>
                                        <select style="width: 100% !important;" class="select2 form-control" name="year" id="year">
                                        <option value="">SELECT YEAR</option>
                                        <?php
                                        $d = date('Y');
                                        for ($x = 1980; $x <= $d; $x++) {
                                        ?>
                                        <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>

                                    <div class="impl_product_color widget woocommerce">
                                        <h2 class="widget-title">Damage</h2>
                                        <select style="width: 100% !important;" class="select2 form-control" name="damage" id="damage">
                                        <option>Select Damage</option>
                                        @foreach($damage as $damage1)
                                        <option value="{{$damage1->id}}">{{$damage1->damage}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    <!--Price Range-->
                                    <!-- <div class="impl_product_price widget woocommerce">
                                        <h2 class="widget-title">price range</h2>
                                        <div class="price_range">
                                            <input type="text" id="range_24" name="price_range" value="" />
                                        </div>
                                    </div> -->

                                    <!--Car Type-->
                                    <!-- <div class="impl_product_type widget woocommerce">
                                        <h2 class="widget-title">car type</h2>
                                        <ul>
                                            <li><a href="#">Hatchback</a></li>
                                            <li><a href="#">Sedan</a></li>
                                            <li><a href="#">MPV</a></li>
                                            <li><a href="#">SUV</a></li>
                                            <li><a href="#">Couple</a></li>
                                            <li><a href="#">Convertible</a></li>
                                        </ul>
                                    </div> -->
                                    <div class="impl_product_color widget woocommerce">
                                        <h2 class="widget-title">Car Type</h2>
                                        <ul>
                                            <li>
                                                <label class="brnds_check_label">
                                                Hatchback
                                                <input value="Hatchback" type="checkbox" name="body_style[]"> 
                                                <span class="label-text"></span>
                                                </label>
                                            </li>
                                            <li>
                                                <label class="brnds_check_label">
                                                Sedan
                                                <input value="Sedan" type="checkbox" name="body_style[]"> 
                                                <span class="label-text"></span>
                                            </label>
                                            </li>
                                            <li>
                                                <label class="brnds_check_label">
                                                MPV
                                                <input value="MPV" type="checkbox" name="body_style[]"> 
                                                <span class="label-text"></span>
                                            </label>
                                            </li>
                                            <li>
                                                <label class="brnds_check_label">
                                                SUV
                                                <input value="SUV" type="checkbox" name="body_style[]"> 
                                                <span class="label-text"></span>
                                            </label>
                                            </li>
                                            <li>
                                                <label class="brnds_check_label">
                                                Couple
                                                <input value="Couple" type="checkbox" name="body_style[]"> 
                                                <span class="label-text"></span>
                                            </label>
                                            </li>
                                            <li>
                                                <label class="brnds_check_label">
                                                Convertible    
                                                <input value="Convertible" type="checkbox" name="body_style[]"> 
                                                <span class="label-text"></span>
                                            </label>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="impl_product_price widget woocommerce">
                                        <div class="impl_fea_btn">
                                            <button type="submit" class="impl_btn">search vehicle</button>
                                        </div>
                                    </div>

                                    
                                </div>
                                </form>
                            </div>
                            <div class="col-lg-9 col-md-8">
                                <div class="row">
                @foreach($vehicle as $index => $vehicle1)

                <div class="col-lg-4 col-md-6">
                    <div class="impl_fea_car_box">
                        <div class="impl_fea_car_img">
                            <img style="object-fit: cover;
  width: 320px;
  height: 180px;" src="{{asset('vehicle_image/').'/'.$vehicle1->image}}" alt="" class="img-fluid impl_frst_car_img" />
                            <!-- <img src="dist/images/product/fea_car1_hover.jpg" alt="" class="img-fluid impl_hover_car_img" /> -->
                            <!-- <span class="impl_img_tag" title="compare"><a href="/compare"><i class="fa fa-exchange" aria-hidden="true"></i></a></span> -->
                        </div>
                        <div class="impl_fea_car_data">
                            <h2><a href="#" onclick="viewDetails({{$vehicle1->id}})">
                    @foreach($car as $car1)
                    @if($car1->id == $vehicle1->car_id)
                    {{$car1->name}}
                    @endif
                    @endforeach
                            </a></h2>
                            <ul>
                                <li><span class="impl_fea_title">model</span>
                                    <span class="impl_fea_name">{{$vehicle1->vehicle_model}}</span></li>
                                <li><span class="impl_fea_title">Vehicle Status</span>
                                    <span class="impl_fea_name">{{$vehicle1->vehicle_status}}</span></li>
                                <li><span class="impl_fea_title">Color</span>
                                    <span class="impl_fea_name">{{$vehicle1->colour}}</span></li>
                            </ul>
                            <div class="impl_fea_btn">
                                <button class="impl_btn"><span class="impl_doller">AED {{$vehicle1->price}} </span><a onclick="viewDetails({{$vehicle1->id}})"><span class="impl_bnw">View Details</span></a></button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                                    
                                    
                <!--pagination start-->
                <div class="col-lg-12 col-md-12">
                    <div class="impl_pagination_wrapper">
                        <nav aria-label="Page navigation example">
                            <!-- <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link active" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul> -->
                            <center>{{$vehicle->setPath(url()->full())}}</center>
                        </nav>
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
	<script type="text/javascript" src="/dist/js/jquery.js"></script>
    <script type="text/javascript" src="/dist/js/popper.js"></script>
    <script type="text/javascript" src="/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/dist/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="/dist/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="/dist/js/custom.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

<script type="text/javascript">
    var dropdownselect2 = $(".select2");
    dropdownselect2.select2();
</script>

<script type="text/javascript">
$( "#search_lot" ).click(function() {
    var lot_number = $('#lot_number').val();
    window.location = "/single-vehicles/"+lot_number;
});

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

function changeBrand(){
  // var id = $('input[name="brand_id[]"]').val();
    var id = [];
    $("input[name='brand_id']:checked").each(function(){
        id.push(this.value);
    });
  $.ajax({
    url : '/get-brand-car',
    type: "GET",
    data: {id:id},
    success: function(data)
    {
        $('#car_id').html(data);
    }
  });
}
</script>
@endsection
    