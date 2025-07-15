<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
     public function login(Request $request)
     {
        // dd($request->all());
        $request->validate([
            'email'=>'required|email',
            'password' =>'required|min:6'
        ]);
             
        //  dd($request->all());
        $user = User::where('email', $request->email)->first();
        // dd($user);
        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);
                switch($user->role){
                    case 'admin':
                      // dd('going to admin');
                      return  redirect()->intended(route('admin'));
                    case 'teacher':
                      // dd('going to teacher');
                      return  redirect()->intended(route('teacher.dashboard'));
                    default:
                    // dd('going to user');
                      return  redirect()->intended(route('user.dashboard')); 

                }
            }

        }

        return back();


     }

     public function dashboardadmin()
     {
        // dd('Test');
        return view('backend.dashboard');
     }
     public function dashboardteacher()
     {
      // dd('testing teacher dashboard');
        return view('teacher.dashboard');
     }
       public function dashboarduser()
       {
        // dd('Testing the user dashboard');
          return view('frontend.dashboard');
     }
}
