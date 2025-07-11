<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SiteSettingController extends Controller
{
   public function index(){
    $settings = Setting::pluck('value','key')->toArray();
    // dd($settings);
    return view('backend.settings.form' , compact('settings'));
   }

   public function update(Request $request){
  
//    try{
 $request->validate([
      'sitename' => 'required|string|max:255',
      'phone' => 'required|digits:10',
      'address' => 'required|string|max:255',
      'email' => 'required|email|max:255',
      'opening_hours' => 'nullable|string|max:255',
      'facebook' => 'nullable|url|max:255',
      'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
  ]);


if($request->logo && $request->hasFile('logo')){
    $file = $request->logo;
    $filename =  time().'_'. rand(10,11111111111111) .$file->getClientOriginalName();
    $path = public_path().'/settings';
    $file->move($path,$filename);
    Setting::updateOrCreate(['key' => 'logo'], ['key' => 'logo', 'value' => $filename]);
//     // }
//   dd($request->all());

    // if ($request->hasFile('logo')) {
    //     $logo = $request->file('logo');
    //     $logoName = time().'_'.$logo->getClientOriginalName();
    //     $logoPath = $logo->storeAs('public/logos', $logoName);
    //     $logoUrl = 'storage/logos/'.$logoName;

    //     $existingLogo = Setting::where('key', 'logo')->value('value');
    //     if ($existingLogo && \Storage::exists(str_replace('storage/', 'public/', $existingLogo))) {
    //         \Storage::delete(str_replace('storage/', 'public/', $existingLogo));
    //     }

    //     Setting::updateOrCreate(['key' => 'logo'], ['key' => 'logo', 'value' => $logoUrl]);
    // }

    foreach($request->except('_token', 'logo') as $key => $value){
        Setting::updateOrCreate(['key' =>$key],['key' => $key ,'value' => $value]);
    }

    return redirect()->back();
//    }catch(\Exception $e){
    // dd($e);
    return redirect()->back();
   }
//    }
}
}
