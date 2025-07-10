<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Illuminate\Support\Facades\Storage;

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
    $settings = Setting::pluck('value','key')->toArray();
    // dd($settings);
    return view('backend.settings.form' , compact('settings'));
   }

           catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    
}

}
