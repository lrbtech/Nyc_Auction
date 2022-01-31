<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\slider;
use App\site_info;
use App\blog;
use App\member_password;
use App\User;
use App\brand;
use App\pre_bid_value;
use App\car;
use App\damage;
use App\deposit;
use App\vehicle_image;
use App\vehicle;
use App\vehicle_type;
use App\auction_vehicle;
use App\auction_vehicle_id;
use App\bid_value;
use Hash;
use DB;
use Mail;
use App\Events\LiveAuction;


class PreauctionController extends Controller
{

    public function savePreBidValue(Request $request){
		date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();

        $public_ip = $_SERVER['REMOTE_ADDR'];

        $pre_bid_value = new pre_bid_value;
        $pre_bid_value->date = date('Y-m-d');
        $pre_bid_value->time = date("h:i A");
        $pre_bid_value->member_id = Auth::user()->id;
        $pre_bid_value->vehicle_id = $request->vehicle_id;
        $pre_bid_value->bid_amount = $request->bid_amount;
        $pre_bid_value->ip_address = $public_ip;
        $pre_bid_value->save();

        return response()->json(Auth::user()->name); 
    }

    public function getPreAuctions($id)
    {
        $vehicle = vehicle::find($id);
        $vehicle_image = vehicle_image::where('vehicle_id',$id)->get();
        $car = car::find($vehicle->car_id);
        $damage = damage::all();
        $brand = brand::find($vehicle->brand_id);
        $vehicle_type = vehicle_type::find($vehicle->vehicle_type);

    $output = '
    <div class="impl_buy_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="impl_carparts_inner">
                        <div class="impl_buy_old_car">
                            <div class="slider slider-for">';
                                if(!empty($vehicle->image)){
                                $output.='<div><img style="width: 700px;height: 400px;" src="/vehicle_image/'.$vehicle->image.'" alt=""></div>';
                                }
                                foreach($vehicle_image as $row){
                                $output.='<div><img style="width: 700px;height: 400px;" src="/vehicle_image/'.$row->image.'" alt=""></div>';
                                }
                            $output.='</div>
                            <div class="slider slider-nav">';
                                if(!empty($vehicle->image)){
                                $output.='<div>
                                    <div class="impl_thumb_ovrly"><img style="width: 100px;height: 100px;" src="/vehicle_image/'.$vehicle->image.'" alt=""></div>
                                </div>';
                                }
                                foreach($vehicle_image as $row){
                                $output.='<div>
                                    <div class="impl_thumb_ovrly"><img style="width: 100px;height: 100px;" src="/vehicle_image/'.$row->image.'" alt=""></div>
                                </div>';
                                }
                            $output.='</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="impl_buycar_data">
                        <h1>'.$brand->name.' , '.$car->name.' </h1>
                        <div class="car_emi_wrapper">
                            <span>Lot: '.$vehicle->id.' </span>
                
                            <a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Starting Bid Value : AED '.$vehicle->price.'</a>
                        </div>
                        <br>
                        <h3>'.$vehicle->sales_type.'</h3>
                        <br>';

                        $pre_bid_value = pre_bid_value::where('vehicle_id',$id)->orderBy('bid_amount', 'desc')->first();
                        if(!empty($pre_bid_value)){
                            $output.='<input type="hidden" name="vehicle_price" id="vehicle_price" value="'.$pre_bid_value->bid_amount.'">';
                            $bid_amount = $vehicle->minimum_bid_value + $pre_bid_value->bid_amount;
                            $output.='<h5 style="padding-bottom: 10px;">Latest Bid Value : '.$pre_bid_value->bid_amount.' AED</h5><br>';
                        }
                        else{
                            $output.='<input type="hidden" name="vehicle_price" id="vehicle_price" value="'.$vehicle->price.'">';
                            $bid_amount = $vehicle->minimum_bid_value + $vehicle->price;
                        }

                        $output.='<div id="app"></div>
                     
                    <div style="margin-left: 79px;
    letter-spacing: 1px;
    padding-top: 10px;
    padding-bottom: 10px;">
                        <h5 style="color:#ed3833">All Bids in AED</h5>
                        <br>';
                        if(!\Auth::check()){
                        $output.='<h5>Sign in to Bid</h5>';
                        }else{
                        $output.='<h5 style="margin-left: -78px;
    padding-bottom: 10px;">Minimum Bid Value : '.$vehicle->minimum_bid_value.' AED</h5>';
                        }
                    $output.='</div>';
                    if(\Auth::check()){
        $pre_bid_value = pre_bid_value::where('vehicle_id',$id)->orderBy('bid_amount', 'desc')->first();
        $bid_amount=0;
        if(!empty($pre_bid_value)){
            $bid_amount = $vehicle->minimum_bid_value + $pre_bid_value->bid_amount;
        }
        else{
            $bid_amount = $vehicle->minimum_bid_value + $vehicle->price;
        }
        if(Auth::user()->wallet > $vehicle->minimum_bid_value){
$output.='<div class="row">
    <div class="col-md-6">
        <input type="hidden" id="min_bid_value" value="'.$vehicle->minimum_bid_value.'">
        <input type="hidden" name="_token" id="token" value="'.csrf_token().'">
        <input type="hidden" name="wallet" id="wallet" value="'.Auth::user()->wallet.'">
        <input type="hidden" name="vehicle_id" id="vehicle_id" value="'.$vehicle->id.'" >

                <div class="input-group">
                    <input style="width:300x !important;" name="bid_amount" id="bid_amount" type="text" value="'.$bid_amount.'" class="form-control" readonly aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" onclick=btnMinus()><i class="fa fa-minus" aria-hidden="true"></i></button>
                        <button class="btn btn-outline-secondary" type="button" onclick=btnPlus()><i class="fa fa-plus" aria-hidden="true"></i></button>
                    </div>
                </div></div>
                      
                        </div>
                        <br>
                        <button style="margin-left: 70px;" onclick="SaveBid()" id="saveBid" type="button" class="btn btn-primary impl_btn">Bid Now</button>';
        }
        else{
            $output.='<h5>You are Not Eligible to Bid</h5>';
        }
                    }else{

                        $output.='<div class="impl_old_buy_btn">
                            <a href="/login" class="impl_btn">Sign In</a>
                            <a href="/member-registration" class="impl_btn">Register</a>
                            
                        </div>';
                        }
                    $output.='</div>
                </div>
            </div>
        </div>
    </div>


    <div class="impl_descrip_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>VEHICLE Details</h1>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="impl_descrip_box">
                        <h2>Car Brand</h2>
                    <p>'.$brand->name.'</p>
                    <p>'.$car->name.'</p>
                    <p>'.$vehicle->year.'</p>
                    <p>'.$vehicle->vin.'</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="impl_descrip_box">
                        <h2>Location</h2>
                        <p>'.$vehicle->location.'</p>
                        <p>Doc Type : '.$vehicle->document_type.'</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3">
                    <div class="impl_descrip_box">
                        <h2>FUEL ECONOMY</h2>
                        <p>'.$vehicle->fuel.'</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="impl_descrip_box">
                        <h2>ENGINE TYPE</h2>
                        <p>'.$vehicle->engine_type.'</p>
                        <p>'.$vehicle->cylinders.'</p>
                        <p>'.$vehicle->drive.'</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3">
                    <div class="impl_descrip_box">
                        <h2>TRANSMISSION</h2>
                        <p>'.$vehicle->transmission.'</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>Colour</h2>
                        <p>'.$vehicle->exterior_color.'</p>
                        <p>'.$vehicle->interior_color.'</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>VEHICLE TYPE</h2>
                    <p>'.$vehicle_type->name.'</p>
                    <p>'.$vehicle->body_type.'</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>HIGHLIGHTS</h2>
                        <p>'.$vehicle->highlights.'</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4">
                    <div class="impl_descrip_box">
                        <h2>ODOMETER</h2>
                        <p>'.$vehicle->odometer.'</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Additional Info</h1>
                    </div>';
                $output.= '<div style="padding-left:30px;">'.html_entity_decode($vehicle->description).'</div>';
                $output.='</div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/dist/js/custom.js"></script>
        ';


    	$vehicle_price = $vehicle->price;
        return response()->json(['html'=>$output,'vehicle_price'=>$vehicle_price],200); 
    }
}
