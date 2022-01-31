<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\settings;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('billing.dashboard');
        
    }

    public function settings()
    {
        $settings = settings::first();
        return view('billing.settings',compact('settings'));
    }

    public function updateSettings(Request $request){
        $settings = settings::find($request->id);
        $settings->company_name = $request->company_name;
        $settings->name = $request->name;
        $settings->mobile = $request->mobile;
        $settings->whatsapp = $request->whatsapp;
        $settings->email = $request->email;
        $settings->gst = $request->gst;
        $settings->address = $request->address;
        $settings->pincode = $request->pincode;
        $settings->district = $request->district;
        $settings->state = $request->state;
        $settings->sales_type = $request->sales_type;
        $settings->purchase_tax_type = $request->purchase_tax_type;
        $settings->sales_tax_type = $request->sales_tax_type;
        $settings->print_size = $request->print_size;
        $settings->digital_signature = $request->digital_signature;
        $settings->save();

        return back(); 
    }
}
