<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assignment;
use App\user;
use Illuminate\Support\Facades\Auth;

class StudentAssignmentController extends Controller
{
    /**
     * Show assignments for the logged-in student.
     */
    public function index()
    {
        $assignments = Assignment::where('student_id', Auth::id())->paginate(10);
        return view('student.assignment.index', compact('assignments'));
    }

    /**
     * Show the form to submit an assignment.
     */
    public function show(Assignment $assignment)
    {
        // Only allow if the logged-in student owns this assignment
        if ($assignment->student_id !== Auth::id()) {
            abort(403);
        }

        return view('student.assignment.submit', compact('assignment'));
    }

    /**
     * Submit an assignment file.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'assignment_id' => 'required|exists:assignments,id',
            'file' => 'required|file|max:2048'
        ]);

        $assignment = Assignment::findOrFail($request->assignment_id);

        // Ensure the assignment belongs to the logged-in student
        if ($assignment->student_id !== Auth::id()) {
            abort(403);
        }

        $filePath = $request->file('file')->store('submissions', 'public');

        $assignment->update([
            'status' => 'Submitted',
            'submission_file' => $filePath
        ]);

        return redirect()->route('student.assignments.index')->with('success', 'Assignment submitted successfully.');
    }
    public function store(Request $request)
    {
        $request->validate([
        'assignment_name' => 'required|string',
        'assignment_description' => 'required|string',
        'assignment_file' => 'required|file|mimes:pdf,doc,docx,zip',
        'submission_date' => 'required|date',
        'subject' => 'required|string',
        'faculty' => 'required|string',
        't_name' => 'required|string',
        ]);

        $filePath = $request->file('assignment_file')->store('assignments', 'public');

        Assignment::create([
        'assignment_name' => $request->assignment_name,
        'assignment_description' => $request->assignment_description,
        'file_path' => $filePath,
        'submission_date' => $request->submission_date,
        'subject' => $request->subject,
        'faculty' => $request->faculty,
        't_name' => $request->t_name,
        ]);

        return redirect()->back()->with('success', 'Assignment submitted successfully.');
    }

}
