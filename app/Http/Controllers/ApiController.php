<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use Auth;
use DB;
use Validator;
use Mail;

class ApiController extends Controller
{
    public function createCustomer(Request $request){
        try{
            $exist = User::where('email',$request->email)->get();
            if(count($exist)>0){
                 return response()->json(['message' => 'This Email Address Has been Already Registered','status'=>403], 403);
            }
            $phone_exist = User::where('phone_number',$request->phone)->get();
            if(count($phone_exist)>0){
                return response()->json(['message' => 'This Phone Number Has been Already Registered','status'=>403], 403);
           }
        $randomid = mt_rand(1000,9999); 

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
        $member->otp = $randomid;
        $member->firebase_key = $request->firebase_key;
        $member->password = Hash::make($request->password);
        $member->save();

        $msg= "Dear Customer, Please use the code ".$member->otp." to Change your password";

        Mail::send('mail.otp_send_mail',compact('member'),function($message) use($member){
            $message->to($member->email)->subject('NYC Auction Verification Code');
            $message->from('info@lrbinfotech.com','NYC Auction');
        });

        return response()->json(
            ['message' => 'Register Successfully',
            'customer_id'=>$customer->id],
             200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function updateCustomer(Request $request){
        try{
            $exist = User::where('email',$request->email)->where('id','!=',$request->customer_id)->get();
            if(count($exist)>0){
                 return response()->json(['message' => 'This Email Address Has been Already Registered','status'=>403], 403);
            }
            $phone_exist = User::where('phone_number',$request->phone)->where('id','!=',$request->customer_id)->get();
            if(count($phone_exist)>0){
                return response()->json(['message' => 'This Phone Number Has been Already Registered','status'=>403], 403);
            }

        $member = User::find($request->customer_id);
        
        if(isset($request->name)){
            $member->name = $request->name;
        }
        if(isset($request->email)){
        	$member->email = $request->email;
    	}
    	if(isset($request->busisness_type)){
        	$member->busisness_type = $request->busisness_type;
        }
        if(isset($request->company_name)){
        	$member->company_name = $request->company_name;
        }
        if(isset($request->address)){
        	$member->address = $request->address;
	    }
	    if(isset($request->country)){
	        $member->country = $request->country;
	    }
	    if(isset($request->state)){
	        $member->state = $request->state;
	    }
	    if(isset($request->city)){
	        $member->city = $request->city;
	    }
	    if(isset($request->postal_code)){
	        $member->postal_code = $request->postal_code;
	    }
	    if(isset($request->phone_number)){
	        $member->phone_number = $request->phone_number;
	    }
	    if(isset($request->phone_extension)){
	        $member->phone_extension = $request->phone_extension;
	    }
	    if(isset($request->most_intrested)){
	        $member->most_intrested = $request->most_intrested;
	    }
	    if(isset($request->buy_vehicles_for)){
	        $member->buy_vehicles_for = $request->buy_vehicles_for;
	    }

        $member->save();

        return response()->json(
            ['message' => 'Update Successfully',
            'customer_id'=>$customer->id],
        200);
        }catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(),'status'=>400], 400);
        } 
    }

    public function editCustomer($id){
        $customer = User::find($id);
        return response()->json($customer);
    }

    public function customerLogin(Request $request){
        $exist = User::where('email',$request->email)->get();
        if(count($exist)>0){
            if($exist[0]->status == 1){
                if(Hash::check($request->password,$exist[0]->password)){
                    $customer = User::find($exist[0]->id);
                    $customer->firebase_key = $request->firebase_key;
                    $customer->save();

                return response()->json(['message' => 'Login Successfully',
                	'name'=>$exist[0]->name,
                	'customer_id'=>$exist[0]->id,
                	'status'=>200], 200);
                }else{
                    return response()->json(['message' => 'Records Does not Match','status'=>403], 403);
                }
            }else{
                return response()->json(['message' => 'Verify Your Account','status'=>401,'customer_id'=>$exist[0]->id], 401);
            }
        }else{
            return response()->json(['message' => 'This Email Address Not Registered','status'=>404], 404);
        }
    }

    public function forgetPassword(Request $request){
        try{
            $exist = User::where('email',$request->email)->get();
	        if(count($exist)>0){
		        $member = User::find($exist[0]->id);
		        $randomid = mt_rand(100000,999999);
		        $member->otp = $randomid;
		        $member->save();      

                Mail::send('mail.otp_send_mail',compact('member'),function($message) use($member){
                    $message->to($member->email)->subject('NYC Auction Verification Code');
                    $message->from('info@lrbinfotech.com','NYC Auction');
                }); 

		        return response()->json(['message' => 'Successfully Send','_id'=>$member->id], 200);
            }else{
                return response()->json(['message' => 'This Email Address Not Registered','status'=>403], 403);
            }
        }catch (\Exception $e) {
            return response()->json($e);
            return response()->json(['message' => 'This Email Address Not Registered','status'=>200], 200);
        }
    }

    public function resetPassword(Request $request){
        if($request->member_id !=null){
            $member = User::find($request->member_id);
            if($member->otp == $request->otp){
                $member->password = Hash::make($request->get('password'));
                $member->save();
                return response()->json(['message' => 'Successfully Reset'], 200);
            }else{
                return response()->json(['message' => 'Verification Code Not Valid','status'=>400], 400);
            }
        }else{
            return response()->json(['message' => 'Customer id not found'], 400);
        }
    }

    public function changePassword(Request $request){
        $customer = User::find($request->customer_id);
        $hashedPassword = $customer->password;
 
        if (\Hash::check($request->oldpassword , $hashedPassword )) {
            if (!\Hash::check($request->password , $hashedPassword)) {
                $customer->password = Hash::make($request->password);
                $customer->save();
                return response()->json(['message' => 'Successfully Update'], 200);
            }
            else{
                return response()->json(['message' => 'new password can not be the old password!','status'=>400], 400);
            }
        }
        else{
            return response()->json(['message' => 'old password doesnt matched','status'=>400], 400);
        }
    }

    public function getApiOtpResend(Request $request)
    {
        if($request->customer_id !=null){
            $member = User::find($request->customer_id);
            $randomid = mt_rand(1000,9999);
            $member->otp = $randomid;
            $member->save();

            Mail::send('mail.otp_send_mail',compact('member'),function($message) use($member){
                $message->to($member->email)->subject('NYC Auction Verification Code');
                $message->from('info@lrbinfotech.com','NYC Auction');
            }); 

            return response()->json(['message' => 'Otp Send Successfully'], 200);
        }else{
            return response()->json(['message' => 'Customer id not found'], 400);
        }
    }

    public function verifyCustomer(Request $request)
    {
        if($request->customer_id !=null){
            $customer = User::find($request->customer_id);
            if($customer->otp == $request->otp){
                $customer->status = 1;
                $customer->save();

                return response()->json(['message' => 'Verified Your Account',
                'name'=>$customer->name,
                'email'=>$customer->email,
                'customer_id'=>$customer->id,'status'=>200], 200);
            }else{
                return response()->json(['message' => 'Verification Code Not Valid','status'=>400], 400);
            }
        }else{
            return response()->json(['message' => 'Customer id not found'], 400);
        }
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

    public function liveAuctions($id)
    {   
        $auction = auction_vehicle::find($id);
        return response()->json($auction);
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
        return response()->json($datas);
    }



}
