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
}
