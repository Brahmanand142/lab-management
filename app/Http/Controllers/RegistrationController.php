<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
 use Illuminate\Validation\Rule; 

class RegistrationController extends Controller
{
    public function register(Request $request)
{ 
        $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users|max:255',
        'password' => 'required|string|min:6|confirmed',
        'role' => [
            'required',
            'string',
            Rule::in(['admin', 'teacher']),
        ],
    ]);
    dd($request->all());

    $user = User::create([ // Use create() here
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    Auth::login($user); // This will work with create()

    switch($user->role) {
        case 'admin':
            return redirect()->intended(route('admin.dashboard'));
        case 'teacher':
            return redirect()->intended(route('teacher.dashboard'));
        default:
            // This shouldn't be hit with strict validation, but useful fallback
            return redirect()->intended(route('admin.dashboard')); // Or a generic admin page
    }

}
}
