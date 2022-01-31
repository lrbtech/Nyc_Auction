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
use App\email_temp;
use Hash;
use DB;
use Mail;


class PageController extends Controller
{
    public function index()
    {
        $damage = damage::all();
        $vehicle = vehicle::where('is_enable_future_vehicles','1')->where('is_visible_website','1')->orderBy('id','DESC')->take(6)->get();
        $car = car::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        $slider = slider::all();
        $blog = blog::take(2)->get();
        return view('page.home',compact('brand','car','vehicle','vehicle_type','damage','slider','blog'));
    }

    public function contact()
    {
        $site_info = site_info::find('1');
        return view('page.contact',compact('site_info'));
    }

    public function auction()
    {
        return view('auction');
    }

    public function aboutUs()
    {
        $site_info = site_info::find('1');
        return view('page.about',compact('site_info'));
    }

    public function allVehicles()
    {
        $damage = damage::all();
        $vehicle = vehicle::where('is_visible_website','1')->orderBy('id','DESC')->paginate(9);
        $car = car::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        return view('page.all_vehicles',compact('brand','car','vehicle','vehicle_type','damage'));
    }

    public function futureVehicles()
    {
        $damage = damage::all();
        $vehicle = vehicle::where('is_enable_future_vehicles','1')->where('is_visible_website','1')->orderBy('id','DESC')->get();
        $car = car::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        return view('page.future_vehicles',compact('brand','car','vehicle','vehicle_type','damage'));
    }

    public function buyNowCars()
    {
        return view('page.buy_now_cars');
    }

    public function auctions()
    {
        $today = date('Y-m-d');
        $today_auction = auction_vehicle::where('starting_date',$today)->where('status',0)->get();
        $upcoming_auction = auction_vehicle::whereDate('starting_date','>',$today)->where('status',0)->get();
        $vehicle = vehicle::all();
        $auction_id = auction_vehicle_id::all();
        $car = car::all();
        $brand = brand::all();
        return view('page.auctions',compact('today_auction','vehicle','car','brand','upcoming_auction','auction_id'));
    }

    public function liveAuctions($id){
        
        $auction = auction_vehicle::find($id);

        return view('page.live_auctions',compact('id','auction'));
    }

