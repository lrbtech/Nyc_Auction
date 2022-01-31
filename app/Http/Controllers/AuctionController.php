<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\auction_vehicle;
use App\auction_vehicle_id;
use App\brand;
use App\car;
use App\vehicle;
use App\vehicle_type;
use App\order;
use App\User;
use App\vehicle_image;
use App\damage;
use App\bid_value;
use Auth;
use DB;


class AuctionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function saveAuction(Request $request){
        $this->validate($request, [
            'auction_title'=>'required',
            'starting_date'=>'required',
            'starting_time'=>'required',
            'channel_name'=>'required',
            'minimum_percentage'=>'required',
            'vehicle_id.*' => 'required' 
          ],[
            'vehicle_id.*.required' => 'Required atleast 1 Vehicle is Mandatory',
        ]);

        $auction = new auction_vehicle;
        $auction->auction_title = $request->auction_title;
        $auction->starting_date = $request->starting_date;
        $auction->starting_time = $request->starting_time;
        $auction->channel_name = $request->channel_name;
        $auction->minimum_percentage = $request->minimum_percentage;
        $auction->save();

        for ($x=0; $x<count($_POST['vehicle_id']); $x++) 
        {
            $auction_vehicle_id = new auction_vehicle_id;
            $auction_vehicle_id->auction_id = $auction->id;
            $auction_vehicle_id->vehicle_id = $_POST['vehicle_id'][$x];

            if($_POST['vehicle_id'][$x]!=""){
                $auction_vehicle_id->save();
            }
        }
        return response()->json('successfully save'); 
    }

    public function updateAuction(Request $request){
        $this->validate($request, [
            'auction_title'=>'required',
            'starting_date'=>'required',
            'starting_time'=>'required',
            'channel_name'=>'required',
            'minimum_percentage'=>'required',
            'vehicle_id.*' => 'required', 
          ],[
            'vehicle_id.*.required' => 'Required atleast 1 Vehicle is Mandatory',
        ]);
        
        $auction = auction_vehicle::find($request->id);
        $auction->auction_title = $request->auction_title;
        $auction->starting_date = $request->starting_date;
        $auction->starting_time = $request->starting_time;
        $auction->channel_name = $request->channel_name;
        $auction->minimum_percentage = $request->minimum_percentage;
        $auction->save();
        
        auction_vehicle_id::where('auction_id',$request->id)->delete();
        
        for ($x=0; $x<count($_POST['vehicle_id']); $x++) 
        {
            $auction_vehicle_id = new auction_vehicle_id;
            $auction_vehicle_id->auction_id = $auction->id;
            $auction_vehicle_id->vehicle_id = $_POST['vehicle_id'][$x];

            if($_POST['vehicle_id'][$x]!=""){
                $auction_vehicle_id->save();
            }
        }
        return response()->json('successfully update'); 
    }

    public function viewAuction(){
        $auction = auction_vehicle::all();
        $auction_id = auction_vehicle_id::all();
        $vehicle = vehicle::all();
        $car = car::all();
        $brand = brand::all();
        return view('admin.view_auction',compact('auction','vehicle','car','brand','auction_id'));
    }

    public function addAuction(){
        $auction = auction_vehicle::all();
        $vehicle = vehicle::all();
        $car = car::all();
        $brand = brand::all();
        return view('admin.add_auction',compact('auction','vehicle','car','brand'));
    }

    public function editAuction($id){
        $auction = auction_vehicle::find($id);

        $auction_id = auction_vehicle_id::where('auction_id',$auction->id)->orderBy('id', 'ASC')->get();


        $data = array();
        foreach ($auction_id as $key => $value) {
            $vehicle = vehicle::find($value->vehicle_id);
            if(!empty($vehicle)){
                $brand = brand::find($vehicle->brand_id);
                $model = car::find($vehicle->car_id);
                $vehicle_type = vehicle_type::find($vehicle->vehicle_type);

                $data = array(
                    'vehicle_id' => $vehicle->id,
                    'price' => $vehicle->price,
                    'year' => $vehicle->year,
                    'brand' => '',
                    'model' => '',
                    'vehicle_type' => '',
                );

                if(!empty($brand)){
                    $data['brand'] = $brand->name;
                }
                if(!empty($model)){
                    $data['model'] = $model->name;
                }
                if(!empty($vehicle_type)){
                    $data['vehicle_type'] = $vehicle_type->name;
                }
            
            }

            $datas[] = $data;
        }
         
        //return response()->json($datas); 
        return view('admin.edit_auction',compact('auction','datas'));
    }
    
    public function deleteAuction($id){
        $auction = auction_vehicle::find($id);
        $auction->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function getAuctionVehicle($id){
        $vehicle = vehicle::where('id',$id)->where('status',0)->first();

        $brand = brand::find($vehicle->brand_id);
        $model = car::find($vehicle->car_id);
        $vehicle_type = vehicle_type::find($vehicle->vehicle_type);

        $data = array(
            'vehicle_id' => $vehicle->id,
            'price' => $vehicle->price,
            'year' => $vehicle->year,
            'brand' => '',
            'model' => '',
            'vehicle_type' => '',
            'status' => 0,
        );

        if(!empty($brand)){
            $data['brand'] = $brand->name;
        }

        if(!empty($model)){
            $data['model'] = $model->name;
        }

        if(!empty($vehicle_type)){
            $data['vehicle_type'] = $vehicle_type->name;
        }

        if(empty($vehicle)){
            $data['status'] = 1;
        }

        return response()->json($data); 
    }

    public function auctionMonitoring($id){
        $auction = auction_vehicle::find($id);
        return view('admin.auction_monitoring',compact('auction','id'));
    }

    public function auctionCompleted(){
        $order = order::all();
        $car = car::all();
        $user = User::all();
        return view('admin.auction_winners',compact('car','user','order'));
    }

    public function updatePaymentStatus($id,$status)
    {
        $order = order::find($id);
        $order->payment_status = $status;
        $order->save();
        return response()->json(["Successfully Update"], 200);
    }


    
    public function getLiveMonitoring($id)
    {
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $auction = auction_vehicle::find($id);
        $auction_id = auction_vehicle_id::where('auction_id',$auction->id)->where('status',0)->where('un_bid',0)->orderBy('id', 'ASC')->get();

        $auction_count = auction_vehicle_id::where('auction_id',$auction->id)->count();


        $live_bid = DB::table('bid_values')
         ->where('bid_values.auction_id','=',$auction->id)
         ->join('users', 'bid_values.member_id', '=', 'users.id')
         //->join('agents', 'orders.agent_id', '=', 'agents.id')
        //  ->select('orders.*','customers.name','customers.mobile')
         ->orderBy('bid_values.id','desc')
         ->get();

         $active_member = DB::table('bid_values')
         ->where('bid_values.auction_id','=',$auction->id)
         ->join('users', 'bid_values.member_id', '=', 'users.id')
         //->join('agents', 'orders.agent_id', '=', 'agents.id')
        //  ->select('orders.*','customers.name','customers.mobile')
         ->orderBy('bid_values.id','desc')
         ->get();

        $member = User::all();
        $data = array();
        $vehicle = array();
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
            
        date_default_timezone_set("Asia/Dubai");
        date_default_timezone_get();
        $time = date("h:i A"); 
        $date = date('Y-m-d'); 
$output='';
if($auction->status == 0){
$output.='<input type="hidden" name="current_time" id="current_time" value="'.$time.'" >
    <input type="hidden" name="current_date" id="current_date" value="'.$date.'" >
    <input type="hidden" name="starting_time" id="starting_time" value="'.$auction->starting_time.'" >
    <input type="hidden" name="starting_date" id="starting_date" value="'.$auction->starting_date.'" >
    <input type="hidden" name="channel_name" id="channel_name" value="'.$auction->channel_name.'" >

    <input type="hidden" name="_token" id="token" value="'.csrf_token().'">
    <input type="hidden" name="auction_id" id="auction_id" value="'.$auction->id.'" >    
    
<section id="content-types">
<div class="row">
    <div class="col-xl-4 col-md-6 col-sm-12">
        <div style="color:#000 !important;font-size:18px !important;" id="time_runner" class="alert alert-success mb-2" role="alert">
          
        </div>
    </div>
  <div class="col-xl-4 col-md-6 col-sm-12"></div>
  <div class="col-xl-4 col-md-6 col-sm-12"></div>
</div>
<div class="row">';
    if(!empty($vehicle)){
    $output.='<div class="col-xl-4 col-md-6 col-sm-12">
    <input type="hidden" name="vehicle_id" id="vehicle_id" value="'.$vehicle->id.'" >
      <div class="card">
        <div class="card-content">';
            if(!empty($vehicle->image)){
            $output.='<img src="/vehicle_image/'.$vehicle->image.'" class="card-img-top img-fluid" alt="">';
            }
            $output.='<div class="card-body">
            <h5 class="card-title">'.$brand->name.' , '.$car->name.'</h5>
            <p class="card-text">
                <span>Lot: '.$vehicle->id.' </span>
                <span>'.$vehicle->sales_type.'</span>
            </p>
          </div>
        </div>
        
        <ul style="height: 250px;overflow: scroll;" class="list-group list-group-flush">';
        if(!empty($datas)){
          foreach($datas as $data){
            $output.='<li class="list-group-item"><img style="width:50px;height:50px;" src="/vehicle_image/'.$data['image'].'"> '.$data['model'].'</li>';
          }
        }
        $output.='</ul>

      </div>
    </div>';
    }
    $output.='<div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-content">

          <div class="card-body">
            <h4 class="card-title">Current Bid</h4>
          </div>
    
            <ul style="height: 590px;overflow: scroll;" class="list-group list-group-flush">';
            foreach($live_bid as $live){
                $output.='<li class="list-group-item">'.$live->name.' <span class="float-right">'.$live->bid_amount.' AED</span></li>';
            }
            $output.='</ul>
         
        </div>

      </div>
    </div>

    <div class="col-xl-4 col-md-6 col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <h4 class="card-title">Active Members</h4>
          </div>

            <ul style="height: 590px;overflow: scroll;" class="list-group list-group-flush">';
            foreach($active_member as $active){
                $output.='<li class="list-group-item">'.$active->name.'</li>';
            }
            $output.='</ul>
          
        </div>

      </div>
    </div>
</div>
</section>';
}
else{
 $output.='    
<section id="content-types">
<div id="print_area" class="row">
    <button onclick="printTable()" id="printTable" class="btn btn-primary">Print</button>
    <table style="width:100%;" id="table-marketing-campaigns" class="table mb-0">
        <thead>
            <tr>
                <th>Lot Number</th>
                <th>Member Details</th>
                <th>Bid Amount</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>';
        $c_auction = auction_vehicle_id::where('auction_id',$auction->id)->get();
        foreach($c_auction as $row){
            if($row->status == 1 && $row->un_bid == 0){
            $bid = bid_value::find($row->bid_id);
            $user = User::find($bid->member_id);
            $output.='<tr>
                <td class="text-bold-600">
                <span>#'.$row->vehicle_id.'</span>
                </td>
                <td>
                <span>'.$user->name.'</span><br>
                <span>'.$user->email.'</span>
                </td>
                <td class="text-bold-600">
                <span>'.$bid->bid_amount.' AED</span>
                </td>
                <td class="text-success">
                    Sold
                </td>
            </tr>';
            }
            elseif($row->un_bid == 1){
                $output.='<tr>
                <td class="text-bold-600">
                <span>#'.$row->vehicle_id.'</span>
                </td>
                <td>
                <span></span>
                </td>
                <td class="text-bold-600">
                <span>0 AED</span>
                </td>
                <td class="text-danger">
                    Un Bid
                </td>
            </tr>';
            }
        }
        $output.='</tbody>
    </table>
</div>
</section>

';
}

        
    if(!empty($vehicle)){
        $vehicle_price = $vehicle->price;
    }
    else{
        $vehicle_price = 0;
    }
         
        return response()->json(['html'=>$output,'vehicle_price'=>$vehicle_price],200); 
    }




}
