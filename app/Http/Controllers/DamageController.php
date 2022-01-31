<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\damage;

class DamageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function saveDamage(Request $request){
        $request->validate([
            'damage'=>'required',
        ]);

        $damage = new damage;
        $damage->damage = $request->damage;
        $damage->save();
        return response()->json('successfully save'); 
    }

    public function updateDamage(Request $request){
        $request->validate([
            'damage'=> 'required',
        ]);
        
        $damage = damage::find($request->id);
        $damage->damage = $request->damage;
        $damage->save();
        return response()->json('successfully update'); 
    }

    public function Damage(){
        $damage = damage::all();
        return view('admin.damage',compact('damage'));
    }

    public function editDamage($id){
        $damage = damage::find($id);
        return response()->json($damage); 
    }
    
    public function deleteDamage($id){
        $damage = damage::find($id);
        $damage->delete();
        return response()->json(['message'=>'Successfully Delete'],200); 
    }
}
