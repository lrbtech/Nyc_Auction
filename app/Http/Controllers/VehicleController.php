<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\brand;
use App\car;
use App\vehicle;
use App\damage;
use App\vehicle_image;
use App\vehicle_type;
use DB;
use App\Imports\vehiclesImport;
use App\Exports\vehiclesExport;
use Maatwebsite\Excel\Facades\Excel;  

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function saveBrand(Request $request){
        $request->validate([
            'name'=>'required|unique:brands',
            'image' => 'required|mimes:jpeg,jpg,png|max:1000' // max 1000kb
        ]);
        //image upload
        $fileName = null;
        if($request->file('image')!=""){
            $image = $request->file('image');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName);
        }  
        $brand = new brand;
        $brand->name = $request->name;
        $brand->image = $fileName;
        $brand->save();
        return response()->json('successfully save');
    }
    public function updateBrand(Request $request){
        $request->validate([
            'name'=> 'required|unique:brands,name,'.$request->id,
            'image' => 'required|mimes:jpeg,jpg,png|max:1000' // max 1000kb
        ]);
        if($request->image!=""){
            $old_image = "upload_image/".$request->image1;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            //image upload
            $fileName = null;
            if($request->file('image')!=""){
            $image = $request->file('image');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName);
            }
        }
        else
        {
            $fileName = $request->image1;
        }
        $brand = brand::find($request->id);
        $brand->name = $request->name;
        $brand->image = $fileName;
        $brand->save();
        return response()->json('successfully update');
    }
    public function Brand(){
        $brand = brand::all();
        return view('admin.brand',compact('brand'));
    }
    public function editBrand($id){
        $brand = brand::find($id);
        return response()->json($brand);
    }
   
    public function deleteBrand($id){
        $brand = brand::find($id);

        $old_image = "upload_image/".$brand->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }

        $brand->delete();
        return response()->json(['message'=>'Successfully Delete'],200);
    }


    public function savecar(Request $request){
        $request->validate([
            'name'=>'required|unique:cars',
        ]);
        //image upload
        $fileName = null;
        if($request->file('image')!=""){
            $image = $request->file('image');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName);
        }  
        $car = new car;
        $car->name = $request->name;
        $car->brand_id = $request->brand_id;
        $car->image = $fileName;
        $car->save();
        return response()->json('successfully save');
    }

    public function updatecar(Request $request){
        $request->validate([
            'name'=> 'required|unique:cars,name,'.$request->id,
        ]);
        if($request->image!=""){
            $old_image = "upload_image/".$request->image1;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            //image upload
            $fileName = null;
            if($request->file('image')!=""){
            $image = $request->file('image');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName);
            }
        }
        else
        {
            $fileName = $request->image1;
        }
        $car = car::find($request->id);
        $car->name = $request->name;
        $car->brand_id = $request->brand_id;
        $car->image = $fileName;
        $car->save();
        return response()->json('successfully update');
    }
    public function car($id){
        $car = car::where('brand_id',$id)->get();
        $brand = brand::all();
        return view('admin.car',compact('brand','car','id'));
    }

    public function editcar($id){
        $car = car::find($id);
        return response()->json($car);
    }
   
    public function deletecar($id){
        $car = car::find($id);

        $old_image = "upload_image/".$car->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }

        $car->delete();
        return response()->json(['message'=>'Successfully Delete'],200);
    }

    public function addVehicle(){
        $damage = damage::all();
        $car = car::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        return view('admin.addvehicle',compact('brand','car','vehicle_type','damage'));
    }

    public function viewVehicles(){
        $damage = damage::all();
        $vehicle = vehicle::orderBy('id','DESC')->get();
        $car = car::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        return view('admin.viewvehicles',compact('brand','car','vehicle','vehicle_type','damage'));
    }

    public function editVehicle($id){
        $vehicle = vehicle::find($id);
        $vehicle_image = vehicle_image::where('vehicle_id',$id)->get();
        $car = car::all();
        $damage = damage::all();
        $brand = brand::all();
        $vehicle_type = vehicle_type::all();
        return view('admin.editvehicle',compact('brand','car','vehicle','vehicle_image','vehicle_type','damage'));
    }


    public function saveVehicle(Request $request){
        $this->validate($request, [
            'brand_id'=>'required',
            'car_id'=>'required',
            'vehicle_status'=>'required',
            'imgInp' => 'required|mimes:jpeg,jpg,png|max:1000', // max 1000kb
            'images.*' => 'mimes:jpeg,jpg,png|max:1000' // max 1000kb
          ],[
            'imgInp.required' => 'Vehicle Image is Required',
            'imgInp.mimes' => 'Only jpeg, png and jpg images are allowed',
            'imgInp.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);

        //image upload
        $fileName = null;
        if($request->file('imgInp')!=""){
            $image = $request->file('imgInp');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('vehicle_image/'), $fileName);
        }  

        $vehicle = new vehicle;
        $vehicle->car_id = $request->car_id;
        $vehicle->brand_id = $request->brand_id;
        $vehicle->image = $fileName;
        $vehicle->vehicle_model = $request->vehicle_model;
        $vehicle->vehicle_status = $request->vehicle_status;
        $vehicle->colour = $request->exterior_color;
        $vehicle->minimum_bid_value = $request->minimum_bid_value;
        $vehicle->sales_type = 'On Reserve';
        $vehicle->colour = $request->colour;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->price = $request->price;
        $vehicle->year = $request->year;
        $vehicle->document_type = $request->document_type;
        $vehicle->exterior_color = $request->exterior_color;
        $vehicle->interior_color = $request->interior_color;
        $vehicle->odometer = $request->odometer;
        $vehicle->engine_type = $request->engine_type;
        $vehicle->highlights = $request->highlights;
        $vehicle->primary_damage = $request->primary_damage;
        $vehicle->transmission = $request->transmission;
        $vehicle->secondary_damage = $request->secondary_damage;
        $vehicle->cylinders = $request->cylinders;
        $vehicle->fuel = $request->fuel;
        $vehicle->vin = $request->vin;
        $vehicle->keys = $request->keys;
        $vehicle->body_style = $request->body_style;
        $vehicle->description = $request->description;
        $vehicle->is_enable_future_vehicles = $request->is_enable_future_vehicles;
        $vehicle->is_visible_website = $request->is_visible_website;
        $vehicle->drive = $request->drive;
        $vehicle->location = $request->location;
        $vehicle->save();

        $fileName = null;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $image->getClientOriginalName();
                $fileName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('vehicle_image/'), $fileName);

                $vehicle_image = new vehicle_image;
                $vehicle_image->vehicle_id = $vehicle->id;
                $vehicle_image->image = $fileName;
                $vehicle_image->save();
            }
        }

        return response()->json('successfully save');
    }



    public function updateVehicle(Request $request){
        $this->validate($request, [
            'brand_id'=>'required',
            'car_id'=>'required',
            'vehicle_status'=>'required',
            'imgInp' => 'mimes:jpeg,jpg,png|max:1000', // max 1000kb
            'images.*' => 'mimes:jpeg,jpg,png|max:1000' // max 1000kb
          ],[
            'imgInp.mimes' => 'Only jpeg, png and jpg images are allowed',
            'imgInp.max' => 'Sorry! Maximum allowed size for an image is 1MB',
            'images.*.mimes' => 'Only jpeg, png and jpg images are allowed',
            'images.*.max' => 'Sorry! Maximum allowed size for an image is 1MB',
        ]);


        if($request->imgInp!=""){
            $old_image = "vehicle_image/".$request->imgInp1;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            //image upload
            $fileName = null;
            if($request->file('imgInp')!=""){
            $image = $request->file('imgInp');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('vehicle_image/'), $fileName);
            }
        }
        else
        {
            $fileName = $request->imgInp1;
        }

        $vehicle = vehicle::find($request->id);
        $vehicle->car_id = $request->car_id;
        $vehicle->brand_id = $request->brand_id;
        $vehicle->image = $fileName;
        $vehicle->vehicle_model = $request->vehicle_model;
        $vehicle->vehicle_status = $request->vehicle_status;
        $vehicle->colour = $request->exterior_color;
        $vehicle->minimum_bid_value = $request->minimum_bid_value;
        $vehicle->sales_type = 'On Reserve';
        $vehicle->year = $request->year;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->price = $request->price;
        $vehicle->document_type = $request->document_type;
        $vehicle->exterior_color = $request->exterior_color;
        $vehicle->interior_color = $request->interior_color;
        $vehicle->odometer = $request->odometer;
        $vehicle->engine_type = $request->engine_type;
        $vehicle->highlights = $request->highlights;
        $vehicle->primary_damage = $request->primary_damage;
        $vehicle->transmission = $request->transmission;
        $vehicle->secondary_damage = $request->secondary_damage;
        $vehicle->cylinders = $request->cylinders;
        $vehicle->fuel = $request->fuel;
        $vehicle->vin = $request->vin;
        $vehicle->keys = $request->keys;
        $vehicle->body_style = $request->body_style;
        $vehicle->description = $request->description;
        $vehicle->is_enable_future_vehicles = $request->is_enable_future_vehicles;
        $vehicle->is_visible_website = $request->is_visible_website;
        $vehicle->drive = $request->drive;
        $vehicle->location = $request->location;
        $vehicle->save();

        $fileName = null;
        if($request->hasfile('images'))
        {
            foreach($request->file('images') as $image)
            {
                $image->getClientOriginalName();
                $fileName = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('vehicle_image/'), $fileName);

                $vehicle_image = new vehicle_image;
                $vehicle_image->vehicle_id = $vehicle->id;
                $vehicle_image->image = $fileName;
                $vehicle_image->save();
            }
        }

        return response()->json('successfully save');
    }


    public function deleteVehicle($id){
        $vehicle = vehicle::find($id);

        $old_image = "vehicle_image/".$vehicle->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }

        $vehicle->delete();

        $vehicle_image = vehicle_image::where('vehicle_id',$id)->get();
   
    foreach ($vehicle_image as $key => $value) {
    $image_delete = vehicle_image::find($value->id);

        $old_image = "vehicle_image/".$image_delete->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
    $image_delete->delete();
    }
    return response()->json(['message'=>'Successfully Delete'],200);
    }

    public function deleteVehicleImage($id){
       
        $image_delete = vehicle_image::find($id);
        $old_image = "vehicle_image/".$image_delete->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $image_delete->delete();

    return response()->json(['message'=>'Successfully Delete'],200);
    }


    public function saveVehicleType(Request $request){
        $request->validate([
            'name'=>'required|unique:vehicle_types',
        ]);
        $vehicle_type = new vehicle_type;
        $vehicle_type->name = $request->name;
        $vehicle_type->save();
        return response()->json('successfully save');
    }

    public function updateVehicleType(Request $request){
        $request->validate([
            'name'=> 'required|unique:vehicle_types,name,'.$request->id,
        ]);
        $vehicle_type = vehicle_type::find($request->id);
        $vehicle_type->name = $request->name;
        $vehicle_type->save();
        return response()->json('successfully update');
    }

    public function VehicleType(){
        $vehicle_type = vehicle_type::all();
        return view('admin.vehicle_type',compact('vehicle_type'));
    }

    public function editVehicleType($id){
        $vehicle_type = vehicle_type::find($id);
        return response()->json($vehicle_type);
    }
   
    public function deleteVehicleType($id){
        $vehicle_type = vehicle_type::find($id);
        $vehicle_type->delete();
        return response()->json(['message'=>'Successfully Delete'],200);
    }



    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     Excel::import(new vehiclesImport,request()->file('select_file'));

     // $path = $request->file('select_file')->getRealPath();

     // $data = Excel::import($path)->get();


     // if($data->count() > 0)
     // {
     //  foreach($data->toArray() as $key => $value)
     //  {
     //   foreach($value as $row)
     //   {
     //    $insert_data[] = array(
     //     'car_id'  => $row['car_id'],
     //     'brand_id'   => $row['brand_id'],
     //     'vehicle_model'   => $row['vehicle_model'],
     //     'vehicle_status'    => $row['vehicle_status'],
     //     'colour'  => $row['colour'],
     //     'vehicle_type'   => $row['vehicle_type']
     //    );
     //   }
     //  }

     //  if(!empty($insert_data))
     //  {
     //   DB::table('vehicles')->insert($insert_data);
     //  }
     // }
     return back()->with('success', 'Excel Data Imported successfully.');
    }


    public function export() 
    {
        return Excel::download(new vehiclesExport, 'vehicle.xlsx');
    }


    public function getBrandCar($id){ 
        $data = car::where('brand_id',$id)->get();

        $output ='<option value="">SELECT</option>';
        foreach ($data as $key => $value) {
        $output .= '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
          
        echo $output;
    }



}