<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // LOGIN FUNCTION
    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password' =>'required|min:6'
        ]);
            // dd($request->all());
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);

            switch($user->role) {
                case 'admin':
                    return redirect()->intended(route('admin'));
                case 'teacher':
                    return redirect()->intended(route('teacher.dashboard'));
                default:
                    return redirect()->intended(route('user.dashboard'));
            }
        }

        return back()->withErrors(['email' => 'Invalid email or password']);
    }

    // SIGNUP FUNCTION
     public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
       
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->student
        ]);

        Auth::login($user);
  

        switch($user->role) {
            case 'admin':
                return redirect()->intended(route('admin'));
            case 'teacher':
                return redirect()->intended(route('teacher.dashboard'));
            default:
                return redirect()->intended(route('user.dashboard'));
        }
    }
     
    // LOGOUT
    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
        }

        return redirect()->route('home'); // back to popup page
    }

    // DASHBOARD VIEWS
    public function dashboardadmin()
    {
        return view('backend.dashboard');
    }

    public function dashboardteacher()
    {
        return view('teacher.dashboard');
    }

    public function dashboarduser()
    {
        return view('user.dashboard');
    }

}
