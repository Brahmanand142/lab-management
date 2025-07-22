<?php

namespace App\Http\Controllers;

use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use App\Teacher;  
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('backend.table.teacher.index');
        $teachers = Teacher::all();
        // dd($teachers);
        return view('backend.table.teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.table.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
       public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers,email', // Unique to teachers table
            'faculty' => 'required|string|max:255',
            'lab' => 'required|string|max:255',
            'assignment' => 'nullable|string|max:255',
        ]);

        Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
            'faculty' => $request->faculty,
            'lab' => $request->lab,
            'assignment' => $request->assignment,
        ]);

        return redirect()->route('backend.table.teacher.index')->with('success', 'Teacher created successfully!');
    }
    /**
     * Show the form for editing the specified teacher.
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\View\View
     */
    public function edit(Teacher $teacher) // Route Model Binding
    {
        return view('backend.table.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified teacher in storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Teacher $teacher) // Route Model Binding
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('teachers')->ignore($teacher->id), // Ignore current teacher's email for uniqueness check
            ],
            // Password update should be optional
           
            'faculty' => 'required|string|max:255',
            'lab' => 'required|string|max:255',
            'assignment' => 'nullable|string|max:255',
        ]);

        $teacher->name = $request->name;
        $teacher->email = $request->email;
        $teacher->faculty = $request->faculty;
        $teacher->lab = $request->lab;
        $teacher->assignment = $request->assignment;
 
        
        $teacher->save();

        return redirect()->route('backend.table.teacher.index')->with('success', 'Teacher updated successfully!');
    }

    /**
     * Remove the specified teacher from storage.
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Teacher $teacher) // Route Model Binding
    {
        $teacher->delete();
        return redirect()->route('backend.table.teacher.index')->with('success', 'Teacher deleted successfully!');
    }
}