<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SiteSettingController extends Controller
{

   public function index(){
     $setting = Setting::pluck('value','key')->toArray();
     // dd($setting['phone']);
     return view('backend.settings.form' , compact('setting'));
  }
 

   public function update(Request $request){
  
   try{
 $request->validate([
        // 'phone' => 'required|max:10|min:10|integer'
        'phone' => 'required|digits:10', 
        'email' => 'required|email|max:250',
        'name' => 'required|string|max:250',
         'facebook' => 'nullable|url|max:255'
    ]);

    foreach($request->except('_token') as $key=> $value){
        Setting::updateOrCreate(['key' =>$key],['key' => $key ,'value' => $value]);
    }

    return redirect()->back();
   }catch(\Exception $e){
    dd($e);
   }
   }
}