    public function viewAuctions($id)
    {
        $auction = auction_vehicle::find($id);
        
        $data = array();
       foreach(explode(',', $auction->vehicle_ids) as $value) 
        {
            $vehicle = vehicle::find($value);
            
            $brand = brand::find($vehicle->brand_id);
            $model = car::find($vehicle->car_id);
            $vehicle_type = vehicle_type::find($vehicle->vehicle_type);

            $data = array(
                'auction_id' => $auction->id,
                'vehicle_id' => $vehicle->id,
                'price' => $vehicle->price,
                'year' => $vehicle->year,
                'location' => $vehicle->location,
                'odometer' => $vehicle->odometer,
                'document_type' => $vehicle->document_type,
                'price' => $vehicle->price,
                'image' => $vehicle->image,
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

            $datas[] = $data;
        }

        return view('page.view_auctions',compact('datas'));

    }

    public function howItWorks()
    {
        $site_info = site_info::find('1');
        return view('page.how_it_works',compact('site_info'));
    }

    public function services()
    {
        $site_info = site_info::find('1');
        return view('page.services',compact('site_info'));
    }

    public function memberFees()
    {
        $site_info = site_info::find('1');
        return view('page.member_fees',compact('site_info'));
    }

    public function termsAndConditions()
    {
        $site_info = site_info::find('1');
        return view('page.terms_and_conditions',compact('site_info'));
    }

    public function compare()
    {
        return view('page.compare');
    }

    public function singleVehicles($id)
    {
        $vehicle = vehicle::find($id);
        $vehicle_image = vehicle_image::where('vehicle_id',$id)->get();
        $car = car::all();
        $damage = damage::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        return view('page.single_vehicles',compact('brand','car','vehicle','vehicle_image','vehicle_type','damage','id'));
    }


    public function memberCreatePassword($id){
        $member = member_password::find($id);
        return view('page.member_new_password',compact('member','id'));
    }

    public function memberUpdatePassword(Request $request){
        $request->validate([
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);

        $member = User::find($request->member_id);
        $member->password = Hash::make($request->password);
        $member->save();

        $member_password = member_password::find($request->id);
        $member_password->status = 1;
        $member_password->save();
        
        return response()->json('successfully save'); 
    }


    public function memberRegistration(){
        $member = User::all();
        $car = car::all();
        $site_info = site_info::find('1');
        return view('page.member_registration',compact('member','car','site_info'));
    }

    public function saveMemberRegistration(Request $request){
        $request->validate([
            'busisness_type'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users',
        ]);

        $member = new User;
        $member->name = $request->name;
        $member->email = $request->email;
        $member->busisness_type = $request->busisness_type;
        $member->company_name = $request->company_name;
        $member->address = $request->address;
        $member->country = $request->country;
        $member->state = $request->state;
        $member->city = $request->city;
        $member->postal_code = $request->postal_code;
        $member->phone_number = $request->phone_number;
        $member->phone_extension = $request->phone_extension;
        $member->most_intrested = $request->most_intrested;
        $member->buy_vehicles_for = $request->buy_vehicles_for;
        $member->save();

        $member_password = new member_password;
        $member_password->date = date('Y-m-d');
        $member_password->end_date = date('Y-m-d', strtotime("+14 days"));
        $member_password->member_id = $member->id;
        $member_password->name = $member->name;
        $member_password->email = $member->email;
        $member_password->save();

        $all = $member_password::find($member_password->id);
        $email_temp = email_temp::first();
        Mail::send('mail.member_send_mail',compact('all','email_temp'),function($message) use($all){
            $message->to($all['email'])->subject('Verify Your Account');
            $message->from('prasanthats@gmail.com','New York Car Auction');
        });
        return response()->json('successfully save'); 
    }


public function homeSearch(Request $request){
    $q =DB::table('vehicles as v');
if ( $request->brand && !empty($request->brand) )
{
    $q->where('v.brand_id', $request->brand);
}
elseif ( $request->model && !empty($request->model) )
{
    $q->where('v.car_id', $request->model);
}
elseif ( $request->from_year && !empty($request->from_year) && $request->to_year && !empty($request->to_year) )
{
    $q->whereBetween('v.year', [ $request->from_year , $request->to_year ]);
}

    // $q->select('*');
    $q->orderBy('v.id','DESC');
    $vehicle = $q->paginate(9);

    $damage = damage::all();
    $car = car::all();
    $brand = brand::all();
    $vehicle_type = vehicle_type::all();
    return view('page.all_vehicles',compact('brand','car','vehicle','vehicle_type','damage'));
}

    public function getBrandCar(Request $request){ 
        $data = car::whereIn('brand_id',$request->id)->get();

        $output ='<option value="">Select Model</option>';
        foreach ($data as $key => $value) {
        $output .= '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
          
        echo $output;
    }

public function vehicleSearch(Request $request){
    $price = explode(';', $request->price_range);
    $price1 = $price[0];
    $price2 = $price[1];

    $q =DB::table('vehicles as v');
if ( $request->brand_id && !empty($request->brand_id) )
{
    $q->whereIn('v.brand_id', $request->brand_id);
}
elseif ( $request->car_id && !empty($request->car_id) )
{
    $q->where('v.car_id', $request->car_id);
}
elseif ( $request->year && !empty($request->year) )
{
    $q->where('v.year', $request->year);
}
elseif ( $request->damage && !empty($request->damage) )
{
    $q->where('v.primary_damage', $request->damage);
}
elseif ( $request->body_style && !empty($request->body_style) )
{
    $q->whereIn('v.body_style', $request->body_style);
}
elseif ( $request->price_range && !empty($request->price_range) )
{
    $q->whereBetween('v.price', [ $price1 , $price2 ]);
}
    // $q->select('*');
    $q->orderBy('id','DESC');
    $vehicle = $q->paginate(9);

    $damage = damage::all();
    $car = car::all();
    $brand = brand::all();
    $vehicle_type = vehicle_type::all();
    return view('page.all_vehicles',compact('brand','car','vehicle','vehicle_type','damage'));
}


public function contactMail(Request $request){
    $request->validate([
         'name'=>'required',
         'phone'=>'required',
         'email'=>'required',
         'message'=>'required',
         'g-recaptcha-response' => ['required', new ValidRecaptcha]
    ]);
    $all = $request->all();
    Mail::send('mail.contact_mail',compact('all'),function($message) use($all){
         $message->to('prasanthats@gmail.com')->subject($all['subject']);
         $message->from('prasanthats@gmail.com',$all['name']);
    });
    return response()->json(['message'=>'Successfully Send'],200); 
    //return back();
}


public function vehicleQuickView($id)
    {
        $vehicle = vehicle::find($id);
        $car = car::find($vehicle->car_id);
        $output = '<link rel="stylesheet" type="text/css" href="/dist/css/fonts.css">
        <div style="background-color: #f15b5b;" class="modal-header">
                <h3 style="color: #000;" class="modal-title">'.$car->name.'</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div style="background-color: #000;" class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img style="object-fit: cover;height:500px;width:400px;" src="vehicle_image/'.$vehicle->image.'" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4 style="color: #fff;">Lot Number: <span>'.$vehicle->id.'</span></h4>
                            <br>
                            <table style="color:#fff;border-color:#f15b5b;width:100% !important;" class="table table-bordered">
                                <tr>
                                    <td>
                                        <span style="float: left">VIN :</span>
                                        <span style="float: right">'.$vehicle->vin.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Doc Type :</span>
                                        <span style="float: right">'.$vehicle->document_type.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Odometer :</span>
                                        <span style="float: right">'.$vehicle->odometer.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Highlights :</span>
                                        <span style="float: right">'.$vehicle->vin.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Primary Damage :</span>
                                        <span style="float: right">'.$vehicle->primary_damage.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Secondary Damage :</span>
                                        <span style="float: right">'.$vehicle->secondary_damage.'</span>
                                    </td>
                                </tr>
                        </table>
                        <br><h3 style="color: #f15b5b;" class="cost">'.$vehicle->price.' AED</h3>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            <a href="single-vehicles/'.$vehicle->id.'"><button style="background-color: #f15b5b;" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-shopping-cart"></span> Bid Now
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
        ';


        echo $output;
    }


public function liveVehicleQuickView($id)
    {
        $vehicle = vehicle::find($id);
        $car = car::find($vehicle->car_id);
        $output = '<link rel="stylesheet" type="text/css" href="/dist/css/fonts.css">
        <div style="background-color: #f15b5b;" class="modal-header">
                <h3 style="color: #000;" class="modal-title">'.$car->name.'</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div style="background-color: #000;" class="modal-body">
                <div class="row">
                    <div class="col-md-6 product_img">
                        <img style="object-fit: cover;height:500px;width:400px;" src="/vehicle_image/'.$vehicle->image.'" class="img-responsive">
                    </div>
                    <div class="col-md-6 product_content">
                        <h4 style="color: #fff;">Lot Number: <span>'.$vehicle->id.'</span></h4>
                        <br>
                        <table style="color:#fff;border-color:#f15b5b;width:100% !important;" class="table table-bordered">
                                <tr>
                                    <td>
                                        <span style="float: left">VIN :</span>
                                        <span style="float: right">'.$vehicle->vin.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Doc Type :</span>
                                        <span style="float: right">'.$vehicle->document_type.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Odometer :</span>
                                        <span style="float: right">'.$vehicle->odometer.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Highlights :</span>
                                        <span style="float: right">'.$vehicle->vin.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Primary Damage :</span>
                                        <span style="float: right">'.$vehicle->primary_damage.'</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="float: left">Secondary Damage :</span>
                                        <span style="float: right">'.$vehicle->secondary_damage.'</span>
                                    </td>
                                </tr>
                        </table>
                        <br>
                        <h3 style="color: #f15b5b;" class="cost">'.$vehicle->price.' AED</h3>
                        <div class="space-ten"></div>
                        <div class="btn-ground">
                            
                        </div>
                    </div>
                </div>
            </div>

        ';


        echo $output;
    }

    
}
