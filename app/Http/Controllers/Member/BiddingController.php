<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\brand;
use App\car;
use App\vehicle;
use App\damage;
use App\vehicle_image;
use App\vehicle_type;
use App\order;
use App\pre_bid_value;
use App\bid_value;
use Auth;

class BiddingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function preBidding()
    {
        $order = order::all();
        $pre_bid_value = pre_bid_value::where('member_id',Auth::user()->id)->get();
        return view('member.pre_bidding',compact('pre_bid_value','order'));
    }

    public function liveBidding()
    {
        $order = order::all();
        $bid_value = bid_value::where('member_id',Auth::user()->id)->get();
        return view('member.live_bidding',compact('bid_value','order'));
    }

    public function winningCars()
    {
        $order = order::where('member_id',Auth::user()->id)->get();
        $bid_value = bid_value::where('member_id',Auth::user()->id)->get();
        return view('member.winning_cars',compact('bid_value','order'));
    }

    public function getAppointment($id)
    {
        $order = order::find($id);
        return response()->json($order);
    }

    public function updateAppointment(Request $request)
    {
        $order = order::find($request->id);
        $order->appointment_date = $request->appointment_date;
        $order->appointment_time = $request->appointment_time;
        $order->save();

        return response()->json('successfully save');
    }



    
}
