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
use App\car;
use App\damage;
use App\deposit;
use App\vehicle_image;
use App\vehicle;
use App\vehicle_type;
use App\auction_vehicle;
use App\auction_vehicle_id;
use App\bid_value;
use App\pre_bid_value;
use App\order;
use Hash;
use DB;
use Mail;
use Carbon\Carbon;
use App\Events\LiveAuction;


class LiveauctionController extends Controller
{

	public function saveBidValue(Request $request){
        // $request->validate([
        //     'busisness_type'=>'required',
        //     'name'=>'required',
        //     'email'=>'required',
        // ]);
        
		date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();

        $bidAmount = (int)$request->bid_amount;
        $public_ip = $_SERVER['REMOTE_ADDR'];

        $bid_value = new bid_value;
        $bid_value->date = date('Y-m-d');
        $bid_value->time = date("h:i A");
        $bid_value->member_id = Auth::user()->id;
        $bid_value->auction_id = $request->auction_id;
        $bid_value->vehicle_id = $request->vehicle_id;
        $bid_value->bid_amount = $request->bid_amount;
        $bid_value->ip_address = $public_ip;
        $bid_value->save();

       $message =  array(
           'user'=>'customer',
           'bid_amount'=> $bidAmount,
           'public_ip'=> $public_ip,
           'bid_id'=> $bid_value->id,
           'vehicle_id'=> $bid_value->vehicle_id,
           'channel_name'=> $request->channel_name,
           'bid_type'=> $request->bidding_type,
       );

        event(new LiveAuction($message));

        return response()->json(Auth::user()->name); 
    }                

    public function bonusTime(Request $request){
          $message =  array(
            'user'=>$request->user,
           'bid_type'=> $request->bidding_type,
           'channel_name'=> $request->channel_name,
           'bid_amount'=> $request->vehicle_price,
       );
           event(new LiveAuction($message));

        return response()->json($message); 
    }
    public function startBid(Request $request){
          $message =  array(
           'user'=>'admin',
           'bid_type'=> 'start',
           'channel_name'=> $request->channel_name,
           'bid_amount'=> $request->vehicle_price,
       );
           event(new LiveAuction($message));

        return response()->json($message); 
    }
    public function nextBid(Request $request){
          $message =  array(
           'user'=>'admin',
           'bid_type'=> 'no-bid',
           'auction_id'=> $request->auction_id,
           'channel_name'=> $request->channel_name,
       );
           event(new LiveAuction($message));

        return response()->json($message); 
    }

    public function updateMonitoringVehicleStatus(Request $request){

        $auction_vehicle_id = auction_vehicle_id::where('auction_id',$request->auction_id)->where('vehicle_id',$request->vehicle_id)->first();
        $auction_vehicle_id->un_bid = 1;
        $auction_vehicle_id->status = 1;
        $auction_vehicle_id->save();

        $auction = auction_vehicle::find($request->auction_id);
        $message =  array(
           'user'=>'admin',
           'bid_type'=> 'no-bid',
           'channel_name'=> $auction->channel_name,
         );
           event(new LiveAuction($message));
        return response()->json('Update Successfully'); 
    }

    public function updateVehicleStatus(Request $request){
        $bid_value = bid_value::find($request->bid_id);
        $bid_value->status = 1;
        $bid_value->save();

        $vehicle = vehicle::find($request->vehicle_id);
        $vehicle->bid_id = $request->bid_id;
        $vehicle->save();

        $auction_vehicle_id = auction_vehicle_id::where('auction_id',$request->auction_id)->where('vehicle_id',$request->vehicle_id)->first();
        $auction_vehicle_id->status = 1;
        $auction_vehicle_id->bid_id = $request->bid_id;
        $auction_vehicle_id->save();

        $order = new order;
        $order->member_id = Auth::user()->id;
        $order->auction_id = $request->auction_id;
        $order->vehicle_id = $request->vehicle_id;
        $order->auction_vehicle_id = $auction_vehicle_id->id;
        $order->bid_id = $request->bid_id;
        $order->amount = $request->bid_amount;
        $order->save();

        $vehicle_count = auction_vehicle_id::where('auction_id',$request->auction_id)->where('status',0)->count();
        if($vehicle_count > 0){
            $auction_vehicle = auction_vehicle::find($request->auction_id);
            $auction_vehicle->status = 1;
            $auction_vehicle->save();
        }
        
        return response()->json('Update Successfully'); 
    }

