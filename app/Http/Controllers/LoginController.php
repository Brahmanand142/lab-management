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

        $user = User::where('email', $request->email)->first();
        // dd($user);
        if($user){
            if(Hash::check($request->password, $user->password)){
                Auth::login($user);

                switch($user->role){
                    case 'admin':
                      return  redirect()->intended(route('admin'));
                    case 'teacher':
                      return  redirect()->intended(route('teacher.dashboard'));
                    default:
                      return  redirect()->intended(route('user.dashboard')); 

                }
            }

        }

        return redirect()->back();


     }

     public function dashboard(){
        dd('Test');
     }
}
