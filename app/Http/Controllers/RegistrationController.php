<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
 

class RegistrationController extends Controller
{
    public function register(Request $request)
{ 
       $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'faculty' => 'required|string',
            'username' => 'required|string|unique:students,username', // <--- ADD THIS
            // Add any other fields that are 'NOT NULL' in your students table
        ]);

        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'faculty' => $request->faculty,
            'username' => $request->username, // <--- ADD THIS
            // Add any other fields required by your students table, e.g., 'password' if Student is a user
        ]);
dd($request->all());
    return redirect()->route('register.registration')->with('success', 'Student Registered Successfully!');

}
}
