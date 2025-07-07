<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
   public function index(){
    return view('backend.settings.form');
   }

   public function update(Request $request){

    $request->validate([
        'phone' => 'required|max:10|min:10|integer'
    ]);
    return redirect()->back();
   }
}
