<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\slider;
use App\site_info;
use App\User;
use App\blog;
use App\admin;
use App\email_temp;
use Hash;

class servicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function dashboard()
    {
        return view('admin.dashboard');
        //echo Browser::isMobile();
    }

    public function editUser($id){
        $user = User::find($id);
        return view('admin.changepass',compact('user'));
    }

    public function updateUser(Request $request){
        $request->validate([
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ]);
        $user = User::find($request->id);
        $user->password = Hash::make ( $request->get ( 'password' ) );
        $user->remember_token = $request->get ( '_token' );
        $user->save();
        return back(); 
    }
  
    public function saveSlider(Request $request){
        $request->validate([
            'title'=>'required|unique:sliders',
            'image' => 'mimes:jpeg,jpg,png|max:1000' // max 1000kb
        ]);
        //image upload
        $fileName = null;
        if($request->file('image')!=""){
            $image = $request->file('image');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName);
        }  
        $slider = new slider;
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->description = $request->description;
        $slider->image = $fileName;
        $slider->save();
        return response()->json('successfully save'); 
    }
    public function updateSlider(Request $request){
        $request->validate([
            'title'=> 'required|unique:sliders,title,'.$request->id,
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
        $slider = slider::find($request->id);
        $slider->title = $request->title;
        $slider->url = $request->url;
        $slider->description = $request->description;
        $slider->image = $fileName;
        $slider->save();
        return response()->json('successfully update'); 
    }
    public function Slider(){
        $slider = slider::all();
        return view('admin.slider',compact('slider'));
    }
    public function editSlider($id){
        $slider = slider::find($id);
        return response()->json($slider); 
    }
    
    public function deleteSlider($id){
        $slider = slider::find($id);

        $old_image = "upload_image/".$slider->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }

        $slider->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function siteInfo(){
        $data = site_info::find('1');
        return view('admin.site_info',compact('data'));
    }

    public function updateSiteInfo(Request $request){
        if($request->logo!=""){
            $old_image = "upload_image/".$request->logo;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            //image upload
            $fileName1 = null;
            if($request->file('logo')!=""){
            $image = $request->file('logo');
            $fileName1 = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName1);
            }
        }
        else
        {
            $fileName1 = $request->logo1;
        }

        $site_info = site_info::find($request->id);
        $site_info->mobile_1 = $request->mobile_1;
        $site_info->mobile_2 = $request->mobile_2;
        $site_info->email_1 = $request->email_1;
        $site_info->email_2 = $request->email_2;
        $site_info->city = $request->city;
        $site_info->state = $request->state;
        $site_info->address = $request->address;
        $site_info->map_iframe = $request->map_iframe;
        $site_info->facebook_url = $request->facebook_url;
        $site_info->twitter_url = $request->twitter_url;
        $site_info->instagram_url = $request->instagram_url;
        $site_info->youtube_url = $request->youtube_url;
        $site_info->linkedin_url = $request->linkedin_url;
        $site_info->google_plus_url = $request->google_plus_url;
        $site_info->about_title = $request->about_title;
        $site_info->about_info = $request->about_info;
        $site_info->logo = $fileName1;
        $site_info->save();
        return back();
    }

    public function EmailTemp(){
        $data = email_temp::find('1');
        return view('admin.email_temp',compact('data'));
    }

    public function updateEmailTemp(Request $request){
        if($request->logo!=""){
            $old_image = "upload_image/".$request->logo;
            if (file_exists($old_image)) {
                @unlink($old_image);
            }
            //image upload
            $fileName1 = null;
            if($request->file('logo')!=""){
            $image = $request->file('logo');
            $fileName1 = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName1);
            }
        }
        else
        {
            $fileName1 = $request->logo1;
        }

        $email_temp = email_temp::find($request->id);
        $email_temp->content = $request->content;
        $email_temp->logo = $fileName1;
        $email_temp->save();
        return back();
    }


    public function saveBlog(Request $request){
        $request->validate([
            'title'=>'required|unique:blogs',
            'image' => 'mimes:jpeg,jpg,png|max:1000' // max 1000kb
        ]);
        //image upload
        $fileName = null;
        if($request->file('image')!=""){
            $image = $request->file('image');
            $fileName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload_image/'), $fileName);
        }  
        $blog = new blog;
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->keyword = $request->keyword;
        $blog->description = $request->description;
        $blog->image = $fileName;
        $blog->save();
        return response()->json('successfully save'); 
    }

    public function updateBlog(Request $request){
        $request->validate([
            'title'=> 'required|unique:blogs,title,'.$request->id,
            'image' => 'mimes:jpeg,jpg,png|max:1000' // max 1000kb
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
        $blog = blog::find($request->id);
        $blog->title = $request->title;
        $blog->sub_title = $request->sub_title;
        $blog->keyword = $request->keyword;
        $blog->description = $request->description;
        $blog->image = $fileName;
        $blog->save();
        return response()->json('successfully update'); 
    }

    public function Blog(){
        $blog = blog::all();
        return view('admin.blog',compact('blog'));
    }

    public function editBlog($id){
        $blog = blog::find($id);
        return response()->json($blog); 
    }

    public function deleteBlog($id){
        $blog = blog::find($id);
        $old_image = "upload_image/".$blog->image;
        if (file_exists($old_image)) {
            @unlink($old_image);
        }
        $blog->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }


    public function howItWorks(){
        $data = site_info::find('1');
        return view('admin.how_it_works',compact('data'));
    }
    public function services(){
        $data = site_info::find('1');
        return view('admin.services',compact('data'));
    }
    public function memberFees(){
        $data = site_info::find('1');
        return view('admin.member_fees',compact('data'));
    }
    public function termsAndConditions(){
        $data = site_info::find('1');
        return view('admin.terms_and_conditions',compact('data'));
    }

    public function updatehowItWorks(Request $request){
        $site_info = site_info::find($request->id);
        $site_info->how_it_works = $request->how_it_works;
        $site_info->save();
        return back();
    }

    public function updateServices(Request $request){
        $site_info = site_info::find($request->id);
        $site_info->services = $request->services;
        $site_info->save();
        return back();
    }

    public function updateMemberFees(Request $request){
        $site_info = site_info::find($request->id);
        $site_info->member_fees = $request->member_fees;
        $site_info->save();
        return back();
    }

    public function updateTermsAndConditions(Request $request){
        $site_info = site_info::find($request->id);
        $site_info->terms_and_conditions = $request->terms_and_conditions;
        $site_info->save();
        return back();
    }

}
