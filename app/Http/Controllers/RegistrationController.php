<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Registration;

class RegistrationController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string',
        'email' => 'required|email|unique:students,email',
        'faculty' => 'required|string',
    ]);

    Student::create([
        'name' => $request->name,
        'email' => $request->email,
        'faculty' => $request->faculty,
    ]);

    return redirect()->route('register.registration')->with('success', 'Student Registered Successfully!');

}
}
