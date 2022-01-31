<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\car;
use App\member_password;
use App\deposit;
use App\withdrawal;
use App\email_temp;
use Mail;
use DB;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function saveMember(Request $request){
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

    public function updateMember(Request $request){
        $request->validate([
            'busisness_type'=>'required',
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$request->id,
        ]);
        
        $member = User::find($request->id);
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
        return response()->json('successfully update'); 
    }

    public function Member(){
        $member = User::all();
        $car = car::all();
        return view('admin.member',compact('member','car'));
    }

    public function editMember($id){
        $User = User::find($id);
        return response()->json($User); 
    }

    public function deleteMember($id){
        $User = User::find($id);
        $User->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function depositRequest(){
        $deposit = deposit::all();
        $member = User::all();
        return view('admin.deposit_request',compact('deposit','member'));
    }

    public function updateDepositRequest($id,$status){
        $deposit = deposit::find($id);
        
        if($status == '1'){
            $deposit->status = $status;
            $member = User::find($deposit->member_id);
            $wallet = $member->wallet;
            $member->wallet = $wallet + $deposit->deposit;
            $member->save();
        }
        elseif($status == '2'){
            if($deposit->status == '1'){
                $member = User::find($deposit->member_id);
                $wallet = $member->wallet;
                $member->wallet = $wallet - $deposit->deposit;
                $member->save();
            }
            $deposit->status = $status;
        }

        $deposit->save();

        return response()->json(['message'=>'Successfully Update'],200); 
    }

    public function withdrawalRequest(){
        $withdrawal = withdrawal::all();
        $member = User::all();
        return view('admin.withdrawal_request',compact('withdrawal','member'));
    }

    public function updateWithdrawalRequest($id,$status){
        $withdrawal = withdrawal::find($id);

        if($status == '1'){
            $withdrawal->status = $status;
            $member = User::find($withdrawal->member_id);
            $wallet = $member->wallet;
            $member->wallet = $wallet - $withdrawal->amount;
            $member->save();
        }
        elseif($status == '2'){
            if($withdrawal->status == '1'){
                $member = User::find($withdrawal->member_id);
                $wallet = $member->wallet;
                $member->wallet = $wallet + $withdrawal->amount;
                $member->save();
            }
            $withdrawal->status = $status;
        }

        $withdrawal->save();

        return response()->json(['message'=>'Successfully Update'],200); 
    }

}