    public function getLiveAuctions($id)
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $auction = auction_vehicle::where('id',$id)->where('status',0)->first();
        $auction_id = auction_vehicle_id::where('auction_id',$auction->id)->where('status',0)->orderBy('id', 'ASC')->get();

        $auction_count = auction_vehicle_id::where('auction_id',$auction->id)->count();

        $data = array();
        foreach ($auction_id as $key => $value) {
            if($key == 0){
                $vehicle = vehicle::find($value->vehicle_id);
                $vehicle_image = vehicle_image::where('vehicle_id',$value->vehicle_id)->get();
                $car = car::find($vehicle->car_id);
                $damage = damage::all();
                $brand = brand::find($vehicle->brand_id);
                $vehicle_type = vehicle_type::find($vehicle->vehicle_type);
            }
            else{
                $vehicle1= vehicle::find($value->vehicle_id);
                $brand1 = brand::find($vehicle1->brand_id);
                $model1 = car::find($vehicle1->car_id);
                $vehicle_type1 = vehicle_type::find($vehicle1->vehicle_type);

                $data = array(
                    'auction_id' => $auction->id,
                    'vehicle_id' => $vehicle1->id,
                    'price' => $vehicle1->price,
                    'year' => $vehicle1->year,
                    'location' => $vehicle1->location,
                    'odometer' => $vehicle1->odometer,
                    'document_type' => $vehicle1->document_type,
                    'price' => $vehicle1->price,
                    'image' => $vehicle1->image,
                    'sales_type' => $vehicle1->sales_type,
                    'brand' => '',
                    'model' => '',
                    'vehicle_type' => '',
                );

                if(!empty($brand1)){
                    $data['brand'] = $brand1->name;
                }
                if(!empty($model1)){
                    $data['model'] = $model1->name;
                }
                if(!empty($vehicle_type1)){
                    $data['vehicle_type'] = $vehicle_type1->name;
                }
                $datas[] = $data;
            }
        }
        $output = '';
if(!empty($auction_id)){
        $output = '
    <div class="impl_bread_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                <input type="hidden" name="channel_name" value="'.$auction->channel_name.'" id="channel_name">
                    <h1>'.$auction->auction_title.'</h1>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Total Vechle - '.$auction_count.'</a></li>
                        <li class="breadcrumb-item active">1,089 Participants</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
                            if(!empty($vehicle_image)){
                                foreach($vehicle_image as $row){
                                $output.='<div><img style="width: 700px;height: 400px;" src="/vehicle_image/'.$row->image.'" alt=""></div>';
                                }
                            }
                            $output.='</div>
                            <div class="slider slider-nav">';
                            if(!empty($vehicle->image)){
                            $output.='<div>
                                <div class="impl_thumb_ovrly"><img style="width: 100px;height: 100px;" src="/vehicle_image/'.$vehicle->image.'" alt=""></div>
                            </div>';
                            }
                            if(!empty($vehicle_image)){
                                foreach($vehicle_image as $row){
                                $output.='<div>
                                    <div class="impl_thumb_ovrly"><img style="width: 100px;height: 100px;" src="/vehicle_image/'.$row->image.'" alt=""></div>
                                </div>';
                                }
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
                
                            <a href="#"><i class="fa fa-info-circle" aria-hidden="true"></i> Item No : 20</a>
                        </div>
                        <br>
                        <h3>'.$vehicle->sales_type.'</h3>
                        <br>';
                        date_default_timezone_set("Asia/Dubai");
                        date_default_timezone_get();
                        $time = date("h:i A"); 
                        $date = date('Y-m-d'); 
                            $output.='<div id="app"></div>';
                            $output.='<div id="time_runner"></div>';


                            $output.='<input type="hidden" name="current_time" id="current_time" value="'.$time.'" >
       <input type="hidden" name="current_date" id="current_date" value="'.$date.'" >

       <input type="hidden" name="starting_time" id="starting_time" value="'.$auction->starting_time.'" >
       <input type="hidden" name="starting_date" id="starting_date" value="'.$auction->starting_date.'" >
       
       
                            <div id="check_timer">
                        <div style="margin-left: 79px;
    letter-spacing: 1px;
    padding-top: 10px;
    padding-bottom: 10px;display:hidden">
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
        $bid25 = $bid_amount * ($auction->minimum_percentage/100);
        if(Auth::user()->wallet > $bid25){
                        $output.='<div class="row">
                            <div class="col-md-6">
                               
        <input type="hidden" id="min_bid_value" value="'.$vehicle->minimum_bid_value.'">
        <input type="hidden" name="_token" id="token" value="'.csrf_token().'">
        <input type="hidden" name="wallet" id="wallet" value="'.Auth::user()->wallet.'">
        <input type="hidden" name="auction_id" id="auction_id" value="'.$auction->id.'" >    
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
                        
                    </div></div>';
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
                        <h1>Vechle Details</h1>
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
    </div>';

    if(!empty($datas)){
    $output.='<div class="impl_compare_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="impl_heading">
                        <h1>Upcoming Lots</h1>
                    </div>
                </div>';
            foreach($datas as $key => $data){
                $min=$key+1;
             $output.='<div class="col-lg-3 col-md-4">
                <div class="impl_fea_car_box" style="box-shadow: 1px 1px 10px 2px #ffffff;" onclick="viewDetails('.$data['vehicle_id'].')">
                    <div class="impl_fea_car_img ">
                        <img style="width: 300px;height: 150px; padding:10px;cursor: pointer;" src="/vehicle_image/'.$data['image'].'" alt="" class="img-fluid impl_frst_car_img">
                        <span class="impl_pst_date">
                            '.$min.' Min
                        </span>
                    </div>
                    <div class="impl_fea_car_data" style="background: #F44336;">
                        <h2> <a href="javascript:void(null)" onclick="viewDetails('.$data['vehicle_id'].')">'.$data['model'].'</a></h2>
                        <ul>
                            <li><span class="impl_fea_title">Lot</span>
                                <span class="impl_fea_name">'.$data['vehicle_id'].'</span>
                            </li>
                            <li><span class="impl_fea_title">Odo</span>
                                <span class="impl_fea_name">'.$data['odometer'].'</span>
                            </li>
                            <li><span class="impl_fea_title">Current Bid</span>
                                <span class="impl_fea_name">0</span>
                            </li>
                            <li><span class="impl_fea_title">Item</span>
                                <span class="impl_fea_name">0</span>
                            </li>
                        </ul>
                        <h2>'.$data['sales_type'].'</h2>
                        <h2>'.$auction->auction_title.'</h2>
                    </div>
                </div>
            </div>';
            }


           
            $output.='</div>
        </div>
    </div>';
    }
    $output.='<script type="text/javascript" src="/dist/js/custom.js"></script>
        ';
        
        $pre_bid_value = pre_bid_value::where('vehicle_id',$id)->orderBy('bid_amount', 'desc')->first();
        if(!empty($pre_bid_value)){
            $vehicle_price = $pre_bid_value->bid_amount;
        }
        else{
            $vehicle_price = $vehicle->price;
        }
         
         date_default_timezone_set("Asia/Dubai");
         date_default_timezone_get();
         $time = date("h:i A"); 
         $date = date('Y-m-d'); 
         $time_status;
         if(strtotime($time) >= strtotime($auction->starting_time)){
            $time_status=1;
         }else{
            $time_status=0;
         }
}
else{
    return redirect('/auction-complete');

}

         return response()->json(['html'=>$output,'vehicle_price'=>$vehicle_price,'time_status'=>$time_status],200); 
    }

    public function update_v(){
        
      $auctions = auction_vehicle_id::where('auction_id',1)->get();
      foreach($auctions as $row){
          $auction = auction_vehicle_id::find($row->id);
          $auction->status =0;
          $auction->un_bid =0;
          $auction->save();
      }
      return response()->json('200');
    }

    public function thanksPage(){
        return view('page.auction_complete');
    }
    
}
