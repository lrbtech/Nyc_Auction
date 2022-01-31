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


class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function findVehicles()
    {
    	$damage = damage::all();
        $vehicle = vehicle::all();
        $car = car::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        return view('member.find_vehicles',compact('brand','car','vehicle','vehicle_type','damage'));
    }


    public function singleVehicles($id)
    {
        $vehicle = vehicle::find($id);
    	$damage = damage::all();
        $car = car::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        $vehicle_image = vehicle_image::where('vehicle_id',$id)->get();
        return view('member.single_view',compact('brand','car','vehicle','vehicle_type','damage','vehicle_image'));
    }



    
}
