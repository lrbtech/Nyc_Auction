<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\car;
use App\User;
use App\deposit;
use App\withdrawal;
use App\site_info;
use Auth;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function settings()
    {
        $member = User::find(Auth::user()->id);
        $car = car::all();
        return view('member.settings',compact('member','car'));
    }

    public function updateSettings(Request $request){
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
        return back(); 
    }

    public function Deposit()
    {
        $deposit = deposit::where('member_id',Auth::user()->id)->get();
        return view('member.deposit',compact('deposit'));
    }

    public function saveDeposit(Request $request){
        $this->validate($request, [
            'deposit'=>'required|numeric',
            'image' => 'required|mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'image.required' => 'Slip Field is Required',
        ]);
        //image upload
        $fileName = null;
        if($request->file('image')!=""){
            $image = $request->file('image');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName);
        }  
        $deposit = new deposit;
        $deposit->member_id = Auth::user()->id;
        $deposit->deposit = $request->deposit;
        $deposit->image = $fileName;
        $deposit->save();
        return response()->json('successfully save');
    }


    public function DepositDelete($id){
        $deposit = deposit::find($id);
        $deposit->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function Withdrawal()
    {
        $withdrawal = withdrawal::where('member_id',Auth::user()->id)->get();
        $member = User::find(Auth::user()->id);
        $site_info = site_info::first();
        return view('member.withdrawal',compact('withdrawal','member','site_info'));
    }

    public function saveWithdrawal(Request $request){
        $request->validate([
            'amount'=>'required|numeric',
            'bank_name'=>'required',
            'iban_number'=>'required',
            'account_name'=>'required',
            'account_number'=>'required',
        ]);

        $withdrawal = new withdrawal;
        $withdrawal->member_id = Auth::user()->id;
        $withdrawal->amount = $request->amount;
        $withdrawal->iban_number = $request->iban_number;
        $withdrawal->account_name = $request->account_name;
        $withdrawal->account_number = $request->account_number;
        $withdrawal->bank_name = $request->bank_name;
        $withdrawal->save();
        return response()->json('successfully save');
    }


    public function WithdrawalDelete($id){
        $withdrawal = withdrawal::find($id);
        $withdrawal->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }

    public function viewDocument(){
        $user = User::where('id',Auth::user()->id)->first();
        return view('member.document',compact('user'));
    }

    public function updateDocument(Request $request){
        $this->validate($request, [
            'upload_image' => 'mimes:jpeg,jpg,png|max:1000', // max 1000kb
            'upload_emirate_id' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
            'upload_passport' => 'mimes:jpeg,jpg,png,pdf|max:1000', // max 1000kb
          ],[
            'upload_image.mimes' => 'Only jpeg, png and jpg images are allowed',
            'upload_image.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'upload_emirate_id.mimes' => 'Only jpeg, png, pdf and jpg images are allowed',
            'upload_emirate_id.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'upload_passport.mimes' => 'Only jpeg, png, pdf and jpg images are allowed',
            'upload_passport.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        $user = User::find($request->id);
        $upload_image = null;
        if ($request->file('upload_image') != "") {
            $old_image = "upload_image/".$request->upload_image1;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $image = $request->file('upload_image');
            $upload_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $upload_image);
            $user->upload_image = $upload_image;
        }
        $upload_passport = null;
        if ($request->file('upload_passport') != "") {
            $old_image = "upload_passport/".$request->upload_passport1;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $image = $request->file('upload_passport');
            $upload_passport = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $upload_passport);
            $user->upload_passport = $upload_passport;
        }
        $upload_emirate_id = null;
        if ($request->file('upload_emirate_id') != "") {
            $old_image = "upload_emirate_id/".$request->upload_emirate_id1;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            $image = $request->file('upload_emirate_id');
            $upload_emirate_id = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/'), $upload_emirate_id);
            $user->upload_emirate_id = $upload_emirate_id;
        }
        $user->save();
        return back();
    }

}
