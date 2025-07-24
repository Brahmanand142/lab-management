<?php

namespace App\Http\Controllers;

use App\Student; 
use Illuminate\Http\Request;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Hash; // Although password is not in students table, keeping for consistency if you add it later
use Illuminate\Validation\Rule;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $students = Student::all();
        // dd($students);
     return view('teacher.student.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('teacher.student.create');
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
            'email' => 'required|string|email|max:255|unique:students,email', // Email should be unique in students table
            'faculty' => 'required|string|max:255',
            'lab_id' => 'required|integer|min:0', // Assuming lab_id is a positive integer
            'assignment_id' => 'required|integer|min:0', // Assuming assignment_id is a positive integer
            
        ]);
        Student::create([
            'name' => $request->name,
            'email' => $request->email,
            'faculty' => $request->faculty,
            'lab_id' => $request->lab_id,
            'assignment_id' => $request->assignment_id,
        ]);

        return redirect()->route('teacher.student.index')->with('success', 'Student created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
             $students=Student::all();
        return view('baceacher.student', compact('students')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)  
    {
        // dd($id);
            $students = Student::all(); // Retrieve all students
            return view('teacher.student.edit', compact('student')); 
     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $students)
    {
         $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
              
            ],
            'faculty' => 'required|string|max:255',
            'lab_id' => 'required|integer|min:0',
            'assignment_id' => 'required|integer|min:0',
        ]);

        // Update the student record
        $students->update([
            'name' => $request->name,
            'email' => $request->email,
            'faculty' => $request->faculty,
            'lab_id' => $request->lab_id,
            'assignment_id' => $request->assignment_id,
        ]);

        // Redirect back to the student index page with a success message
        return redirect()->route('teacher.student.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy(Student $student) // Using Route Model Binding
{
     
    $student->delete(); 

    return redirect()->route('teacher.student.index')->with('success', 'Student deleted successfully!');
}
}
