<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPassword;



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
            'role'=>''
       
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
            case 'student':
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


    public function resetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $token = Str::random(64);
// dd($user);
            DB::table('password_resets')->updateOrInsert(
                ['email' => $user->email],
                [
                    'token' => Hash::make($token),
                    'created_at' => now()
                ]
            );
            Mail::to($user->email)->send(new ResetPassword($token));
            return back()->with('status', 'We have emailed your password reset link!');
        }

        return back()->withErrors(['email' => 'Email address not found.']);
    }


    public function showResetForm($token){
        if(!$token){
            return redirect()->back();
        }

        return view('frontend.login.password', compact('token'));
    }


    public function updatePassword(Request $request)
    {
        // dd($request->all());
        $request->validate([
            // 'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);
        

        $reset = DB::table('password_resets')->where('email', "test@test.com")->first();

        if (!$reset || !Hash::check($request->token, $reset->token)) {
            return back()->withErrors(['token' => 'Invalid or expired token.']);
        }

        $user = User::where('email', "test@test.com")->first();

        if (!$user) {
            return back()->withErrors(['email' => 'Email not found.']);
        }

        $user->password = Hash::make($request->password);
        $user->save();

        DB::table('password_resets')->where('email',"test@test.com")->delete();

        return redirect()->route('login')->with('status', 'Your password has been successfully reset.');
    }
     
    }

