<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
 use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

 
class TeacherController extends Controller
{
     // In your TeacherController.php
public function index()
{
    $teachers = Teachers::all(); // This is a collection of teachers
    return view('backend.teacher', compact('teachers'));
}
} 