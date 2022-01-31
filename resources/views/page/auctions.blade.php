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
    <link rel="stylesheet" type="text/css" href="dist/js/plugin/nice_select/nice-select.css">
    <link rel="stylesheet" type="text/css" href="dist/css/style.css">
@endsection
@section('content')
    <!------ Breadcrumbs Start ------>
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <h1>Auctions</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">auctions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!------ Sell wrapper  Start ------>
    <div class="impl_sell_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-12 offset-lg-1">
                    <div class="impl_checkout_wrapper" id="impl_sform">
                        
                        <div class="impl_step">
                            <div class="woocommerce">
                                <form>
                                    <h1>Today Auctions</h1>
                                    <table class="table table-bordered shop_table cart">
										<thead>
											<tr>
												<th>Date/Time</th>
                                                <th>Name</th>
                                                <th>Total Cars</th>
                                                <th>View Auction Details</th>
											</tr>
                            @if(!empty($today_auction))                            @foreach($today_auction as $key => $row)
                            <tr>
                                <td>{{$row->starting_date}} / {{$row->starting_time}}</td>
                                <td>{{$row->auction_title}}</td>
                                <td>
                                    <?php 
                                    $x=0;
                                    foreach($auction_id as $value){
                                        if($value->auction_id == $row->id){
                                        $x++;
                                        }
                                    } 
                                    ?>
                                    {{$x}} Vehicles
                                </td>
                                <td>
                                    <a href="/live-auctions/{{$row->id}}"><button type="button" class="impl_btn">View List</button></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4"><center>There are no auctions available Today.</center></td>
                            </tr>
                            @endif
											
										</thead>
                                    </table>
                                    
                                </form>

                                <form>
                                    <h1>Upcoming Auctions</h1>
                                    <table class="table table-bordered shop_table cart">
                                        <thead>
                                            <tr>
                                                <th>Date/Time</th>
                                                <th>Name</th>
                                                <th>Total Cars</th>
                                                <th>View Auction Details</th>
                                            </tr>
                            @if(!empty($upcoming_auction))
                            @foreach($upcoming_auction as $key => $row)
                            <tr>
                                <td>{{$row->starting_date}} / {{$row->starting_time}}</td>
                                <td>{{$row->auction_title}}</td>
                                <td>
                                    <?php 
                                    $x=0;
                                    foreach($auction_id as $value){
                                        if($value->auction_id == $row->id){
                                        $x++;
                                        }
                                    } 
                                    ?>
                                    {{$x}} Vehicles
                                </td>
                                <td>
                                    <a href="/live-auctions/{{$row->id}}"><button type="button" class="impl_btn">View List</button></a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="4"><center>There are no auctions available Upcoming Dates.</center></td>
                            </tr>
                            @endif
                                        </thead>
                                    </table>
                                    
                                </form>

                            </div>
                            <!-- <button type="button" name="next" class="next action-button impl_btn" value="Next" > next</button> -->
                        </div>

                        
                        <!--second step-->
                        <div class="impl_step">
                            <h2 class="step-title">Shipping Details</h2>
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="YOUR NAME*">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="number" class="form-control" placeholder="YOUR MOBILE*">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control" placeholder="YOUR EMAIL*">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="company" class="form-control" placeholder="COMPANY">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group form-group-txtarea">
                                        <textarea name="address" class="form-control" placeholder="ADDRESS*"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="city" class="form-control" placeholder="CITY">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="state" class="form-control" placeholder="STATE">
                                    </div>
                                </div>
                            </div>
                            <button type="button" name="next" class="next action-button impl_btn" value="Next" > next</button>
                        </div>
                        <!--third step-->
                        <div class="impl_step impl_pay_wrapper">
                            <div class="row">
								<div class="col-lg-8 offset-lg-2">
                                <div class="impl_card_type form-group">
                                    <label class="radio_control control_radio">Debit Card
								  <input type="radio" name="radio" checked="checked"/>
								  <span class="control_indicator"></span>
								</label>
                                    <label class="radio_control control_radio">Credit Card
								  <input type="radio" name="radio"/>
								  <span class="control_indicator"></span>
								</label>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="h_name" class="form-control" placeholder="CARD HOLDER'S NAME">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="card_no" class="form-control" placeholder="CARD NUMBER">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="s_code" class="form-control" placeholder="SECURITY CODE">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <div class="pay_select_box custom_select">
                                            <label>EXPIRY DATE</label>
                                            <select>
								  <option data-display="01">01</option>
								  <option value="1">02</option>
								  <option value="2">03</option>
								  <option value="3">04</option>
								  <option value="4">05</option>
								</select>
                                            <select>
								  <option data-display="2017">2017</option>
								  <option value="1">2018</option>
								  <option value="2">2019</option>
								  <option value="3">2020</option>
								  <option value="4">2021</option>
								</select>
                                        </div>
                                    </div>
                                </div>
                            </div>
							</div>
                            <button type="button" name="next" class="next action-button impl_btn" value="Next" > Pay</button>

                        </div>
                        <!--fourth step-->
                        <div class="impl_step impl_print_rcpt">
                            <h1>Thank You For Your Order !</h1>
                            <p>" On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue. “</p>
                            <button type="button" name="next" class="impl_btn">Print REceipt</button>
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
    <script type="text/javascript" src="dist/js/ion.rangeSlider.min.js"></script>
    <script type="text/javascript" src="dist/js/plugin/magnific/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="dist/js/plugin/slick/slick.min.js"></script>
    <script type="text/javascript" src="dist/js/step.js"></script>
    <script type="text/javascript" src="dist/js/plugin/nice_select/jquery.nice-select.min.js"></script>
    <script type="text/javascript" src="dist/js/custom.js"></script>



@endsection
    